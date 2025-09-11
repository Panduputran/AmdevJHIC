<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Major;
use Illuminate\Support\Facades\DB;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('majors')->delete();

        Major::create([
            'name' => 'Rekayasa Perangkat Lunak',
            'description' => 'Jurusan yang fokus pada pengembangan perangkat lunak, termasuk perancangan, pembuatan, dan pemeliharaan aplikasi.',
            'image' => 'major_images/rpl_major.jpg',
            'competency_head' => 'Bapak Budi Santoso, S.Kom.',
            'competency_head_photo' => '',
            'publisher' => 'Admin Utama',
        ]);

        Major::create([
            'name' => 'Akuntansi Keuangan Lembaga',
            'description' => 'Mempelajari pencatatan dan pelaporan transaksi keuangan untuk memenuhi kebutuhan pihak internal maupun eksternal perusahaan.',
            'image' => 'major_images/akl_major.jpg',
            'competency_head' => 'Ibu Siti Aminah, S.E.',
            'competency_head_photo' => '',
            'publisher' => 'Admin Utama',
        ]);

        Major::create([
            'name' => 'Teknik Komputer dan Jaringan',
            'description' => 'Fokus pada instalasi, konfigurasi, dan pemeliharaan jaringan komputer serta hardware pendukungnya.',
            'image' => 'major_images/tkj_major.jpg',
            'competency_head' => 'Bapak Joko Susanto, M.T.',
            'competency_head_photo' => '',
            'publisher' => 'Admin Utama',
        ]);
    }
}