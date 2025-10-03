<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Untuk News
        DB::table('news')->insert([
            [
                'title' => 'Peluncuran Teknologi AI Baru di Indonesia',
                'image' => null,
                'description' => 'Indonesia resmi meluncurkan teknologi AI terbaru yang akan digunakan di berbagai sektor, mulai dari kesehatan hingga pendidikan.',
                'publisher' => 'TechDaily',
                'date_published' => Carbon::now()->subDays(2),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'SMK XYZ Juara Lomba Inovasi Nasional',
                'image' => null,
                'description' => 'SMK XYZ berhasil meraih juara 1 lomba inovasi nasional berkat karya robot otomatisasi.',
                'publisher' => 'EduNews',
                'date_published' => Carbon::now()->subDays(5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Pemerintah Resmikan Program Digitalisasi Sekolah',
                'image' => null,
                'description' => 'Program digitalisasi sekolah resmi diluncurkan untuk meningkatkan kualitas pendidikan di era 4.0.',
                'publisher' => 'Kompas Edukasi',
                'date_published' => Carbon::now()->subDays(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Pemerintah Resmikan Program Digitalisasi Sekolah',
                'image' => null,
                'description' => 'Program digitalisasi sekolah resmi diluncurkan untuk meningkatkan kualitas pendidikan di era 4.0.',
                'publisher' => 'Kompas Edukasi',
                'date_published' => Carbon::now()->subDays(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
