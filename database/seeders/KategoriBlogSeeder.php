<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_blog')
            ->insert([
                'kategori' => 'Pendidikan',
                'slug' => 'pendidikan',
                'keterangan' => 'Kategori pendidikan',
                'created_at' => now(),
                'updated_at' => now()
            ]);
    }
}
