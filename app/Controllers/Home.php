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

        // Ambil berita terbaru dari website SMPIT (WordPress REST API).
        // Jika API tidak tersedia, beranda tetap menggunakan berita lokal yayasan.
        $smpitNews = [];
        $smpitApiUrl = 'https://websmpit.alfirdauspurwodadi.sch.id/wp-json/wp/v2/posts?per_page=4&orderby=date&order=desc&_embed=wp:featuredmedia';
        try {
            if (function_exists('curl_init')) {
                $curl = curl_init($smpitApiUrl);
                curl_setopt_array($curl, [
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_CONNECTTIMEOUT => 3,
                    CURLOPT_TIMEOUT => 5,
                    CURLOPT_SSL_VERIFYPEER => true,
                    CURLOPT_HTTPHEADER => ['Accept: application/json'],
                    CURLOPT_USERAGENT => 'YayasanBinaInsaniWebsite/1.0',
                ]);
                $response = curl_exec($curl);
                $statusCode = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);
                curl_close($curl);
                if ($response !== false && $statusCode >= 200 && $statusCode < 300) {
                    $decoded = json_decode($response, true);
                    if (is_array($decoded)) {
                        foreach ($decoded as $post) {
                            if (! is_array($post) || empty($post['link']) || empty($post['title']['rendered'])) {
                                continue;
                            }
                            $image = $post['_embedded']['wp:featuredmedia'][0]['source_url'] ?? '';
                            $excerptHtml = $post['excerpt']['rendered'] ?? '';
                            $excerptText = trim(preg_replace('/\\s+/', ' ', html_entity_decode(strip_tags($excerptHtml), ENT_QUOTES | ENT_HTML5, 'UTF-8')));
                            $smpitNews[] = [
                                'id' => (int) ($post['id'] ?? 0),
                                'title' => html_entity_decode(strip_tags($post['title']['rendered']), ENT_QUOTES | ENT_HTML5, 'UTF-8'),
                                'slug' => (string) ($post['slug'] ?? ''),
                                'excerpt' => mb_substr($excerptText, 0, 180),
                                'cover_image_path' => $image,
                                'published_at' => ! empty($post['date']) ? date('Y-m-d H:i:s', strtotime($post['date'])) : null,
                                'school_name' => 'SMPIT Al Firdaus Purwodadi',
                                'school_slug' => 'smpit-al-firdaus',
                                'news_url' => $post['link'],
                                'cover_image_url' => $image,
                            ];
                        }
                    }
                }
            }
        } catch (\\Throwable $e) {
            log_message('warning', 'Gagal mengambil berita SMPIT dari WordPress API: {message}', ['message' => $e->getMessage()]);
        }
        if ($smpitNews !== []) {
            $latestNews = $smpitNews;
        }

        $siteSettings = [];
        if ($db->tableExists('foundation_site_settings')) {
            foreach ($db->table('foundation_site_settings')->get()->getResultArray() as $setting) {
                $siteSettings[$setting['setting_key']] = $setting['setting_value'];
            }
        }

        return view('platform_home', [
            'siteSettings' => $siteSettings,
            'schools' => $schools,
            'latestNews' => $latestNews,
        ]);
    }
}
