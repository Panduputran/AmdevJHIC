<?php

namespace App\Http\Controllers\PublicPage;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Image;
use App\Models\Facility;
use Illuminate\Http\Request;

class PublicMajorsController extends Controller
{
    /**
     * Menampilkan halaman daftar jurusan.
     */
    public function index()
    {
        // Mengambil semua data jurusan (Major)
        $majors = Major::latest()->get();

        // Mengambil gambar hero untuk halaman jurusan
        $majorsImages = Image::where('title', 'MajorsImage')->get();
        $hasImages = !$majorsImages->isEmpty();


        // Mengirimkan KEDUA variabel ('majors' dan 'MajorsImage') ke view
        return view('PublicSide.majors.index', compact('majors', 'majorsImages', 'hasImages'));
    }

    /**
     * Menampilkan detail satu jurusan.
     */
    public function show(Major $major)
    {
        // Ambil semua jurusan LAIN, kecuali jurusan yang sedang dilihat saat ini
        $otherMajors = Major::where('id', '!=', $major->id)->latest()->get();

        // Kirim data jurusan yang sedang dilihat DAN daftar jurusan lain ke view
        return view('PublicSide.majors.show', [
            'major'       => $major,
            'otherMajors' => $otherMajors,
        ]);
    }
}
