@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Guru</title>
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
            <h1 class="text-2xl font-bold text-[#292929]">Tambah Guru</h1>
            <a href="{{ route('admin.teachers.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-300 transition-colors duration-200 flex items-center space-x-2">
                <i class="fas fa-arrow-left mr-2"></i>
                <span>Kembali</span>
            </a>
        </div>

        <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Guru</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6CF600] @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Foto Guru</label>
                <input type="file" name="photo" id="photo" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6CF600] @error('photo') border-red-500 @enderror">
                @error('photo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="position" class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                <input type="text" name="position" id="position" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6CF600] @error('position') border-red-500 @enderror" value="{{ old('position') }}">
                @error('position')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Mata Pelajaran</label>
                <input type="text" name="subject" id="subject" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6CF600] @error('subject') border-red-500 @enderror" value="{{ old('subject') }}">
                @error('subject')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="school" class="block text-sm font-medium text-gray-700 mb-1">Sekolah Mengajar</label>
                <select name="school" id="school" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6CF600] @error('school') border-red-500 @enderror">
                    <option value="" disabled selected>Pilih Sekolah</option>
                    <option value="Amaliah 1" @if(old('school') == 'Amaliah 1') selected @endif>Amaliah 1</option>
                    <option value="Amaliah 2" @if(old('school') == 'Amaliah 2') selected @endif>Amaliah 2</option>
                </select>
                @error('school')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-6">
                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Kategori Pelajaran</label>
                <select name="category" id="category" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6CF600] @error('category') border-red-500 @enderror">
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="Produktif" @if(old('category') == 'Produktif') selected @endif>Produktif</option>
                    <option value="Normatif" @if(old('category') == 'Normatif') selected @endif>Normatif</option>
                    <option value="Adaptif" @if(old('category') == 'Adaptif') selected @endif>Adaptif</option>
                    <option value="Umum" @if(old('category') == 'Umum') selected @endif>Umum</option>
                </select>
                @error('category')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="bg-[#6CF600] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#5bd300] transition-colors duration-200">
                    Simpan Guru
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>

@endsection