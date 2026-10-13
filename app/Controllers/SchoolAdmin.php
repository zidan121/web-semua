<?php

namespace App\Controllers;

use App\Models\SchoolModel;

class SchoolAdmin extends BaseController
{
    public function index(): string
    {
        $school = $this->currentSchool();
        $counts = [
            'sections' => db_connect()->table('school_sections')->where('school_id', $school['id'])->countAllResults(),
            'posts' => db_connect()->table('school_posts')->where('school_id', $school['id'])->countAllResults(),
            'media' => db_connect()->table('school_media')->where('school_id', $school['id'])->countAllResults(),
        ];

        return view('school_admin/dashboard', ['school' => $school, 'counts' => $counts]);
    }

    public function settings(): string
    {
        $school = $this->currentSchool();

        if ($this->request->is('post')) {
            $rules = [
                'name' => 'required|max_length[180]',
                'slug' => 'required|alpha_dash|min_length[2]|max_length[120]',
                'email' => 'permit_empty|valid_email|max_length[180]',
                'primary_color' => 'required|regex_match[/^#[0-9A-Fa-f]{6}$/]',
                'secondary_color' => 'required|regex_match[/^#[0-9A-Fa-f]{6}$/]',
            ];

            if (! $this->validate($rules)) {
                return view('school_admin/settings', [
                    'school' => $school,
                    'errors' => $this->validator->getErrors(),
                    'message' => null,
                ]);
            }

            $data = [];
            foreach ([
                'name', 'slug', 'tagline', 'address', 'phone', 'whatsapp', 'email',
                'instagram_url', 'facebook_url', 'tiktok_url', 'youtube_url',
                'hero_title', 'hero_description', 'hero_video_url',
                'welcome_title', 'welcome_text', 'vision', 'mission',
            ] as $field) {
                $value = trim((string) $this->request->getPost($field));
                $data[$field] = $value === '' ? null : $value;
            }
            $data['primary_color'] = (string) $this->request->getPost('primary_color');
            $data['secondary_color'] = (string) $this->request->getPost('secondary_color');

            $existing = (new SchoolModel())->where('slug', $data['slug'])->first();
            if ($existing && (int) $existing['id'] !== (int) $school['id']) {
                return view('school_admin/settings', [
                    'school' => array_merge($school, $data),
                    'errors' => ['slug' => 'Alamat slug ini sudah digunakan sekolah lain.'],
                    'message' => null,
                ]);
            }

            foreach (['logo' => 'logo_path', 'favicon' => 'favicon_path', 'hero_image' => 'hero_image_path'] as $input => $field) {
                $file = $this->request->getFile($input);
                if ($file && $file->getError() !== UPLOAD_ERR_NO_FILE) {
                    $allowed = ['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/x-icon', 'image/vnd.microsoft.icon'];
                    if (! $file->isValid() || $file->hasMoved() || $file->getSizeByUnit('mb') > 4 || ! in_array($file->getMimeType(), $allowed, true)) {
                        return view('school_admin/settings', [
                            'school' => array_merge($school, $data),
                            'errors' => [$input => 'File harus berupa gambar yang valid dengan ukuran maksimal 4 MB.'],
                            'message' => null,
                        ]);
                    }

                    $directory = FCPATH . 'uploads/schools/' . (int) $school['id'];
                    if (! is_dir($directory) && ! mkdir($directory, 0755, true) && ! is_dir($directory)) {
                        return view('school_admin/settings', [
                            'school' => array_merge($school, $data),
                            'errors' => [$input => 'Folder upload tidak dapat dibuat. Periksa izin folder public/uploads.'],
                            'message' => null,
                        ]);
                    }

                    $newName = $file->getRandomName();
                    if (! $file->move($directory, $newName)) {
                        return view('school_admin/settings', [
                            'school' => array_merge($school, $data),
                            'errors' => [$input => 'Gagal menyimpan gambar. Silakan coba lagi.'],
                            'message' => null,
                        ]);
                    }
                    $data[$field] = 'uploads/schools/' . (int) $school['id'] . '/' . $newName;
                }
            }

            try {
                (new SchoolModel())->update((int) $school['id'], $data);
            } catch (\Throwable $e) {
                log_message('error', 'School settings update failed: ' . $e->getMessage());
                return view('school_admin/settings', [
                    'school' => array_merge($school, $data),
                    'errors' => ['general' => 'Pengaturan belum tersimpan. Pastikan slug belum digunakan sekolah lain.'],
                    'message' => null,
                ]);
            }

            return redirect()->to(site_url('admin/sekolah/pengaturan'))->with('success', 'Pengaturan sekolah berhasil disimpan.');
        }

        return view('school_admin/settings', [
            'school' => $school,
            'errors' => [],
            'message' => session()->getFlashdata('success'),
        ]);
    }

    private function currentSchool(): array
    {
        if (! session()->has('school_admin_id') || ! session()->has('school_id')) {
            redirect()->to(site_url('admin/sekolah/login'))->send();
            exit;
        }

        $school = (new SchoolModel())->find((int) session()->get('school_id'));
        if (! $school || (int) $school['is_active'] !== 1) {
            session()->destroy();
            redirect()->to(site_url('admin/sekolah/login'))->send();
            exit;
        }

        return $school;
    }
}
