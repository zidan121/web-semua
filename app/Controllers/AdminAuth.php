<?php

namespace App\Controllers;

class AdminAuth extends BaseController
{
    public function login(): string
    {
        if (session()->has('school_admin_id') && session()->has('school_id')) {
            return redirect()->to(site_url('admin/sekolah'));
        }

        if ($this->request->is('post')) {
            $email = strtolower(trim((string) $this->request->getPost('email')));
            $password = (string) $this->request->getPost('password');

            $user = db_connect()->table('school_users u')
                ->select('u.id, u.school_id, u.name, u.email, u.password_hash, u.role, u.is_active, s.is_active AS school_active')
                ->join('schools s', 's.id = u.school_id')
                ->where('u.email', $email)
                ->where('u.is_active', 1)
                ->where('s.is_active', 1)
                ->get()->getRowArray();

            if ($user && password_verify($password, $user['password_hash'])) {
                session()->regenerate(true);
                session()->set([
                    'school_admin_id' => (int) $user['id'],
                    'school_id' => (int) $user['school_id'],
                    'school_admin_name' => $user['name'],
                    'school_admin_role' => $user['role'],
                ]);

                db_connect()->table('school_users')
                    ->where('id', $user['id'])
                    ->update(['last_login_at' => date('Y-m-d H:i:s')]);

                return redirect()->to(site_url('admin/sekolah'));
            }

            return view('school_admin/login', ['error' => 'Email atau kata sandi tidak valid.']);
        }

        return view('school_admin/login', ['error' => null]);
    }

    public function logout()
    {
        session()->remove(['school_admin_id', 'school_id', 'school_admin_name', 'school_admin_role']);
        session()->regenerate(true);

        return redirect()->to(site_url('admin/sekolah/login'));
    }
}
