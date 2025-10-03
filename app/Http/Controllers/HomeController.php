<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News; 
use App\Models\Partner; // <-- 1. IMPORT MODEL PARTNER

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 4 berita terbaru
        $latestNews = News::latest('date_published')->take(4)->get();

        // 2. AMBIL 8 MITRA TERBARU (berdasarkan kapan mereka ditambahkan)
        $partners = Partner::latest()->take(8)->get();

        // 3. KIRIM KEDUA DATA (BERITA & MITRA) KE VIEW
        return view('welcome', [
            'latestNews' => $latestNews,
            'partners'   => $partners, // <-- Tambahkan variabel partners
        ]);
    }
}