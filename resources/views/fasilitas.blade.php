@extends('layouts.main')

@section('title', 'Fasilitas - Bisnis Digital')

@section('content')

{{-- PENTING: Load CSS Swiper di dalam section content agar terbaca --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

{{-- 1. HERO SECTION (SLIDER DINAMIS) --}}
<div class="relative h-[70vh] w-full overflow-hidden group bg-[#050511]">
    
    <div class="swiper facilityHeroSwiper h-full w-full">
        <div class="swiper-wrapper">
            
            {{-- LOOP DINAMIS UNTUK HERO SLIDER --}}
            @forelse($fasilitas as $item)
            <div class="swiper-slide relative h-full w-full">
                {{-- GAMBAR DARI STORAGE --}}
                <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-full object-cover">
                
                <div class="absolute inset-0 bg-gradient-to-t from-[#050511] via-[#050511]/20 to-transparent"></div>
                
                {{-- Kontainer untuk membatasi lebar konten agar sama dengan halaman Home --}}
                <div class="absolute bottom-20 left-0 right-0 z-20 px-4">
                    <div class="max-w-6xl mx-auto text-center">
                        {{-- DESKRIPSI SINGKAT ATAU IKON FA SEBAGAI SUBTITLE --}}
                        <span class="text-[#c5a059] tracking-[0.3em] text-sm font-bold uppercase mb-3 block animate-fadeIn">
                            {{ $item->deskripsi ?? 'Fasilitas Program Studi' }}
                        </span>
                        {{-- NAMA FASILITAS SEBAGAI JUDUL --}}
                        <h1 class="text-4xl md:text-6xl font-bold text-white drop-shadow-2xl">{{ $item->nama }}</h1>
                    </div>
                </div>
            </div>
            @empty
            <div class="swiper-slide relative h-full w-full flex items-center justify-center bg-gray-900">
                <h1 class="text-3xl font-bold text-gray-500">Data Fasilitas Belum Tersedia</h1>
            </div>
            @endforelse

        </div>
        <div class="swiper-pagination !bottom-8"></div>
    </div>

    {{-- Tombol Navigasi Kustom --}}
    <div class="nav-prev absolute left-6 top-1/2 transform -translate-y-1/2 w-12 h-12 flex items-center justify-center border border-white/30 rounded-full hover:bg-[#c5a059] hover:border-[#c5a059] hover:text-black text-white backdrop-blur-md transition duration-300 z-30 cursor-pointer group">
        <i class="fas fa-chevron-left group-hover:-translate-x-0.5 transition"></i>
    </div>
    <div class="nav-next absolute right-6 top-1/2 transform -translate-y-1/2 w-12 h-12 flex items-center justify-center border border-white/30 rounded-full hover:bg-[#c5a059] hover:border-[#c5a059] hover:text-black text-white backdrop-blur-md transition duration-300 z-30 cursor-pointer group">
        <i class="fas fa-chevron-right group-hover:translate-x-0.5 transition"></i>
    </div>

</div>

{{-- 2. INTRO TEXT --}}
<section class="py-16 px-6 bg-[#00092D] text-center relative">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-1 bg-gradient-to-r from-transparent via-[#254E99] to-transparent opacity-50"></div>
    <div class="max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-white">Sarana Pembelajaran <span class="text-[#7C18B6]">Modern</span></h2>
        <p class="text-gray-400 leading-relaxed text-lg">
            Program Studi Bisnis Digital menyediakan berbagai fasilitas modern untuk mendukung proses belajar yang kreatif, 
            kolaboratif, dan berbasis teknologi. Setiap ruang dirancang agar mahasiswa dapat mengembangkan kompetensi digital secara optimal.
        </p>
    </div>
</section>


{{-- 3. GALLERY GRID (Dinamis dari Database) --}}
<section class="pb-24 px-4 max-w-7xl mx-auto bg-[#00092D]">
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($fasilitas as $item)
        {{-- Card Fasilitas --}}
        <div class="group relative rounded-2xl overflow-hidden shadow-lg border border-[#254E99]/30 h-[300px] bg-[#101025]">
            
            {{-- Gambar dari storage --}}
            <img src="{{ asset('storage/' . $item->gambar) }}" 
                 alt="{{ $item->nama }}"
                 class="w-full h-full object-cover transition duration-700 group-hover:scale-110 group-hover:opacity-80">
            
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80"></div>
            
            {{-- Floating Label --}}
            <div class="absolute bottom-4 left-4 right-4">
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl p-3 flex justify-between items-center">
                    <span class="text-white font-semibold">{{ $item->nama }}</span>
                    {{-- Ikon Font Awesome --}}
                    @if($item->ikon_fa)
                        <i class="{{ $item->ikon_fa }} text-xl text-[#c5a059]"></i> 
                    @else
                        {{-- Ikon Default --}}
                        <i class="fas fa-tools text-xl text-[#c5a059]"></i>
                    @endif
                </div>
            </div>
            
            {{-- Overlay Deskripsi (Muncul saat hover) --}}
            <div class="absolute inset-0 p-6 flex items-center justify-center bg-black/80 opacity-0 group-hover:opacity-100 transition duration-300">
                <p class="text-white text-center text-sm italic line-clamp-4">
                    {{ $item->deskripsi ?? 'Deskripsi belum tersedia.' }}
                </p>
            </div>

        </div>
        @empty
        {{-- Jika data kosong --}}
        <div class="col-span-full text-center py-10">
            <p class="text-gray-400">Data fasilitas belum tersedia atau belum ditambahkan oleh Admin.</p>
        </div>
        @endforelse
    </div>

</section>


{{-- SCRIPT SWIPER --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var swiper = new Swiper(".facilityHeroSwiper", {
            effect: "fade",
            fadeEffect: { crossFade: true },
            speed: 1000,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".nav-next",
                prevEl: ".nav-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + ' !w-10 !h-1 !rounded-full !bg-white/50 transition-all duration-300"></span>';
                },
            },
        });
    });
</script>

<style>
    .swiper-pagination-bullet-active {
        background-color: #c5a059 !important; /* Warna Emas */
        opacity: 1 !important;
        width: 50px !important;
    }
</style>

@endsection