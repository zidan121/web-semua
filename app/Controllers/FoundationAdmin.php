<?php

namespace App\Controllers;

use App\Models\SchoolModel;

class FoundationAdmin extends BaseController
{
    public function setup(): string
    {
        $db = db_connect();
        if (! $db->tableExists('foundation_users')) {
            return view('foundation_admin/setup', ['error' => 'Struktur database admin yayasan belum tersedia. Jalankan migration terlebih dahulu.']);
        }
        if ($db->table('foundation_users')->countAllResults() > 0) {
            return redirect()->to(site_url('admin/yayasan/login'));
        }

        if ($this->request->is('post')) {
            $rules = [
                'name' => 'required|max_length[120]',
                'email' => 'required|valid_email|max_length[180]',
                'password' => 'required|min_length[10]|max_length[72]',
                'password_confirm' => 'required|matches[password]',
            ];
            if (! $this->validate($rules)) {
                return view('foundation_admin/setup', ['error' => implode(' ', $this->validator->getErrors())]);
            }
            // First-admin setup closes after the first account is created.
            if ($db->table('foundation_users')->countAllResults() > 0) {
                return redirect()->to(site_url('admin/yayasan/login'));
            }

            try {
                $db->table('foundation_users')->insert([
                    'name' => trim((string) $this->request->getPost('name')),
                    'email' => strtolower(trim((string) $this->request->getPost('email'))),
                    'password_hash' => password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT),
                    'is_active' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            } catch (\Throwable $e) {
                log_message('error', 'Foundation admin setup failed: ' . $e->getMessage());
                return view('foundation_admin/setup', ['error' => 'Admin tidak dapat dibuat. Pastikan email belum digunakan dan coba lagi.']);
            }

            return redirect()->to(site_url('admin/yayasan/login'))->with('success', 'Admin yayasan berhasil dibuat. Silakan masuk.');
        }

        return view('foundation_admin/setup', ['error' => null]);
    }

    public function login(): string
    {
        if (session()->has('foundation_admin_id')) {
            return redirect()->to(site_url('admin/yayasan'));
        }

        if ($this->request->is('post')) {
            $email = strtolower(trim((string) $this->request->getPost('email')));
            $password = (string) $this->request->getPost('password');
            $user = db_connect()->table('foundation_users')
                ->where('email', $email)->where('is_active', 1)->get()->getRowArray();

            if ($user && password_verify($password, $user['password_hash'])) {
                session()->regenerate(true);
                session()->set([
                    'foundation_admin_id' => (int) $user['id'],
                    'foundation_admin_name' => $user['name'],
                ]);
                db_connect()->table('foundation_users')->where('id', $user['id'])
                    ->update(['last_login_at' => date('Y-m-d H:i:s')]);

                return redirect()->to(site_url('admin/yayasan'));
            }

            return view('foundation_admin/login', ['error' => 'Email atau kata sandi tidak valid.', 'success' => null]);
        }

        return view('foundation_admin/login', [
            'error' => null,
            'success' => session()->getFlashdata('success'),
        ]);
    }

    public function logout()
    {
        session()->remove(['foundation_admin_id', 'foundation_admin_name']);
        session()->regenerate(true);
        return redirect()->to(site_url('admin/yayasan/login'));
    }

    public function index(): string
    {
        $this->requireFoundationAdmin();
        $schools = (new SchoolModel())->orderBy('name', 'ASC')->findAll();
        $counts = [
            'total' => count($schools),
            'active' => count(array_filter($schools, static fn ($school) => (int) $school['is_active'] === 1)),
            'admins' => db_connect()->table('school_users')->countAllResults(),
        ];

        return view('foundation_admin/dashboard', [
            'schools' => $schools,
            'counts' => $counts,
            'success' => session()->getFlashdata('success'),
        ]);
    }

    public function schools(): string
    {
        $this->requireFoundationAdmin();
        $model = new SchoolModel();

        if ($this->request->is('post')) {
            $id = (int) $this->request->getPost('id');
            $action = (string) $this->request->getPost('action');

            if ($id > 0 && in_array($action, ['activate', 'deactivate'], true)) {
                $model->update($id, ['is_active' => $action === 'activate' ? 1 : 0]);
                return redirect()->to(site_url('admin/yayasan/sekolah'))->with('success', 'Status sekolah berhasil diperbarui.');
            }

            $rules = [
                'name' => 'required|max_length[180]',
                'slug' => 'required|alpha_dash|min_length[2]|max_length[120]',
            ];
            if (! $this->validate($rules)) {
                return redirect()->back()->with('error', implode(' ', $this->validator->getErrors()));
            }

            $slug = trim((string) $this->request->getPost('slug'));
            $existing = $model->where('slug', $slug)->first();
            if ($existing && (int) $existing['id'] !== $id) {
                return redirect()->back()->with('error', 'Slug sudah digunakan sekolah lain.');
            }

            $data = [
                'name' => trim((string) $this->request->getPost('name')),
                'slug' => $slug,
                'tagline' => trim((string) $this->request->getPost('tagline')) ?: null,
            ];

            if ($id > 0) {
                $model->update($id, $data);
                $message = 'Data sekolah berhasil diperbarui.';
            } else {
                $data['primary_color'] = '#163A70';
                $data['secondary_color'] = '#F4A62A';
                $data['is_active'] = 1;
                $model->insert($data);
                $message = 'Sekolah berhasil ditambahkan.';
            }

            return redirect()->to(site_url('admin/yayasan/sekolah'))->with('success', $message);
        }

        return view('foundation_admin/schools', [
            'schools' => $model->orderBy('name', 'ASC')->findAll(),
            'success' => session()->getFlashdata('success'),
            'error' => session()->getFlashdata('error'),
        ]);
    }

    private function requireFoundationAdmin(): void
    {
        if (! session()->has('foundation_admin_id')) {
            redirect()->to(site_url('admin/yayasan/login'))->send();
            exit;
        }

        $active = db_connect()->table('foundation_users')
            ->where('id', (int) session()->get('foundation_admin_id'))
            ->where('is_active', 1)->countAllResults();

        if ($active !== 1) {
            session()->remove(['foundation_admin_id', 'foundation_admin_name']);
            redirect()->to(site_url('admin/yayasan/login'))->send();
            exit;
        }
    }
}
