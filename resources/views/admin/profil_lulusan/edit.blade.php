@extends('layouts.admin')

@section('title', 'Edit Profil Lulusan')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-white">Edit Profil Lulusan</h1>
        <a href="{{ route('admin.profil-lulusan.index') }}" class="text-gray-400 hover:text-white">
            <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
        </a>
    </div>

    <div class="bg-[#0f172a] border border-gray-800 rounded-xl p-6">
        <form action="{{ route('admin.profil-lulusan.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Wajib untuk Update Data --}}

            {{-- Judul --}}
            <div class="mb-4">
                <label class="block text-gray-300 text-sm mb-1">Judul Profesi</label>
                <input type="text" name="judul" value="{{ old('judul', $profil->judul) }}" required 
                    class="w-full bg-gray-900 border border-gray-700 rounded p-2 text-white focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            {{-- Urutan --}}
            <div class="mb-4">
                <label class="block text-gray-300 text-sm mb-1">Urutan Tampil</label>
                <input type="number" name="urutan" value="{{ old('urutan', $profil->urutan) }}" required 
                    class="w-full bg-gray-900 border border-gray-700 rounded p-2 text-white focus:ring-indigo-500 focus:border-indigo-500">
                <p class="text-xs text-gray-500 mt-1">Angka kecil tampil duluan (Misal: 1, 2, 3).</p>
            </div>

            {{-- Gambar Saat Ini --}}
            <div class="mb-4">
                <label class="block text-gray-300 text-sm mb-2">Gambar Background Saat Ini</label>
                @if($profil->ikon)
                    <div class="relative w-full h-32 rounded-lg overflow-hidden border border-gray-700 group">
                        <img src="{{ asset('storage/' . $profil->ikon) }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                            <span class="text-xs text-white">Gambar Terpasang</span>
                        </div>
                    </div>
                @else
                    <div class="bg-gray-800 text-gray-500 text-xs p-3 rounded">Belum ada gambar.</div>
                @endif
            </div>

            {{-- Upload Gambar Baru --}}
            <div class="mb-4">
                <label class="block text-gray-300 text-sm mb-1">Ganti Gambar (Opsional)</label>
                <input type="file" name="ikon" class="w-full text-sm text-gray-400
                  file:mr-4 file:py-2 file:px-4
                  file:rounded-full file:border-0
                  file:text-sm file:font-semibold
                  file:bg-indigo-900 file:text-indigo-300
                  hover:file:bg-indigo-800">
                <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-6">
                <label class="block text-gray-300 text-sm mb-1">Deskripsi Singkat</label>
                <textarea name="deskripsi" rows="4" required 
                    class="w-full bg-gray-900 border border-gray-700 rounded p-2 text-white focus:ring-indigo-500 focus:border-indigo-500">{{ old('deskripsi', $profil->deskripsi) }}</textarea>
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white py-2 rounded font-bold transition">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection