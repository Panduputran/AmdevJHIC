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

        {{-- Link Extensions --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <style>
        .hero-clip-path {
            clip-path: polygon(0 0, 100% 0, 100% calc(100% - 4rem), calc(100% - 4rem) 100%, 0 100%);
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

    <body class="font-['Poppins'] bg-gray-100">

        @php
            $amaliahGreen = '#63cd00';
            $amaliahDark = '#282829';
            $amaliahBlue = '#E0E7FF';

            // Cek Variabel 
            $hasImages = isset($mainImages) && $mainImages->isNotEmpty();
        @endphp

        <main style="margin-top: 10px;">
            <section class="relative max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                {{-- Slider Gambar Dinamis --}}
                @if($hasImages)
                    <div x-data="{ activeSlide: 1, totalSlides: {{ $mainImages->count() }} }"
                        x-init="setInterval(() => { activeSlide = activeSlide % totalSlides + 1 }, 5000)">
                        <div class="relative h-[550px] overflow-hidden hero-clip-path rounded-3xl">
                            @foreach($mainImages as $image)
                                <div x-show="activeSlide === {{ $loop->iteration }}"
                                    x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-1000"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    class="absolute inset-0">

                                    <img src="{{ Storage::url($image->path) }}" alt="{{ $image->description ?? $image->filename }}"
                                        class="w-full h-full object-cover">
                                </div>
                            @endforeach

                        </div>
                    </div>
                @else
                    <div>
                        <div class="relative h-[550px] overflow-hidden hero-clip-path rounded-3xl bg-black">
                            {{-- Layar hitam sebagai fallback --}}
                        </div>
                    </div>
                @endif

                <div class="absolute bottom-12 left-8 md:left-12 z-10">
                    <div class="bg-white p-4 md:p-6 max-w-xs w-full rounded-lg shadow-xl">
                        <h1 class="text-base font-normal text-gray-800 leading-snug">
                            Menuju Karir Impian Bersama
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
                    <div class="w-4 h-1.5 rounded-full" style="background-color: {{ $amaliahGreen }};"></div>
                    <div class="w-4 h-1.5 rounded-full" style="background-color: {{ $amaliahGreen }};"></div>
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

                    {{-- Kolom Kanan: Grid Gambar Dinamis dari Database --}}
                    <div class="grid grid-cols-3 grid-rows-3 gap-4 h-96">

                        {{-- Gambar 1 (Slot Paling Kiri, Tinggi) --}}
                        @if(isset($gridImages[0]))
                            <img src="{{ Storage::url($gridImages[0]->path) }}" alt="Grid Image 1"
                                class="w-full h-full object-cover rounded-lg row-span-2">
                        @else
                            <div class="bg-gray-200 rounded-lg row-span-2"></div>
                        @endif

                        {{-- Gambar 2 (Slot Kanan Atas, Besar) --}}
                        @if(isset($gridImages[1]))
                            <img src="{{ Storage::url($gridImages[1]->path) }}" alt="Grid Image 2"
                                class="w-full h-full object-cover rounded-lg col-span-2 row-span-2">
                        @else
                            <div class="bg-gray-200 rounded-lg col-span-2 row-span-2"></div>
                        @endif

                        {{-- Gambar 3 (Slot Kiri Bawah) --}}
                        @if(isset($gridImages[2]))
                            <img src="{{ Storage::url($gridImages[2]->path) }}" alt="Grid Image 3"
                                class="w-full h-full object-cover rounded-lg">
                        @else
                            <div class="bg-gray-200 rounded-lg"></div>
                        @endif

                        {{-- Gambar 4 (Slot Tengah Bawah) --}}
                        @if(isset($gridImages[3]))
                            <img src="{{ Storage::url($gridImages[3]->path) }}" alt="Grid Image 4"
                                class="w-full h-full object-cover rounded-lg">
                        @else
                            <div class="bg-gray-200 rounded-lg"></div>
                        @endif

                        {{-- Gambar 5 (Slot Kanan Bawah) --}}
                        @if(isset($gridImages[4]))
                            <img src="{{ Storage::url($gridImages[4]->path) }}" alt="Grid Image 5"
                                class="w-full h-full object-cover rounded-lg">
                        @else
                            <div class="bg-gray-200 rounded-lg"></div>
                        @endif

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
                                                                        }"
                    class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 relative">

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
                            {{-- Gambar Grid Jurusan Dinamis --}}
                            <div class="flex flex-col space-y-6">
                                {{-- Gambar 1 --}}
                                @if (isset($majorGridImages[0]) && $majorGridImages[0]->path)
                                    <img src="{{ asset('storage/' . $majorGridImages[0]->path) }}"
                                        alt="{{ $majorGridImages[0]->description ?? 'Gambar Grid Jurusan 1' }}"
                                        class="h-48 w-full rounded-xl object-cover">
                                @else
                                    {{-- Fallback jika gambar tidak ada --}}
                                    <div class="bg-gray-700 h-48 w-full rounded-xl flex items-center justify-center">
                                        <i class="fas fa-image text-4xl text-gray-500"></i>
                                    </div>
                                @endif

                                {{-- Gambar 2 --}}
                                @if (isset($majorGridImages[1]) && $majorGridImages[1]->path)
                                    <img src="{{ asset('storage/' . $majorGridImages[1]->path) }}"
                                        alt="{{ $majorGridImages[1]->description ?? 'Gambar Grid Jurusan 2' }}"
                                        class="h-48 w-full rounded-xl object-cover">
                                @else
                                    {{-- Fallback jika gambar tidak ada --}}
                                    <div class="bg-gray-700 h-48 w-full rounded-xl flex items-center justify-center">
                                        <i class="fas fa-image text-4xl text-gray-500"></i>
                                    </div>
                                @endif
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

                            {{-- Loop dinamis untuk Kartu Jurusan dari database --}}
                            @foreach ($majors as $major)
                                <div class="flex-shrink-0 w-80 snap-start flex flex-col slider-item">

                                    {{-- Menampilkan Gambar Jurusan dengan fallback --}}
                                    @if ($major->image)
                                        <img src="{{ asset('storage/' . $major->image) }}" alt="Gambar Jurusan {{ $major->name }}"
                                            class="h-48 w-full rounded-lg object-cover mb-4">
                                    @else
                                        {{-- Placeholder jika tidak ada gambar --}}
                                        <div
                                            class="h-48 w-full rounded-lg object-cover mb-4 bg-gray-700 flex items-center justify-center">
                                            <i class="fas fa-image text-4xl text-gray-500"></i>
                                        </div>
                                    @endif

                                    {{-- Menggunakan properti objek, bukan array --}}
                                    <h3 class="text-xl font-bold text-white">{{ $major->name }}</h3>
                                    <p class="text-sm text-gray-400 mt-2 flex-grow">{{ $major->description }}</p>

                                    <a href="{{ route('public.majors.show', $major) }}"
                                        class="inline-flex items-center group mt-4">
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
                                <a href="{{ route('public.news.show', $newsItem->id) }}" class="block">

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
                        <a href="{{ route('public.news.index') }}"
                            class="inline-block bg-white border border-gray-200 rounded-xl px-6 py-4 text-sm font-semibold shadow-sm hover:shadow-lg hover:border-gray-300 transition-all duration-300">
                            <span class="text-gray-600">Mau Baca Lebih Banyak?</span>
                            <span class="ml-1 font-bold" style="color: {{ $amaliahGreen }};">Ayo Kesini</span>
                            <i class="fas fa-chevron-right ml-2 text-xs" style="color: {{ $amaliahGreen }};"></i>
                        </a>
                    </div>
                </div>
            </section>

            <section class="py-16 sm:py-24" style="background-color: {{ $amaliahDark }};">
                {{-- Container Utama --}}
                <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 relative">

                    {{-- Dekorasi Titik --}}
                    <div class="absolute top-8 left-8 md:left-12 flex items-center space-x-2">
                        <div class="w-3 h-3 bg-gray-600 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-600 rounded-full"></div>
                        <div class="w-3 h-3 bg-white rounded-full"></div>
                    </div>

                    {{-- Header Section --}}
                    <div class="text-center">
                        <h2 class="text-3xl md:text-4xl font-bold text-white">Fasilitas</h2>
                        <p class="mt-2 text-gray-400">Stay in the know with insights from industry experts.</p>
                        <div class="w-24 h-px bg-gray-600 mx-auto mt-4"></div>
                    </div>

                    {{-- Galeri Gambar Mozaik Dinamis --}}
                    <div class="mt-12 w-full h-[30rem] md:h-[32rem] grid grid-cols-2 md:grid-cols-4 grid-rows-2 gap-4">

                        {{-- Gambar 1 (Tinggi di Kiri) --}}
                        <div class="col-span-1 row-span-2 rounded-xl overflow-hidden">
                            @if (isset($facilities[0]) && $facilities[0]->image)
                                <img src="{{ asset('storage/' . $facilities[0]->image) }}" alt="{{ $facilities[0]->name }}"
                                    class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                            @else
                                {{-- Placeholder jika gambar tidak ada --}}
                                <div class="w-full h-full bg-black"></div>
                            @endif
                        </div>

                        {{-- Gambar 2 (Tengah Atas) --}}
                        <div class="col-span-1 row-span-1 rounded-xl overflow-hidden">
                            @if (isset($facilities[1]) && $facilities[1]->image)
                                <img src="{{ asset('storage/' . $facilities[1]->image) }}" alt="{{ $facilities[1]->name }}"
                                    class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                            @else
                                <div class="w-full h-full bg-black"></div>
                            @endif
                        </div>

                        {{-- Gambar 3 (Kanan Atas) --}}
                        <div class="col-span-1 md:col-span-2 row-span-1 rounded-xl overflow-hidden">
                            @if (isset($facilities[2]) && $facilities[2]->image)
                                <img src="{{ asset('storage/' . $facilities[2]->image) }}" alt="{{ $facilities[2]->name }}"
                                    class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                            @else
                                <div class="w-full h-full bg-black"></div>
                            @endif
                        </div>

                        {{-- Gambar 4 (Tengah Bawah) --}}
                        <div class="col-span-1 row-span-1 rounded-xl overflow-hidden">
                            @if (isset($facilities[3]) && $facilities[3]->image)
                                <img src="{{ asset('storage/' . $facilities[3]->image) }}" alt="{{ $facilities[3]->name }}"
                                    class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                            @else
                                <div class="w-full h-full bg-black"></div>
                            @endif
                        </div>

                        {{-- Gambar 5 (Kanan Bawah) --}}
                        <div class="col-span-1 md:col-span-2 row-span-1 rounded-xl overflow-hidden">
                            @if (isset($facilities[4]) && $facilities[4]->image)
                                <img src="{{ asset('storage/' . $facilities[4]->image) }}" alt="{{ $facilities[4]->name }}"
                                    class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                            @else
                                <div class="w-full h-full bg-black"></div>
                            @endif
                        </div>
                    </div>

                    {{-- Tombol Selengkapnya --}}
                    <div class="text-right mt-6">
                        <a href="#" class="inline-flex items-center group">
                            <span class="text-sm font-semibold text-white mr-3">Selengkapnya</span>
                            <div class="bg-gray-200 rounded-full p-2 group-hover:bg-gray-300 transition-colors">
                                <i class="fas fa-arrow-right text-gray-800 text-sm"></i>
                            </div>
                        </a>
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

            <section class="bg-gray-50 py-16 sm:py-24">
                <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">

                    {{-- Header Section --}}
                    <div class="text-center">
                        {{-- ... Kode header tetap sama ... --}}
                        <h2 class="text-3xl md:text-4xl font-bold" style="color: {{ $amaliahDark }};">Testimoni</h2>
                        <div class="flex items-center justify-center gap-x-2 mx-auto mt-4">
                            <div class="w-20 h-1.5 rounded-full" style="background-color: {{ $amaliahGreen }};"></div>
                            <div class="w-4 h-1.5 rounded-full" style="background-color: {{ $amaliahGreen }};"></div>
                            <div class="w-4 h-1.5 rounded-full" style="background-color: {{ $amaliahGreen }};"></div>
                        </div>
                    </div>

                    {{-- Slider Testimoni (Alpine.js + Tailwind CSS) --}}
                    <div x-data="{
                                                                                                                                                                        slider: null,
                                                                                                                                                                        init() {
                                                                                                                                                                            this.slider = this.$refs.sliderContainer;
                                                                                                                                                                        },
                                                                                                                                                                        scroll(direction) {
                                                                                                                                                                            // Geser sejauh 80% dari lebar area yang terlihat
                                                                                                                                                                            let scrollAmount = this.slider.offsetWidth * 0.8;
                                                                                                                                                                            this.slider.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
                                                                                                                                                                        }
                                                                                                                                                                    }"
                        class="mt-12 relative">
                        {{-- Tombol Panah Kiri --}}
                        <button @click="scroll(-1)"
                            class="absolute top-1/2 -left-2 md:-left-8 -translate-y-1/2 w-12 h-12 rounded-full shadow-lg flex items-center justify-center z-10 hover:bg-opacity-80 transition"
                            style="background-color: {{ $amaliahDark }};">
                            <i class="fas fa-chevron-left text-white"></i>
                        </button>
                        {{-- Container yang bisa di-scroll --}}
                        <div x-ref="sliderContainer"
                            class="flex space-x-8 overflow-x-auto snap-x snap-mandatory scroll-smooth scrollbar-hide py-4">

                            @forelse ($testimonials as $testimonial)
                                {{-- Setiap Kartu Testimoni --}}
                                <div class="flex-shrink-0 w-full sm:w-[48%] snap-start">
                                    <div
                                        class="bg-white border border-gray-200 rounded-2xl p-8 flex flex-col sm:flex-row items-center gap-8 h-full">
                                        {{-- Kolom Teks --}}
                                        <div class="flex-1 text-center sm:text-left">
                                            <p class="text-gray-700 leading-relaxed">"{{ $testimonial->description }}"</p>
                                            <p class="mt-4 text-gray-800 font-semibold italic">-{{ $testimonial->name }}</p>
                                            <div class="mt-6 flex flex-col sm:flex-row justify-between items-center text-sm">
                                                <span
                                                    class="text-gray-400">{{ $testimonial->created_at->format('Y-m-d') }}</span>
                                                <span class="font-semibold mt-2 sm:mt-0" style="color: {{ $amaliahGreen }};">
                                                    Alumni Jurusan {{ $testimonial->major->name ?? 'N/A' }}
                                                    {{ $testimonial->alumni_year }}
                                                </span>
                                            </div>
                                        </div>
                                        {{-- Kolom Gambar --}}
                                        <div class="flex-shrink-0 order-first sm:order-last">
                                            <img src="{{ asset('storage/' . $testimonial->photo) }}"
                                                alt="Foto {{ $testimonial->name }}"
                                                class="w-32 h-32 rounded-full object-cover shadow-md">
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="w-full text-center py-12">
                                    <p class="text-gray-500">Belum ada testimoni untuk ditampilkan.</p>
                                </div>
                            @endforelse
                        </div>

                        {{-- Tombol Panah Kanan --}}
                        <button @click="scroll(1)"
                            class="absolute top-1/2 -right-2 md:-right-8 -translate-y-1/2 w-12 h-12 rounded-full shadow-lg flex items-center justify-center z-10 hover:bg-opacity-80 transition"
                            style="background-color: {{ $amaliahDark }};">
                            <i class="fas fa-chevron-right text-white"></i>
                        </button>
                    </div>

                    {{-- Tombol "Baca Semua" --}}
                    <div class="text-center mt-12">
                        <a href="#"
                            class="inline-block bg-white border border-gray-300 rounded-xl px-6 py-3 text-sm font-semibold text-gray-800 shadow-sm hover:shadow-lg hover:border-gray-400 transition-all duration-300">
                            Baca Testimoni Alumni SMK Amaliah
                        </a>
                    </div>

                </div>
            </section>

            @php
                // Definisikan warna utama
                $amaliahGreen = '#63cd00';
                $amaliahDark = '#282829';
            @endphp

            <section class="bg-white py-16 sm:py-24">
                <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">

                    {{-- Header Section --}}
                    <div class="text-center">
                        <h2 class="text-3xl md:text-4xl font-bold" style="color: {{ $amaliahDark }};">
                            Our Latest Instagram Post
                        </h2>
                        <div class="flex items-center justify-center gap-x-2 mx-auto mt-4">
                            <div class="w-20 h-1 rounded-full" style="background-color: {{ $amaliahDark }};"></div>
                            <div class="w-8 h-1 rounded-full" style="background-color: {{ $amaliahDark }};"></div>
                            <div class="w-4 h-1 rounded-full" style="background-color: {{ $amaliahDark }};"></div>
                        </div>
                    </div>

                    {{-- Konten Utama (Layout Dua Kolom) --}}
                    <div class="mt-12 grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">

                        {{-- Kolom Kiri: Statis --}}
                        <div class="lg:col-span-1">
                            {{-- Placeholder untuk Post Utama --}}
                            <div class="bg-gray-200 aspect-square w-full rounded-2xl flex items-center justify-center">
                                <i class="fas fa-image text-5xl text-gray-400"></i>
                            </div>
                            <div class="mt-6 flex items-start gap-4">
                                <i class="fab fa-instagram text-4xl" style="color: {{ $amaliahDark }};"></i>
                                <div>
                                    <p class="text-gray-600 leading-relaxed">
                                        Read our latest news, and know about smk amaliah. Read our latest news, and know
                                        about smk amaliah.
                                    </p>
                                    <a href="#"
                                        class="inline-flex items-center mt-4 text-blue-600 font-semibold hover:underline">
                                        <span>Buka Instagram</span>
                                        <i class="fas fa-external-link-alt ml-2 text-xs"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Kolom Kanan: Untuk Widget Curator.io --}}
                        <div class="lg:col-span-2">
                            {{--
                            KOTAK UNTUK WIDGET CURATOR.IO ANDA
                            - Ganti div ini dengan kode embed dari Curator.io.
                            - Jika kode gagal dimuat, div ini akan tampil sebagai kotak hitam sesuai permintaan.
                            --}}
                            <div id="curator-feed-default-layout"
                                class="bg-black w-full min-h-[600px] rounded-2xl flex items-center justify-center">
                                <p class="text-gray-500 text-center">Menunggu koneksi dari Curator.io...</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            @php
                // Definisikan warna utama
                $amaliahGreen = '#63cd00';
                $amaliahDark = '#282829';

                // Definisikan informasi kontak
                $alamat = 'Jl. Raya Jl. Tol Jagorawi No.1, Ciawi, Kec. Ciawi, Kabupaten Bogor, Jawa Barat 16720';
                $email = 'example@email.com';
                $phone = '123-456-7890';
            @endphp

            <section class="bg-gray-50 py-16 sm:py-24">
                <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">

                    {{-- Tombol Virtual Tour di Atas --}}
                    <div class="text-center mb-10">
                        <a href="#"
                            class="inline-flex items-center bg-white border border-gray-300 rounded-full px-8 py-4 text-base font-semibold shadow-md hover:shadow-lg hover:border-gray-400 transition-all duration-300 group">
                            <span class="text-gray-800">Mau Lihat SMK Amaliah?</span>
                            <span class="ml-2 font-bold" style="color: {{ $amaliahGreen }};">Masuk Ke Virtual Tour!</span>
                            <div
                                class="ml-4 bg-white rounded-full p-2 flex items-center justify-center border border-gray-300 group-hover:border-gray-400 transition-all">
                                <i class="fas fa-chevron-right text-sm" style="color: {{ $amaliahGreen }};"></i>
                            </div>
                        </a>
                    </div>

                    {{-- Container Utama untuk Peta dan Info --}}
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">

                        {{-- KODE IFRAME GOOGLE MAPS --}}
                        {{-- Pastikan Anda mengganti src="..." dengan kode embed Anda --}}
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.945187355167!2d106.8462900750414!3d-6.653716393341009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8eec16c788f%3A0x4680dbde73e8b763!2sSMK%20Amaliah%201%20dan%202%20Ciawi!5e0!3m2!1sid!2sid!4v1759652507072!5m2!1sid!2sid"
                            width="1280" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        {{-- KARTU INFORMASI DI ATAS PETA --}}
                        <div class="absolute bottom-10 left-10 right-10 bg-white rounded-2xl shadow-xl p-8">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                {{-- Alamat --}}
                                <div>
                                    <h4 class="text-sm font-bold text-gray-400 tracking-wider uppercase">Alamat</h4>
                                    <p class="mt-2 text-gray-800 leading-relaxed">{{ $alamat }}</p>
                                </div>
                                {{-- Email & Phone --}}
                                <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-8">
                                    <div>
                                        <h4 class="text-sm font-bold text-gray-400 tracking-wider uppercase">Email</h4>
                                        <a href="mailto:{{ $email }}"
                                            class="mt-2 text-gray-800 hover:text-green-600 transition-colors">{{ $email }}</a>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-bold text-gray-400 tracking-wider uppercase">Phone</h4>
                                        <a href="tel:{{ $phone }}"
                                            class="mt-2 text-gray-800 hover:text-green-600 transition-colors">{{ $phone }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>



            <footer style="background-color: {{ $amaliahDark }};">
                <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

                    {{-- Konten Utama Footer (Multi-kolom) --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

                        {{-- Kolom 1: Logo, Deskripsi, dan Sosial Media --}}
                        <div class="space-y-6">
                            {{-- 1. Struktur Branding yang lebih rapi --}}
                            <a href="/" class="flex items-center gap-3">
                                <img src="{{ asset('assets/logo/amaliah_white.png') }}" alt="Logo SMK Amaliah" class="h-10">
                                <div>
                                    <span class="text-white font-semibold text-lg leading-tight">SMK Amaliah 1 & 2</span>
                                    <span class="block text-gray-400 text-xs">Ciawi - Bogor</span>
                                </div>
                            </a>

                            <p class="text-gray-400 text-sm leading-relaxed">
                                Berkomitmen untuk mencetak lulusan yang kompeten, berakhlak mulia, dan siap bersaing di
                                dunia industri global.
                            </p>

                            {{-- 2. Ikon Sosial Media dengan efek hover modern --}}
                            <div class="flex items-center space-x-3">
                                <a href="#" target="_blank"
                                    class="group w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center transition-all duration-300 hover:bg-white">
                                    <i
                                        class="fab fa-youtube text-gray-400 text-xl group-hover:text-red-600 transition-colors"></i>
                                </a>
                                <a href="#" target="_blank"
                                    class="group w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center transition-all duration-300 hover:bg-white">
                                    <i
                                        class="fab fa-instagram text-gray-400 text-xl group-hover:text-pink-600 transition-colors"></i>
                                </a>
                                <a href="#" target="_blank"
                                    class="group w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center transition-all duration-300 hover:bg-white">
                                    <i
                                        class="fab fa-facebook-f text-gray-400 text-xl group-hover:text-blue-600 transition-colors"></i>
                                </a>
                                <a href="#" target="_blank"
                                    class="group w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center transition-all duration-300 hover:bg-white">
                                    <i
                                        class="fab fa-tiktok text-gray-400 text-xl group-hover:text-black transition-colors"></i>
                                </a>
                            </div>
                        </div>

                        {{-- Kolom 2: Link Navigasi Cepat --}}
                        <div>
                            <h4 class="font-semibold text-white tracking-wider uppercase">Jelajahi</h4>
                            <ul class="mt-4 space-y-3 text-sm">
                                {{-- 3. Efek hover yang lebih interaktif --}}
                                <li><a href="#"
                                        class="text-gray-400 hover:text-white hover:translate-x-1 block transition-all duration-300">Beranda</a>
                                </li>
                                <li><a href="#"
                                        class="text-gray-400 hover:text-white hover:translate-x-1 block transition-all duration-300">Tentang
                                        Kami</a></li>
                                <li><a href="#"
                                        class="text-gray-400 hover:text-white hover:translate-x-1 block transition-all duration-300">Berita</a>
                                </li>
                                <li><a href="#"
                                        class="text-gray-400 hover:text-white hover:translate-x-1 block transition-all duration-300">Jurusan</a>
                                </li>
                            </ul>
                        </div>

                        {{-- Kolom 3: Link Informasi --}}
                        <div>
                            <h4 class="font-semibold text-white tracking-wider uppercase">Informasi</h4>
                            <ul class="mt-4 space-y-3 text-sm">
                                <li><a href="#"
                                        class="text-gray-400 hover:text-white hover:translate-x-1 block transition-all duration-300">Info
                                        PPDB</a></li>
                                <li><a href="#"
                                        class="text-gray-400 hover:text-white hover:translate-x-1 block transition-all duration-300">Fasilitas</a>
                                </li>
                                <li><a href="#"
                                        class="text-gray-400 hover:text-white hover:translate-x-1 block transition-all duration-300">Virtual
                                        Tour</a></li>
                                <li><a href="#"
                                        class="text-gray-400 hover:text-white hover:translate-x-1 block transition-all duration-300">Kontak</a>
                                </li>
                            </ul>
                        </div>

                        {{-- Kolom 4: Informasi Kontak --}}
                        <div>
                            <h4 class="font-semibold text-white tracking-wider uppercase">Hubungi Kami</h4>
                            <div class="mt-4 flex flex-col gap-4 text-sm">
                                <div class="flex items-start gap-3 text-gray-400">
                                    <i class="fas fa-map-marker-alt w-4 h-4 mt-1 flex-shrink-0"></i>
                                    <span>{{ $alamat ?? 'Jl. Raya Veteran III, Banjarwaru, Ciawi, Kab. Bogor, Jawa Barat 16720' }}</span>
                                </div>
                                <div class="flex items-start gap-3 text-gray-400">
                                    <i class="fas fa-envelope w-4 h-4 mt-1 flex-shrink-0"></i>
                                    <a href="mailto:{{ $email ?? 'info@smkamaliah.sch.id' }}"
                                        class="hover:text-white transition">{{ $email ?? 'info@smkamaliah.sch.id' }}</a>
                                </div>
                                <div class="flex items-start gap-3 text-gray-400">
                                    <i class="fas fa-phone-alt w-4 h-4 mt-1 flex-shrink-0"></i>
                                    <a href="tel:{{ $phone ?? '+622518241416' }}"
                                        class="hover:text-white transition">{{ $phone ?? '(0251) 8241416' }}</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Bagian Copyright di Bawah --}}
                {{-- 4. Pemisah visual dan struktur copyright yang lebih profesional --}}
                <div class="border-t border-gray-800">
                    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                        <div class="flex flex-col sm:flex-row justify-between items-center text-center sm:text-left gap-4">
                            <p class="text-sm text-gray-500">
                                &copy; {{ date('Y') }} Tim IT SMK Amaliah. All Rights Reserved.
                            </p>
                            <div class="flex space-x-6 text-sm text-gray-500">
                                <a href="#" class="hover:text-white transition">Kebijakan Privasi</a>
                                <a href="#" class="hover:text-white transition">Syarat & Ketentuan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </main>
    </body>

    </html>
@endsection