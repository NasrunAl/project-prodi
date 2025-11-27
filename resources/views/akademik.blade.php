@extends('layouts.main')

@section('title', 'Akademik - Bisnis Digital')

@section('content')
<section class="py-20 px-4 bg-[#050511] relative overflow-hidden min-h-screen">
    
    {{-- Background Glow --}}
    <div class="absolute top-0 left-0 w-96 h-96 bg-[#254E99] opacity-10 blur-[150px] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#7C18B6] opacity-10 blur-[150px] rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto relative z-10">
        
        {{-- Header Section --}}
        <div class="text-center mb-16 mt-8">
            <h2 class="text-4xl font-bold text-white mb-2">Profil Lulusan</h2>
            <div class="h-1 w-24 bg-gradient-to-r from-[#c5a059] to-[#7C18B6] mx-auto rounded-full"></div>
            <p class="text-gray-400 mt-4 max-w-2xl mx-auto">
                Lulusan Bisnis Digital dibekali dengan kompetensi teknis dan manajerial untuk bersaing di era global.
            </p>
        </div>

        {{-- GRID PROFIL LULUSAN (DINAMIS DARI DATABASE) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-24">
            
            @foreach($profils as $profil)
            {{-- LOOPING CARD MULAI DARI SINI --}}
            <div class="group relative rounded-2xl overflow-hidden h-72 border border-[#254E99]/30 bg-[#101025]">
                
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
            <div class="col-span-2 text-center py-10 bg-[#101025] rounded-xl border border-dashed border-gray-700">
                <p class="text-gray-500">Belum ada data profil lulusan.</p>
            </div>
            @endif

        </div>

        {{-- DOWNLOAD SECTION (Tetap Sama) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            {{-- Mata Kuliah --}}
            <div class="bg-[#101025] border border-[#254E99]/30 rounded-3xl p-8 flex flex-col items-center text-center hover:border-[#c5a059] transition duration-300 group">
                 <div class="w-16 h-16 bg-[#254E99]/20 rounded-full flex items-center justify-center mb-6 group-hover:bg-[#c5a059]/20 transition">
                    <i class="fas fa-book text-3xl text-[#4B7BEC] group-hover:text-[#c5a059] transition"></i>
                 </div>
                 <h3 class="font-bold text-2xl text-white mb-4">Mata Kuliah</h3>
                 <p class="text-gray-400 text-sm mb-6">Unduh daftar mata kuliah lengkap yang akan dipelajari selama masa studi.</p>
                 <button class="w-full py-3 rounded-full bg-transparent border border-[#4B7BEC] text-[#4B7BEC] font-bold hover:bg-[#4B7BEC] hover:text-white transition duration-300 flex items-center justify-center gap-2">
                    <i class="fas fa-download"></i> Unduh PDF
                 </button>
            </div>

            {{-- Kurikulum --}}
            <div class="bg-[#101025] border border-[#254E99]/30 rounded-3xl p-8 flex flex-col items-center text-center hover:border-[#7C18B6] transition duration-300 group">
                 <div class="w-16 h-16 bg-[#7C18B6]/20 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-graduation-cap text-3xl text-[#7C18B6] group-hover:scale-110 transition"></i>
                 </div>
                 <h3 class="font-bold text-2xl text-white mb-4">Kurikulum</h3>
                 <p class="text-gray-400 text-sm mb-6">Pelajari struktur kurikulum berbasis industri dan peta jalan pembelajaran.</p>
                 <button class="w-full py-3 rounded-full bg-transparent border border-[#7C18B6] text-[#7C18B6] font-bold hover:bg-[#7C18B6] hover:text-white transition duration-300 flex items-center justify-center gap-2">
                    <i class="fas fa-download"></i> Unduh PDF
                 </button>
            </div>
        </div>
    </div>
</section>
@endsection