<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title', 'Dashboard')</title>

    <!-- Tailwind CSS (seperti di layouts.main) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome (opsional, untuk icon) -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="bg-gray-900 text-gray-100">

<div class="min-h-screen flex">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-gray-950 border-r border-gray-800 flex flex-col">
        <div class="px-6 py-5 border-b border-gray-800">
            <h1 class="text-lg font-bold tracking-wide">
                Admin <span class="text-indigo-400">Bisnis Digital</span>
            </h1>
            <p class="text-xs text-gray-400 mt-1">Kampus 2 Bondowoso</p>
        </div>

        <nav class="flex-1 px-3 py-4 space-y-1 text-sm">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center px-3 py-2 rounded-md
                      {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800' }}">
                <i class="fa-solid fa-gauge-high w-5 mr-2"></i>
                <span>Dashboard</span>
            </a>

            {{-- Menu lain (nanti diisi ketika sudah buat modulnya) --}}
            <div class="mt-4 text-xs font-semibold text-gray-400 uppercase tracking-wide">Konten</div>

            <a href="#" class="flex items-center px-3 py-2 rounded-md text-gray-300 hover:bg-gray-800">
                <i class="fa-solid fa-building-columns w-5 mr-2"></i>
                <span>Profil Prodi</span>
            </a>

            <a href="#" class="flex items-center px-3 py-2 rounded-md text-gray-300 hover:bg-gray-800">
                <i class="fa-solid fa-user-graduate w-5 mr-2"></i>
                <span>Profil Lulusan</span>
            </a>

            <a href="{{ route('admin.dosen.index') }}" class="flex items-center px-3 py-2 rounded-md text-gray-300 hover:bg-gray-800">
                <i class="fa-solid fa-users w-5 mr-2"></i>
                <span>Civitas</span>
            </a>

            <a href="#" class="flex items-center px-3 py-2 rounded-md text-gray-300 hover:bg-gray-800">
                <i class="fa-solid fa-school-flag w-5 mr-2"></i>
                <span>Fasilitas</span>
            </a>

            <a href="#" class="flex items-center px-3 py-2 rounded-md text-gray-300 hover:bg-gray-800">
                <i class="fa-solid fa-newspaper w-5 mr-2"></i>
                <span>Berita</span>
            </a>
        </nav>

        <div class="px-4 py-4 border-t border-gray-800 text-xs text-gray-500">
            © {{ date('Y') }} Prodi Bisnis Digital
        </div>
    </aside>

 {{-- KONTEN UTAMA --}}
<main class="flex-1 p-6 md:p-8">
    {{-- TOPBAR KECIL DI DALAM HALAMAN ADMIN --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-lg font-semibold">
                @auth
                    Halo, {{ auth()->user()->name ?? 'Admin' }}
                @else
                    Halo, Admin
                @endauth
            </h2>
            <p class="text-xs text-gray-400 mt-1">
                Selamat datang di halaman dashboard admin.
            </p>
        </div>

        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="px-3 py-1.5 rounded-full border border-red-500/60
                               text-red-300 hover:bg-red-500/10 text-xs">
                    Keluar
                </button>
            </form>
        @endauth
    </div>

    {{-- ISI HALAMAN KHUSUS (DARI @section('content')) --}}
    @yield('content')
</main>

</div>

</body>
</html>
