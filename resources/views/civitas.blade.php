@extends('layouts.main')

@section('title', 'Civitas - Bisnis Digital')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

<style>
/* Elegant Gold Royal Style */
.gold-gradient {
    background: linear-gradient(135deg, #cbaa72, #e7d3a3);
}
.gold-text {
    background: linear-gradient(90deg, #d8c089, #f5e4b8);
    -webkit-background-clip: text;
    color: transparent;
}
.soft-gold-border {
    border: 1px solid rgba(250, 220, 150, 0.5);
}
.soft-gold-glow {
    box-shadow: 0 0 25px rgba(255, 215, 140, 0.12);
}
.section-header {
    position: relative;
}
.section-header::before,
.section-header::after {
    content: "";
    position: absolute;
    top: 50%;
    width: 120px;
    height: 1px;
    background: linear-gradient(to right, transparent, rgba(250, 220, 150, 0.4));
}
.section-header::before { left: 0; }
.section-header::after { right: 0; }

/* Smooth fade animation */
.fade-up {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeUp 0.8s ease forwards;
}
@keyframes fadeUp {
    to { opacity: 1; transform: translateY(0); }
}

/* Subtle floating effect */
.float-soft {
    animation: floatSoft 4s ease-in-out infinite;
}
@keyframes floatSoft {
    0%,100% { transform: translateY(0); }
    50% { transform: translateY(-6px); }
}

/* Royal card hover */
.royal-hover:hover {
    transform: translateY(-6px);
    box-shadow: 0 0 40px rgba(255, 215, 150, 0.18);
    border-color: rgba(255, 215, 150, 0.6);
}
</style>
@endpush

@section('content')

<div class="bg-[#050511] min-h-screen relative pb-20 overflow-hidden">

    {{-- Royal Background Glow --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[700px] bg-[#2f4c89] opacity-10 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-0 right-10 w-[600px] h-[600px] bg-[#9e7f3b] opacity-10 blur-[150px] rounded-full"></div>
    </div>

    {{-- ==================== SECTION 1: DOSEN ==================== --}}
    <div class="relative z-10 fade-up">

        <div class="w-full py-4 mt-10 mb-12 border-y border-white/10 bg-[#091428]/60 backdrop-blur-md">
            <h2 class="text-center text-2xl font-bold gold-text tracking-wider uppercase section-header">Dosen</h2>
        </div>

        <div class="max-w-6xl mx-auto px-4 mb-20">

            <div class="swiper dosenSwiper py-10">

                <div class="swiper-wrapper">

                    @foreach([
                        ['name'=>'Lukman Hakim, S.KOM., M.KOM','img'=>'dosen1.jpg'],
                        ['name'=>'Rizky Aditya, S.A.B., M.M','img'=>'dosen2.jpg'],
                        ['name'=>"Mas'ud Hermansyah, S.KOM",'img'=>'dosen3.jpg'],
                        ['name'=>'Imam Abrori, S.E., M.M','img'=>'dosen4.jpg'],
                        ['name'=>'Eka Yuniar, S.Kom, MMSI','img'=>'dosen5.jpg'],
                    ] as $dosen)

                    <div class="swiper-slide w-64 md:w-72">
                        <div class="flex flex-col items-center">
                            
                            <h3 class="gold-text font-bold text-sm md:text-base mb-4 opacity-0 swiper-slide-active:opacity-100 transition duration-300 text-center">
                                {{ $dosen['name'] }}
                            </h3>

                            <div class="relative rounded-3xl overflow-hidden soft-gold-border soft-gold-glow transition-all duration-500 bg-[#0f1a33] h-80 w-full royal-hover">
                                <img src="{{ asset('images/'.$dosen['img']) }}" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>

                {{-- Arrows --}}
                <div class="flex justify-center gap-10 mt-10">
                    <button class="dosen-prev w-10 h-10 rounded-full soft-gold-border text-white hover:bg-[#cbaa72] hover:text-black transition">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="dosen-next w-10 h-10 rounded-full soft-gold-border text-white hover:bg-[#cbaa72] hover:text-black transition">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>

    {{-- ==================== SECTION 2: ADMIN ==================== --}}
    <div class="w-full py-4 mb-12 border-y border-white/10 bg-[#091428]/60 backdrop-blur-md relative z-10 fade-up">
        <h2 class="text-center text-2xl font-bold gold-text tracking-wider uppercase section-header">Admin</h2>
    </div>

    <div class="relative z-10 max-w-2xl mx-auto px-4 mb-20 text-center fade-up">

        <div class="inline-block relative mb-6 float-soft">
            <div class="absolute inset-0 bg-gradient-to-b from-[#cbaa72]/40 to-[#e7d3a3]/40 blur-xl rounded-xl opacity-60"></div>

            <div class="relative w-48 h-48 p-1 rounded-xl gold-gradient shadow-xl soft-gold-glow">
                <img src="{{ asset('images/admin.jpg') }}" class="w-full h-full object-cover rounded-lg">
            </div>
        </div>

        <h3 class="text-xl gold-text font-bold">Ahmad Marzuq, S.Sos</h3>
        <p class="mt-4 text-gray-300 text-sm">Lab komputer dilengkapi perangkat dan software terkini untuk pembelajaran bisnis digital.</p>
    </div>

    {{-- ==================== SECTION 3: TEKNISI ==================== --}}
    <div class="w-full py-4 mb-12 border-y border-white/10 bg-[#091428]/60 backdrop-blur-md relative z-10 fade-up">
        <h2 class="text-center text-2xl font-bold gold-text tracking-wider uppercase section-header">Teknisi</h2>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 mb-10 fade-up">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            @foreach([
                ['name'=>'Istik Lailiyah, S.Kom','img'=>'teknisi1.jpg'],
                ['name'=>'Arif Indar H, A.Md','img'=>'teknisi2.jpg'],
                ['name'=>'M Syafiq, A.Md','img'=>'teknisi3.jpg'],
            ] as $t)

            <div class="bg-[#0e1630]/40 soft-gold-border rounded-2xl p-4 flex flex-col items-center transition royal-hover soft-gold-glow h-[330px]">
                <div class="w-full h-56 rounded-xl overflow-hidden mb-4 relative">
                    <div class="absolute inset-0 bg-[#cbaa72]/20"></div>
                    <img src="{{ asset('images/'.$t['img']) }}" class="relative w-full h-full object-cover z-10">
                </div>
                <h3 class="gold-text font-bold text-sm">{{ $t['name'] }}</h3>
            </div>

            @endforeach
        </div>

{{-- Tombol Selengkapnya --}}
<div class="flex justify-end mt-8">
    {{-- Perhatikan bagian href="{{ url('/civitas/lengkap') }}" --}}
    <a href="{{ url('/civitas/lengkap') }}" class="bg-[#1e2549] hover:bg-[#254E99] text-white px-6 py-2 rounded-full text-sm font-semibold flex items-center gap-2 transition-all duration-300 border border-white/10 shadow-lg hover:shadow-[#254E99]/50">
        Selengkapnya <i class="fas fa-caret-right ml-1"></i>
    </a>
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
