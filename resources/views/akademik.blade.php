@extends('layouts.main')

@section('content')
<section class="py-20 px-4 bg-[#050511] relative overflow-hidden min-h-screen">
    
    {{-- Background Glow --}}
    <div class="absolute top-0 left-0 w-96 h-96 bg-[#254E99] opacity-10 blur-[150px] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#7C18B6] opacity-10 blur-[150px] rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto relative z-10">
        
        {{-- Header Section --}}
        <div class="text-center mb-16 mt-8">
            <h2 class="text-4xl font-bold text-white mb-2">Profil Lulusan</h2>
            <div class="h-1 w-24 bg-gradient-to-r from-[#c5a059] to-[#7C18B6] mx-auto rounded-full"></div>
            <p class="text-gray-400 mt-4 max-w-2xl mx-auto">
                Lulusan Bisnis Digital dibekali dengan kompetensi teknis dan manajerial untuk bersaing di era global.
            </p>
        </div>

        {{-- GRID PROFIL LULUSAN --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-24">
            
            {{-- Card 1 --}}
            <div class="group relative rounded-2xl overflow-hidden h-72 border border-[#254E99]/30 bg-[#101025]">
                <img src="{{ asset('images/p-2.png') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-60 group-hover:opacity-40">
                <div class="absolute inset-0 bg-gradient-to-t from-[#050511] via-[#050511]/50 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-6">
                    <h3 class="text-2xl font-bold text-[#c5a059] mb-2 group-hover:translate-x-2 transition duration-300">Digital Entrepreneur</h3>
                    <p class="text-sm text-gray-300 leading-relaxed transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition duration-500 delay-100">
                        Wirausaha yang mampu merencanakan, merancang dan mengembangkan bisnis dengan memanfaatkan teknologi digital yang adaptif.
                    </p>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="group relative rounded-2xl overflow-hidden h-72 border border-[#254E99]/30 bg-[#101025]">
                <img src="{{ asset('images/p-4.png') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-60 group-hover:opacity-40">
                <div class="absolute inset-0 bg-gradient-to-t from-[#050511] via-[#050511]/50 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-6">
                    <h3 class="text-2xl font-bold text-[#4B7BEC] mb-2 group-hover:translate-x-2 transition duration-300">Business Analyst</h3>
                    <p class="text-sm text-gray-300 leading-relaxed transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition duration-500 delay-100">
                        Ahli riset pasar dan pengembangan model bisnis baru maupun inovasi untuk bisnis yang sedang berjalan.
                    </p>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="group relative rounded-2xl overflow-hidden h-72 border border-[#254E99]/30 bg-[#101025]">
                <img src="{{ asset('images/p-1.png') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-60 group-hover:opacity-40">
                <div class="absolute inset-0 bg-gradient-to-t from-[#050511] via-[#050511]/50 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-6">
                    <h3 class="text-2xl font-bold text-[#7C18B6] mb-2 group-hover:translate-x-2 transition duration-300">Professional in Digital Business</h3>
                    <p class="text-sm text-gray-300 leading-relaxed transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition duration-500 delay-100">
                        Tenaga profesional yang mampu menginisiasi kegiatan bisnis kreatif untuk meningkatkan performa organisasi.
                    </p>
                </div>
            </div>

            {{-- Card 4 --}}
            <div class="group relative rounded-2xl overflow-hidden h-72 border border-[#254E99]/30 bg-[#101025]">
                <img src="{{ asset('images/p-3.png') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-60 group-hover:opacity-40">
                <div class="absolute inset-0 bg-gradient-to-t from-[#050511] via-[#050511]/50 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-6">
                    <h3 class="text-2xl font-bold text-white mb-2 group-hover:translate-x-2 transition duration-300">Smart Village Developer</h3>
                    <p class="text-sm text-gray-300 leading-relaxed transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition duration-500 delay-100">
                        Pengembang Desa Pintar melalui elaborasi teknologi digital untuk meningkatkan perekonomian masyarakat pedesaan.
                    </p>
                </div>
            </div>
        </div>

        {{-- DOWNLOAD SECTION (Matkul & Kurikulum) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            
            {{-- Mata Kuliah --}}
            <div class="bg-[#101025] border border-[#254E99]/30 rounded-3xl p-8 flex flex-col items-center text-center hover:border-[#c5a059] transition duration-300 group">
                 <div class="w-16 h-16 bg-[#254E99]/20 rounded-full flex items-center justify-center mb-6 group-hover:bg-[#c5a059]/20 transition">
                    <i class="fas fa-book text-3xl text-[#4B7BEC] group-hover:text-[#c5a059] transition"></i>
                 </div>
                 <h3 class="font-bold text-2xl text-white mb-4">Mata Kuliah</h3>
                 <p class="text-gray-400 text-sm mb-6">Unduh daftar mata kuliah lengkap yang akan dipelajari selama masa studi.</p>
                 
                 <button class="w-full py-3 rounded-full bg-transparent border border-[#4B7BEC] text-[#4B7BEC] font-bold hover:bg-[#4B7BEC] hover:text-white transition duration-300 flex items-center justify-center gap-2">
                    <i class="fas fa-download"></i> Unduh PDF
                 </button>
            </div>

            {{-- Kurikulum --}}
            <div class="bg-[#101025] border border-[#254E99]/30 rounded-3xl p-8 flex flex-col items-center text-center hover:border-[#7C18B6] transition duration-300 group">
                 <div class="w-16 h-16 bg-[#7C18B6]/20 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-graduation-cap text-3xl text-[#7C18B6] group-hover:scale-110 transition"></i>
                 </div>
                 <h3 class="font-bold text-2xl text-white mb-4">Kurikulum</h3>
                 <p class="text-gray-400 text-sm mb-6">Pelajari struktur kurikulum berbasis industri dan peta jalan pembelajaran.</p>
                 
                 <button class="w-full py-3 rounded-full bg-transparent border border-[#7C18B6] text-[#7C18B6] font-bold hover:bg-[#7C18B6] hover:text-white transition duration-300 flex items-center justify-center gap-2">
                    <i class="fas fa-download"></i> Unduh PDF
                 </button>
            </div>
        </div>
    </div>
</section>
@endsection