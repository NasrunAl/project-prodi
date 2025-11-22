@extends('layouts.main')

@section('title', 'Fasilitas - Bisnis Digital')

@section('content')

{{-- PENTING: Load CSS Swiper di dalam section content agar terbaca --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

@section('content')

{{-- 1. HERO SECTION (SLIDER 5 GAMBAR) --}}
{{-- Ubah h-[60vh] menjadi h-[70vh] agar lebih tinggi --}}
<div class="relative h-[70vh] w-full overflow-hidden group bg-[#050511]">
    
    <div class="swiper facilityHeroSwiper h-full w-full">
        <div class="swiper-wrapper">
            
            {{-- SLIDE 1 --}}
            <div class="swiper-slide relative h-full w-full">
                <img src="{{ asset('images/f-4.png') }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#050511] via-[#050511]/20 to-transparent"></div>
                <div class="absolute bottom-20 left-0 right-0 text-center z-20 px-4">
                    <span class="text-[#c5a059] tracking-[0.3em] text-sm font-bold uppercase mb-3 block animate-fadeIn">Fasilitas Unggulan</span>
                    <h1 class="text-4xl md:text-6xl font-bold text-white drop-shadow-2xl">Lab Komputer</h1>
                </div>
            </div>

            {{-- SLIDE 2 --}}
            <div class="swiper-slide relative h-full w-full">
                <img src="{{ asset('images/f-2.png') }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#050511] via-[#050511]/20 to-transparent"></div>
                <div class="absolute bottom-20 left-0 right-0 text-center z-20 px-4">
                    <span class="text-[#c5a059] tracking-[0.3em] text-sm font-bold uppercase mb-3 block">Praktikum</span>
                    <h1 class="text-4xl md:text-6xl font-bold text-white drop-shadow-2xl">Lab Bisnis Digital</h1>
                </div>
            </div>

            {{-- SLIDE 3 --}}
            <div class="swiper-slide relative h-full w-full">
                <img src="{{ asset('images/f-1.png') }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#050511] via-[#050511]/20 to-transparent"></div>
                <div class="absolute bottom-20 left-0 right-0 text-center z-20 px-4">
                    <span class="text-[#c5a059] tracking-[0.3em] text-sm font-bold uppercase mb-3 block">Multimedia</span>
                    <h1 class="text-4xl md:text-6xl font-bold text-white drop-shadow-2xl">Ruang Podcast</h1>
                </div>
            </div>

            {{-- SLIDE 4 --}}
            <div class="swiper-slide relative h-full w-full">
                <img src="{{ asset('images/f-3.png') }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#050511] via-[#050511]/20 to-transparent"></div>
                <div class="absolute bottom-20 left-0 right-0 text-center z-20 px-4">
                    <span class="text-[#c5a059] tracking-[0.3em] text-sm font-bold uppercase mb-3 block">Kelas Pintar</span>
                    <h1 class="text-4xl md:text-6xl font-bold text-white drop-shadow-2xl">Ruang Teori</h1>
                </div>
            </div>

            {{-- SLIDE 5 --}}
            <div class="swiper-slide relative h-full w-full">
                <img src="{{ asset('images/f-5.png') }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#050511] via-[#050511]/20 to-transparent"></div>
                <div class="absolute bottom-20 left-0 right-0 text-center z-20 px-4">
                    <span class="text-[#c5a059] tracking-[0.3em] text-sm font-bold uppercase mb-3 block">Kreativitas</span>
                    <h1 class="text-4xl md:text-6xl font-bold text-white drop-shadow-2xl">Studio Kreatif</h1>
                </div>
            </div>

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
<section class="py-16 px-6 bg-[#050511] text-center relative">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-1 bg-gradient-to-r from-transparent via-[#254E99] to-transparent opacity-50"></div>
    <div class="max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-white">Sarana Pembelajaran <span class="text-[#7C18B6]">Modern</span></h2>
        <p class="text-gray-400 leading-relaxed text-lg">
            Fasilitas lengkap untuk mendukung kreativitas dan inovasi mahasiswa Bisnis Digital.
        </p>
    </div>
</section>

{{-- 3. GALLERY GRID (Fix Gepeng & Navigation) --}}
<section class="pb-24 px-4 max-w-7xl mx-auto bg-[#050511]">
    
    {{-- Baris 1: 3 Kolom --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
        
        {{-- Card 1 --}}
        {{-- Ubah height menjadi h-[450px] agar gambar tidak gepeng --}}
        <div class="group relative rounded-2xl overflow-hidden shadow-lg border border-[#254E99]/30 h-[450px] bg-[#101025]">
            <img src="{{ asset('images/lab-bisnis.jpg') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-90"></div>
            
            <div class="absolute bottom-6 left-0 right-0 text-center px-4">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 rounded-full px-6 py-3 text-white group-hover:bg-[#c5a059] group-hover:text-black transition duration-300 cursor-default">
                    <span>Lab Bisnis Digital</span>
                    <i class="fas fa-desktop"></i>
                </div>
            </div>
        </div>

        {{-- Card 2 --}}
        <div class="group relative rounded-2xl overflow-hidden shadow-lg border border-[#254E99]/30 h-[450px] bg-[#101025]">
            <img src="{{ asset('images/podcast.jpg') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-90"></div>
            
            <div class="absolute bottom-6 left-0 right-0 text-center px-4">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 rounded-full px-6 py-3 text-white group-hover:bg-[#c5a059] group-hover:text-black transition duration-300 cursor-default">
                    <span>Ruang Podcast</span>
                    <i class="fas fa-microphone-alt"></i>
                </div>
            </div>
        </div>

        {{-- Card 3 --}}
        <div class="group relative rounded-2xl overflow-hidden shadow-lg border border-[#254E99]/30 h-[450px] bg-[#101025]">
            <img src="{{ asset('images/kelas.jpg') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-90"></div>
            
            <div class="absolute bottom-6 left-0 right-0 text-center px-4">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 rounded-full px-6 py-3 text-white group-hover:bg-[#c5a059] group-hover:text-black transition duration-300 cursor-default">
                    <span>Ruang Kelas</span>
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Baris 2: 2 Kolom --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
        
        {{-- Card 4 --}}
        <div class="group relative rounded-2xl overflow-hidden shadow-lg border border-[#254E99]/30 h-[450px] bg-[#101025]">
            <img src="{{ asset('images/dosen.jpg') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-90"></div>
            
            <div class="absolute bottom-6 left-0 right-0 text-center px-4">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 rounded-full px-6 py-3 text-white group-hover:bg-[#c5a059] group-hover:text-black transition duration-300 cursor-default">
                    <span>Ruang Dosen</span>
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>

        {{-- Card 5 --}}
        <div class="group relative rounded-2xl overflow-hidden shadow-lg border border-[#254E99]/30 h-[450px] bg-[#101025]">
            <img src="{{ asset('images/studio.jpg') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-90"></div>
            
            <div class="absolute bottom-6 left-0 right-0 text-center px-4">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 rounded-full px-6 py-3 text-white group-hover:bg-[#c5a059] group-hover:text-black transition duration-300 cursor-default">
                    <span>Ruang Studio</span>
                    <i class="fas fa-camera"></i>
                </div>
            </div>
        </div>
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

{{-- INTRO SECTION --}}
<section class="py-16 px-6 bg-[#050511] text-center relative">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-1 bg-gradient-to-r from-transparent via-[#254E99] to-transparent opacity-50"></div>
    <div class="max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-white">Sarana Pembelajaran <span class="text-[#7C18B6]">Modern</span></h2>
        <p class="text-gray-400 leading-relaxed text-lg">
            Program Studi Bisnis Digital menyediakan berbagai fasilitas modern untuk mendukung proses belajar yang kreatif, 
            kolaboratif, dan berbasis teknologi. Setiap ruang dirancang agar mahasiswa dapat mengembangkan kompetensi digital secara optimal.
        </p>
    </div>
</section>

{{-- GALLERY GRID --}}
<section class="pb-24 px-4 max-w-7xl mx-auto bg-[#050511]">
    
    {{-- Row 1 --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        {{-- Card 1 --}}
        <div class="group relative rounded-2xl overflow-hidden shadow-lg border border-[#254E99]/30 h-72 bg-[#101025]">
            <img src="{{ asset('images/lab-bisnis.jpg') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 group-hover:opacity-80">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80"></div>
            
            {{-- Floating Label --}}
            <div class="absolute bottom-4 left-4 right-4">
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl p-3 flex justify-between items-center">
                    <span class="text-white font-semibold">Lab Bisnis Digital</span>
                    <i class="fas fa-laptop-code text-[#4B7BEC]"></i>
                </div>
            </div>
        </div>

        {{-- Card 2 --}}
        <div class="group relative rounded-2xl overflow-hidden shadow-lg border border-[#254E99]/30 h-72 bg-[#101025]">
            <img src="{{ asset('images/podcast.jpg') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 group-hover:opacity-80">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80"></div>
            
            <div class="absolute bottom-4 left-4 right-4">
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl p-3 flex justify-between items-center">
                    <span class="text-white font-semibold">Ruang Podcast</span>
                    <i class="fas fa-microphone-alt text-[#7C18B6]"></i>
                </div>
            </div>
        </div>

        {{-- Card 3 --}}
        <div class="group relative rounded-2xl overflow-hidden shadow-lg border border-[#254E99]/30 h-72 bg-[#101025]">
            <img src="{{ asset('images/kelas.jpg') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 group-hover:opacity-80">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80"></div>
            
            <div class="absolute bottom-4 left-4 right-4">
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl p-3 flex justify-between items-center">
                    <span class="text-white font-semibold">Ruang Kelas Pintar</span>
                    <i class="fas fa-chalkboard-teacher text-[#c5a059]"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Row 2 --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
        {{-- Card 4 --}}
        <div class="group relative rounded-2xl overflow-hidden shadow-lg border border-[#254E99]/30 h-72 bg-[#101025]">
            <img src="{{ asset('images/dosen.jpg') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 group-hover:opacity-80">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80"></div>
            
            <div class="absolute bottom-4 left-4 right-4">
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl p-3 flex justify-between items-center">
                    <span class="text-white font-semibold">Ruang Dosen & Diskusi</span>
                    <i class="fas fa-users text-[#4B7BEC]"></i>
                </div>
            </div>
        </div>

        {{-- Card 5 --}}
        <div class="group relative rounded-2xl overflow-hidden shadow-lg border border-[#254E99]/30 h-72 bg-[#101025]">
            <img src="{{ asset('images/studio.jpg') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 group-hover:opacity-80">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80"></div>
            
            <div class="absolute bottom-4 left-4 right-4">
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl p-3 flex justify-between items-center">
                    <span class="text-white font-semibold">Studio Kreatif</span>
                    <i class="fas fa-camera text-[#c5a059]"></i>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection