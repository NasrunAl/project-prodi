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
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Google Fonts: Poppins (Sans) & Playfair Display (Serif untuk Logo) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'polije-bg': '#00092D',       /* Background sangat gelap sesuai footer */
                        'polije-nav': 'rgba(0, 9, 45, 0.85)', /* Glass nav base */
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
        body { font-family: 'Poppins', sans-serif; background-color: #00092D; color: white; }

        /* Glassmorphism Navbar */
        .glass-nav {
            background: rgba(0, 9, 45, 0.7);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Logo: Poppins with subtle glow animation */
        .logo-glow {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #e6e7ff;
            transition: text-shadow 0.25s ease, transform 0.25s ease;
            text-shadow: 0 0 0 rgba(167,139,250,0);
        }

        .logo-glow:hover {
            transform: translateY(-1px);
            text-shadow: 0 0 12px rgba(167,139,250,0.85), 0 0 30px rgba(109,40,217,0.25);
        }

        /* Gentle pulse glow to draw attention (keeps subtle) */
        @keyframes logo-pulse {
            0% { text-shadow: 0 0 0 rgba(167,139,250,0); }
            50% { text-shadow: 0 0 8px rgba(167,139,250,0.55); }
            100% { text-shadow: 0 0 0 rgba(167,139,250,0); }
        }

        .logo-glow.pulse {
            animation: logo-pulse 3.5s ease-in-out infinite;
        }

        /* nav link active/hover styles */
        .nav-link { transition: color .2s, transform .15s; }
        .nav-link:hover { color: #a78bfa; transform: translateY(-2px); }

        /* Footer link hover styles - make them appear clickable */
        .footer-link { transition: transform .15s, color .15s, background-color .15s; display: inline-flex; align-items: center; gap: .5rem; padding: .25rem .5rem; border-radius: .5rem; }
        .footer-link:hover { transform: translateY(-3px) scale(1.02); color: #fff; background: rgba(167,139,250,0.06); }

        /* Footer glass + glow to match navbar */
        .footer-glass {
            background: rgba(0, 9, 45, 0.72);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.04);
        }

        /* Footer logo glow (for images or text) */
        .footer-logo-glow {
            transition: filter .25s ease, transform .25s ease, text-shadow .25s ease;
            filter: drop-shadow(0 0 0 rgba(167,139,250,0));
        }

        .footer-logo-glow:hover {
            transform: translateY(-2px);
            filter: drop-shadow(0 0 12px rgba(167,139,250,0.85));
        }

        @keyframes footer-pulse {
            0% { filter: drop-shadow(0 0 0 rgba(167,139,250,0)); }
            50% { filter: drop-shadow(0 0 10px rgba(167,139,250,0.45)); }
            100% { filter: drop-shadow(0 0 0 rgba(167,139,250,0)); }
        }

        .footer-logo-glow.pulse {
            animation: footer-pulse 4s ease-in-out infinite;
        }

        /* Slight neon glow on footer-link hover to match nav hover */
        .footer-link:hover { color: #a78bfa; text-shadow: 0 0 8px rgba(167,139,250,0.45); }

    </style>
</head>
<body class="flex flex-col min-h-screen bg-polije-bg">

    <!-- NAVBAR -->
    <nav class="fixed w-full z-50 glass-nav">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-24"> <!-- Tinggi h-24 agar lebih lega sesuai gambar -->
                
                <!-- LOGO (left) -->
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="logo-glow text-2xl md:text-3xl">BISNIS DIGITAL</a>
                </div>

                <!-- NAV LINKS (right) -->
                <div class="hidden md:flex md:items-center md:space-x-10">
                    <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'text-neon-purple font-bold' : 'text-gray-300' }} text-base tracking-wide">Profil</a>
                    <a href="{{ url('/akademik') }}" class="nav-link {{ Request::is('akademik') ? 'text-neon-purple font-bold' : 'text-gray-300' }} text-base tracking-wide">Akademik</a>
                    <a href="{{ url('/fasilitas') }}" class="nav-link {{ Request::is('fasilitas') ? 'text-neon-purple font-bold' : 'text-gray-300' }} text-base tracking-wide">Fasilitas</a>
                    <a href="{{ url('/civitas') }}" class="nav-link {{ Request::is('civitas') ? 'text-neon-purple font-bold' : 'text-gray-300' }} text-base tracking-wide">Civitas</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main class="flex-grow pt-24">
        @yield('content')
    </main>

    <!-- FOOTER ) -->
<footer class="bg-[#00092D] mt-auto pt-8 relative overflow-hidden footer-glass">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-1 bg-gradient-to-r from-transparent via-purple-700 to-transparent opacity-50"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-8">
        
        <div class="flex justify-center mb-8"> 
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/logo-polije-berdampak.png') }}" alt="Politeknik Negeri Jember" class="h-12 md:h-16 footer-logo-glow pulse"> 
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 md:gap-y-0 md:gap-x-20 text-gray-300 text-sm md:text-base mb-10 items-start">
            
            <div class="space-y-4 flex flex-col items-center md:items-start">
                <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Mastrip+PO+BOX+164+Jember" target="_blank" rel="noopener" class="footer-link text-gray-300">
                    <i class="fas fa-map-marker-alt w-5 text-white text-lg"></i>
                    <span class="leading-relaxed">Jl. Mastrip PO BOX 164, Jember - Jawa Timur - Indonesia</span>
                </a>
                <a href="tel:+62331333533" class="footer-link text-gray-300">
                    <i class="fas fa-phone-alt w-5 text-white text-lg"></i>
                    <span>+62 331 333533</span>
                </a>
                <a href="tel:+62331333531" class="footer-link text-gray-300">
                    <i class="fas fa-fax w-5 text-white text-lg"></i>
                    <span>+62 331 333531</span>
                </a>
                <a href="mailto:politeknik@polije.ac.id" class="footer-link text-gray-300">
                    <i class="far fa-envelope w-5 text-white text-lg"></i>
                    <span>politeknik@polije.ac.id</span>
                </a>
            </div>

            <div class="space-y-4 flex flex-col items-center md:items-end"> 
                
                <a href="https://www.instagram.com/humaspolije" target="_blank" rel="noopener" class="footer-link text-gray-300 flex-row-reverse md:justify-end justify-center">
                    <i class="fab fa-instagram w-5 text-white text-lg"></i>
                    <span class="mr-3">@humaspolije</span>
                </a>
                <a href="https://www.facebook.com/politekniknegerijember" target="_blank" rel="noopener" class="footer-link text-gray-300 flex-row-reverse md:justify-end justify-center">
                    <i class="fab fa-facebook w-5 text-white text-lg"></i>
                    <span class="mr-3">Politeknik Negeri Jember</span>
                </a>
                <a href="https://wa.me/6285179590160" target="_blank" rel="noopener" class="footer-link text-gray-300 flex-row-reverse md:justify-end justify-center">
                    <i class="fab fa-whatsapp w-5 text-white text-lg"></i>
                    <span class="mr-3">+62 851-7959-0160</span>
                </a>
                <a href="https://www.youtube.com/channel/UC_POLIJE" target="_blank" rel="noopener" class="footer-link text-gray-300 flex-row-reverse md:justify-end justify-center">
                    <i class="fab fa-youtube w-5 text-white text-lg"></i>
                    <span class="mr-3">Politeknik Negeri Jember</span>
                </a>
            </div>
        </div>
    </div>

    <div class="w-full py-4 bg-gradient-to-r from-[#374151] via-[#4c1d95] to-[#374151] text-center relative">
        <p class="relative z-10 text-white text-sm font-light tracking-wide">
            © 2025 Politeknik Negeri Jember - All Rights Are Reserved
        </p>
    </div>
</footer>
    
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Fallback CDN jika kit diatas private/expired -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</body>
</html>