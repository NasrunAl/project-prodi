@extends('layouts.admin')

@section('title', 'Tambah Fasilitas Baru')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl md:text-3xl font-bold">Tambah Fasilitas Baru</h1>
</div>

<div class="bg-gray-950 border border-gray-800 rounded-xl p-6 shadow-lg max-w-2xl mx-auto">
    
    <form action="{{ route('admin.fasilitas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama Fasilitas --}}
        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-400 mb-2">Nama Fasilitas <span class="text-pink-500">*</span></label>
            <input type="text" name="nama" id="nama" class="w-full bg-gray-900 border border-gray-700 text-white rounded-lg p-3 focus:ring-indigo-500 focus:border-indigo-500 @error('nama') border-pink-500 @enderror" value="{{ old('nama') }}" required>
            @error('nama')
                <p class="text-pink-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-400 mb-2">Deskripsi Singkat (Opsional)</label>
            <textarea name="deskripsi" id="deskripsi" rows="3" class="w-full bg-gray-900 border border-gray-700 text-white rounded-lg p-3 focus:ring-indigo-500 focus:border-indigo-500 @error('deskripsi') border-pink-500 @enderror">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="text-pink-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Ikon Font Awesome --}}
        <div class="mb-4">
            <label for="ikon_fa" class="block text-sm font-medium text-gray-400 mb-2">Ikon Font Awesome (Contoh: fas fa-desktop)</label>
            <input type="text" name="ikon_fa" id="ikon_fa" class="w-full bg-gray-900 border border-gray-700 text-white rounded-lg p-3 focus:ring-indigo-500 focus:border-indigo-500 @error('ikon_fa') border-pink-500 @enderror" value="{{ old('ikon_fa') }}">
            <p class="text-xs text-gray-500 mt-1">Lihat di <a href="https://fontawesome.com/v5/search" target="_blank" class="text-indigo-400 hover:underline">Font Awesome Icons</a>.</p>
            @error('ikon_fa')
                <p class="text-pink-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Gambar Utama --}}
        <div class="mb-6">
            <label for="gambar" class="block text-sm font-medium text-gray-400 mb-2">Gambar Fasilitas <span class="text-pink-500">*</span></label>
            <input type="file" name="gambar" id="gambar" accept="image/*" class="w-full bg-gray-900 text-white border border-gray-700 rounded-lg p-2 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-500 @error('gambar') border-pink-500 @enderror" required>
            @error('gambar')
                <p class="text-pink-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.fasilitas.index') }}" class="px-4 py-2 text-sm font-semibold rounded-lg text-gray-400 hover:text-white transition duration-150">
                Batal
            </a>
            <button type="submit" class="px-4 py-2 text-sm font-semibold rounded-lg bg-indigo-600 hover:bg-indigo-500 transition duration-150">
                <i class="fa-solid fa-save mr-2"></i> Simpan Fasilitas
            </button>
        </div>

    </form>
</div>

@endsection