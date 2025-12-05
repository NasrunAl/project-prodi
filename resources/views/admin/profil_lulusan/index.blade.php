@extends('layouts.admin')

@section('title', 'Profil Lulusan')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-white">Profil Lulusan</h1>
    <a href="{{ route('admin.profil-lulusan.create') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg text-sm font-semibold">
        <i class="fa-solid fa-plus mr-2"></i> Tambah Profil
    </a>
</div>

<div class="bg-[#0f172a] border border-gray-800 rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-400">
        <thead class="text-xs text-gray-200 uppercase bg-gray-900 border-b border-gray-800">
            <tr>
                <th class="px-8 py-3">Urutan</th>
                <th class="px-8 py-3">Gambar</th>
                <th class="px-8 py-3">Judul Profesi</th>
                <th class="px-8 py-3">Deskripsi</th>
                <th class="px-8 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800">
            @foreach($profils as $profil)
            <tr class="hover:bg-gray-800/50">
                <td class="px-8 py-4 font-mono">{{ $profil->urutan }}</td>
                <td class="px-8 py-4">
                    @if($profil->ikon)
                        <img src="{{ asset('storage/' . $profil->ikon) }}" class="w-16 h-10 object-cover rounded">
                    @else
                        -
                    @endif
                </td>
                <td class="px-8 py-4 text-white font-bold">{{ $profil->judul }}</td>
                <td class="px-8 py-4 truncate max-w-xs text-base">{{ $profil->deskripsi }}</td>
                <td class="px-8 py-4 text-center flex justify-center gap-3">
                    <a href="{{ route('admin.profil-lulusan.edit', $profil->id) }}" class="text-yellow-400"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{ route('admin.profil-lulusan.destroy', $profil->id) }}" method="POST" onsubmit="return confirm('Hapus?');">
                        @csrf @method('DELETE')
                        <button class="text-red-400"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection