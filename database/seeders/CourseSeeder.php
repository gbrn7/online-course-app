<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::insert([
            [
                "title" => "Pembelajaran Anak Hambatan Pendengaran",
                "thumbnail" => "default-thumbnail.jpg",
                "is_active" => true,
                "meeting_number" => "1",
                'youtube_link' => "https://youtu.be/BSOPUdzTQ6Y?si=1GFMtNo12sAlthrO",
                'content' => "content",
                'module_file' => "default-module.pdf",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "title" => "Bagaimana Mengatasi Berbagai Permasalahan yang Timbul Akibat Ketunarunguan",
                "thumbnail" => "default-thumbnail.jpg",
                "is_active" => true,
                "meeting_number" => "2",
                'youtube_link' => "https://youtu.be/BSOPUdzTQ6Y?si=1GFMtNo12sAlthrO",
                'content' => "content",
                'module_file' => "default-module.pdf",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
