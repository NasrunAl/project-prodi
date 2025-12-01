@extends('layouts.admin')

@section('title', 'Kelola Civitas')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-white">Kelola Data Civitas</h1>
    <a href="{{ route('admin.dosen.create') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
        <i class="fa-solid fa-plus mr-2"></i> Tambah Data
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
                <th class="px-6 py-3">Foto</th>
                <th class="px-6 py-3">Nama & NIP</th>
                <th class="px-6 py-3">Jabatan</th>
                <th class="px-6 py-3">Kategori</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800">
            @foreach($dosens as $dosen)
            <tr class="hover:bg-gray-800/50 transition">
                <td class="px-6 py-4">
                    @if($dosen->foto)
                        <img src="{{ asset('storage/' . $dosen->foto) }}" class="w-10 h-10 rounded-full object-cover border border-gray-600">
                    @else
                        <div class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center text-xs">No Pic</div>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="font-bold text-white">{{ $dosen->nama }}</div>
                    <div class="text-xs">{{ $dosen->nip ?? '-' }}</div>
                </td>
                <td class="px-6 py-4">{{ $dosen->jabatan }}</td>
                <td class="px-6 py-4">
                    @if($dosen->kategori == 'koordinator')
                        <span class="bg-purple-900/50 text-purple-300 px-2 py-1 rounded text-xs border border-purple-800">Koordinator</span>
                    @elseif($dosen->kategori == 'dosen')
                        <span class="bg-blue-900/50 text-blue-300 px-2 py-1 rounded text-xs border border-blue-800">Dosen</span>
                    @elseif($dosen->kategori == 'admin')
                        <span class="bg-red-900/50 text-red-300 px-2 py-1 rounded text-xs border border-red-800">Admin</span>
                    @else
                        <span class="bg-yellow-900/50 text-yellow-300 px-2 py-1 rounded text-xs border border-yellow-800">Teknisi</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-center">
                    <form action="{{ route('admin.dosen.destroy', $dosen->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                        @csrf
                        @method('DELETE')
                          {{-- TOMBOL EDIT (BARU) --}}
                        <a href="{{ route('admin.dosen.edit', $dosen->id) }}" class="text-yellow-400 hover:text-yellow-300 transition" title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        {{-- TOMBOL HAPUS (SUDAH ADA) --}}
                        <form action="{{ route('admin.dosen.destroy', $dosen->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-300 transition" title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection