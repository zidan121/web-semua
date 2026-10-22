<?php

namespace App\Controllers;

use App\Models\SchoolModel;

class Home extends BaseController
{
    public function index(): string
    {
        $db = db_connect();

        $schools = (new SchoolModel())
            ->where('is_active', 1)
            ->orderBy('name', 'ASC')
            ->findAll();

        // Hanya berita terbit dari unit yang aktif ditampilkan di beranda yayasan.
        $latestNews = $db->table('school_posts posts')
            ->select('posts.id, posts.title, posts.slug, posts.excerpt, posts.cover_image_path, posts.published_at, schools.name AS school_name, schools.slug AS school_slug')
            ->join('schools', 'schools.id = posts.school_id')
            ->where('schools.is_active', 1)
            ->where('posts.status', 'published')
            ->orderBy('posts.published_at', 'DESC')
            ->orderBy('posts.id', 'DESC')
            ->limit(4)
            ->get()
            ->getResultArray();

        return view('platform_home', [
            'schools' => $schools,
            'latestNews' => $latestNews,
        ]);
    }
}
