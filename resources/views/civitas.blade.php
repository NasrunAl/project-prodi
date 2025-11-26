@extends('layouts.main')

@section('title', 'Civitas - Bisnis Digital')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
@endpush

@section('content')
<div class="bg-[#050511] min-h-screen relative pb-20 overflow-hidden">

    {{-- Background Glow --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[700px] bg-[#2f4c89] opacity-10 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-0 right-10 w-[600px] h-[600px] bg-[#9e7f3b] opacity-10 blur-[150px] rounded-full"></div>
    </div>

{{-- ==================== 1. DOSEN SLIDER ==================== --}}
    <div class="relative z-10 mt-10">
        <div class="w-full py-4 mb-12 border-y border-white/10 bg-[#091428]/60 backdrop-blur-md">
            <h2 class="text-center text-2xl font-bold text-[#c5a059] tracking-wider uppercase">Dosen</h2>
        </div>

        <div class="max-w-6xl mx-auto px-4 mb-20">
            <div class="swiper dosenSwiper py-10">
                <div class="swiper-wrapper">
                    @foreach($dosens as $dosen)
                    <div class="swiper-slide w-64 md:w-72">
                        <div class="flex flex-col items-center group">
                            <h3 class="text-[#c5a059] font-bold text-sm md:text-base mb-4 opacity-0 group-[.swiper-slide-active]:opacity-100 transition duration-300 text-center">
                                {{ $dosen->nama }}
                            </h3>
                            <div class="relative rounded-3xl overflow-hidden border border-[#c5a059]/30 transition-all duration-500 bg-[#0f1a33] h-80 w-full group-[.swiper-slide-active]:scale-105 group-[.swiper-slide-active]:shadow-[0_0_25px_rgba(197,160,89,0.3)]">
                                {{-- PERBAIKAN: Gunakan asset('storage') dan Placeholder Aman --}}
                                <img src="{{ $dosen->foto ? asset('storage/'.$dosen->foto) : 'https://placehold.co/400x400/1e2549/ffffff?text=' . urlencode(strtoupper($dosen->kategori)) }}" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- Panah Navigasi --}}
                <div class="flex justify-center gap-10 mt-10">
                    <button class="dosen-prev w-10 h-10 rounded-full border border-[#c5a059] text-white hover:bg-[#cbaa72] hover:text-black transition flex items-center justify-center"><i class="fas fa-chevron-left"></i></button>
                    <button class="dosen-next w-10 h-10 rounded-full border border-[#c5a059] text-white hover:bg-[#cbaa72] hover:text-black transition flex items-center justify-center"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>

    {{-- ==================== 2. ADMIN ==================== --}}
    @if($admin)
    <div class="relative z-10">
        <div class="w-full py-4 mb-12 border-y border-white/10 bg-[#091428]/60 backdrop-blur-md">
            <h2 class="text-center text-2xl font-bold text-[#c5a059] tracking-wider uppercase">Admin</h2>
        </div>
        <div class="max-w-2xl mx-auto px-4 mb-20 text-center">
            <div class="inline-block relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-b from-red-500 to-pink-600 blur-xl rounded-xl opacity-60"></div>
                <div class="relative w-48 h-48 p-1 rounded-xl bg-gradient-to-b from-red-500 to-pink-600 shadow-xl">
                    {{-- PERBAIKAN: Gunakan asset('storage') dan Placeholder Aman --}}
                    <img src="{{ $admin->foto ? asset('storage/'.$admin->foto) : 'https://placehold.co/400x400/DC2626/ffffff?text=ADMIN' }}" class="w-full h-full object-cover rounded-lg border-2 border-white/20">
                </div>
            </div>
            <h3 class="text-xl text-[#c5a059] font-bold">{{ $admin->nama }}</h3>
            <p class="mt-4 text-gray-300 text-sm">{{ $admin->jabatan }} - NIP. {{ $admin->nip }}</p> 
        </div>
    </div>
    @endif

    {{-- ==================== 3. TEKNISI ==================== --}}
    <div class="relative z-10 max-w-5xl mx-auto px-6 mb-10">
        <div class="w-full py-4 mb-12 border-y border-white/10 bg-[#091428]/60 backdrop-blur-md">
            <h2 class="text-center text-2xl font-bold text-[#c5a059] tracking-wider uppercase">Teknisi</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($teknisis as $teknisi)
            <div class="bg-[#0e1630]/40 border border-[#c5a059]/30 rounded-2xl p-4 flex flex-col items-center transition hover:-translate-y-2 hover:shadow-[0_0_20px_rgba(197,160,89,0.2)] h-[330px]">
                <div class="w-full h-56 rounded-xl overflow-hidden mb-4 relative">
                    {{-- Variasi warna background (untuk fallback) --}}
                    <div class="absolute inset-0 {{ $loop->iteration % 2 == 0 ? 'bg-blue-600' : 'bg-red-600' }}"></div>
                    {{-- PERBAIKAN: Gunakan asset('storage') dan Placeholder Aman --}}
                    <img src="{{ $teknisi->foto ? asset('storage/'.$teknisi->foto) : 'https://placehold.co/400x400/' . ($loop->iteration % 2 == 0 ? '254E99' : '99254E') . '/ffffff?text=TEKNISI' }}" class="relative w-full h-full object-cover z-10 object-top">
                </div>
                <h3 class="text-[#c5a059] font-bold text-sm">{{ $teknisi->nama }}</h3>
                <p class="text-gray-400 text-xs mt-1">{{ $teknisi->jabatan }}</p>
            </div>
            @endforeach
        </div>

        {{-- TOMBOL SELENGKAPNYA --}}
        <div class="flex justify-end mt-12">
            <a href="{{ url('/civitas/lengkap') }}" class="bg-[#1e2549] hover:bg-[#254E99] text-white px-6 py-2 rounded-full text-sm font-semibold flex items-center gap-2 transition-all duration-300 border border-white/10 shadow-lg">
                Selengkapnya <i class="fas fa-caret-right ml-1"></i>
            </a>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    new Swiper(".dosenSwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        initialSlide: 1,
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 150,
            modifier: 1.4,
            slideShadows: false,
        },
        navigation: {
            nextEl: ".dosen-next",
            prevEl: ".dosen-prev",
        },
        loop: true,
    });
});
</script>
@endpush