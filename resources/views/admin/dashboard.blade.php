@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    {{-- Judul --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold">Dashboard</h1>
            <p class="text-sm text-gray-400 mt-1">
                Ringkasan data website Prodi Bisnis Digital.
            </p>
        </div>

        <div class="flex gap-2">
            <a href="#" class="hidden md:inline-flex items-center px-3 py-2 rounded-md text-xs font-semibold
                              bg-indigo-600 hover:bg-indigo-500">
                <i class="fa-solid fa-plus mr-2"></i> Tambah Berita
            </a>
            <a href="#" class="hidden md:inline-flex items-center px-3 py-2 rounded-md text-xs font-semibold
                              bg-gray-800 hover:bg-gray-700">
                <i class="fa-solid fa-gears mr-2"></i> Pengaturan
            </a>
        </div>
    </div>

    {{-- KARTU STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        <div class="bg-gray-950 border border-gray-800 rounded-xl p-4">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs uppercase text-gray-400">Civitas</span>
                <i class="fa-solid fa-user-tie text-indigo-400"></i>
            </div>
            <p class="text-3xl font-bold">{{ $dosenCount }}</p>
            <p class="text-xs text-gray-500 mt-1">Total dosen terdaftar</p>
        </div>

        <div class="bg-gray-950 border border-gray-800 rounded-xl p-4">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs uppercase text-gray-400">Fasilitas</span>
                <i class="fa-solid fa-school-flag text-emerald-400"></i>
            </div>
            <p class="text-3xl font-bold">{{ $fasilitasCount }}</p>
            <p class="text-xs text-gray-500 mt-1">Lab, ruang, dan sarana lainnya</p>
        </div>

        <div class="bg-gray-950 border border-gray-800 rounded-xl p-4">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs uppercase text-gray-400">Profil Lulusan</span>
                <i class="fa-solid fa-user-graduate text-amber-400"></i>
            </div>
            <p class="text-3xl font-bold">{{ $profilLulusanCount }}</p>
            <p class="text-xs text-gray-500 mt-1">Peran lulusan yang didefinisikan</p>
        </div>

        <div class="bg-gray-950 border border-gray-800 rounded-xl p-4">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs uppercase text-gray-400">Berita</span>
                <i class="fa-solid fa-newspaper text-pink-400"></i>
            </div>
            <p class="text-3xl font-bold">{{ $beritaCount }}</p>
            <p class="text-xs text-gray-500 mt-1">Termasuk BSD Terkini</p>
        </div>
    </div>

    {{-- DUA KOLOM: BERITA & DOSEN TERBARU --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- BERITA TERBARU --}}
        <div class="bg-gray-950 border border-gray-800 rounded-xl p-4">
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-sm font-semibold">Berita Terbaru</h2>
                <a href="{{ route('admin.berita.index') }}" class="text-xs text-indigo-400 hover:underline">Lihat semua</a>
            </div>

            @if($beritaTerbaru->isEmpty())
                <p class="text-xs text-gray-500">Belum ada berita yang ditambahkan.</p>
            @else
                <table class="w-full text-xs">
                    <thead class="text-gray-500 border-b border-gray-800">
                        <tr>
                            <th class="text-left py-2">Judul</th>
                            <th class="text-left py-2 w-24">Tanggal</th>
                            <th class="text-center py-2 w-20">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($beritaTerbaru as $berita)
                            <tr class="border-b border-gray-800/70">
                                <td class="py-2 pr-2">
                                    <span class="line-clamp-2">{{ $berita->judul }}</span>
                                </td>
                                <td class="py-2 text-gray-400">
                                    {{ optional($berita->published_at ?? $berita->created_at)->format('d/m/Y') }}
                                </td>
                                <td class="py-2 text-center">
                                    @if($berita->is_published)
                                        <span class="px-2 py-1 rounded-full bg-emerald-900/40 text-emerald-300 text-[10px]">
                                            Publish
                                        </span>
                                    @else
                                        <span class="px-2 py-1 rounded-full bg-gray-800 text-gray-300 text-[10px]">
                                            Draft
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        {{-- DOSEN TERBARU --}}
        <div class="bg-gray-950 border border-gray-800 rounded-xl p-4">
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-sm font-semibold">Civitas Terbaru</h2>
                <a href="{{ route('admin.dosen.index') }}" class="text-xs text-indigo-400 hover:underline">Kelola dosen</a>
            </div>

            @if($dosenTerbaru->isEmpty())
                <p class="text-xs text-gray-500">Belum ada data dosen.</p>
            @else
                <ul class="divide-y divide-gray-800 text-xs">
                    @foreach($dosenTerbaru as $dosen)
                        <li class="py-2 flex items-center justify-between">
                            <div>
                                <div class="font-medium">{{ $dosen->nama }}</div>
                                <div class="text-[11px] text-gray-400">
                                    {{ $dosen->jabatan ?? 'Dosen' }}
                                </div>
                            </div>
                            <div class="text-[11px] text-gray-500">
                                {{ $dosen->created_at->format('d/m/Y') }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
