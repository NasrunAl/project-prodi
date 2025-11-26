@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-white">Kelola Berita & BSD Terkini</h1>
    <a href="{{ route('admin.berita.create') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
        <i class="fa-solid fa-plus mr-2"></i> Tambah Berita
    </a>
</div>

{{-- Pesan Sukses --}}
@if(session('success'))
    <div class="bg-emerald-900/50 text-emerald-400 p-4 rounded-lg mb-6 border border-emerald-800">
        {{ session('success') }}
    </div>
@endif

<div class="bg-[#0f172a] border border-gray-800 rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-400">
        <thead class="text-xs text-gray-200 uppercase bg-gray-900 border-b border-gray-800">
            <tr>
                <th class="px-6 py-3">Tanggal</th>
                <th class="px-6 py-3">Judul</th>
                <th class="px-6 py-3">Penulis</th>
                <th class="px-6 py-3">Gambar</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800">
            @foreach($beritas as $berita)
            <tr class="hover:bg-gray-800/50 transition">
                <td class="px-6 py-4">{{ $berita->created_at->format('d M Y') }}</td>
                <td class="px-6 py-4 font-bold text-white max-w-xs">{{ $berita->judul }}</td>
                <td class="px-6 py-4">{{ $berita->penulis }}</td>
                <td class="px-6 py-4">
                    @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-12 h-10 object-cover border border-gray-600 rounded">
                    @else
                        <span class="text-xs text-gray-500">Tidak ada</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-center">
                    <div class="flex justify-center items-center gap-2">
                        {{-- TOMBOL EDIT --}}
                        <a href="{{ route('admin.berita.edit', $berita->id) }}" class="text-yellow-400 hover:text-yellow-300 transition" title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        {{-- TOMBOL HAPUS --}}
                        <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-300 transition" title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection