@extends('layouts.admin')

@section('title', 'Tambah Profil Lulusan')

@section('content')
<div class="max-w-2xl mx-auto bg-[#0f172a] border border-gray-800 rounded-xl p-6">
    <h1 class="text-2xl font-bold text-white mb-6">Tambah Profil Lulusan</h1>
    <form action="{{ route('admin.profil-lulusan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-300 text-sm mb-1">Judul Profesi</label>
            <input type="text" name="judul" required class="w-full bg-gray-900 border border-gray-700 rounded p-2 text-white">
        </div>

        <div class="mb-4">
            <label class="block text-gray-300 text-sm mb-1">Urutan Tampil</label>
            <input type="number" name="urutan" value="1" required class="w-full bg-gray-900 border border-gray-700 rounded p-2 text-white">
        </div>

        <div class="mb-4">
            <label class="block text-gray-300 text-sm mb-1">Gambar Background</label>
            <input type="file" name="ikon" class="text-gray-400 text-sm">
        </div>

        <div class="mb-6">
            <label class="block text-gray-300 text-sm mb-1">Deskripsi Singkat</label>
            <textarea name="deskripsi" rows="3" required class="w-full bg-gray-900 border border-gray-700 rounded p-2 text-white"></textarea>
        </div>

        <button class="w-full bg-indigo-600 hover:bg-indigo-500 text-white py-2 rounded font-bold">Simpan</button>
    </form>
</div>
@endsection