@extends('layouts.main')

@section('title', 'Daftar Lengkap Civitas')

@section('content')
<div class="bg-[#050511] min-h-screen relative pt-24 pb-20 px-4 overflow-x-hidden">

    {{-- Background Decoration (Glow Effect) --}}
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none overflow-hidden">
        <div class="absolute top-20 left-10 w-96 h-96 bg-[#254E99] opacity-20 blur-[150px] rounded-full"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#7C18B6] opacity-20 blur-[150px] rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto relative z-10">

        {{-- ==================== SECTION DOSEN ==================== --}}
        <div class="mb-16">
            <h2 class="text-center text-3xl font-bold text-white mb-10 tracking-wide">Dosen</h2>

            {{-- GRID DOSEN (2 Kolom) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Kita gunakan Loop Data Dummy agar kodenya rapi dan mudah diedit --}}
                @php
                    $dosens = [
                        [
                            'name' => 'Lukman Hakim, S.KOM., M.KOM',
                            'nip' => 'NIP 198909112024211001',
                            'role' => 'PJ Kampus 2 Bondowoso',
                            'img' => 'dosen1.jpg',
                            'bg_color' => 'bg-gray-800' // Warna default
                        ],
                        [
                            'name' => 'Rizky Aditya Nugraha, S.A.B., M.M',
                            'nip' => 'NIP 199105292024061003',
                            'role' => 'Lektor Kepala',
                            'img' => 'dosen2.jpg',
                            'bg_color' => 'bg-gray-800'
                        ],
                        [
                            'name' => 'Mas\'ud Hermansyah, S.KOM., M.KOM',
                            'nip' => 'NIP 00000000000000',
                            'role' => 'Tenaga Pengajar',
                            'img' => 'dosen3.jpg',
                            'bg_color' => 'bg-gray-800'
                        ],
                        [
                            'name' => 'Imam Abrori, S.E., M.M',
                            'nip' => 'NIP 199406102024061003',
                            'role' => 'Tenaga Pengajar',
                            'img' => 'dosen4.jpg',
                            'bg_color' => 'bg-gray-800'
                        ],
                        [
                            'name' => 'Muhammad Bahanan, S.E., M.M',
                            'nip' => 'NIP 198906182024061002',
                            'role' => 'Tenaga Pengajar',
                            'img' => 'dosen5.jpg', // Pastikan file ada atau ganti nama
                            'bg_color' => 'bg-gray-800'
                        ],
                        [
                            'name' => 'Rocha Isyroqi Qostalana, S.ST., M.MT',
                            'nip' => 'NIP 199205142024061002',
                            'role' => 'Tenaga Pengajar',
                            'img' => 'dosen1.jpg', // Placeholder
                            'bg_color' => 'bg-gray-800'
                        ],
                        [
                            'name' => 'Prisilia Angel Tantri, SE., M.M',
                            'nip' => 'NIP 199404202024212045',
                            'role' => 'Tenaga Pengajar',
                            'img' => 'dosen2.jpg', // Placeholder
                            'bg_color' => 'bg-gray-800'
                        ],
                        [
                            'name' => 'Fkriya Andriyani, S.Pd., M.Akun',
                            'nip' => 'NIP -',
                            'role' => 'Tenaga Pengajar',
                            'img' => 'dosen3.jpg', // Placeholder
                            'bg_color' => 'bg-gray-800'
                        ],
                         [
                            'name' => 'Eka Yuniar, S.KOM., MMSI',
                            'nip' => 'NIP -',
                            'role' => 'Tenaga Pengajar',
                            'img' => 'dosen5.jpg',
                            'bg_color' => 'bg-gray-800'
                        ],
                    ];
                @endphp

                @foreach($dosens as $dosen)
                <div class="bg-[#0a1529]/80 border border-[#254E99] rounded-2xl p-4 flex items-center gap-5 shadow-[0_0_15px_rgba(37,78,153,0.2)] hover:shadow-[0_0_25px_rgba(37,78,153,0.5)] hover:scale-[1.01] transition-all duration-300">
                    
                    {{-- Foto (Kiri) --}}
                    <div class="flex-shrink-0 w-24 h-28 rounded-lg overflow-hidden border border-white/20 shadow-inner {{ $dosen['bg_color'] }}">
                        <img src="{{ asset('images/' . $dosen['img']) }}" alt="{{ $dosen['name'] }}" class="w-full h-full object-cover">
                    </div>

                    {{-- Data (Kanan) --}}
                    <div class="flex-grow min-w-0"> {{-- min-w-0 fix text overflow --}}
                        <h3 class="text-white font-bold text-sm md:text-base mb-3 truncate" title="{{ $dosen['name'] }}">
                            {{ $dosen['name'] }}
                        </h3>
                        
                        <div class="space-y-2">
                            {{-- NIP Pill --}}
                            <div class="bg-[#050511] border border-[#254E99]/50 rounded-full px-4 py-1 w-full max-w-xs">
                                <p class="text-[10px] md:text-xs text-gray-300 font-mono tracking-wide truncate">
                                    {{ $dosen['nip'] }}
                                </p>
                            </div>
                            {{-- Jabatan Pill --}}
                            <div class="bg-[#050511] border border-[#254E99]/50 rounded-full px-4 py-1 w-full max-w-xs flex items-center gap-2">
                                <i class="fas fa-briefcase text-[10px] text-[#4B7BEC]"></i>
                                <p class="text-[10px] md:text-xs text-gray-300 truncate">
                                    {{ $dosen['role'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>


        {{-- ==================== SECTION ADMIN ==================== --}}
        <div class="mb-16">
            <h2 class="text-center text-3xl font-bold text-white mb-10 tracking-wide">Admin</h2>
            
            <div class="flex justify-center">
                <div class="w-full max-w-md bg-[#0a1529]/80 border border-[#254E99] rounded-2xl p-5 flex items-center gap-5 shadow-[0_0_20px_rgba(37,78,153,0.4)] hover:scale-105 transition-transform duration-300">
                    
                    {{-- Foto dengan Background MERAH (Sesuai Gambar) --}}
                    <div class="flex-shrink-0 w-28 h-32 rounded-lg overflow-hidden border-2 border-red-500 shadow-lg relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-red-500 to-red-700"></div>
                        <img src="{{ asset('images/admin.jpg') }}" class="relative w-full h-full object-cover object-top z-10">
                    </div>

                    <div class="flex-grow min-w-0">
                        <h3 class="text-white font-bold text-lg mb-3">Ahmad Marzuq, S.Sos</h3>
                        <div class="space-y-2">
                            <div class="bg-[#050511] border border-[#254E99]/50 rounded-full px-4 py-1.5">
                                <p class="text-xs text-gray-300 font-mono">NIP 199202272022031007</p>
                            </div>
                            <div class="bg-[#050511] border border-[#254E99]/50 rounded-full px-4 py-1.5 flex items-center gap-2">
                                <i class="fas fa-user-cog text-xs text-[#4B7BEC]"></i>
                                <p class="text-xs text-gray-300">Administrasi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- ==================== SECTION TEKNISI ==================== --}}
        <div class="mb-12">
            <h2 class="text-center text-3xl font-bold text-white mb-10 tracking-wide">Teknisi</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                {{-- Teknisi 1 --}}
                <div class="bg-[#0a1529]/80 border border-[#254E99] rounded-2xl p-4 flex flex-col items-center text-center shadow-[0_0_15px_rgba(37,78,153,0.2)] hover:scale-[1.02] transition">
                    {{-- Foto BG MERAH --}}
                    <div class="w-24 h-28 rounded-lg overflow-hidden border-2 border-red-500 mb-4 relative">
                        <div class="absolute inset-0 bg-red-600"></div>
                        <img src="{{ asset('images/teknisi1.jpg') }}" class="relative w-full h-full object-cover object-top">
                    </div>
                    <h3 class="text-white font-bold text-sm mb-3">Istik Lailiyah, S.Kom</h3>
                    <div class="w-full space-y-2">
                        <div class="bg-[#050511] border border-[#254E99]/50 rounded-full px-2 py-1">
                            <p class="text-[10px] text-gray-300">NIP 198803010101708201</p>
                        </div>
                        <div class="bg-[#050511] border border-[#254E99]/50 rounded-full px-2 py-1">
                            <p class="text-[10px] text-gray-300">Teknisi</p>
                        </div>
                    </div>
                </div>

                {{-- Teknisi 2 --}}
                <div class="bg-[#0a1529]/80 border border-[#254E99] rounded-2xl p-4 flex flex-col items-center text-center shadow-[0_0_15px_rgba(37,78,153,0.2)] hover:scale-[1.02] transition">
                    {{-- Foto BG MERAH --}}
                    <div class="w-24 h-28 rounded-lg overflow-hidden border-2 border-red-500 mb-4 relative">
                        <div class="absolute inset-0 bg-red-600"></div>
                        <img src="{{ asset('images/teknisi2.jpg') }}" class="relative w-full h-full object-cover object-top">
                    </div>
                    <h3 class="text-white font-bold text-sm mb-3">Arif Indar H, A.Md</h3>
                    <div class="w-full space-y-2">
                        <div class="bg-[#050511] border border-[#254E99]/50 rounded-full px-2 py-1">
                            <p class="text-[10px] text-gray-300">NIP 1988032720190101</p>
                        </div>
                        <div class="bg-[#050511] border border-[#254E99]/50 rounded-full px-2 py-1">
                            <p class="text-[10px] text-gray-300">Teknisi</p>
                        </div>
                    </div>
                </div>

                {{-- Teknisi 3 --}}
                <div class="bg-[#0a1529]/80 border border-[#254E99] rounded-2xl p-4 flex flex-col items-center text-center shadow-[0_0_15px_rgba(37,78,153,0.2)] hover:scale-[1.02] transition">
                    {{-- Foto BG BIRU --}}
                    <div class="w-24 h-28 rounded-lg overflow-hidden border-2 border-blue-500 mb-4 relative">
                        <div class="absolute inset-0 bg-blue-600"></div>
                        <img src="{{ asset('images/teknisi3.jpg') }}" class="relative w-full h-full object-cover object-top">
                    </div>
                    <h3 class="text-white font-bold text-sm mb-3">M Syafiq, A.Md</h3>
                    <div class="w-full space-y-2">
                        <div class="bg-[#050511] border border-[#254E99]/50 rounded-full px-2 py-1">
                            <p class="text-[10px] text-gray-300">NIP 19880122201709101</p>
                        </div>
                        <div class="bg-[#050511] border border-[#254E99]/50 rounded-full px-2 py-1">
                            <p class="text-[10px] text-gray-300">Teknisi</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Tombol Kembali --}}
        <div class="flex justify-end mt-10 border-t border-gray-800 pt-6">
            <a href="{{ url('/civitas') }}" class="bg-[#1e2549] hover:bg-[#254E99] text-white px-8 py-2 rounded-full text-sm font-semibold flex items-center gap-3 transition-all duration-300 border border-white/20 shadow-lg">
                <i class="fas fa-arrow-left"></i> Kembali Halaman Sebelumnya
            </a>
        </div>

    </div>
</div>
@endsection