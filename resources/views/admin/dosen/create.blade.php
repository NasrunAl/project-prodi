@extends('layouts.admin')

@section('title', 'Tambah Civitas')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-white">Tambah Civitas Baru</h1>
        <a href="{{ route('admin.dosen.index') }}" class="text-gray-400 hover:text-white">
            <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
        </a>
    </div>

    <div class="bg-[#0f172a] border border-gray-800 rounded-xl p-6">
        <form action="{{ route('admin.dosen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">Nama Lengkap</label>
                <input type="text" name="nama" required class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 text-white focus:ring-indigo-500 focus:border-indigo-500" placeholder="Contoh: Lukman Hakim, S.Kom">
            </div>

            {{-- NIP --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">NIP / NRP (Opsional)</label>
                <input type="text" name="nip" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 text-white" placeholder="Contoh: 198901...">
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                {{-- Jabatan --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Jabatan</label>
                    <input type="text" name="jabatan" required class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 text-white" placeholder="Contoh: Lektor Kepala">
                </div>

                {{-- Kategori --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Kategori</label>
                    <select name="kategori" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 text-white">
                        <option value="koordinator">Koordinator Program Studi</option>
                        <option value="dosen">Dosen</option>
                        <option value="admin">Admin</option>
                        <option value="teknisi">Teknisi</option>
                    </select>
                </div>
            </div>

            {{-- Upload Foto --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300 mb-1">Foto Profil</label>
                <input type="file" name="foto" class="w-full text-sm text-gray-400
                  file:mr-4 file:py-2 file:px-4
                  file:rounded-full file:border-0
                  file:text-sm file:font-semibold
                  file:bg-indigo-900 file:text-indigo-300
                  hover:file:bg-indigo-800">
                <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG. Maks 2MB.</p>
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-4 rounded-lg transition">
                Simpan Data
            </button>
        </form>
    </div>
</div>
@endsection