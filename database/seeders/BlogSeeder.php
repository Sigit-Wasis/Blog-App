<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // buatkan insert data ke table blog
        DB::table('blog')->insert([
            'title' => 'Blog Pertama',
            'slug' => 'blog-pertama',
            'kategori_id' => 1,
            'content' => 'Ini adalah isi blog pertama',
            'image' => 'blog1.jpg',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1
        ]);
    }
}
