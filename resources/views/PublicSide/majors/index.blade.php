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
            // Definisikan variabel untuk kemudahan kustomisasi
            $amaliahGreen = '#63cd00';
            $amaliahDark = '#282829';

            // Data untuk Visi, Misi, Motto
            $vision = [
                [
                    'icon' => 'fa-bullseye', // Ikon untuk Motto
                    'title' => 'Motto',
                    'text' => 'Menjadi sekolah menengah kejuruan berkualitas yang menyatu dalam tauhid',
                ],
                [
                    'icon' => 'fa-eye', // Ikon untuk Visi
                    'title' => 'Visi',
                    'text' => 'Menjadi sekolah menengah kejuruan berkualitas yang menyatu dalam tauhid',
                ],
                [
                    'icon' => 'fa-tasks', // Ikon untuk Misi
                    'title' => 'Misi',
                    'text' => 'Menjadi sekolah menengah kejuruan berkualitas yang menyatu dalam tauhid',
                ],
            ];
        @endphp

        <section class="py-12 bg-gray-50">
            <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">

                {{-- BAGIAN 1: HERO IMAGE --}}
                <div class="relative h-[600px] rounded-2xl overflow-hidden shadow-2xl flex items-center p-4 sm:p-8">

                    {{-- Latar Belakang: SLIDER GAMBAR DINAMIS --}}
                    <div class="absolute inset-0 z-0">
                        @if($hasImages && $majorsImages->count() > 0)
                            <div x-data="{ activeSlide: 1, totalSlides: {{ $majorsImages->count() }} }"
                                x-init="setInterval(() => { activeSlide = activeSlide === totalSlides ? 1 : activeSlide + 1 }, 5000)">
                                @foreach($majorsImages as $image)
                                    <div x-show="activeSlide === {{ $loop->iteration }}"
                                        x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0"
                                        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-1000"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="absolute inset-0">
                                        <img src="{{ asset('storage/' . $image->path) }}"
                                            alt="{{ $image->description ?? $image->filename }}" class="w-full h-full object-cover">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="w-full h-full bg-black flex items-center justify-center">
                                <p class="text-gray-600">Gambar 'MajorsImage' tidak ditemukan</p>
                            </div>
                        @endif
                    </div>


                    {{-- KONTEN CARD PPDB (SUDAH DIPERBAIKI) --}}
                    <div class="relative z-20 rounded-2xl shadow-xl max-w-lg w-full p-8 md:p-10"
                        style="background-color: {{ $amaliahDark }};">
                        <h1 class="text-3xl md:text-4xl font-bold text-white leading-tight">
                            PPDB 2025-2026<br>
                            <span class="text-2xl md:text-3xl">SMK Amaliah 1&2</span>
                        </h1>
                        <p class="mt-4 text-gray-300">
                            Ayo Daftarkan Dirimu Ke SMK Amaliah 1&2 Ciawi Dengan cara klik PENDAFTARAN PPDB Dibawah ini!
                        </p>
                        <a href="#"
                            class="mt-8 inline-flex items-center text-white px-6 py-3 rounded-lg font-semibold transition-transform hover:scale-105 shadow-lg w-fit"
                            style="background-color: {{ $amaliahGreen }};">
                            <span>Pendaftaran PPDB</span>
                            <div class="ml-4 bg-white/20 rounded-full p-2 flex items-center justify-center">
                                <i class="fas fa-arrow-right text-base text-white"></i>
                            </div>
                        </a>
                    </div>

                </div>
                {{-- BAGIAN 2: CARD MOTTO, VISI, MISI --}}
                <div class="relative z-20 -mt-16 max-w-5xl mx-auto">
                    <div class="bg-[#282829] rounded-2xl shadow-xl p-8">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-white">
                            @foreach ($vision as $item)
                                <div>
                                    <div class="flex items-center gap-3 mb-2">
                                        <i class="fas {{ $item['icon'] }} text-xl" style="color: {{ $amaliahGreen }};"></i>
                                        <h3 class="text-lg font-semibold">{{ $item['title'] }}</h3>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-300">{{ $item['text'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <section class="bg-white py-16 sm:py-24">
            <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">

                {{-- Header Section --}}
                <div class="text-center">
                    <h2 class="text-3xl md:text-4xl font-bold" style="color: {{ $amaliahDark }};">
                        Jurusan
                    </h2>
                    <div class="flex items-center justify-center gap-x-2 mx-auto mt-4">
                        <div class="w-20 h-1 rounded-full" style="background-color: {{ $amaliahGreen }};"></div>
                        <div class="w-8 h-1 rounded-full" style="background-color: {{ $amaliahGreen }};"></div>
                        <div class="w-4 h-1 rounded-full" style="background-color: {{ $amaliahGreen }};"></div>
                    </div>

                    {{-- Bar Logo Jurusan --}}
                    <div class="mt-12 flex flex-wrap justify-center items-center gap-x-10 sm:gap-x-12 gap-y-6">
                        <img src="{{ asset('assets/logo/Logo_Jurusan/pplg.png') }}" alt="Logo PPLG"
                            class="h-12 lg:h-14 object-contain transition-transform duration-300 hover:scale-110">
                        <img src="{{ asset('assets/logo/Logo_Jurusan/tjkt.png') }}" alt="Logo TJKT"
                            class="h-12 lg:h-14 object-contain transition-transform duration-300 hover:scale-110">
                        <img src="{{ asset('assets/logo/Logo_Jurusan/animasi.png') }}" alt="Logo Animasi"
                            class="h-12 lg:h-14 object-contain transition-transform duration-300 hover:scale-110">
                        <img src="{{ asset('assets/logo/Logo_Jurusan/dkv.png') }}" alt="Logo DKV"
                            class="h-12 lg:h-14 object-contain transition-transform duration-300 hover:scale-110">
                        <img src="{{ asset('assets/logo/Logo_Jurusan/mp.png') }}" alt="Logo MP"
                            class="h-12 lg:h-14 object-contain transition-transform duration-300 hover:scale-110">
                        <img src="{{ asset('assets/logo/Logo_Jurusan/ak.png') }}" alt="Logo AK"
                            class="h-12 lg:h-14 object-contain transition-transform duration-300 hover:scale-110">
                        <img src="{{ asset('assets/logo/Logo_Jurusan/lps.png') }}" alt="Logo LPS"
                            class="h-12 lg:h-14 object-contain transition-transform duration-300 hover:scale-110">
                        {{-- Anda bisa menambahkan logo lainnya di sini --}}
                    </div>
                </div>

                {{-- Grid Kartu Jurusan --}}
                <div class="mt-16 grid grid-cols-1 md:grid-cols-2 gap-8">
                    @forelse ($majors as $major)
                        {{-- Ganti kode di dalam @forelse dengan ini --}}

                        <div
                            class="bg-white rounded-2xl shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group overflow-hidden flex flex-col">

                            {{-- BAGIAN GAMBAR UTAMA (LINK SUDAH DIPERBAIKI) --}}
                            <a href="{{ route('public.majors.show', $major) }}" class="block h-56">
                                <img src="{{ asset('storage/' . $major->image) }}" alt="Gambar {{ $major->name }}"
                                    class="w-full h-full object-cover">
                            </a>

                            {{-- KONTEN TEKS KARTU --}}
                            <div class="p-6 relative flex flex-col flex-grow">

                                {{-- LOGO JURUSAN --}}
                                <div class="absolute -top-12 left-6 bg-white p-3 rounded-2xl shadow-lg">
                                    <img src="{{ asset('storage/' . $major->logo) }}"
                                        alt="Logo {{ $major->abbreviation ?? $major->name }}" class="h-16 w-16 object-contain">
                                </div>

                                {{-- Header Teks --}}
                                <div class="pt-8">
                                    <h3 class="text-2xl font-bold" style="color: {{ $amaliahDark }};">
                                        {{ $major->abbreviation ?? $major->name }}
                                    </h3>
                                    <p class="text-sm text-gray-500 -mt-1">{{ $major->name }}</p>
                                </div>

                                {{-- Body Kartu (Keunggulan) --}}
                                <div class="mt-4 flex-grow">
                                    <h4 class="font-semibold text-gray-700">Keunggulan</h4>
                                    <p class="mt-2 text-sm text-gray-600 leading-relaxed line-clamp-3">
                                        {{ $major->advantages ?? 'Desktop Programming, Web Programming, Mobile Programming, Bussiness Analyst, Database Administration.' }}
                                    </p>
                                </div>

                                {{-- Footer Kartu (Tombol) --}}
                                <div class="mt-6 flex items-center gap-4">
                                    {{-- TOMBOL SELENGKAPNYA (LINK SUDAH DIPERBAIKI) --}}
                                    <a href="{{ route('public.majors.show', $major) }}"
                                        class="inline-flex items-center text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition-opacity hover:opacity-80"
                                        style="background-color: {{ $amaliahDark }};">
                                        <span>Selengkapnya</span>
                                        <div class="ml-2 bg-white rounded-full p-1 flex items-center justify-center">
                                            <i class="fas fa-arrow-right text-xs" style="color: {{ $amaliahDark }};"></i>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="inline-flex items-center text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition-opacity hover:opacity-80"
                                        style="background-color: {{ $amaliahDark }};">
                                        <span>Laboratorium</span>
                                        <div class="ml-2 bg-white rounded-full p-1 flex items-center justify-center">
                                            <i class="fas fa-arrow-right text-xs" style="color: {{ $amaliahDark }};"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="md:col-span-2 text-center py-12">
                            <p class="text-gray-500">Belum ada jurusan yang ditambahkan.</p>
                        </div>
                    @endforelse
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
                                <i class="fab fa-tiktok text-gray-400 text-xl group-hover:text-black transition-colors"></i>
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



    </body>

    </html>
@endsection