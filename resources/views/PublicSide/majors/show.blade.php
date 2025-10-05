@extends('layouts.public-navbar') {{-- Sesuaikan dengan nama file layout utama Anda --}}

@section('content')
    @php
        // Variabel warna untuk konsistensi
        $amaliahGreen = '#63cd00';
        $amaliahDark = '#282829';
    @endphp

    {{-- ================================================================= --}}
    {{-- BAGIAN 1: HERO IMAGE (GAMBAR UTAMA JURUSAN)                      --}}
    {{-- ================================================================= --}}
    <header class="h-64 lg:h-80 w-full bg-gray-800">
        {{-- Gambar akan ditampilkan jika ada, jika tidak, area ini akan tetap gelap --}}
        @if ($major->image)
            <img src="{{ asset('storage/' . $major->image) }}" alt="Gambar Latar {{ $major->name }}"
                class="w-full h-full object-cover">
        @endif
    </header>

    {{-- ================================================================= --}}
    {{-- BAGIAN 2: BREADCRUMB NAVIGASI                                    --}}
    {{-- ================================================================= --}}
    <div style="background-color: #2D2D2D;">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-2 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-base font-medium text-gray-300 hover:text-white transition-colors">
                            <i class="fas fa-home mr-2.5"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-500 text-xs"></i>
                            <a href="{{ route('public.majors.index') }}"
                                class="ml-2 text-base font-medium text-gray-300 hover:text-white md:ml-3 transition-colors">Major
                                Competency</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-500 text-xs"></i>
                            <span class="ml-2 text-base font-medium md:ml-3"
                                style="color: {{ $amaliahGreen }};">{{ $major->abbreviation ?? $major->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- ================================================================= --}}
    {{-- BAGIAN 3: KONTEN UTAMA (LAYOUT 2 KOLOM)                           --}}
    {{-- ================================================================= --}}
    <main class="py-16 lg:py-24 bg-gray-50">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-16">

                {{-- KOLOM KIRI (2/3): DETAIL UTAMA JURUSAN --}}
                <div class="lg:col-span-2 space-y-12">

                    {{-- Header Judul Jurusan --}}
                    <section class="flex flex-col sm:flex-row items-center gap-6 text-center sm:text-left">
                        <div class="bg-white p-3 rounded-2xl shadow-md border border-gray-200 flex-shrink-0">
                            <img src="{{ asset('storage/' . $major->logo) }}" alt="Logo {{ $major->name }}"
                                class="h-24 w-24 object-contain">
                        </div>
                        <div>
                            <p class="text-lg font-semibold" style="color: {{ $amaliahGreen }};">Kompetensi Keahlian</p>
                            <h1 class="text-4xl lg:text-5xl font-extrabold" style="color: {{ $amaliahDark }};">
                                {{ $major->name }}</h1>
                            @if($major->abbreviation)
                            <p class="text-lg text-gray-500 mt-1">{{ $major->abbreviation }}</p>
                            @endif
                        </div>
                    </section>

                    {{-- Deskripsi Jurusan --}}
                    <section>
                        <h2 class="flex items-center gap-x-3 text-3xl font-bold mb-4" style="color: {{ $amaliahDark }};">
                            <i class="fas fa-info-circle text-2xl text-gray-400"></i>
                            <span>Tentang Jurusan</span>
                        </h2>
                        <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed">
                            <p>{{ $major->description }}</p>
                        </div>
                    </section>

                    {{-- Kompetensi Lulusan --}}
                    @if ($major->advantages)
                        <section>
                            <h2 class="flex items-center gap-x-3 text-3xl font-bold mb-6"
                                style="color: {{ $amaliahDark }};">
                                <i class="fas fa-star text-2xl text-gray-400"></i>
                                <span>Kompetensi Lulusan</span>
                            </h2>
                            <ul class="space-y-4">
                                @foreach (explode(',', $major->advantages) as $advantage)
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0 mt-1">
                                            <i class="fas fa-check-circle text-xl" style="color: {{ $amaliahGreen }};"></i>
                                        </div>
                                        <span class="ml-4 text-lg text-gray-700">{{ trim($advantage) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                    @endif

                    {{-- Profil Kepala Jurusan --}}
                    <section>
                        <h2 class="flex items-center gap-x-3 text-3xl font-bold mb-6" style="color: {{ $amaliahDark }};">
                            <i class="fas fa-user-tie text-2xl text-gray-400"></i>
                            <span>Kepala Kompetensi</span>
                        </h2>
                        <div class="bg-white rounded-2xl p-6 flex flex-col sm:flex-row items-center gap-6 border border-gray-200 shadow-sm">
                            <img src="{{ asset('storage/' . $major->competency_head_photo) }}"
                                alt="Foto {{ $major->competency_head }}"
                                class="w-32 h-32 rounded-full object-cover shadow-lg border-4 border-white flex-shrink-0">
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800">{{ $major->competency_head }}</h3>
                                <p class="text-md text-gray-500">Kepala Kompetensi Keahlian {{ $major->name }}</p>
                            </div>
                        </div>
                    </section>
                </div>

                {{-- KOLOM KANAN (1/3): SIDEBAR JURUSAN LAIN (STICKY) --}}
                <aside class="lg:col-span-1">
                    <div class="lg:sticky top-10">
                        <h3 class="text-2xl font-bold mb-6" style="color: {{ $amaliahDark }};">
                            Jelajahi Jurusan Lain
                        </h3>
                        <div class="space-y-5">
                            @forelse ($otherMajors as $otherMajor)
                                <a href="{{ route('public.majors.show', $otherMajor) }}"
                                    class="block group rounded-2xl overflow-hidden bg-white border border-gray-200 shadow-sm transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                                    {{-- Gambar Jurusan atau Placeholder Hitam --}}
                                    <div class="h-40 bg-black flex items-center justify-center">
                                        @if ($otherMajor->image)
                                            <img src="{{ asset('storage/' . $otherMajor->image) }}"
                                                alt="{{ $otherMajor->name }}" class="w-full h-full object-cover">
                                        @endif
                                    </div>
                                    {{-- Konten Teks --}}
                                    <div class="p-4">
                                        <div class="flex items-center gap-4">
                                            <img src="{{ asset('storage/' . $otherMajor->logo) }}"
                                                alt="Logo {{ $otherMajor->name }}"
                                                class="h-12 w-12 object-contain flex-shrink-0">
                                            <div>
                                                <p class="font-bold text-lg text-gray-800">{{ $otherMajor->abbreviation }}</p>
                                                <p class="text-sm text-gray-500 -mt-1">{{ $otherMajor->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <p class="text-gray-500">Tidak ada jurusan lain untuk ditampilkan.</p>
                            @endforelse
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </main>

@endsection