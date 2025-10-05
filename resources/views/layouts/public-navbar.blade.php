<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>@yield('title', 'SMK Amaliah')</title>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Alpine.js (Untuk Interaktivitas) --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    {{-- Google Fonts --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Times+New+Roman&display=swap"
        rel="stylesheet" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
        }

        .font-times {
            font-family: 'Times New Roman', serif;
        }

        .nav-link {
            @apply relative text-white px-3 py-2 transition-colors duration-300 flex items-center text-[15px];
        }

        .nav-link::after {
            content: '';
            @apply absolute left-0 -bottom-1 w-0 h-[3px] bg-white transition-all duration-300 ease-in-out;
        }

        .nav-link:hover {
            color: #EEFFD9;
        }

        .nav-link:hover::after {
            @apply w-full;
            background-color: #EEFFD9;
        }

        .nav-active {
            @apply font-semibold;
        }

        .nav-active::after {
            @apply w-full bg-white;
        }

        .dropdown-content {
            opacity: 0;
            transform: translateY(-10px);
            visibility: hidden;
            transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s;
        }

        .group:hover .dropdown-content {
            opacity: 1;
            transform: translateY(0);
            visibility: visible;
        }

        [x-cloak] {
            display: none !important;
        }

        /* Penyesuaian di sini: Style untuk link aktif di top bar (garis bawah hijau) */
        .top-bar-active {
            @apply text-[#63cd00] font-semibold;
            border-bottom: 2px solid #63cd00;
            padding-bottom: 4px;
        }
    </style>
</head>

<body class="bg-gray-50">

    <header x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 bg-white shadow-md">
        {{-- TOP BAR --}}
        <div class="border-b border-gray-200">
            <div class="max-w-screen-xl mx-auto flex items-center justify-between px-4 sm:px-6 lg:px-8 py-3">

                {{-- Grup 1: Logo & Nama (Kiri) --}}
                <div class="flex-shrink-0 flex items-center space-x-4">
                    <img src="{{ asset('assets/logo/amaliah.png') }}" alt="Logo SMK Amaliah" class="h-12 w-12">
                    <div class="flex flex-col">
                        <span class="text-gray-900 font-times text-base font-bold whitespace-nowrap"><i>SMK AMALIAH 1&2
                                CIAWI</i></span>
                        <span class="text-xs font-times text-gray-600"><i>Tauhid Is Our Fundament</i></span>
                    </div>
                </div>

                <div class="hidden lg:flex items-center space-x-10">

                    {{-- Grup 2: Search Bar (Style Baru) --}}
                    <a href="#"
                        class="flex items-center space-x-3 bg-gray-100 rounded-full px-6 py-2.5 text-sm text-gray-500 hover:bg-gray-200 transition">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span>Find About SMK AMALIAH</span>
                    </a>

                    {{-- Grup 3: Tautan Cepat --}}
                    <div class="flex items-center space-x-8 text-sm text-gray-700">
                        <a href="#" class="hover:text-[#63cd00] transition-colors whitespace-nowrap ">Info
                            PPDB</a>
                        <a href="#" class="hover:text-[#63cd00] transition-colors whitespace-nowrap">Info BKK</a>
                        <a href="#" class="hover:text-[#63cd00] transition-colors whitespace-nowrap">E-Learning</a>
                        <a href="#" class="hover:text-[#63cd00] transition-colors whitespace-nowrap">Teaching
                            Factory</a>
                    </div>

                    {{-- Grup 4: Tombol Contact Us (Style Baru) --}}
                    <a href="#"
                        class="bg-[#282829] text-white px-6 py-2.5 rounded-full font-semibold hover:bg-opacity-80 transition-colors whitespace-nowrap text-sm">Contact
                        Us</a>
                </div>

                {{-- Tombol Hamburger (Mobile) --}}
                <div class="lg:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-2xl text-gray-700 p-2">
                        <i class="fa-solid fa-bars" x-show="!mobileMenuOpen"></i>
                        <i class="fa-solid fa-times" x-show="mobileMenuOpen" x-cloak></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- MAIN NAV (HIJAU - Desktop) --}}
        <nav class="bg-[#63cd00] hidden lg:block text-white">
            <div class="max-w-screen-xl mx-auto flex items-center justify-center gap-x-14 px-4 h-12">
                <a href="/" class="nav-link {{ Request::is('/') ? 'nav-active' : '' }}">Home</a>
                <div class="relative group">
                    <button class="nav-link">Discover Amaliah <i
                            class="fa-solid fa-chevron-down ml-1.5 text-xs"></i></button>
                    <div class="absolute dropdown-content bg-white shadow-lg mt-2 rounded-md py-1 w-48 z-10">
                        <a href="#"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-[#59E300]">Sejarah</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-[#59E300]">Visi
                            Misi</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-[#59E300]">
                            Berita</a>
                    </div>
                </div>
                <div class="relative group">
                    <button class="nav-link"><a href="{{ route('public.majors.index') }}">Major Competency</a></button>

                </div>
                <div class="relative group">
                    <button class="nav-link">Education Preview <i
                            class="fa-solid fa-chevron-down ml-1.5 text-xs"></i></button>
                    <div class="absolute dropdown-content bg-white shadow-lg mt-2 rounded-md py-1 w-48 z-10">
                        <a href="#"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-[#59E300]">Gallery</a>
                        <a href="#"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-[#59E300]">Prestasi</a>
                    </div>
                </div>
                <div class="relative group">
                    <button class="nav-link">Facilitation <i
                            class="fa-solid fa-chevron-down ml-1.5 text-xs"></i></button>
                    <div class="absolute dropdown-content bg-white shadow-lg mt-2 rounded-md py-1 w-48 z-10">
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-[#59E300]">Lab
                            Komputer</a>
                        <a href="#"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-[#59E300]">Perpustakaan</a>
                    </div>
                </div>
                <a href="#" class="nav-link">Bursa Kerja Khusus</a>
            </div>
        </nav>

        {{-- MOBILE MENU --}}
        <div x-show="mobileMenuOpen" x-cloak @click.away="mobileMenuOpen = false"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4"
            class="lg:hidden bg-white w-full absolute shadow-xl">
            <div class="flex flex-col space-y-1 p-4 text-sm max-h-[calc(100vh-80px)] overflow-y-auto">
                <a href="/"
                    class="block px-4 py-3 text-gray-700 rounded-md hover:bg-gray-100 hover:text-[#59E300]">Home</a>
                <div x-data="{ open: false }">
                    <button @click="open = !open"
                        class="w-full flex justify-between items-center px-4 py-3 text-gray-700 rounded-md hover:bg-gray-100 hover:text-[#59E300]"><span>Discover
                            Amaliah</span><i class="fa-solid fa-chevron-down text-xs transition-transform"
                            :class="{ 'rotate-180': open }"></i></button>
                    <div x-show="open" x-transition class="pl-6 pt-2 pb-1 space-y-1"><a href="#"
                            class="block px-4 py-2 text-gray-600 rounded-md hover:bg-gray-100 hover:text-[#59E300]">Sejarah</a><a
                            href="#"
                            class="block px-4 py-2 text-gray-600 rounded-md hover:bg-gray-100 hover:text-[#59E300]">Visi
                            Misi</a></div>
                </div>
                <div x-data="{ open: false }">
                    <button @click="open = !open"
                        class="w-full flex justify-between items-center px-4 py-3 text-gray-700 rounded-md hover:bg-gray-100 hover:text-[#59E300]"><span>Major
                            Competency</span><i class="fa-solid fa-chevron-down text-xs transition-transform"
                            :class="{ 'rotate-180': open }"></i></button>
                    <div x-show="open" x-transition class="pl-6 pt-2 pb-1 space-y-1"><a href="#"
                            class="block px-4 py-2 text-gray-600 rounded-md hover:bg-gray-100 hover:text-[#59E300]">SMK
                            Amaliah 1</a><a href="#"
                            class="block px-4 py-2 text-gray-600 rounded-md hover:bg-gray-100 hover:text-[#59E300]">SMK
                            Amaliah 2</a></div>
                </div>
                <div x-data="{ open: false }">
                    <button @click="open = !open"
                        class="w-full flex justify-between items-center px-4 py-3 text-gray-700 rounded-md hover:bg-gray-100 hover:text-[#59E300]"><span>Education
                            Preview</span><i class="fa-solid fa-chevron-down text-xs transition-transform"
                            :class="{ 'rotate-180': open }"></i></button>
                    <div x-show="open" x-transition class="pl-6 pt-2 pb-1 space-y-1"><a href="#"
                            class="block px-4 py-2 text-gray-600 rounded-md hover:bg-gray-100 hover:text-[#59E300]">Gallery</a><a
                            href="#"
                            class="block px-4 py-2 text-gray-600 rounded-md hover:bg-gray-100 hover:text-[#59E300]">Prestasi</a>
                    </div>
                </div>
                <div x-data="{ open: false }">
                    <button @click="open = !open"
                        class="w-full flex justify-between items-center px-4 py-3 text-gray-700 rounded-md hover:bg-gray-100 hover:text-[#59E300]"><span>Facilitation</span><i
                            class="fa-solid fa-chevron-down text-xs transition-transform"
                            :class="{ 'rotate-180': open }"></i></button>
                    <div x-show="open" x-transition class="pl-6 pt-2 pb-1 space-y-1"><a href="#"
                            class="block px-4 py-2 text-gray-600 rounded-md hover:bg-gray-100 hover:text-[#59E300]">Lab
                            Komputer</a><a href="#"
                            class="block px-4 py-2 text-gray-600 rounded-md hover:bg-gray-100 hover:text-[#59E300]">Perpustakaan</a>
                    </div>
                </div>
                <a href="#"
                    class="block px-4 py-3 text-gray-700 rounded-md hover:bg-gray-100 hover:text-[#59E300]">Bursa Kerja
                    Khusus</a>
                <hr class="my-2">
                <a href="#" class="block px-4 py-3 text-gray-700 rounded-md hover:bg-gray-100 hover:text-[#59E300]">Info
                    PPDB</a>
                <a href="#" class="block px-4 py-3 text-gray-700 rounded-md hover:bg-gray-100 hover:text-[#59E300]">Info
                    BKK</a>
                <a href="#"
                    class="block px-4 py-3 text-gray-700 rounded-md hover:bg-gray-100 hover:text-[#59E300]">E-Learning</a>
                <a href="#"
                    class="block px-4 py-3 text-gray-700 rounded-md hover:bg-gray-100 hover:text-[#59E300]">Teaching
                    Factory</a>
                <a href="#" class="block px-4 py-3 text-[#50B70E] font-semibold rounded-md hover:bg-gray-100">Contact
                    Us</a>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

</body>

</html>