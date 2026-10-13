<?php

namespace App\Models;

use CodeIgniter\Model;

class SchoolModel extends Model
{
    protected $table = 'schools';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'name', 'slug', 'tagline', 'logo_path', 'favicon_path',
        'primary_color', 'secondary_color', 'address', 'phone', 'whatsapp',
        'email', 'instagram_url', 'facebook_url', 'tiktok_url', 'youtube_url',
        'hero_title', 'hero_description', 'hero_image_path', 'hero_video_url',
        'welcome_title', 'welcome_text', 'vision', 'mission', 'is_active',
    ];
    protected $useTimestamps = true;
}
