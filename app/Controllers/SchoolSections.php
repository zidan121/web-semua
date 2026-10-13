<?php

namespace App\Controllers;

class SchoolSections extends BaseController
{
    public function index(): string
    {
        $schoolId = $this->requireSchoolId();
        $table = db_connect()->table('school_sections');

        if ($this->request->is('post')) {
            $action = (string) $this->request->getPost('action');
            $id = (int) $this->request->getPost('id');

            if ($action === 'save') {
                $title = trim((string) $this->request->getPost('title'));
                if ($title === '' || mb_strlen($title) > 180) {
                    return redirect()->back()->with('error', 'Judul bagian wajib diisi dan maksimal 180 karakter.');
                }

                $key = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '_', $title), '_'));
                $data = [
                    'title' => $title,
                    'section_key' => $key !== '' ? substr($key, 0, 80) : 'bagian',
                    'body' => trim((string) $this->request->getPost('body')),
                    'video_url' => trim((string) $this->request->getPost('video_url')) ?: null,
                    'button_label' => trim((string) $this->request->getPost('button_label')) ?: null,
                    'button_url' => trim((string) $this->request->getPost('button_url')) ?: null,
                ];

                if ($id > 0) {
                    $table->where('school_id', $schoolId)->where('id', $id)->update($data);
                } else {
                    $last = db_connect()->table('school_sections')->where('school_id', $schoolId)->selectMax('sort_order')->get()->getRowArray();
                    $data['school_id'] = $schoolId;
                    $data['is_visible'] = 1;
                    $data['sort_order'] = ((int) ($last['sort_order'] ?? 0)) + 1;
                    $table->insert($data);
                }

                return redirect()->to(site_url('admin/sekolah/bagian'))->with('success', 'Bagian halaman berhasil disimpan.');
            }

            $section = db_connect()->table('school_sections')
                ->where('school_id', $schoolId)->where('id', $id)->get()->getRowArray();

            if ($section && $action === 'toggle') {
                $table->where('school_id', $schoolId)->where('id', $id)
                    ->update(['is_visible' => (int) ! (bool) $section['is_visible']]);
            } elseif ($section && $action === 'delete') {
                $table->where('school_id', $schoolId)->where('id', $id)->delete();
            } elseif ($section && in_array($action, ['up', 'down'], true)) {
                $direction = $action === 'up' ? 'ASC' : 'DESC';
                $operator = $action === 'up' ? '<' : '>';
                $neighbor = db_connect()->table('school_sections')
                    ->where('school_id', $schoolId)
                    ->where('sort_order ' . $operator, (int) $section['sort_order'])
                    ->orderBy('sort_order', $direction)
                    ->limit(1)->get()->getRowArray();

                if ($neighbor) {
                    $table->where('school_id', $schoolId)->where('id', $id)
                        ->update(['sort_order' => (int) $neighbor['sort_order']]);
                    $table->where('school_id', $schoolId)->where('id', $neighbor['id'])
                        ->update(['sort_order' => (int) $section['sort_order']]);
                }
            }

            return redirect()->to(site_url('admin/sekolah/bagian'))->with('success', 'Perubahan bagian halaman selesai.');
        }

        $sections = db_connect()->table('school_sections')
            ->where('school_id', $schoolId)
            ->orderBy('sort_order', 'ASC')->get()->getResultArray();

        return view('school_admin/sections', [
            'sections' => $sections,
            'success' => session()->getFlashdata('success'),
            'error' => session()->getFlashdata('error'),
        ]);
    }

    private function requireSchoolId(): int
    {
        if (! session()->has('school_admin_id') || ! session()->has('school_id')) {
            redirect()->to(site_url('admin/sekolah/login'))->send();
            exit;
        }

        $schoolId = (int) session()->get('school_id');
        $active = db_connect()->table('schools')->where('id', $schoolId)->where('is_active', 1)->countAllResults();
        if ($active !== 1) {
            session()->destroy();
            redirect()->to(site_url('admin/sekolah/login'))->send();
            exit;
        }

        return $schoolId;
    }
}
