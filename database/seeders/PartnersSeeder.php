<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PartnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('partners')->insert([
            [
                'name' => 'PT Teknologi Nusantara',
                'description' => 'Perusahaan teknologi yang bergerak di bidang pengembangan perangkat lunak dan solusi AI.',
                'logo' => null,
                'sector' => 'Teknologi',
                'city' => 'Jakarta',
                'company_contact' => 'info@teknologinusantara.id',
                'publisher' => 'Admin',
                'partnership_date' => Carbon::now()->subMonths(3),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'CV Edukasi Maju',
                'description' => 'Lembaga pendidikan yang fokus pada pelatihan digital skill untuk pelajar dan mahasiswa.',
                'logo' => null,
                'sector' => 'Pendidikan',
                'city' => 'Bandung',
                'company_contact' => 'kontak@edukasimaju.com',
                'publisher' => 'Admin',
                'partnership_date' => Carbon::now()->subMonths(6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'PT Energi Hijau Lestari',
                'description' => 'Mitra di bidang energi terbarukan yang mendukung program pemerintah menuju energi ramah lingkungan.',
                'logo' => null,
                'sector' => 'Energi',
                'city' => 'Surabaya',
                'company_contact' => 'contact@energilestari.co.id',
                'publisher' => 'Admin',
                'partnership_date' => Carbon::now()->subYear(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
             [
                'name' => 'PT Energi Hijau Lestari',
                'description' => 'Mitra di bidang energi terbarukan yang mendukung program pemerintah menuju energi ramah lingkungan.',
                'logo' => null,
                'sector' => 'Energi',
                'city' => 'Surabaya',
                'company_contact' => 'contact@energilestari.co.id',
                'publisher' => 'Admin',
                'partnership_date' => Carbon::now()->subYear(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
             [
                'name' => 'PT Energi Hijau Lestari',
                'description' => 'Mitra di bidang energi terbarukan yang mendukung program pemerintah menuju energi ramah lingkungan.',
                'logo' => null,
                'sector' => 'Energi',
                'city' => 'Surabaya',
                'company_contact' => 'contact@energilestari.co.id',
                'publisher' => 'Admin',
                'partnership_date' => Carbon::now()->subYear(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
             [
                'name' => 'PT Energi Hijau Lestari',
                'description' => 'Mitra di bidang energi terbarukan yang mendukung program pemerintah menuju energi ramah lingkungan.',
                'logo' => null,
                'sector' => 'Energi',
                'city' => 'Surabaya',
                'company_contact' => 'contact@energilestari.co.id',
                'publisher' => 'Admin',
                'partnership_date' => Carbon::now()->subYear(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
