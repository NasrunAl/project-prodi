@extends('layouts.admin')

@section('title', 'Kelola Fasilitas')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl md:text-3xl font-bold">Kelola Fasilitas</h1>
        <p class="text-sm text-gray-400 mt-1">
            Daftar lengkap Lab, Ruang, dan sarana lainnya.
        </p>
    </div>

    <a href="{{ route('admin.fasilitas.create') }}" class="inline-flex items-center px-4 py-2 rounded-md text-sm font-semibold
                      bg-indigo-600 hover:bg-indigo-500 transition duration-150">
        <i class="fa-solid fa-plus mr-2"></i> Tambah Fasilitas
    </a>
</div>

{{-- Notifikasi Sukses --}}
@if (session('success'))
    <div class="p-4 mb-4 text-sm text-emerald-100 bg-emerald-800 rounded-lg shadow-md border border-emerald-700" role="alert">
        <i class="fa-solid fa-check-circle mr-2"></i> {{ session('success') }}
    </div>
@endif

{{-- Tabel Daftar Fasilitas --}}
<div class="bg-gray-950 border border-gray-800 rounded-xl p-4 shadow-lg">
    @if($fasilitas->isEmpty())
        <p class="text-sm text-gray-500 text-center py-6">Belum ada data fasilitas yang ditambahkan.</p>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="text-gray-500 border-b border-gray-800">
                    <tr>
                        <th class="text-left py-3 px-2 w-12">#</th>
                        <th class="text-left py-3 px-2 w-20">Gambar</th>
                        <th class="text-left py-3 px-2">Nama Fasilitas</th>
                        <th class="text-left py-3 px-2 w-24">Ikon</th>
                        <th class="text-center py-3 px-2 w-36">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fasilitas as $item)
                        <tr class="border-b border-gray-800/70">
                            <td class="py-3 px-2">{{ $loop->iteration }}</td>
                            <td class="py-3 px-2">
                                {{-- Ganti dengan gambar thumbnail --}}
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" class="w-12 h-12 object-cover rounded-md">
                            </td>
                            <td class="py-3 px-2">
                                <span class="font-medium text-white">{{ $item->nama }}</span>
                                <p class="text-[11px] text-gray-500 line-clamp-1 mt-1">{{ $item->deskripsi }}</p>
                            </td>
                            <td class="py-3 px-2 text-center">
                                @if($item->ikon_fa)
                                    <i class="{{ $item->ikon_fa }} text-lg text-indigo-400" title="{{ $item->ikon_fa }}"></i>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="py-3 px-2 text-center flex items-center justify-center space-x-2">
                                <a href="{{ route('admin.fasilitas.edit', $item->id) }}" class="text-amber-400 hover:text-amber-300">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                
                                <form action="{{ route('admin.fasilitas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus fasilitas ini?')" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-pink-400 hover:text-pink-300">
                                        <i class="fa-solid fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{-- Pagination --}}
        <div class="mt-4">
            {{ $fasilitas->links() }}
        </div>
    @endif
</div>

@endsection