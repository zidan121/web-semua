<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;
use Throwable;

class CreateSchool extends BaseCommand
{
    protected $group = 'WEB SEMUA';
    protected $name = 'school:create';
    protected $description = 'Create a school tenant and its first administrator.';
    protected $usage = 'school:create "Nama Sekolah" slug admin@example.com';
    protected $arguments = [
        'name' => 'Display name of the school.',
        'slug' => 'Public URL slug, for example smpit-al-firdaus.',
        'email' => 'Email address for the first school administrator.',
    ];

    public function run(array $params)
    {
        if (count($params) < 3) {
            CLI::error('Parameter kurang. Contoh: php spark school:create "Nama Sekolah" nama-sekolah admin@example.com');
            return;
        }

        [$name, $slug, $email] = array_slice($params, 0, 3);
        $name = trim($name);
        $slug = strtolower(trim($slug));
        $email = strtolower(trim($email));

        if ($name === '' || mb_strlen($name) > 180 || ! preg_match('/^[a-z0-9_-]{2,120}$/', $slug) || ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            CLI::error('Nama, slug, atau email tidak valid.');
            return;
        }

        $db = Database::connect();
        if (! $db->tableExists('schools') || ! $db->tableExists('school_users')) {
            CLI::error('Tabel belum tersedia. Jalankan migrasi terlebih dahulu: php spark migrate');
            return;
        }

        if ($db->table('schools')->where('slug', $slug)->countAllResults() > 0) {
            CLI::error('Slug sudah digunakan. Pilih slug lain.');
            return;
        }

        $temporaryPassword = bin2hex(random_bytes(8));
        $now = date('Y-m-d H:i:s');

        try {
            $db->transBegin();
            $db->table('schools')->insert([
                'name' => $name,
                'slug' => $slug,
                'primary_color' => '#163A70',
                'secondary_color' => '#F4A62A',
                'is_active' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $schoolId = (int) $db->insertID();

            $db->table('school_users')->insert([
                'school_id' => $schoolId,
                'name' => 'Administrator',
                'email' => $email,
                'password_hash' => password_hash($temporaryPassword, PASSWORD_DEFAULT),
                'role' => 'admin',
                'is_active' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            if ($db->transStatus() === false) {
                $db->transRollback();
                CLI::error('Pembuatan sekolah gagal. Tidak ada perubahan yang disimpan.');
                return;
            }
            $db->transCommit();
        } catch (Throwable $e) {
            $db->transRollback();
            log_message('error', 'School provisioning failed: ' . $e->getMessage());
            CLI::error('Pembuatan sekolah gagal. Periksa log aplikasi.');
            return;
        }

        CLI::write('Sekolah berhasil dibuat.', 'green');
        CLI::write('Website: ' . site_url('sekolah/' . $slug));
        CLI::write('Login admin: ' . site_url('admin/sekolah/login'));
        CLI::write('Email: ' . $email);
        CLI::write('Kata sandi sementara: ' . $temporaryPassword, 'yellow');
        CLI::write('Simpan kata sandi ini sekarang dan segera ubah setelah login.', 'yellow');
    }
}
