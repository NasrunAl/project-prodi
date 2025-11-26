@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-white">Edit Berita: {{ Str::limit($berita->judul, 30) }}</h1>
        <a href="{{ route('admin.berita.index') }}" class="text-gray-400 hover:text-white">
            <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
        </a>
    </div>

    <div class="bg-[#0f172a] border border-gray-800 rounded-xl p-6">
        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">Judul Berita</label>
                <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" required 
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 text-white focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                {{-- Penulis --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Penulis</label>
                    <input type="text" name="penulis" value="{{ old('penulis', $berita->penulis) }}" required 
                        class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 text-white">
                </div>

                {{-- Gambar Saat Ini --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Gambar Saat Ini</label>
                    @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-full h-24 object-cover border border-gray-600 rounded">
                    @else
                        <p class="text-xs text-gray-500">Tidak ada gambar.</p>
                    @endif
                </div>
            </div>

            {{-- Upload Gambar Baru --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300 mb-1">Ganti Gambar (Opsional)</label>
                <input type="file" name="gambar" class="w-full text-sm text-gray-400
                  file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold
                  file:bg-indigo-900 file:text-indigo-300 hover:file:bg-indigo-800">
                <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
            </div>

            {{-- Isi Berita --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300 mb-1">Isi Berita Lengkap</label>
                <textarea name="isi" rows="10" required class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 text-white focus:ring-indigo-500 focus:border-indigo-500">{{ old('isi', $berita->isi) }}</textarea>
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-4 rounded-lg transition">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection