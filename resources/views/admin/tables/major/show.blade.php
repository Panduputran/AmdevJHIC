@extends('layouts.admin-app')

@section('content')

    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $major->name }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #f0f2f5;
            }
        </style>
    </head>

    <body class="bg-gray-100">

        <div class="main-content flex-1 p-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-[#292929]">{{ $major->name }}</h1>
                    <a href="{{ route('admin.majors.index') }}"
                        class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-300 transition-colors duration-200 flex items-center space-x-2">
                        <i class="fas fa-arrow-left mr-2"></i>
                        <span>Kembali</span>
                    </a>
                </div>

                <div class="mb-6">
                    <img src="{{ asset('storage/' . $major->image) }}" alt="{{ $major->name }}"
                        class="w-full h-80 object-cover rounded-lg shadow-md">
                </div>

                <div class="prose max-w-none text-gray-700">
                    <h2 class="text-lg font-semibold text-[#292929]">Deskripsi</h2>
                    <p>{{ $major->description }}</p>

                    <div class="mt-6">
                        <h2 class="text-lg font-semibold text-[#292929]">Kepala Kompetensi</h2>
                        <div class="flex items-center space-x-4 mt-2">
                            @if($major->competency_head_photo)
                                <img src="{{ asset('storage/' . $major->competency_head_photo) }}" alt="Foto Kepala Kompetensi"
                                    class="w-20 h-20 object-cover rounded-full shadow-sm">
                            @endif
                            <div class="font-medium">
                                <p class="text-gray-700">{{ $major->competency_head }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-sm font-medium text-gray-500">
                        <p>Dipublikasikan oleh: <span class="text-gray-700">{{ $major->publisher }}</span></p>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-2">
                    <a href="{{ route('admin.majors.edit', $major->id) }}"
                        class="bg-[#6CF600] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#5bd300] transition-colors duration-200">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>
                    <form action="{{ route('admin.majors.destroy', $major->id) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus jurusan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-red-600 transition-colors duration-200">
                            <i class="fas fa-trash-alt mr-2"></i>Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </body>

    </html>

@endsection