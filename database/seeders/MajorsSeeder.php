<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MajorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('majors')->insert([
            [
                'name' => 'Teknik Komputer dan Jaringan',
                'description' => 'Jurusan yang berfokus pada perakitan komputer, instalasi jaringan, troubleshooting, dan administrasi server.',
                'image' => null,
                'competency_head' => 'Bapak Ahmad Fauzi',
                'competency_head_photo' => null,
                'publisher' => 'Admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Rekayasa Perangkat Lunak',
                'description' => 'Jurusan yang mempelajari dasar-dasar pemrograman, pengembangan aplikasi, manajemen proyek perangkat lunak, dan database.',
                'image' => null,
                'competency_head' => 'Ibu Siti Rahmawati',
                'competency_head_photo' => null,
                'publisher' => 'Admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Multimedia',
                'description' => 'Jurusan yang mempelajari desain grafis, animasi, videografi, editing, dan produksi media kreatif.',
                'image' => null,
                'competency_head' => 'Bapak Joko Susilo',
                'competency_head_photo' => null,
                'publisher' => 'Admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
