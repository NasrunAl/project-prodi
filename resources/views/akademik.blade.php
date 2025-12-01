@extends('layouts.main')

@section('title', 'Akademik - Bisnis Digital')

@section('content')
<section class="py-20 px-4 bg-[#00092D] relative overflow-hidden min-h-screen">
    
    {{-- Background Glow --}}
    <div class="absolute top-0 left-0 w-96 h-96 bg-[#254E99] opacity-10 blur-[150px] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#7C18B6] opacity-10 blur-[150px] rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto relative z-10">
        
        {{-- Header Section --}}
        <div class="text-center mb-20 mt-12">
            <h2 class="text-5xl md:text-6xl font-bold text-white mb-4 drop-shadow-lg">Profil Lulusan</h2>
            <div class="h-2 w-32 bg-gradient-to-r from-[#c5a059] to-[#7C18B6] mx-auto rounded-full shadow-lg"></div>
            <p class="text-gray-400 mt-4 max-w-2xl mx-auto">
                Lulusan Bisnis Digital dibekali dengan kompetensi teknis dan manajerial untuk bersaing di era global.
            </p>
        </div>

        {{-- GRID PROFIL LULUSAN (DINAMIS DARI DATABASE) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-24">
            
            @foreach($profils as $profil)
            {{-- LOOPING CARD MULAI DARI SINI --}}
            <div class="group relative rounded-2xl overflow-hidden h-72 border-2 border-[#254E99]/40 bg-[#00092D] hover:border-[#7C18B6] transition duration-300 hover:shadow-[0_0_30px_rgba(197,160,89,0.15)] transform hover:-translate-y-2">
                
                {{-- Gambar Latar (Pakai Storage Link) --}}
                @if($profil->ikon)
                    <img src="{{ asset('storage/' . $profil->ikon) }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-60 group-hover:opacity-40">
                @else
                    {{-- Fallback jika admin lupa upload gambar --}}
                    <div class="w-full h-full bg-gradient-to-br from-[#101025] to-[#254E99] opacity-60"></div>
                @endif

                <div class="absolute inset-0 bg-gradient-to-t from-[#050511] via-[#050511]/50 to-transparent"></div>
                
                <div class="absolute bottom-0 left-0 p-6">
                    {{-- Judul Profil (Warna-warni sesuai urutan ganjil/genap agar cantik) --}}
                    <h3 class="text-2xl font-bold {{ $loop->iteration % 2 == 0 ? 'text-[#4B7BEC]' : 'text-[#c5a059]' }} mb-2 group-hover:translate-x-2 transition duration-300">
                        {{ $profil->judul }}
                    </h3>
                    
                    {{-- Deskripsi --}}
                    <p class="text-sm text-gray-300 leading-relaxed transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition duration-500 delay-100">
                        {{ $profil->deskripsi }}
                    </p>
                </div>
            </div>
            @endforeach

            {{-- JIKA DATA KOSONG --}}
            @if($profils->isEmpty())
            <div class="col-span-2 text-center py-16 bg-[#00092D] rounded-2xl border-2 border-dashed border-[#254E99]/40 hover:border-[#7C18B6] transition duration-300">
                <p class="text-gray-500">Belum ada data profil lulusan.</p>
            </div>
            @endif

        </div>

        {{-- DOWNLOAD SECTION (Diubah total sesuai visual) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            
            {{-- BOX 1: Kurikulum --}}
            <div class="relative rounded-3xl p-6 flex flex-col items-center text-center shadow-2xl overflow-hidden h-[350px] transform hover:scale-[1.01] transition duration-300">
                
                {{-- BACKGROUND GRADIENT (Mengikuti visual ungu ke biru) --}}
                <div class="absolute inset-0 bg-gradient-to-br from-[#7C18B6] to-[#254E99] opacity-90"></div>
                
                {{-- Ikon --}}
                <div class="relative w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mb-6 mt-8">
                    <i class="fas fa-graduation-cap text-4xl text-white"></i>
                </div>
                
                <h3 class="relative font-bold text-3xl text-white mb-6 drop-shadow-md">Kurikulum</h3>
                
                {{-- Tombol Unduh PDF (Outline Emas) --}}
                <a href="#" class="relative w-full py-3 rounded-full bg-transparent border-2 border-[#c5a059] text-[#c5a059] font-bold hover:bg-[#c5a059] hover:text-[#00092D] transition duration-300 flex items-center justify-center gap-2 max-w-xs">
                    <i class="fas fa-download"></i> Unduh PDF
                </a>
            </div>

            {{-- BOX 2: Mata Kuliah --}}
            <div class="relative rounded-3xl p-6 flex flex-col items-center text-center shadow-2xl overflow-hidden h-[350px] transform hover:scale-[1.01] transition duration-300">
                
                {{-- BACKGROUND GRADIENT (Mengikuti visual biru ke ungu) --}}
                <div class="absolute inset-0 bg-gradient-to-br from-[#254E99] to-[#7C18B6] opacity-90"></div>
                
                {{-- Ikon --}}
                <div class="relative w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mb-6 mt-8">
                    <i class="fas fa-book-open text-4xl text-white"></i>
                </div>
                
                <h3 class="relative font-bold text-3xl text-white mb-6 drop-shadow-md">Mata Kuliah</h3>
                
                {{-- Tombol Unduh PDF (Outline Emas) --}}
                <a href="#" class="relative w-full py-3 rounded-full bg-transparent border-2 border-[#c5a059] text-[#c5a059] font-bold hover:bg-[#c5a059] hover:text-[#00092D] transition duration-300 flex items-center justify-center gap-2 max-w-xs">
                    <i class="fas fa-download"></i> Unduh PDF
                </a>
            </div>
        </div>
    </div>
</section>
@endsection