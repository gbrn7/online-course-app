<?php

namespace Database\Seeders;

use App\Models\news;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        news::create([
            'title' => 'New Campus Opens in 2025',
            'content' => 'A new campus will open next year, offering state-of-the-art facilities...',
            'is_published' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
