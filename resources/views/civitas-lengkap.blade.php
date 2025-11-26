@extends('layouts.main')

@section('title', 'Daftar Lengkap Civitas')

@section('content')
<div class="bg-[#050511] min-h-screen relative pt-24 pb-20 px-4 overflow-x-hidden">

    {{-- Background Decoration --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-20 left-10 w-96 h-96 bg-[#254E99] opacity-20 blur-[150px] rounded-full"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#7C18B6] opacity-20 blur-[150px] rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto relative z-10">

        {{-- 1. LIST SEMUA DOSEN --}}
        <div class="mb-16">
            <h2 class="text-center text-3xl font-bold text-white mb-10 tracking-wide">Dosen</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($dosens as $dosen)
                <div class="bg-[#0a1529]/80 border border-[#254E99] rounded-2xl p-4 flex items-center gap-5 hover:scale-[1.01] transition-all duration-300">
                    {{-- Foto --}}
                    <div class="flex-shrink-0 w-24 h-28 rounded-lg overflow-hidden border border-white/20 bg-gray-800">
                        {{-- PERBAIKAN: Gunakan asset('storage') dan Placeholder Aman --}}
                        <img src="{{ $dosen->foto ? asset('storage/' . $dosen->foto) : 'https://placehold.co/400x400/1e2549/ffffff?text=DOSEN' }}" class="w-full h-full object-cover">
                    </div>
                    {{-- Data --}}
                    <div class="flex-grow min-w-0">
                        <h3 class="text-white font-bold text-sm md:text-base mb-3 truncate">{{ $dosen->nama }}</h3>
                        <div class="space-y-2">
                            <div class="bg-[#050511] border border-[#254E99]/50 rounded-full px-4 py-1 w-fit">
                                <p class="text-[10px] md:text-xs text-gray-300 font-mono">{{ $dosen->nip }}</p>
                            </div>
                            <div class="bg-[#050511] border border-[#254E99]/50 rounded-full px-4 py-1 w-fit">
                                <p class="text-[10px] md:text-xs text-gray-300">{{ $dosen->jabatan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- 2. LIST SEMUA ADMIN --}}
        <div class="mb-16">
            <h2 class="text-center text-3xl font-bold text-white mb-10 tracking-wide">Admin</h2>
            <div class="flex flex-wrap justify-center gap-6">
                @foreach($admins as $admin)
                <div class="w-full max-w-md bg-[#0a1529]/80 border border-[#254E99] rounded-2xl p-5 flex items-center gap-5">
                    <div class="flex-shrink-0 w-28 h-32 rounded-lg overflow-hidden border-2 border-red-500 relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-red-500 to-red-700"></div>
                        {{-- PERBAIKAN: Gunakan asset('storage') dan Placeholder Aman --}}
                        <img src="{{ $admin->foto ? asset('storage/' . $admin->foto) : 'https://placehold.co/400x400/DC2626/ffffff?text=ADMIN' }}" class="relative w-full h-full object-cover object-top z-10">
                    </div>
                    <div class="flex-grow min-w-0">
                        <h3 class="text-white font-bold text-lg mb-3">{{ $admin->nama }}</h3>
                        <div class="space-y-2">
                            <div class="bg-[#050511] border border-[#254E99]/50 rounded-full px-4 py-1.5 w-fit">
                                <p class="text-xs text-gray-300 font-mono">{{ $admin->nip }}</p>
                            </div>
                            <div class="bg-[#050511] border border-[#254E99]/50 rounded-full px-4 py-1.5 w-fit">
                                <p class="text-xs text-gray-300">{{ $admin->jabatan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- 3. LIST SEMUA TEKNISI --}}
        <div class="mb-12">
            <h2 class="text-center text-3xl font-bold text-white mb-10 tracking-wide">Teknisi</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($teknisis as $teknisi)
                <div class="bg-[#0a1529]/80 border border-[#254E99] rounded-2xl p-4 flex flex-col items-center text-center hover:scale-[1.02] transition">
                    <div class="w-24 h-28 rounded-lg overflow-hidden border-2 {{ $loop->iteration % 2 == 0 ? 'border-blue-500 bg-blue-600' : 'border-red-500 bg-red-600' }} mb-4 relative">
                        {{-- PERBAIKAN: Gunakan asset('storage') dan Placeholder Aman --}}
                        <img src="{{ $teknisi->foto ? asset('storage/' . $teknisi->foto) : 'https://placehold.co/400x400/' . ($loop->iteration % 2 == 0 ? '254E99' : '99254E') . '/ffffff?text=TEKNISI' }}" class="relative w-full h-full object-cover object-top">
                    </div>
                    <h3 class="text-white font-bold text-sm mb-3">{{ $teknisi->nama }}</h3>
                    <div class="w-full space-y-2">
                        <div class="bg-[#050511] border border-[#254E99]/50 rounded-full px-2 py-1">
                            <p class="text-[10px] text-gray-300">{{ $teknisi->nip }}</p>
                        </div>
                        <div class="bg-[#050511] border border-[#254E99]/50 rounded-full px-2 py-1">
                            <p class="text-[10px] text-gray-300">{{ $teknisi->jabatan }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Tombol Kembali --}}
        <div class="flex justify-end mt-10 border-t border-gray-800 pt-6">
            <a href="{{ url('/civitas') }}" class="bg-[#1e2549] hover:bg-[#254E99] text-white px-8 py-2 rounded-full text-sm font-semibold flex items-center gap-3 transition-all duration-300 border border-white/20 shadow-lg">
                <i class="fas fa-arrow-left"></i> Kembali Halaman Sebelumnya
            </a>
        </div>

    </div>
</div>
@endsection