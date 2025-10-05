<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TestimonialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('testimonials')->insert([
            [
                'name' => 'Andi Pratama',
                'alumni_year' => '2019',
                'major_id' => 1, // pastikan major_id = 1 sudah ada di tabel majors
                'description' => 'Pengalaman saya di SMK ini sangat berkesan. Pembelajaran praktik dan teori seimbang, sehingga saya siap menghadapi dunia kerja.',
                'photo' => null,
                'publisher' => 'Admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Siti Aisyah',
                'alumni_year' => '2020',
                'major_id' => 2,
                'description' => 'Guru-guru yang profesional dan lingkungan belajar yang mendukung membuat saya percaya diri melanjutkan kuliah di bidang IT.',
                'photo' => null,
                'publisher' => 'Admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Budi Santoso',
                'alumni_year' => '2018',
                'major_id' => 1,
                'description' => 'Berkat bimbingan di sekolah ini, saya bisa langsung bekerja setelah lulus. Terima kasih untuk pengalaman yang luar biasa.',
                'photo' => null,
                'publisher' => 'Admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
