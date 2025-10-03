@extends('layouts.public-navbar')

@section('title', 'Halaman Utama')

@section('content')
    {{-- Membungkus seluruh konten dengan tag HTML/Head/Body --}}
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>

        {{-- Link Font Awesome & Google Font (Poppins) agar Font termuat --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    </head>

    <style>
        .hero-shape {
            clip-path: polygon(0 0, 100% 0, 100% calc(100% - 4rem), calc(100% - 4rem) 100%, 0 100%);
        }
    </style>

    <body class="font-['Poppins'] bg-gray-100">

        @php
            $amaliahGreen = '#63cd00';
            $amaliahDark = '#282829';
            // Menambahkan warna biru untuk divider
            $amaliahBlue = '#E0E7FF';



            // Data untuk kartu jurusan
            $jurusan = [
                [
                    'title' => 'PPLG',
                    'desc' => '...',
                    'img' => asset('assets/image/DroneView.jpg') // <--- TAMBAHKAN DI SINI
                ],
                [
                    'title' => 'AN',
                    'desc' => '...',
                    'img' => asset('assets/image/DroneView.jpg') // <--- TAMBAHKAN DI SINI
                ],
                [
                    'title' => 'TJKT',
                    'desc' => '...',
                    'img' => asset('assets/image/DroneView.jpg') // <--- TAMBAHKAN DI SINI
                ],
                [
                    'title' => 'LPS',
                    'desc' => '...',
                    'img' => asset('assets/image/DroneView.jpg') // <--- TAMBAHKAN DI SINI
                ],
            ];

        @endphp

        <main style="margin-top: 10px;">
            <section class="relative max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 mt-4 items-center justify-center">

                <div
                    class="hero-shape relative flex items-center justify-center p-10 lg:p-12 bg-green rounded-tl-3xl rounded-tr-xl rounded-br-xl h-[550px] overflow-hidden center">
                    {{-- Gaya gambar disesuaikan --}}
                    <div class="absolute inset-0 bg-gray-400 -z-10">
                        <img style=" width: 100%; height: auto;" src="{{ asset('assets/image/DroneView.jpg') }}" alt="">
                    </div>
                </div>


                <div class="absolute top-1/2 left-4 md:left-10 transform -translate-y-1/2 z-10 mt-36 ml-4">

                    <div class="bg-white p-4 md:p-6 max-w-xs w-full rounded-lg shadow-xl">
                        {{-- 4. Perubahan: Ukuran font judul diperkecil sedikit --}}
                        <h1 class="text-base font-normal text-gray-800 leading-snug">
                            Menuju Karir Impian
                            <br><span class="text-lg md:text-xl font-semibold">SMK AMALIAH 1&2 CIAWI</span>
                        </h1>
                        <p class="text-xs mt-2 mb-4 text-gray-500">
                            Diterbitkan 14 Agustus 2025
                        </p>
                        <div class="flex items-center">
                            <span class="text-sm font-semibold text-[#282829] mr-2">Selengkapnya</span>
                            <a href="#" class="bg-[#282829] rounded-full p-2 hover:opacity-80 transition duration-300">
                                <i class="fas fa-arrow-right text-white text-base"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </section>


            <section class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 mb-16">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                    @php
                        // Definisikan warna utama agar mudah diubah
                        $amaliahGreen = '#63cd00';

                        // Data untuk setiap kartu fitur
                        $fitur = [
                            [
                                'icon' => 'fa-file-lines',
                                'title' => 'PPDB',
                                'desc' => 'Ayo daftarkan dirimu di SMK Amaliah secara online'
                            ],
                            [
                                'icon' => 'fa-chart-simple',
                                'title' => 'E-Learning',
                                'desc' => 'Sistem pembelajaran berbasis online di SMK Amaliah'
                            ],
                            [
                                'icon' => 'fa-vr-cardboard',
                                'title' => 'Virtual Tour',
                                'desc' => 'Kunjungi SMK AMALIAH Lewat Virtual Tour'
                            ],
                            [
                                'icon' => 'fa-building-columns',
                                'title' => 'Bank Digital',
                                'desc' => 'Bank digital di SMK Amaliah yang dikelola oleh jurusan LPS'
                            ],
                        ];
                    @endphp

                    {{-- Loop untuk menampilkan setiap kartu fitur --}}
                    @foreach ($fitur as $item)
                        <div class="bg-white p-6 border rounded-2xl flex flex-col items-start hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300 cursor-pointer"
                            style="border-color: {{ $amaliahGreen }};">

                            {{-- Bagian Ikon --}}
                            <div class="p-4 rounded-lg mb-4" style="background-color: {{ $amaliahGreen }};">
                                <i class="fas {{ $item['icon'] }} text-2xl text-white"></i>
                            </div>

                            {{-- Bagian Teks --}}
                            <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $item['title'] }}</h2>
                            <p class="text-sm text-gray-600 mb-4 flex-grow">{{ $item['desc'] }}</p>

                            {{-- Tombol Link --}}
                            <a href="#" class="text-sm font-semibold flex items-center mt-auto group"
                                style="color: {{ $amaliahGreen }};">
                                Daftar Sekarang
                                <i class="fas fa-chevron-right ml-2 text-xs transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    @endforeach

                </div>
            </section>

            @php
                // Definisikan warna di sini agar mudah diakses
                $amaliahGreen = '#63cd00'; // Warna hijau sesuai permintaan
                $amaliahDark = '#282829';   // Warna gelap sesuai permintaan
            @endphp

            {{-- Bagian Header Judul --}}
            <section class="text-center px-4 sm:px-6 lg:px-8 mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">We Have Intelligent Solution For Your Education
                </h2>
                <div class="flex items-center justify-center gap-x-2 mx-auto mt-4">
                    <div class="w-20 h-1.5 rounded-full" style="background-color: {{ $amaliahGreen }};"></div>
                    <div class="w-5 h-1.5 rounded-full" style="background-color: {{ $amaliahGreen }};"></div>
                </div>
            </section>

            {{-- Bagian Konten Utama (Deskripsi, Tombol, dan Grid Gambar) --}}
            <section class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 mb-24">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    {{-- Kolom Kiri: Teks dan Tombol --}}
                    <div class="text-gray-600">
                        <p class="text-base leading-relaxed">
                            SMK Amaliah 1 & 2 merupakan bentuk sekolah kejuruan yang dibawah naungan Yayasan Pusat Studi
                            Pengembangan Islam Amaliyah Indonesia (YPSPIAI) dengan mengutamakan kualitas, Profesionalitas
                            dan Pelayanan Prima dan dibawah pengawasan Universitas Djuanda (UNIDA) berdiri pada tahun 2008.
                        </p>

                        {{-- Wadah untuk Tombol (Diperbarui) --}}
                        <div
                            class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-8">

                            {{-- Tombol 1: Info PPDB (Style diperbarui) --}}
                            <a href="#"
                                class="inline-flex items-center justify-center text-white px-6 py-3 rounded-lg font-semibold transition-transform hover:scale-105 shadow-lg"
                                style="background-color: {{ $amaliahGreen }};">
                                Info PPDB
                            </a>

                            {{-- Tombol 2: Selengkapnya (Style diperbarui sesuai referensi) --}}
                            <a href="#"
                                class="inline-flex items-center justify-between text-white pl-6 pr-2 py-2 rounded-lg font-semibold transition-transform hover:scale-105 shadow-lg"
                                style="background-color: {{ $amaliahGreen }};">
                                <span class="mr-3">Selengkapnya</span>
                                <div class="bg-white rounded-full h-8 w-8 flex items-center justify-center">
                                    <i class="fas fa-arrow-right text-sm" style="color: {{ $amaliahGreen }};"></i>
                                </div>
                            </a>

                        </div>
                    </div>

                    {{-- Kolom Kanan: Grid Gambar Placeholder (Tidak diubah) --}}
                    <div class="grid grid-cols-3 grid-rows-3 gap-4 h-96">
                        <div class="bg-gray-200 rounded-lg row-span-2 animate-pulse"></div>
                        <div class="bg-gray-200 rounded-lg col-span-2 row-span-2 animate-pulse"></div>
                        <div class="bg-gray-200 rounded-lg animate-pulse"></div>
                        <div class="bg-gray-200 rounded-lg animate-pulse"></div>
                        <div class="bg-gray-200 rounded-lg animate-pulse"></div>
                    </div>
                </div>
            </section>

            @php
                // Definisikan variabel warna di atas agar mudah diakses
                $amaliahDark = '#282829';

                // Data untuk bagian statistik, disesuaikan dengan referensi gambar
                $stats = [
                    ['icon' => 'fa-users', 'number' => '1150 +', 'label' => 'Peserta Didik'],
                    ['icon' => 'fa-rocket', 'number' => '100 +', 'label' => 'Tenaga Pendidik'],
                    ['icon' => 'fa-star', 'number' => '40 +', 'label' => 'Fasilitas Unggulan'],
                    ['icon' => 'fa-graduation-cap', 'number' => '85%', 'label' => 'Alumni cepat dapat kerja'],
                ];
            @endphp

            {{-- SECTION STATS BAR --}}
            <section class="py-12 lg:py-16" style="background-color: {{ $amaliahDark }};">
                <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                    {{-- Kontainer utama dengan layout flex responsif --}}
                    <div class="flex flex-col lg:flex-row items-center justify-center lg:justify-around gap-y-10 gap-x-6">

                        {{-- STATISTIK UTAMA (KIRI) --}}
                        <div class="flex items-center gap-x-5">
                            {{-- Kotak Ikon --}}
                            <div class="bg-gray-200 flex items-center justify-center h-20 w-20 rounded-2xl flex-shrink-0">
                                <i class="fas {{ $stats[0]['icon'] }} text-4xl" style="color: {{ $amaliahDark }};"></i>
                            </div>
                            {{-- Teks Statistik --}}
                            <div class="text-white">
                                <p class="text-4xl font-bold whitespace-nowrap">{{ $stats[0]['number'] }}</p>
                                <p class="text-base text-gray-300">{{ $stats[0]['label'] }}</p>
                            </div>
                        </div>

                        {{-- PEMISAH (VERTIKAL DI DESKTOP, HORIZONTAL DI MOBILE) --}}
                        <div class="w-4/5 h-px bg-gray-600 lg:w-px lg:h-20"></div>

                        {{-- GRUP STATISTIK LAINNYA (KANAN) --}}
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-10 sm:gap-6 lg:gap-12">
                            {{-- Loop untuk 3 statistik sisanya --}}
                            @foreach (array_slice($stats, 1) as $stat)
                                <div class="flex items-center gap-x-4 justify-center sm:justify-start">
                                    {{-- Kotak Ikon --}}
                                    <div
                                        class="bg-gray-200 flex items-center justify-center h-16 w-16 rounded-xl flex-shrink-0">
                                        <i class="fas {{ $stat['icon'] }} text-2xl" style="color: {{ $amaliahDark }};"></i>
                                    </div>
                                    {{-- Teks Statistik --}}
                                    <div class="text-white">
                                        <p class="text-3xl font-bold whitespace-nowrap">{{ $stat['number'] }}</p>
                                        <p class="text-sm text-gray-300 whitespace-nowrap">{{ $stat['label'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </section>


            <section class="bg-white py-16 sm:py-24">
                <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

                        {{-- Kolom Kiri: Teks & Tombol --}}
                        <div class="text-left">
                            <h2 class="text-4xl md:text-5xl font-bold" style="color: {{ $amaliahDark }};">
                                Here Is Our<br>Industry Partner
                            </h2>

                            {{-- Dekorasi Garis Bawah --}}
                            <div class="flex items-center gap-x-2 mt-4">
                                <div class="w-20 h-1.5 rounded-full" style="background-color: {{ $amaliahGreen }};"></div>
                                <div class="w-4 h-1.5 rounded-full" style="background-color: {{ $amaliahGreen }};"></div>
                                <div class="w-4 h-1.5 rounded-full" style="background-color: {{ $amaliahGreen }};"></div>
                            </div>

                            <p class="mt-6 text-gray-600 leading-relaxed">
                                We cooperate with industry leaders to provide students with real-world experience through
                                internships, industrial visits, training, and career opportunities after graduation.
                            </p>

                            {{-- Tombol Selengkapnya --}}
                            <a href="#"
                                class="mt-8 inline-flex items-center text-white px-8 py-4 rounded-lg font-semibold transition-transform hover:scale-105 shadow-lg"
                                style="background-color: {{ $amaliahGreen }};">
                                <span>Selengkapnya</span>
                                <div class="ml-4 bg-white rounded-full p-2 flex items-center justify-center">
                                    <i class="fas fa-arrow-right text-base" style="color: {{ $amaliahGreen }};"></i>
                                </div>
                            </a>
                        </div>

                        {{-- Kolom Kanan: Grid Logo Mitra (Sekarang Dinamis) --}}
                        <div>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-x-8 gap-y-10">

                                {{-- Loop data dari controller --}}
                                @forelse ($partners as $partner)
                                    <div class="text-center">
                                        {{-- Tampilkan Logo Mitra --}}
                                        <div
                                            class="bg-gray-100 h-24 w-full rounded-lg mb-3 flex items-center justify-center p-4">
                                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo {{ $partner->name }}"
                                                class="max-h-full max-w-full object-contain">
                                        </div>

                                        {{-- Tampilkan Nama Mitra --}}
                                        <p class="text-sm text-gray-600 font-medium">{{ $partner->name }}</p>
                                    </div>
                                @empty
                                    {{-- Tampilan jika tidak ada data mitra --}}
                                    <div class="col-span-2 md:col-span-4 text-center">
                                        <p class="text-gray-500">Belum ada mitra yang ditambahkan.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>
            </section>



            {{-- CSS Tambahan untuk menyembunyikan scrollbar --}}
            <style>
                .scrollbar-hide::-webkit-scrollbar {
                    display: none;
                }

                .scrollbar-hide {
                    -ms-overflow-style: none;
                    scrollbar-width: none;
                }
            </style>

            <section class="py-16 sm:py-24" style="background-color: {{ $amaliahDark }};">
                <div x-data="{
                                                    scrollSlider(direction) {
                                                        const slider = this.$refs.slider;
                                                        const scrollAmount = slider.querySelector('.slider-item').offsetWidth + 32; // Lebar kartu + gap
                                                        slider.scrollBy({
                                                            left: direction === 'next' ? scrollAmount : -scrollAmount,
                                                            behavior: 'smooth'
                                                        });
                                                    }
                                                }" class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 relative">

                    {{-- Dekorasi Titik --}}
                    <div class="absolute top-8 left-8 md:left-12 flex items-center space-x-2">
                        <div class="w-3 h-3 bg-gray-600 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-600 rounded-full"></div>
                        <div class="w-3 h-3 bg-white rounded-full"></div>
                    </div>

                    {{-- Header Section --}}
                    <div class="text-center">
                        <h2 class="text-3xl md:text-4xl font-bold text-white">Major Competency</h2>
                        <p class="mt-2 text-gray-400">Stay in the know with insights from industry experts.</p>
                        <div class="w-24 h-px bg-gray-600 mx-auto mt-4"></div>
                    </div>

                    {{-- Layout Grid Utama (Statis Kiri, Scroll Kanan) --}}
                    <div class="mt-10 grid grid-cols-1 lg:grid-cols-4 gap-8">

                        {{-- KOLOM 1: KONTEN STATIS (TIDAK IKUT SCROLL) --}}
                        <div class="lg:col-span-1 hidden lg:flex flex-col justify-between">
                            {{-- Placeholder Gambar Statis --}}
                            <div class="flex flex-col space-y-6">
                                <div class="bg-gray-700 h-48 w-full rounded-xl flex items-center justify-center">
                                    <i class="fas fa-image text-4xl text-gray-500"></i>
                                </div>
                                <div class="bg-gray-700 h-48 w-full rounded-xl flex items-center justify-center">
                                    <i class="fas fa-image text-4xl text-gray-500"></i>
                                </div>
                            </div>
                            {{-- Tombol Navigasi Statis --}}
                            <div class="mt-6 flex items-center space-x-4">
                                <button @click="scrollSlider('prev')"
                                    class="bg-white hover:bg-gray-200 text-gray-800 w-12 h-12 rounded-lg flex items-center justify-center transition-colors">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button @click="scrollSlider('next')"
                                    class="bg-white hover:bg-gray-200 text-gray-800 w-12 h-12 rounded-lg flex items-center justify-center transition-colors">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                        {{-- KOLOM 2: KONTEN SLIDER (BISA DI-SCROLL) --}}
                        <div x-ref="slider"
                            class="lg:col-span-3 flex space-x-8 overflow-x-auto snap-x snap-mandatory scroll-smooth scrollbar-hide pb-4 -mx-4 px-4">

                            {{-- Loop untuk Kartu Jurusan --}}
                            @foreach ($jurusan as $item)
                                <div class="flex-shrink-0 w-80 snap-start flex flex-col slider-item">
                                    {{-- Menampilkan Gambar Jurusan --}}
                                    <img src="{{ $item['img'] }}" alt="Gambar Jurusan {{ $item['title'] }}"
                                        class="h-48 w-full rounded-lg object-cover mb-4">
                                    <h3 class="text-xl font-bold text-white">{{ $item['title'] }}</h3>
                                    <p class="text-sm text-gray-400 mt-2 flex-grow">{{ $item['desc'] }}</p>
                                    <a href="#" class="inline-flex items-center group mt-4">
                                        <span class="text-sm font-semibold text-white mr-3">Selengkapnya</span>
                                        <div class="bg-gray-200 rounded-full p-2 group-hover:bg-gray-300 transition-colors">
                                            <i class="fas fa-arrow-right text-gray-800 text-sm"></i>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        {{-- Tombol Navigasi (Hanya tampil di mobile) --}}
                        <div class="lg:hidden mt-6 flex items-center space-x-4">
                            <button @click="scrollSlider('prev')"
                                class="bg-white hover:bg-gray-200 text-gray-800 w-12 h-12 rounded-lg flex items-center justify-center transition-colors">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button @click="scrollSlider('next')"
                                class="bg-white hover:bg-gray-200 text-gray-800 w-12 h-12 rounded-lg flex items-center justify-center transition-colors">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </section>



            <section class="bg-gray-50 py-16 sm:py-24">
                <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">

                    {{-- Header Section --}}
                    <div class="text-center">
                        {{-- Dekorasi Titik Hijau --}}
                        <div class="flex space-x-2 justify-center md:justify-start mb-4">
                            <div class="w-3 h-3 rounded-full" style="background-color: {{ $amaliahGreen }};"></div>
                            <div class="w-3 h-3 rounded-full" style="background-color: {{ $amaliahGreen }};"></div>
                            <div class="w-3 h-3 rounded-full" style="background-color: {{ $amaliahGreen }};"></div>
                        </div>

                        <h2 class="text-3xl md:text-4xl font-bold" style="color: {{ $amaliahDark }};">
                            Baca Berita Terbaru Kami
                        </h2>
                        <p class="mt-2 text-gray-500">
                            Read our latest news, and know about smk amaliah
                        </p>
                    </div>


                    <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        {{-- Menggunakan @forelse untuk menangani jika tidak ada berita --}}
                        @forelse ($latestNews as $newsItem)
                            <div
                                class="bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                                {{-- Ganti '#' dengan link detail berita jika ada, misal: route('news.show', $newsItem->id) --}}
                                <a href="#" class="block">

                                    {{-- GAMBAR: Mengambil dari storage --}}
                                    <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}"
                                        class="w-full h-56 object-cover">

                                    <div class="p-6">
                                        {{-- JUDUL: Mengambil dari database --}}
                                        <p class="text-gray-800 font-semibold leading-relaxed line-clamp-3">
                                            {{ $newsItem->title }}
                                        </p>

                                        {{-- TANGGAL: Mengambil dari database dan diformat --}}
                                        <p class="mt-4 text-sm text-gray-400">
                                            {{ \Carbon\Carbon::parse($newsItem->date_published)->format('Y-m-d H:i:s') }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @empty
                            {{-- Tampilan jika tidak ada berita sama sekali --}}
                            <div class="col-span-1 sm:col-span-2 lg:col-span-4 text-center py-12">
                                <p class="text-gray-500">Belum ada berita untuk ditampilkan.</p>
                            </div>
                        @endforelse
                    </div>

                    {{-- Tombol "Lihat Lebih Banyak" --}}
                    <div class="text-center mt-12">
                        {{-- Ganti '#' dengan link ke halaman daftar berita --}}
                        <a href="#"
                            class="inline-block bg-white border border-gray-200 rounded-xl px-6 py-4 text-sm font-semibold shadow-sm hover:shadow-lg hover:border-gray-300 transition-all duration-300">
                            <span class="text-gray-600">Mau Baca Lebih Banyak?</span>
                            <span class="ml-1 font-bold" style="color: {{ $amaliahGreen }};">Ayo Kesini</span>
                            <i class="fas fa-chevron-right ml-2 text-xs" style="color: {{ $amaliahGreen }};"></i>
                        </a>
                    </div>
                </div>
            </section>

        </main>
    </body>

    </html>
@endsection