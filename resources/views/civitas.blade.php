@extends('layouts.main')

@section('title', 'Civitas - Bisnis Digital')

@push('styles')
{{-- Tidak ada CSS tambahan yang diperlukan di sini. --}}
@endpush

@section('content')
<div class="bg-[#00092D] min-h-screen relative pb-20 overflow-hidden">

    {{-- Background Glow --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[700px] bg-[#2f4c89] opacity-10 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-0 right-10 w-[600px] h-[600px] bg-[#9e7f3b] opacity-10 blur-[150px] rounded-full"></div>
    </div>

{{-- ==================== 0. KOORDINATOR PROGRAM STUDI (KINI COLLAPSIBLE) ==================== --}}
@if(isset($koordinators) && $koordinators->count() > 0)
    <div class="relative z-10 mt-10">
        <div class="w-full py-6 mb-16 border-y-2 border-white/15 bg-[#00092D]/60 backdrop-blur-md">
            <h2 class="text-center text-3xl font-bold text-[#c5a059] tracking-wider uppercase drop-shadow-lg">Koordinator Program Studi</h2>
        </div>

        <div class="max-w-7xl mx-auto px-4 mb-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($koordinators as $koordinator)
                <div class="bg-[#0e1630] border-2 border-[#c5a059]/80 rounded-2xl overflow-hidden shadow-[0_0_20px_rgba(197,160,89,0.2)] transition hover:-translate-y-1 hover:shadow-[0_0_40px_rgba(197,160,89,0.4)] duration-300 transform flex flex-col items-center" x-data="{ open: true }">

                    {{-- Kontainer Foto & Informasi Singkat --}}
                    <div class="w-full overflow-hidden relative aspect-[4/5] max-h-[400px] bg-[#00092D]">
                        <img src="{{ $koordinator->foto ? asset('storage/'.$koordinator->foto) : 'https://placehold.co/400x500/2d5a8c/ffffff?text=KOORDINATOR' }}"
                             class="w-full h-full object-contain" style="filter: drop-shadow(0 0 5px rgba(0,0,0,0.5));">
                    </div>

                    <div class="text-center p-4">
                        <h3 class="text-xl text-white font-bold">{{ $koordinator->nama }}</h3>
                    </div>

                    {{-- Tombol Selengkapnya (Fungsional) --}}
                    <button @click="open = !open" class="inline-flex items-center gap-2 px-6 py-2 rounded-full bg-[#c5a059] text-[#00092D] font-semibold hover:bg-[#a78048] transition transform focus:outline-none focus:ring-4 focus:ring-[#c5a059]/50">
                        Selengkapnya <i class="fas fa-caret-down ml-1 transition-transform duration-300" :class="{ 'rotate-180': open }"></i>
                    </button>

                    {{-- DROP DOWN DETAIL BARU --}}
                    <div x-show="open" x-collapse.duration.500ms class="w-full mt-4 px-4 pb-6">
                        <div class="p-4 bg-[#00102a] border-2 border-[#c5a059] rounded-xl shadow-[0_8px_30px_rgba(197,160,89,0.12)] text-left">
                            
                            {{-- BAGIAN NIP --}}
                            @if(isset($koordinator->nip))
                            <div class="py-2">
                                <span class="text-xl font-bold text-white">
                                    <span class="bg-[#c5a059] text-[#00092D] px-2 py-1 mr-3 rounded-md text-base">NIP</span> 
                                    {{ $koordinator->nip }}
                                </span>
                            </div>
                            @endif

                            <hr class="border-white/10 my-3">

                            {{-- BAGIAN JABATAN --}}
                            @if(!empty($koordinator->jabatan))
                            <div class="py-2">
                                <span class="text-xl font-bold text-white">
                                    <span class="text-[#c5a059] mr-3">Jabatan:</span> 
                                    {{ $koordinator->jabatan }}
                                </span>
                            </div>
                            @endif
                            
                            {{-- Info Kontak dan Lain-lain (Jika ada) --}}
                            @if(!empty($koordinator->email) || !empty($koordinator->telepon) || !empty($koordinator->pendidikan) || !empty($koordinator->research) || !empty($koordinator->deskripsi))
                            <hr class="border-white/10 my-3">
                            <div class="text-sm text-gray-200 space-y-2">
                                @if(!empty($koordinator->pendidikan))<div><strong class="text-[#c5a059]">Pendidikan:</strong> <span class="text-base">{{ $koordinator->pendidikan }}</span></div>@endif
                                @if(!empty($koordinator->research))<div><strong class="text-[#c5a059]">Research:</strong> <span class="text-base">{{ $koordinator->research }}</span></div>@endif
                                @if(!empty($koordinator->deskripsi))<div><strong class="text-[#c5a059]">Profil:</strong> <span class="text-base">{{ $koordinator->deskripsi }}</span></div>@endif
                            </div>
                            <div class="flex justify-center gap-4 text-sm text-gray-400 mt-3">
                                @if(!empty($koordinator->email))
                                <a href="mailto:{{ $koordinator->email }}" class="hover:text-[#c5a059] transition flex items-center gap-1"><i class="far fa-envelope"></i> Email</a>
                                @endif
                                @if(!empty($koordinator->telepon))
                                <a href="tel:{{ $koordinator->telepon }}" class="hover:text-[#c5a059] transition flex items-center gap-1"><i class="fas fa-phone-alt"></i> Telepon</a>
                                @endif
                            </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endif


{{-- ==================== 1. DOSEN (DESAIN SAMA + FUNGSI BUKA/TUTUP) ==================== --}}
@if(isset($dosens) && $dosens->count() > 0)
    <div class="relative z-10 mt-10">
        <div class="w-full py-6 mb-16 border-y-2 border-white/15 bg-[#00092D]/60 backdrop-blur-md">
            <h2 class="text-center text-3xl font-bold text-[#c5a059] tracking-wider uppercase drop-shadow-lg">Dosen</h2>
        </div>

        <div class="max-w-7xl mx-auto px-4 mb-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($dosens as $dosen)
                <div class="bg-[#0e1630] border-2 border-[#c5a059]/80 rounded-2xl overflow-hidden shadow-[0_0_20px_rgba(197,160,89,0.2)] transition hover:-translate-y-1 hover:shadow-[0_0_40px_rgba(197,160,89,0.4)] duration-300 transform flex flex-col items-center" x-data="{ open: false }">

                    {{-- Kontainer Foto & Informasi Singkat --}}
                    <div class="w-full overflow-hidden relative aspect-[4/5] max-h-[400px] bg-[#00092D]">
                        <img src="{{ $dosen->foto ? asset('storage/'.$dosen->foto) : 'https://placehold.co/400x500/1e2549/ffffff?text=' . urlencode(strtoupper($dosen->kategori ?? 'DOSEN')) }}"
                             class="w-full h-full object-contain" style="filter: drop-shadow(0 0 5px rgba(0,0,0,0.5));">
                    </div>

                    <div class="text-center p-4">
                        <h3 class="text-xl text-white font-bold">{{ $dosen->nama }}</h3>
                    </div>

                    {{-- Tombol Selengkapnya (Tombol Fungsional Collapsible) --}}
                    <button @click="open = !open" class="inline-flex items-center gap-2 px-6 py-2 rounded-full bg-[#c5a059] text-[#00092D] font-semibold hover:bg-[#a78048] transition transform focus:outline-none focus:ring-4 focus:ring-[#c5a059]/50">
                        Selengkapnya <i class="fas fa-caret-down ml-1 transition-transform duration-300" :class="{ 'rotate-180': open }"></i>
                    </button>

                    {{-- DROP DOWN DETAIL BARU --}}
                    <div x-show="open" x-collapse.duration.500ms class="w-full mt-4 px-4 pb-6">
                        <div class="p-4 bg-[#00102a]/80 border-2 border-[#c5a059] rounded-xl shadow-[0_8px_30px_rgba(197,160,89,0.12)] text-left">
                            
                            {{-- BAGIAN NIP --}}
                            @if(isset($dosen->nip))
                            <div class="py-2">
                                <span class="text-xl font-bold text-white">
                                    <span class="bg-[#c5a059] text-[#00092D] px-2 py-1 mr-3 rounded-md text-base">NIP</span> 
                                    {{ $dosen->nip }}
                                </span>
                            </div>
                            @endif

                            <hr class="border-white/10 my-3">

                            {{-- BAGIAN JABATAN --}}
                            @if(!empty($dosen->jabatan))
                            <div class="py-2">
                                <span class="text-xl font-bold text-white">
                                    <span class="text-[#c5a059] mr-3">Jabatan:</span> 
                                    {{ $dosen->jabatan }}
                                </span>
                            </div>
                            @endif
                            
                            {{-- Info Kontak dan Lain-lain --}}
                            <hr class="border-white/10 my-3">
                            <div class="text-sm text-gray-200 space-y-2">
                                @if(!empty($dosen->pendidikan))<div><strong class="text-[#c5a059]">Pendidikan:</strong> <span class="text-base">{{ $dosen->pendidikan }}</span></div>@endif
                                @if(!empty($dosen->research))<div><strong class="text-[#c5a059]">Research:</strong> <span class="text-base">{{ $dosen->research }}</span></div>@endif
                                @if(!empty($dosen->deskripsi))<div><strong class="text-[#c5a059]">Profil:</strong> <span class="text-base">{{ $dosen->deskripsi }}</span></div>@endif
                            </div>
                            <div class="flex justify-center gap-4 text-sm text-gray-400 mt-3">
                                @if(!empty($dosen->email))
                                <a href="mailto:{{ $dosen->email }}" class="hover:text-[#c5a059] transition flex items-center gap-1"><i class="far fa-envelope"></i> Email</a>
                                @endif
                                @if(!empty($dosen->telepon))
                                <a href="tel:{{ $dosen->telepon }}" class="hover:text-[#c5a059] transition flex items-center gap-1"><i class="fas fa-phone-alt"></i> Telepon</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endif


{{-- ==================== 2. STAFF & KARYAWAN (DESAIN SAMA + FUNGSI BUKA/TUTUP) ==================== --}}
@if((isset($admins) && $admins->count() > 0) || (isset($teknisis) && $teknisis->count() > 0))
    <div class="relative z-10">
        <div class="w-full py-6 mb-16 border-y-2 border-white/15 bg-[#00092D]/60 backdrop-blur-md">
            <h2 class="text-center text-3xl font-bold text-[#c5a059] tracking-wider uppercase drop-shadow-lg">Staff & Karyawan</h2>
        </div>

        <div class="max-w-7xl mx-auto px-4 mb-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Admin Staff --}}
                @foreach($admins as $admin)
                <div class="bg-[#0e1630] border-2 border-[#c5a059]/80 rounded-2xl overflow-hidden shadow-[0_0_20px_rgba(197,160,89,0.2)] transition hover:-translate-y-1 hover:shadow-[0_0_40px_rgba(197,160,89,0.4)] duration-300 transform flex flex-col items-center" x-data="{ open: false }">

                    {{-- Kontainer Foto & Informasi Singkat --}}
                    <div class="w-full overflow-hidden relative aspect-[4/5] max-h-[400px] bg-[#00092D]">
                        <img src="{{ $admin->foto ? asset('storage/'.$admin->foto) : 'https://placehold.co/400x500/DC2626/ffffff?text=ADMIN' }}"
                             class="w-full h-full object-contain" style="filter: drop-shadow(0 0 5px rgba(0,0,0,0.5));">
                    </div>

                    <div class="text-center p-4">
                        <h3 class="text-xl text-white font-bold">{{ $admin->nama }}</h3>
                        <p class="text-base text-[#c5a059] mt-1 font-semibold">{{ $admin->jabatan ?? 'Staf Admin' }}</p>
                    </div>

                    {{-- Tombol Selengkapnya (Tombol Fungsional Collapsible) --}}
                    <button @click="open = !open" class="inline-flex items-center gap-2 px-6 py-2 rounded-full bg-[#c5a059] text-[#00092D] font-semibold hover:bg-[#a78048] transition transform focus:outline-none focus:ring-4 focus:ring-[#c5a059]/50">
                        Selengkapnya <i class="fas fa-caret-down ml-1 transition-transform duration-300" :class="{ 'rotate-180': open }"></i>
                    </button>

                    {{-- DROP DOWN DETAIL BARU --}}
                    <div x-show="open" x-collapse.duration.500ms class="w-full mt-4 px-4 pb-6">
                        <div class="p-4 bg-[#00102a]/80 border-2 border-[#c5a059] rounded-xl shadow-[0_8px_30px_rgba(197,160,89,0.12)] text-left">

                            {{-- BAGIAN NIP --}}
                            @if(isset($admin->nip))
                            <div class="py-2">
                                <span class="text-xl font-bold text-white">
                                    <span class="bg-[#c5a059] text-[#00092D] px-2 py-1 mr-3 rounded-md text-base">NIP</span> 
                                    {{ $admin->nip }}
                                </span>
                            </div>
                            @endif

                            <hr class="border-white/10 my-3">

                            {{-- BAGIAN JABATAN --}}
                            @if(!empty($admin->jabatan))
                            <div class="py-2">
                                <span class="text-xl font-bold text-white">
                                    <span class="text-[#c5a059] mr-3">Jabatan:</span> 
                                    {{ $admin->jabatan }}
                                </span>
                            </div>
                            @endif
                            
                            {{-- Info Kontak dan Lain-lain --}}
                            <hr class="border-white/10 my-3">
                            <div class="text-sm text-gray-200 space-y-2">
                                @if(!empty($admin->deskripsi))<div><strong class="text-[#c5a059]">Deskripsi:</strong> <span class="text-base">{{ $admin->deskripsi }}</span></div>@endif
                            </div>
                            <div class="flex justify-center gap-4 text-sm text-gray-400 mt-3">
                                @if(!empty($admin->email))
                                <a href="mailto:{{ $admin->email }}" class="hover:text-[#c5a059] transition flex items-center gap-1"><i class="far fa-envelope"></i> Email</a>
                                @endif
                                @if(!empty($admin->telepon))
                                <a href="tel:{{ $admin->telepon }}" class="hover:text-[#c5a059] transition flex items-center gap-1"><i class="fas fa-phone-alt"></i> Telepon</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- Teknisi Staff --}}
                @foreach($teknisis as $teknisi)
                <div class="bg-[#0e1630] border-2 border-[#c5a059]/80 rounded-2xl overflow-hidden shadow-[0_0_20px_rgba(197,160,89,0.2)] transition hover:-translate-y-1 hover:shadow-[0_0_40px_rgba(197,160,89,0.4)] duration-300 transform flex flex-col items-center" x-data="{ open: false }">

                    {{-- Kontainer Foto & Informasi Singkat --}}
                    <div class="w-full overflow-hidden relative aspect-[4/5] max-h-[400px] bg-[#00092D]">
                        <img src="{{ $teknisi->foto ? asset('storage/'.$teknisi->foto) : 'https://placehold.co/400x500/' . ($loop->iteration % 2 == 0 ? '254E99' : '99254E') . '/ffffff?text=TEKNISI' }}"
                             class="w-full h-full object-contain" style="filter: drop-shadow(0 0 5px rgba(0,0,0,0.5));">
                    </div>

                    <div class="text-center p-4">
                        <h3 class="text-xl text-white font-bold">{{ $teknisi->nama }}</h3>
                        <p class="text-base text-[#c5a059] mt-1 font-semibold">{{ $teknisi->jabatan ?? 'Teknisi' }}</p>
                    </div>

                    {{-- Tombol Selengkapnya (Tombol Fungsional Collapsible) --}}
                    <button @click="open = !open" class="inline-flex items-center gap-2 px-6 py-2 rounded-full bg-[#c5a059] text-[#00092D] font-semibold hover:bg-[#a78048] transition transform focus:outline-none focus:ring-4 focus:ring-[#c5a059]/50">
                        Selengkapnya <i class="fas fa-caret-down ml-1 transition-transform duration-300" :class="{ 'rotate-180': open }"></i>
                    </button>

                    {{-- DROP DOWN DETAIL BARU --}}
                    <div x-show="open" x-collapse.duration.500ms class="w-full mt-4 px-4 pb-6">
                        <div class="p-4 bg-[#00102a]/80 border-2 border-[#c5a059] rounded-xl shadow-[0_8px_30px_rgba(197,160,89,0.12)] text-left">

                            {{-- BAGIAN NIP --}}
                            @if(isset($teknisi->nip))
                            <div class="py-2">
                                <span class="text-xl font-bold text-white">
                                    <span class="bg-[#c5a059] text-[#00092D] px-2 py-1 mr-3 rounded-md text-base">NIP</span> 
                                    {{ $teknisi->nip }}
                                </span>
                            </div>
                            @endif

                            <hr class="border-white/10 my-3">

                            {{-- BAGIAN JABATAN --}}
                            @if(!empty($teknisi->jabatan))
                            <div class="py-2">
                                <span class="text-xl font-bold text-white">
                                    <span class="text-[#c5a059] mr-3">Jabatan:</span> 
                                    {{ $teknisi->jabatan }}
                                </span>
                            </div>
                            @endif
                            
                            {{-- Info Kontak dan Lain-lain --}}
                            <hr class="border-white/10 my-3">
                            <div class="text-sm text-gray-200 space-y-2">
                                @if(!empty($teknisi->deskripsi))<div><strong class="text-[#c5a059]">Deskripsi:</strong> <span class="text-base">{{ $teknisi->deskripsi }}</span></div>@endif
                            </div>
                            <div class="flex justify-center gap-4 text-sm text-gray-400 mt-3">
                                @if(!empty($teknisi->email))
                                <a href="mailto:{{ $teknisi->email }}" class="hover:text-[#c5a059] transition flex items-center gap-1"><i class="far fa-envelope"></i> Email</a>
                                @endif
                                @if(!empty($teknisi->telepon))
                                <a href="tel:{{ $teknisi->telepon }}" class="hover:text-[#c5a059] transition flex items-center gap-1"><i class="fas fa-phone-alt"></i> Telepon</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Inisialisasi Swiper (Jika masih digunakan)
    if (document.querySelector(".dosenSwiper")) {
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
    }
});
</script>
@endpush