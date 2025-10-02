<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>@yield('title', 'SMK Amaliah')</title>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font Awesome (Versi 6.7.2) --}}
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css" />

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Times+New+Roman&display=swap"
        rel="stylesheet" />

    <style>
        /* Poppins default */
        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
        }

        /* Times New Roman untuk teks khusus */
        .font-times {
            font-family: 'Times New Roman', serif;
        }

        /* Nav Link Umum */
        .nav-link {
            @apply relative text-white px-4 py-7 transition-colors duration-300 flex items-center;
        }

        /* Garis bawah animasi */
        .nav-link::after {
            content: '';
            @apply absolute left-0 bottom-0 w-0 h-[3px] bg-white transition-all duration-300 ease-in-out;
        }

        .nav-link:hover {
            color: #59E300;
        }

        .nav-link:hover::after {
            @apply w-full;
            background-color: #59E300;
        }

        /* Active */
        .nav-active {
            @apply text-white font-semibold;
        }

        .nav-active::after {
            @apply w-full bg-white;
        }

        /* Dropdown */
        .dropdown-item {
            @apply transition-colors duration-200;
        }

        .dropdown-item:hover {
            color: #59E300;
        }

        /* Animasi dropdown */
        .dropdown-content {
            opacity: 0;
            transform: translateY(-10px);
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out, visibility 0.3s;
        }

        .group:hover .dropdown-content {
            opacity: 1;
            transform: translateY(0);
            visibility: visible;
        }
    </style>
</head>

<body class="bg-gray-50">

    {{-- NAVBAR --}}
    <header class="sticky top-0 z-50 shadow items-center">
        {{-- TOP BAR --}}
        <div class="bg-white border-b border-gray-200">
            <div class="max-w-8xl mx-auto flex items-center px-4 py-2 ml-10">

                {{-- 1. Logo & Nama (KIRI) --}}
                <div class="flex items-center    space-x-5 mr-8">
                    <div
                        class="h-12 w-12  flex items-center justify-center font-bold text-sm text-gray-700 rounded-full">
                        <img src="{{ asset('assets/logo/amaliah.png') }}" alt="">
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-900 font-times"><b><i>SMK <span class="text-bold">AMALIAH 1&2 </span>CIAWI</i></b></span>
                        <span class="text-sm font-times text-gray-600"><i>Tauhid Is Our Fundament</i></span>
                    </div>
                </div>

                {{-- 2. Search (Desktop) - Mengikuti Logo di KIRI --}}
                <div class="hidden md:flex flex-none justify-start ml-7">
                    <div class="relative w-full max-w-sm">
                        <input type="text" placeholder="Find About SMK AMALIAH"
                            class="w-full rounded-full border border-gray-300 pl-10 pr-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#6EE700] bg-gray-100">
                        <i
                            class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-500"></i>
                    </div>
                </div>

                {{-- 3. Right Links (Desktop - Didorong ke KANAN menggunakan ml-auto) --}}
                {{-- Perubahan utama: space-x-12 untuk jarak yang lebih besar antar tautan --}}
                <div class="hidden md:flex items-center text-sm ml-16">

                    {{-- Tautan Cepat: Meningkatkan jarak antar tautan menjadi space-x-12 --}}
                    <div class="flex items-center space-x-20">
                        <a href="#"
                            class="text-gray-700 hover:text-[#63cd00] transition-colors duration-300 border-b-2 border-transparent hover:border-[#63cd00] py-2">Info
                            PPDB</a>
                        <a href="#" class="text-gray-700 hover:text-[#6EE700] transition-colors duration-300">Info
                            BKK</a>
                        <a href="#"
                            class="text-gray-700 hover:text-[#6EE700] transition-colors duration-300">E-Learning</a>
                        <a href="#" class="text-gray-700 hover:text-[#6EE700] transition-colors duration-300">Teaching
                            Factory</a>
                    </div>

                    {{-- Tombol Contact Us: Tetap di ujung kanan --}}
                    <a href="#"
                        class="bg-[#63cd00] text-white px-4 py-2 rounded-lg font-semibold hover:bg-[#59E300] transition-colors duration-300 ml-20">
                        Contact Us
                    </a>
                </div>

                {{-- Mobile BTN --}}
                <div class="md:hidden ml-auto">
                    <button id="mobile-menu-button" class="text-2xl text-gray-700 p-2">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>



        {{-- MAIN NAV (GREEN) --}}
        <nav class="bg-[#63cd00] hidden md:block text-white">
            <div class="max-w-7xl mx-auto flex items-center justify-center space-x-20 px-4 h-10">
                <a href="/" class="nav-link {{ Request::is('/') ? 'nav-active' : '' }} hover:text-gray-200">Home</a>

                {{-- Dropdown Discover Amaliah --}}
                <div class="relative group">
                    <button class="nav-link hover:text-gray-200">
                        Discover Amaliah <i class="fa-solid fa-chevron-down ml-1 text-xs"></i>
                    </button>
                    <div class="absolute dropdown-content bg-white shadow-lg mt-0 rounded-md py-1 w-48 z-10">
                        <a href="#" class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100">Sejarah</a>
                        <a href="#" class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100">Visi Misi</a>
                    </div>
                </div>

                {{-- Dropdown Major Competency --}}
                <div class="relative group">
                    <button class="nav-link hover:text-gray-200">
                        Major Competency <i class="fa-solid fa-chevron-down ml-1 text-xs"></i>
                    </button>
                    <div class="absolute dropdown-content bg-white shadow-lg mt-0 rounded-md py-1 w-48 z-10">
                        <a href="#" class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100">SMK Amaliah 1</a>
                        <a href="#" class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100">SMK Amaliah 2</a>
                    </div>
                </div>

                {{-- Dropdown Education Preview --}}
                <div class="relative group">
                    <button class="nav-link hover:text-gray-200">
                        Education Preview <i class="fa-solid fa-chevron-down ml-1 text-xs"></i>
                    </button>
                    <div class="absolute dropdown-content bg-white shadow-lg mt-0 rounded-md py-1 w-48 z-10">
                        <a href="#" class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100">Gallery</a>
                        <a href="#" class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100">Prestasi</a>
                    </div>
                </div>

                {{-- Dropdown Facilitation --}}
                <div class="relative group">
                    <button class="nav-link hover:text-gray-200">
                        Facilitation <i class="fa-solid fa-chevron-down ml-1 text-xs"></i>
                    </button>
                    <div class="absolute dropdown-content bg-white shadow-lg mt-0 rounded-md py-1 w-48 z-10">
                        <a href="#" class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100">Lab
                            Komputer</a>
                        <a href="#"
                            class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100">Perpustakaan</a>
                    </div>
                </div>

                <a href="#" class="nav-link hover:text-gray-200">Bursa Kerja Khusus</a>
            </div>
        </nav>



        {{-- MOBILE MENU --}}
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md">
            <a href="/"
                class="block px-4 py-3 text-gray-700 hover:bg-gray-100 hover:text-[#59E300] transition-colors duration-200">Home</a>
            <a href="#"
                class="block px-4 py-3 text-gray-700 hover:bg-gray-100 hover:text-[#59E300] transition-colors duration-200">Discover
                Amaliah</a>
            <a href="#"
                class="block px-4 py-3 text-gray-700 hover:bg-gray-100 hover:text-[#59E300] transition-colors duration-200">Major
                Competency</a>
            <a href="#"
                class="block px-4 py-3 text-gray-700 hover:bg-gray-100 hover:text-[#59E300] transition-colors duration-200">Education
                Preview</a>
            <a href="#"
                class="block px-4 py-3 text-gray-700 hover:bg-gray-100 hover:text-[#59E300] transition-colors duration-200">Facilitation</a>
            <a href="#"
                class="block px-4 py-3 text-gray-700 hover:bg-gray-100 hover:text-[#59E300] transition-colors duration-200">Bursa
                Kerja Khusus</a>
            <a href="#"
                class="block px-4 py-3 text-[#50B70E] font-semibold hover:bg-gray-100 hover:text-[#59E300] transition-colors duration-200">Contact
                Us</a>
        </div>
    </header>

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>

</html>