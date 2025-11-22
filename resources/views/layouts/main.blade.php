<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bisnis Digital - Polije')</title>
    @stack('styles')
    @stack('scripts')

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Poppins (Sans) & Playfair Display (Serif untuk Logo) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'polije-bg': '#050a19',       /* Background sangat gelap sesuai footer */
                        'polije-nav': 'rgba(5, 10, 25, 0.85)', /* Glass nav base */
                        'neon-purple': '#6d28d9',     /* Ungu untuk hover/button */
                        'neon-light': '#a78bfa',      /* Ungu muda untuk gradient */
                    },
                    fontFamily: {
                        'sans': ['Poppins', 'sans-serif'],
                        'serif': ['Playfair Display', 'serif'], /* Font untuk BISNIS DIGITAL */
                    }
                }
            }
        }
    </script>

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #050a19; color: white; }
        
        /* Glassmorphism Navbar */
        .glass-nav {
            background: rgba(5, 10, 25, 0.7);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* ANIMASI TEKS BERGERAK PER HURUF */
        .animate-text span {
            display: inline-block;
            color: #4b5563; /* Warna awal agak gelap/abu (atau putih pudar) */
            animation: wave-color 3s infinite;
            /* Agar terlihat seperti gradasi bergerak */
            text-shadow: none;
        }

        /* Keyframes untuk perubahan warna dari Putih ke Ungu Gradient */
        @keyframes wave-color {
            0%, 100% {
                color: #6b7280; /* Abu-abu saat idle */
                text-shadow: none;
            }
            50% {
                color: #a78bfa; /* Ungu Terang */
                text-shadow: 0 0 10px rgba(139, 92, 246, 0.5); /* Efek Glow */
            }
        }

        /* Delay animasi untuk setiap huruf agar bergerak */
        .animate-text span:nth-child(1) { animation-delay: 0.0s; }
        .animate-text span:nth-child(2) { animation-delay: 0.1s; }
        .animate-text span:nth-child(3) { animation-delay: 0.2s; }
        .animate-text span:nth-child(4) { animation-delay: 0.3s; }
        .animate-text span:nth-child(5) { animation-delay: 0.4s; }
        .animate-text span:nth-child(6) { animation-delay: 0.5s; }
        /* Spasi dihitung sebagai child */
        .animate-text span:nth-child(7) { animation-delay: 0.6s; } 
        .animate-text span:nth-child(8) { animation-delay: 0.7s; }
        .animate-text span:nth-child(9) { animation-delay: 0.8s; }
        .animate-text span:nth-child(10) { animation-delay: 0.9s; }
        .animate-text span:nth-child(11) { animation-delay: 1.0s; }
        .animate-text span:nth-child(12) { animation-delay: 1.1s; }
        .animate-text span:nth-child(13) { animation-delay: 1.2s; }
        .animate-text span:nth-child(14) { animation-delay: 1.3s; }

    </style>
</head>
<body class="flex flex-col min-h-screen bg-polije-bg">

    <!-- NAVBAR -->
    <nav class="fixed w-full z-50 glass-nav">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-24"> <!-- Tinggi h-24 agar lebih lega sesuai gambar -->
                
                <!-- LOGO TEKS ANIMASI -->
                <div class="flex-shrink-0">
                    <a href="{{ url('/') }}" class="font-serif text-2xl md:text-3xl font-bold tracking-wider animate-text uppercase">
                        <!-- Memecah huruf untuk animasi -->
                        <span>B</span><span>I</span><span>S</span><span>N</span><span>I</span><span>S</span>
                        <span>D</span><span>I</span><span>G</span><span>I</span><span>T</span><span>A</span><span>L</span>
                    </a>
                </div>
                
                <!-- MENU TENGAH -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-10"> <!-- Space lebih lebar -->
                        <!-- Link dengan Hover Ungu -->
                        <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'text-neon-purple font-bold' : 'text-gray-300' }} hover:text-neon-purple transition duration-300 text-base tracking-wide">Profil</a>
                        <a href="{{ url('/akademik') }}" class="{{ Request::is('akademik') ? 'text-neon-purple font-bold' : 'text-gray-300' }} hover:text-neon-purple transition duration-300 text-base tracking-wide">Akademik</a>
                        <a href="{{ url('/fasilitas') }}" class="{{ Request::is('fasilitas') ? 'text-neon-purple font-bold' : 'text-gray-300' }} hover:text-neon-purple transition duration-300 text-base tracking-wide">Fasilitas</a>
                        <a href="{{ url('/civitas') }}" class="{{ Request::is('civitas') ? 'text-neon-purple font-bold' : 'text-gray-300' }} hover:text-neon-purple transition duration-300 text-base tracking-wide">Civitas</a>
                    </div>
                </div>

                <!-- TOMBOL MASUK (Pill Shape, Border Ungu) -->
                <div>
                    <a href="{{ url('/login') }}" class="group relative px-8 py-2 rounded-full border border-neon-purple/60 bg-transparent text-white hover:bg-neon-purple/20 transition duration-300 overflow-hidden">
                        <span class="relative z-10 text-sm font-medium tracking-wide">Masuk</span>
                        <!-- Efek Glow saat hover -->
                        <div class="absolute inset-0 -z-10 bg-neon-purple opacity-0 group-hover:opacity-20 blur-md transition duration-300"></div>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main class="flex-grow pt-24">
        @yield('content')
    </main>

    <!-- FOOTER (Sesuai Gambar image_2867c4.png) -->
    <footer class="bg-[#020617] mt-auto pt-16 relative overflow-hidden">
        <!-- Background Glow samar di footer -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-1 bg-gradient-to-r from-transparent via-purple-900 to-transparent opacity-50"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
            
            <!-- LOGO SECTION (CENTER) -->
            <div class="flex justify-center mb-12">
                <div class="flex items-center gap-4">
                    <!-- Placeholder Logo Polije -->
                    <img src="{{ asset('images/logo-polije-berdampak.png') }}" alt="Polije" class="h-12 md:h-16"> 
                    
                    
                </div>
            </div>

            <!-- CONTENT GRID (2 KOLOM: Kiri Kontak, Kanan Sosmed) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-40 text-gray-300 text-sm md:text-base">
                
                <!-- KOLOM KIRI: INFORMASI KONTAK -->
                <div class="space-y-5">
                    <div class="flex items-start hover:text-neon-light transition duration-300">
                        <i class="fas fa-map-marker-alt mt-1 w-6 text-center text-white text-lg"></i>
                        <span class="ml-3 leading-relaxed">Jl. Mastrip PO BOX 164, Jember - Jawa Timur- Indonesia</span>
                    </div>
                    <div class="flex items-center hover:text-neon-light transition duration-300">
                        <i class="fas fa-phone-alt w-6 text-center text-white text-lg"></i>
                        <span class="ml-3">+62 331 333533</span>
                    </div>
                    <div class="flex items-center hover:text-neon-light transition duration-300">
                        <i class="fas fa-fax w-6 text-center text-white text-lg"></i> <!-- Icon Fax/Gedung -->
                        <span class="ml-3">+62 331 333531</span>
                    </div>
                    <div class="flex items-center hover:text-neon-light transition duration-300">
                        <i class="far fa-envelope w-6 text-center text-white text-lg"></i>
                        <span class="ml-3">politeknik@polije.ac.id</span>
                    </div>
                </div>
                
                <!-- KOLOM KANAN: SOSIAL MEDIA -->
                <div class="space-y-5 md:text-left pl-0 md:pl-20">
                    <a href="#" class="flex items-center hover:text-neon-light transition duration-300 group">
                        <i class="fab fa-instagram w-6 text-center text-white text-lg group-hover:scale-110 transition"></i>
                        <span class="ml-3">@humaspolije</span>
                    </a>
                    <a href="#" class="flex items-center hover:text-neon-light transition duration-300 group">
                        <i class="fab fa-facebook w-6 text-center text-white text-lg group-hover:scale-110 transition"></i>
                        <span class="ml-3">Politeknik Negeri Jember</span>
                    </a>
                    <a href="#" class="flex items-center hover:text-neon-light transition duration-300 group">
                        <i class="fab fa-whatsapp w-6 text-center text-white text-lg group-hover:scale-110 transition"></i>
                        <span class="ml-3">+62 851-7959-0160</span>
                    </a>
                    <a href="#" class="flex items-center hover:text-neon-light transition duration-300 group">
                        <i class="fab fa-youtube w-6 text-center text-white text-lg group-hover:scale-110 transition"></i>
                        <span class="ml-3">Politeknik Negeri Jember</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- COPYRIGHT BAR (Gradient Background sesuai gambar) -->
        <div class="w-full py-4 bg-gradient-to-r from-[#374151] via-[#4c1d95] to-[#374151] text-center relative">
            <!-- Overlay gradient agar tidak terlalu terang di pinggir -->
             <div class="absolute inset-0 bg-[#020617] opacity-30"></div>
            <p class="relative z-10 text-white text-sm font-light tracking-wide">
                © 2024 Politeknik Negeri Jember - All Rights Are Reserved
            </p>
        </div>
    </footer>
    
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Fallback CDN jika kit diatas private/expired -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</body>
</html>