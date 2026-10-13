<?php

namespace App\Controllers;

use App\Models\SchoolModel;

class SchoolSite extends BaseController
{
    public function show(string $slug): string
    {
        $school = (new SchoolModel())
            ->where('slug', $slug)
            ->where('is_active', 1)
            ->first();

        if ($school === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Sekolah tidak ditemukan.');
        }

        $sections = db_connect()->table('school_sections')
            ->where('school_id', $school['id'])
            ->where('is_visible', 1)
            ->orderBy('sort_order', 'ASC')
            ->get()
            ->getResultArray();

        $posts = db_connect()->table('school_posts')
            ->where('school_id', $school['id'])
            ->where('status', 'published')
            ->groupStart()
                ->where('published_at <=', date('Y-m-d H:i:s'))
                ->orWhere('published_at', null)
            ->groupEnd()
            ->orderBy('published_at', 'DESC')
            ->limit(3)
            ->get()
            ->getResultArray();

        return view('school_site/home', [
            'school' => $school,
            'sections' => $sections,
            'posts' => $posts,
        ]);
    }
}
