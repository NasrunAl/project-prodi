@extends('layouts.admin')

@section('title', 'Edit Civitas')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-white">Edit Data Civitas</h1>
        <a href="{{ route('admin.dosen.index') }}" class="text-gray-400 hover:text-white">
            <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
        </a>
    </div>

    <div class="bg-[#0f172a] border border-gray-800 rounded-xl p-6">
        {{-- Form Update mengarah ke route UPDATE --}}
        <form action="{{ route('admin.dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Wajib untuk update --}}

            {{-- Nama --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ old('nama', $dosen->nama) }}" required 
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 text-white focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            {{-- NIP --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">NIP / NRP</label>
                <input type="text" name="nip" value="{{ old('nip', $dosen->nip) }}" 
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 text-white">
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                {{-- Jabatan --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Jabatan</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan', $dosen->jabatan) }}" required 
                        class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 text-white">
                </div>

                {{-- Kategori --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Kategori</label>
                    <select name="kategori" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 text-white">
                        <option value="koordinator" {{ $dosen->kategori == 'koordinator' ? 'selected' : '' }}>Koordinator Program Studi</option>
                        <option value="dosen" {{ $dosen->kategori == 'dosen' ? 'selected' : '' }}>Dosen</option>
                        <option value="admin" {{ $dosen->kategori == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="teknisi" {{ $dosen->kategori == 'teknisi' ? 'selected' : '' }}>Teknisi</option>
                    </select>
                </div>
            </div>

            {{-- Preview Foto Lama --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-2">Foto Saat Ini</label>
                @if($dosen->foto)
                    <img src="{{ asset('storage/' . $dosen->foto) }}" class="w-24 h-24 rounded-lg object-cover border border-gray-600">
                @else
                    <div class="w-24 h-24 rounded-lg bg-gray-800 flex items-center justify-center text-xs text-gray-500 border border-gray-700">Tidak ada foto</div>
                @endif
            </div>

            {{-- Upload Foto Baru --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300 mb-1">Ganti Foto (Opsional)</label>
                <input type="file" name="foto" class="w-full text-sm text-gray-400
                  file:mr-4 file:py-2 file:px-4
                  file:rounded-full file:border-0
                  file:text-sm file:font-semibold
                  file:bg-indigo-900 file:text-indigo-300
                  hover:file:bg-indigo-800">
                <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti foto.</p>
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-4 rounded-lg transition">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection