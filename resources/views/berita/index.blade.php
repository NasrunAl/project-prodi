@extends('layouts.main')

@section('title', 'Berita - Bisnis Digital Polije')

@section('content')
<section class="py-24 bg-[#00092D] relative overflow-hidden">
    {{-- Background Elements --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-[#254E99] opacity-20 blur-[120px] rounded-full pointer-events-none"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-[#7C18B6] opacity-10 blur-[100px] rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        {{-- Header Section --}}
        <div class="text-center mb-16">
            <h1 class="text-5xl md:text-6xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white via-[#c5a059] to-white mb-4">
                Berita Terbaru
            </h1>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                Informasi terkini seputar Program Studi Bisnis Digital Politeknik Negeri Jember
            </p>
            <div class="h-1 w-32 bg-gradient-to-r from-[#254E99] to-[#7C18B6] mx-auto rounded-full mt-6"></div>
        </div>

        {{-- Berita Grid --}}
        @if($beritas->isEmpty())
            <div class="text-center py-20">
                <div class="w-24 h-24 bg-[#254E99]/20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-newspaper text-3xl text-[#4B7BEC]"></i>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Belum Ada Berita</h3>
                <p class="text-gray-400">Belum ada berita yang diterbitkan. Silakan kembali lagi nanti.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($beritas as $berita)
                <article class="bg-[#00092D]/80 backdrop-blur-sm border border-[#254E99]/30 rounded-2xl overflow-hidden shadow-lg group hover:-translate-y-2 transition-all duration-300 hover:shadow-[0_0_30px_rgba(124,24,182,0.1)]">
                    {{-- Gambar Berita --}}
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset('storage/' . $berita->gambar) }}"
                             alt="{{ $berita->judul }}"
                             onerror="this.onerror=null; this.src='{{ asset('images/placeholder-news.png') }}';"
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">

                        {{-- Tanggal --}}
                        <div class="absolute top-4 right-4 bg-[#7C18B6] text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                            {{ $berita->created_at->format('d M Y') }}
                        </div>

                        {{-- Overlay gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    {{-- Konten --}}
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-white mb-3 line-clamp-2 group-hover:text-[#4B7BEC] transition-colors">
                            {{ $berita->judul }}
                        </h2>

                        <p class="text-gray-400 text-base mb-4 line-clamp-3">
                            {{ Str::limit(strip_tags($berita->konten), 150) }}
                        </p>

                        {{-- Meta info --}}
                        <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                            <span>Oleh: {{ $berita->user->name ?? 'Admin' }}</span>
                            <span>{{ $berita->created_at->diffForHumans() }}</span>
                        </div>

                        {{-- Action Button --}}
                        <a href="{{ route('berita.show', $berita) }}"
                           class="w-full bg-[#254E99] hover:bg-[#7C18B6] text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-300 flex items-center justify-center gap-2 group-hover:shadow-[0_0_15px_rgba(124,24,182,0.3)]">
                            <i class="fas fa-eye"></i>
                            Baca Selengkapnya
                        </a>
                    </div>
                </article>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-16 flex justify-center">
                {{ $beritas->links() }}
            </div>
        @endif
    </div>
</section>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Custom pagination styles */
.pagination {
    @apply flex items-center justify-center gap-2;
}

.page-link {
    @apply px-4 py-2 bg-[#254E99]/20 border border-[#254E99]/30 text-gray-300 rounded-lg hover:bg-[#7C18B6] hover:border-[#7C18B6] hover:text-white transition-all duration-300;
}

.page-link.active {
    @apply bg-[#7C18B6] border-[#7C18B6] text-white;
}
</style>
@endsection
