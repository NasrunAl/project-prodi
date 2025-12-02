@extends('layouts.main')

@section('content')
    {{-- Pustaka CSS untuk slider Swiper.js --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        /* Kustomisasi untuk indikator paginasi Swiper */
        .swiper-pagination-bullet { background-color: #4B7BEC; opacity: 0.4; }
        .swiper-pagination-bullet-active { background-color: #7C18B6 !important; opacity: 1; width: 25px; border-radius: 5px; transition: all 0.3s; }
        
        /* Kustomisasi scrollbar (jika diperlukan untuk modal atau elemen lain) */
        .custom-scrollbar::-webkit-scrollbar { width: 8px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #00092D; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #7C18B6; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #4B7BEC; }
    </style>

    {{-- HERO SECTION: Bagian pembuka halaman yang memenuhi seluruh layar --}}
    <section class="relative h-screen flex items-center justify-center overflow-hidden -mt-24">
        {{-- Latar belakang dengan gambar dan gradient overlay --}}
        <div class="absolute inset-0 z-0 pt-24">
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('images/kampus-bg.jpg') }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-[#00092D]/60 to-[#00092D]"></div>
        </div>

        {{-- Konten di atas latar belakang (teks dan logo) --}}
        <div class="relative z-10 px-6 max-w-6xl mx-auto flex items-center justify-between gap-12">
            <div class="text-left font-[Times New Roman] flex-1"> {{-- flex-1 membuat elemen ini mengambil sisa ruang --}}
                <h2 class="text-lg tracking-[0.3em] mb-4 text-[#c5a059] font-semibold uppercase">Program Studi</h2>
                <h1 id="typingText" class="text-7xl md:text-8xl font-bold text-white mb-6 leading-tight drop-shadow-lg"></h1>
                <h3 class="text-2xl font-semibold text-gray-100 mb-2">Politeknik Negeri Jember</h3>
                <p class="text-base text-gray-300 tracking-wider">Kampus 2 Bondowoso</p>
            </div>
            <div>
                <img src="{{ asset('images/logo-bsd.png') }}" class="w-64">
            </div>
        </div>
    </section>

{{-- SLIDER PROFIL / VISI MISI / TUJUAN: Dibuat dengan Alpine.js untuk interaktivitas --}}
<section class="py-24 bg-[#00092D] relative overflow-hidden"
    x-data="{ {{-- Inisialisasi state Alpine.js --}}
        slide: 0,
        slides: 3, // Jumlah total slide
        auto() { setInterval(() => { this.slide = (this.slide + 1) % this.slides; }, 6000); }
    }"
    x-init="auto()">

    {{-- Background Elements (Glow Hiasan di Belakang) --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-[#254E99] opacity-20 blur-[120px] rounded-full pointer-events-none"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-[#7C18B6] opacity-10 blur-[100px] rounded-full pointer-events-none"></div>

    <div class="max-w-5xl mx-auto px-6 relative z-10">

        {{-- Container Utama dengan Efek Glassmorphism (latar belakang transparan blur) --}}
        <div class="bg-[#00092D]/60 backdrop-blur-xl border border-[#254E99]/30 rounded-3xl shadow-2xl overflow-hidden relative">
            
            {{-- Dekorasi Garis Atas --}}
            <div class="h-1 w-full bg-gradient-to-r from-transparent via-[#7C18B6] to-transparent opacity-70"></div>

            <div class="py-16 px-4 md:px-12">

                {{-- WRAPPER SLIDER --}}
                <div class="overflow-hidden">
                    <div class="flex transition-transform duration-700 ease-in-out" 
                         :style="'transform: translateX(-' + (slide * 100) + '%)'">

                        {{-- SLIDE 1: PROFIL --}}
                        <div class="min-w-full px-4 flex flex-col items-center text-center">
                            <div class="mb-8 relative group"> {{-- 'group' untuk efek hover pada elemen anak --}}
                                <div class="absolute inset-0 bg-[#c5a059] blur-xl opacity-40 group-hover:opacity-60 transition duration-500 rounded-full"></div>
                                <div class="relative w-32 h-32 bg-[#00092D] border-3 border-[#c5a059] rounded-full flex items-center justify-center shadow-[0_0_40px_rgba(197,160,89,0.3)]">
                                    <img src="{{ asset('images/logo-bsd.png') }}" alt="Logo" class="w-16 object-contain">
                                </div>
                            </div>
                            
                            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-white via-[#c5a059] to-white">
                                Profil Prodi
                            </h2>
                            
                            <p class="leading-relaxed text-gray-300 text-lg max-w-3xl mx-auto">
                                "Program Studi Sarjana Terapan Bisnis Digital hadir sebagai jawaban atas tantangan era revolusi industri 4.0. 
                                Kami berkomitmen mencetak talenta digital yang tidak hanya paham teknologi, tetapi juga memiliki ketajaman bisnis 
                                yang mumpuni untuk bersaing di kancah global."
                            </p>
                        </div>

                        {{-- SLIDE 2: VISI & MISI --}}
                        <div class="min-w-full px-4 flex flex-col items-center">
                             <div class="mb-8 relative group">
                                <div class="absolute inset-0 bg-[#7C18B6] blur-xl opacity-40 group-hover:opacity-60 transition duration-500 rounded-full"></div>
                                <div class="relative w-32 h-32 bg-[#00092D] border-3 border-[#7C18B6] rounded-full flex items-center justify-center shadow-[0_0_40px_rgba(124,24,182,0.4)]">
                                    <img src="{{ asset('images/logo-bsd.png') }}" alt="Logo" class="w-16 object-contain">
                                </div>
                            </div>

                            <h2 class="text-4xl md:text-5xl font-bold mb-8 text-white">Visi & Misi</h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full max-w-4xl text-left">
                                <div class="bg-[#00092D] p-7 rounded-2xl border border-[#254E99]/50 hover:border-[#7C18B6] transition duration-300 hover:shadow-[0_0_20px_rgba(124,24,182,0.1)] hover:scale-105 transform">
                                    <h3 class="text-xl font-bold text-[#c5a059] mb-3 border-b border-gray-700 pb-2">Visi</h3>
                                    <p class="text-gray-300 italic">
                                        "Menjadi program studi unggul dalam pengembangan bisnis digital yang inovatif, adaptif, dan berdaya saing internasional pada tahun 2030."
                                    </p>
                                </div>

                                <div class="bg-[#00092D] p-7 rounded-2xl border border-[#254E99]/50 hover:border-[#7C18B6] transition duration-300 hover:shadow-[0_0_20px_rgba(124,24,182,0.1)] hover:scale-105 transform">
                                    <h3 class="text-xl font-bold text-[#c5a059] mb-4 border-b border-gray-700 pb-3">Misi</h3>
                                    <ul class="space-y-2 text-gray-300 text-sm">
                                        <li class="flex items-start gap-2">
                                            <i class="fas fa-check-circle text-[#7C18B6] mt-1"></i>
                                            <span>Menyelenggarakan pendidikan vokasi berkualitas.</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <i class="fas fa-check-circle text-[#7C18B6] mt-1"></i>
                                            <span>Mengembangkan riset terapan bidang bisnis digital.</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <i class="fas fa-check-circle text-[#7C18B6] mt-1"></i>
                                            <span>Membangun kemitraan strategis dengan industri.</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- SLIDE 3: TUJUAN --}}
                        <div class="min-w-full px-4 flex flex-col items-center text-center">
                             <div class="mb-8 relative group">
                                <div class="absolute inset-0 bg-[#4B7BEC] blur-xl opacity-40 group-hover:opacity-60 transition duration-500 rounded-full"></div>
                                <div class="relative w-28 h-28 bg-[#0a1a33] border-2 border-[#4B7BEC] rounded-full flex items-center justify-center shadow-[0_0_30px_rgba(75,123,236,0.3)]">
                                    <img src="{{ asset('images/logo-bsd.png') }}" alt="Logo" class="w-16 object-contain">
                                </div>
                            </div>

                            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white">Tujuan Kami</h2>
                            
                            <div class="max-w-3xl mx-auto space-y-4">
                                <p class="leading-relaxed text-gray-300 text-lg">
                                    Melahirkan **Digital Entrepreneur** yang tangguh dan etis, serta tenaga profesional yang mampu merancang strategi bisnis berbasis data.
                                </p>
                                <div class="flex flex-wrap justify-center gap-4 mt-6">
                                    <span class="px-4 py-2 rounded-full bg-[#254E99]/20 border border-[#254E99] text-[#4B7BEC] text-sm font-semibold">Profesional</span>
                                    <span class="px-4 py-2 rounded-full bg-[#7C18B6]/20 border border-[#7C18B6] text-[#a78bfa] text-sm font-semibold">Inovatif</span>
                                    <span class="px-4 py-2 rounded-full bg-[#c5a059]/20 border border-[#c5a059] text-[#c5a059] text-sm font-semibold">Global Mindset</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Navigation Dots (Indikator) --}}
                <div class="flex justify-center mt-12 space-x-3">
                    <template x-for="i in slides">
                        <button @click="slide = i - 1"  {{-- Tombol untuk pindah slide --}}
                            class="h-2 rounded-full transition-all duration-500 ease-out"
                            :class="slide === (i - 1) ? 'w-12 bg-[#c5a059] shadow-[0_0_10px_#c5a059]' : 'w-2 bg-gray-600 hover:bg-gray-400'">
                        </button>
                    </template>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- AKREDITASI SECTION: Menampilkan informasi akreditasi dengan desain menarik --}}
<section class="py-24 bg-[#00092D] relative overflow-hidden">
    
    {{-- Background Glow (Emas Samar di Kiri, Biru di Kanan) --}}
    <div class="absolute top-1/2 left-0 -translate-y-1/2 w-96 h-96 bg-[#c5a059] opacity-10 blur-[150px] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-[#254E99] opacity-10 blur-[150px] rounded-full pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center gap-16 relative z-10">

        {{-- BAGIAN KIRI: Tampilan Sertifikat --}}
        <div class="w-full md:w-1/2 relative group"> {{-- 'group' untuk efek hover --}}
            {{-- Efek Glow di belakang gambar --}}
            <div class="absolute inset-0 bg-gradient-to-r from-[#c5a059] to-[#7C18B6] rounded-xl blur-xl opacity-40 group-hover:opacity-60 transition duration-500 transform rotate-3 group-hover:rotate-6"></div>
            
            {{-- Bingkai Gambar --}}
            <div class="relative transform -rotate-3 group-hover:rotate-0 transition duration-500 ease-out">
                <div class="rounded-xl overflow-hidden border-2 border-[#c5a059]/50 shadow-2xl">
                    {{-- Overlay kaca di atas gambar agar menyatu dengan tema gelap --}}
                    <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition"></div>
                    <img src="{{ asset('images/akredetasi.jpg') }}" alt="Sertifikat Akreditasi" class="w-full object-cover">
                </div>
                
                {{-- Badge Status (Hiasan) --}}
                <div class="absolute -top-6 -right-6 bg-[#c5a059] text-[#050511] w-20 h-20 rounded-full flex items-center justify-center font-bold shadow-[0_0_20px_rgba(197,160,89,0.5)] animate-pulse">
                    <div class="text-center text-xs leading-tight">
                        TERAKREDITASI<br><span class="text-sm">BAIK SEKALI</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- BAGIAN KANAN: Teks & Tombol --}}
        <div class="w-full md:w-1/2 text-center md:text-left">
            <h3 class="text-[#c5a059] font-bold tracking-widest text-sm mb-2 uppercase">Penjaminan Mutu</h3>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                Akreditasi Program Studi
            </h2>
            <p class="text-gray-400 mb-8 leading-relaxed text-lg">
                Program studi kami telah terakreditasi resmi, menjamin standar kualitas pendidikan yang unggul dan diakui secara nasional. Komitmen kami untuk mencetak lulusan berkualitas.
            </p>

            {{-- Tombol Download --}}
            <a href="{{ asset('files/sertifikat.pdf') }}" download="Sertifikat_Akreditasi_BisnisDigital.pdf" 
               class="group relative inline-flex items-center justify-center px-8 py-4 text-white font-bold transition-all duration-200 bg-[#254E99] font-pj rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 overflow-hidden">
               
                {{-- Efek Hover Gradient --}}
                <div class="absolute inset-0 w-full h-full -mt-1 rounded-lg opacity-30 bg-gradient-to-b from-transparent via-transparent to-gray-700"></div>
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-[#254E99] to-[#7C18B6] opacity-100 group-hover:opacity-90 transition duration-300"></div>
                
                {{-- Konten Tombol --}}
                <span class="relative flex items-center gap-3">
                    <i class="fas fa-file-download text-lg animate-bounce"></i> 
                    Unduh Sertifikat
                </span>
            </a>
            
            <p class="mt-4 text-xs text-gray-500">
                *Klik tombol di atas untuk menyimpan dokumen PDF
            </p>
        </div>

    </div>
</section>


{{-- BERITA / BSD TERKINI: Menampilkan berita terbaru dari database dalam bentuk slider --}}
<section class="py-16 bg-[#00092D] relative">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-3/4 h-3/4 bg-[#254E99] opacity-10 blur-[100px] rounded-full pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-white mb-2 tracking-wide">BSD Terkini</h2>
            <div class="h-1 w-20 bg-gradient-to-r from-[#254E99] to-[#7C18B6] mx-auto rounded-full"></div>
        </div>
        
        {{-- Kondisi untuk mengecek apakah ada data berita. Jika tidak, tampilkan pesan. --}}
        @if($beritasTerkini->isEmpty())
            <p class="text-center text-gray-500 py-10">Belum ada berita terbaru yang diterbitkan. Silakan tambahkan dari Admin Dashboard.</p>
        @else
        {{-- CONTAINER SLIDER --}}
        <div class="swiper mySwiper pb-12">
            <div class="swiper-wrapper">
                
                {{-- LOOPING BERITA DARI DATABASE --}}
                @foreach($beritasTerkini as $berita)
                <div class="swiper-slide !h-auto"> 
                    <div class="bg-[#00092D] border border-[#254E99]/30 rounded-2xl overflow-hidden shadow-lg group hover:-translate-y-1 transition-transform duration-300">
                        <div class="h-52 w-full overflow-hidden relative bg-gray-800"> {{-- Tinggi tetap untuk konsistensi --}}
                            {{-- GAMBAR DARI DATABASE (Gunakan 'storage/') --}}
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" 
                                 onerror="this.onerror=null; this.src='{{ asset('images/placeholder-news.png') }}';" {{-- FALLBACK AMAN JIKA FILE HILANG --}}
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            
                            <div class="absolute top-3 right-3 bg-[#7C18B6] text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                                {{ $berita->created_at->format('d M Y') }} {{-- TANGGAL DARI DB --}}
                            </div>
                        </div>
                        
                        <div class="p-5">
                            <h3 class="text-white font-bold text-lg leading-snug mb-4 line-clamp-2 group-hover:text-[#4B7BEC] transition-colors"> {{-- line-clamp-2 membatasi judul jadi 2 baris --}}
                                {{ $berita->judul }} {{-- JUDUL DARI DB --}}
                            </h3>
                            
                            <div class="pt-4 border-t border-gray-800">
                                {{-- Link ke Halaman Lengkap --}}
                                <a href="{{ route('berita.show', $berita) }}"
                                   class="text-sm text-gray-400 hover:text-white flex items-center gap-2 transition-colors">
                                    Baca Selengkapnya <i class="fas fa-arrow-right text-xs text-[#7C18B6]"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
            <div class="swiper-pagination !bottom-0"></div>
        </div>
        {{-- TUTUP ELSE --}}
        @endif

    </div> {{-- tutup .max-w-7xl --}}
</section>

{{-- SCRIPT: Diletakkan di bagian bawah agar tidak memblokir rendering halaman --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
    // Inisialisasi Swiper.js untuk slider berita
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 24,
        pagination: { el: ".swiper-pagination", clickable: true, dynamicBullets: true },
        // Pengaturan responsif: jumlah slide yang terlihat berdasarkan lebar layar
        breakpoints: { 640: { slidesPerView: 2 }, 768: { slidesPerView: 3 }, 1024: { slidesPerView: 4 } } 
    });

    document.addEventListener("DOMContentLoaded", function () {
        const text = "BISNIS DIGITAL";
        const speed = 80;
        let i = 0;
        function typeWriter() {
            // Fungsi untuk membuat efek teks mengetik pada hero section
            if (i < text.length) {
                const el = document.getElementById("typingText");
                if(el) { el.innerHTML += text.charAt(i); }
                i++;
                setTimeout(typeWriter, speed);
            }
        }
        typeWriter();
    });
</script>
@endsection