<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSchoolPlatformTables extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 180],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 120],
            'tagline' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'logo_path' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'favicon_path' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'primary_color' => ['type' => 'CHAR', 'constraint' => 7, 'default' => '#163A70'],
            'secondary_color' => ['type' => 'CHAR', 'constraint' => 7, 'default' => '#F4A62A'],
            'address' => ['type' => 'TEXT', 'null' => true],
            'phone' => ['type' => 'VARCHAR', 'constraint' => 40, 'null' => true],
            'whatsapp' => ['type' => 'VARCHAR', 'constraint' => 40, 'null' => true],
            'email' => ['type' => 'VARCHAR', 'constraint' => 180, 'null' => true],
            'instagram_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'facebook_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'tiktok_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'youtube_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'hero_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'hero_description' => ['type' => 'TEXT', 'null' => true],
            'hero_image_path' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'hero_video_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'welcome_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'welcome_text' => ['type' => 'TEXT', 'null' => true],
            'vision' => ['type' => 'TEXT', 'null' => true],
            'mission' => ['type' => 'TEXT', 'null' => true],
            'is_active' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('slug');
        $this->forge->createTable('schools', true);

        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'school_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 120],
            'email' => ['type' => 'VARCHAR', 'constraint' => 180],
            'password_hash' => ['type' => 'VARCHAR', 'constraint' => 255],
            'role' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'admin'],
            'is_active' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'last_login_at' => ['type' => 'DATETIME', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['school_id', 'email'], false, true);
        $this->forge->addForeignKey('school_id', 'schools', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('school_users', true);

        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'school_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 180],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 180],
            'content' => ['type' => 'LONGTEXT', 'null' => true],
            'meta_description' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'is_published' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'sort_order' => ['type' => 'INT', 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('school_id');
        $this->forge->addUniqueKey(['school_id', 'slug']);
        $this->forge->addForeignKey('school_id', 'schools', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('school_pages', true);

        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'school_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'section_key' => ['type' => 'VARCHAR', 'constraint' => 80],
            'title' => ['type' => 'VARCHAR', 'constraint' => 180, 'null' => true],
            'body' => ['type' => 'TEXT', 'null' => true],
            'image_path' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'video_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'button_label' => ['type' => 'VARCHAR', 'constraint' => 80, 'null' => true],
            'button_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'is_visible' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'sort_order' => ['type' => 'INT', 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['school_id', 'is_visible']);
        $this->forge->addForeignKey('school_id', 'schools', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('school_sections', true);

        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'school_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 180],
            'file_path' => ['type' => 'VARCHAR', 'constraint' => 255],
            'file_type' => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'image'],
            'alt_text' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('school_id');
        $this->forge->addForeignKey('school_id', 'schools', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('school_media', true);

        $this->forge->addField([
            'id' => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'school_id' => ['type' => 'BIGINT', 'unsigned' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 180],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 180],
            'excerpt' => ['type' => 'TEXT', 'null' => true],
            'content' => ['type' => 'LONGTEXT', 'null' => true],
            'cover_image_path' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'draft'],
            'published_at' => ['type' => 'DATETIME', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['school_id', 'status']);
        $this->forge->addUniqueKey(['school_id', 'slug']);
        $this->forge->addForeignKey('school_id', 'schools', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('school_posts', true);
    }

    public function down()
    {
        $this->forge->dropTable('school_posts', true);
        $this->forge->dropTable('school_media', true);
        $this->forge->dropTable('school_sections', true);
        $this->forge->dropTable('school_pages', true);
        $this->forge->dropTable('school_users', true);
        $this->forge->dropTable('schools', true);
    }
}
