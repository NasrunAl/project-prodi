@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- BREADCRUMB --}}
    <section class="py-8 bg-[#00092D] border-b border-[#254E99]/30">
        <div class="max-w-6xl mx-auto px-6">
            <nav class="flex items-center space-x-2 text-sm text-gray-400">
                <a href="{{ route('home') }}" class="hover:text-[#7C18B6] transition-colors">Home</a>
                <i class="fas fa-chevron-right text-xs"></i>
                <a href="{{ route('berita.index') }}" class="hover:text-[#7C18B6] transition-colors">Berita</a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-white">{{ $berita->judul }}</span>
            </nav>
        </div>
    </section>

    {{-- MAIN CONTENT --}}
    <section class="py-16 bg-[#00092D] relative overflow-hidden">
        {{-- Background Glow --}}
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[#254E99] opacity-10 blur-[150px] rounded-full pointer-events-none"></div>

        <div class="max-w-4xl mx-auto px-6 relative z-10">

            {{-- ARTICLE HEADER --}}
            <div class="mb-12 text-center">
                <div class="inline-flex items-center gap-2 bg-[#7C18B6]/20 border border-[#7C18B6]/50 text-[#7C18B6] px-4 py-2 rounded-full text-sm font-semibold mb-6">
                    <i class="fas fa-calendar-alt"></i>
                    {{ $berita->created_at->format('d F Y') }}
                </div>

                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                    {{ $berita->judul }}
                </h1>

                @if($berita->penulis)
                <p class="text-gray-400 text-lg">
                    Oleh: <span class="text-[#c5a059] font-semibold">{{ $berita->penulis }}</span>
                </p>
                @endif
            </div>

            {{-- FEATURED IMAGE --}}
            @if($berita->gambar)
            <div class="mb-12 relative group">
                <div class="absolute inset-0 bg-gradient-to-r from-[#254E99] to-[#7C18B6] rounded-2xl blur-xl opacity-30 group-hover:opacity-50 transition duration-500"></div>
                <div class="relative rounded-2xl overflow-hidden border border-[#254E99]/50 shadow-2xl">
                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                         alt="{{ $berita->judul }}"
                         onerror="this.onerror=null; this.src='{{ asset('images/placeholder-news.png') }}';"
                         class="w-full h-auto object-cover">
                </div>
            </div>
            @endif

            {{-- ARTICLE CONTENT --}}
            <div class="bg-[#00092D]/60 backdrop-blur-xl border border-[#254E99]/30 rounded-2xl p-8 md:p-12 shadow-2xl">
                <div class="prose prose-lg prose-invert max-w-none">
                    {{-- Excerpt if available --}}
                    @if($berita->excerpt)
                    <div class="text-xl text-gray-300 italic mb-8 p-6 bg-[#254E99]/20 rounded-xl border-l-4 border-[#7C18B6]">
                        "{{ $berita->excerpt }}"
                    </div>
                    @endif

                    {{-- Main Content --}}
                    <div class="text-gray-300 leading-relaxed space-y-6">
                        {!! nl2br(e($berita->konten)) !!}
                    </div>
                </div>

                {{-- SHARE BUTTONS --}}
                <div class="mt-12 pt-8 border-t border-gray-700">
                    <h3 class="text-white font-semibold mb-4">Bagikan Berita Ini:</h3>
                    <div class="flex flex-wrap gap-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                           target="_blank"
                           class="inline-flex items-center gap-2 bg-[#1877F2] hover:bg-[#166FE5] text-white px-4 py-2 rounded-lg transition-colors">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode($berita->judul) }}"
                           target="_blank"
                           class="inline-flex items-center gap-2 bg-[#1DA1F2] hover:bg-[#1A91DA] text-white px-4 py-2 rounded-lg transition-colors">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($berita->judul . ' - ' . url()->current()) }}"
                           target="_blank"
                           class="inline-flex items-center gap-2 bg-[#25D366] hover:bg-[#128C7E] text-white px-4 py-2 rounded-lg transition-colors">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            {{-- NAVIGATION --}}
            <div class="mt-12 flex flex-col sm:flex-row justify-between gap-4">
                {{-- Previous Article --}}
                @if($berita->previous())
                <a href="{{ route('berita.show', $berita->previous()) }}"
                   class="flex items-center gap-3 text-gray-400 hover:text-[#7C18B6] transition-colors group">
                    <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                    <div class="text-left">
                        <div class="text-sm text-gray-500">Berita Sebelumnya</div>
                        <div class="font-semibold">{{ Str::limit($berita->previous()->judul, 50) }}</div>
                    </div>
                </a>
                @else
                <div></div>
                @endif

                {{-- Back to List --}}
                <a href="{{ route('berita.index') }}"
                   class="flex items-center gap-3 bg-[#254E99]/20 hover:bg-[#254E99]/30 border border-[#254E99]/50 text-[#4B7BEC] px-6 py-3 rounded-lg transition-colors">
                    <i class="fas fa-list"></i>
                    Kembali ke Daftar Berita
                </a>

                {{-- Next Article --}}
                @if($berita->next())
                <a href="{{ route('berita.show', $berita->next()) }}"
                   class="flex items-center gap-3 text-gray-400 hover:text-[#7C18B6] transition-colors group text-right">
                    <div class="text-right">
                        <div class="text-sm text-gray-500">Berita Selanjutnya</div>
                        <div class="font-semibold">{{ Str::limit($berita->next()->judul, 50) }}</div>
                    </div>
                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </a>
                @else
                <div></div>
                @endif
            </div>

        </div>
    </section>

    {{-- RELATED NEWS SECTION --}}
    @if(\App\Models\Berita::where('id', '!=', $berita->id)->count() > 0)
    <section class="py-16 bg-[#00092D] border-t border-[#254E99]/30">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white mb-2">Berita Lainnya</h2>
                <div class="h-1 w-20 bg-gradient-to-r from-[#254E99] to-[#7C18B6] mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach(\App\Models\Berita::where('id', '!=', $berita->id)->latest()->limit(3)->get() as $relatedBerita)
                <div class="bg-[#00092D] border border-[#254E99]/30 rounded-2xl overflow-hidden shadow-lg group hover:-translate-y-1 transition-transform duration-300">
                    <div class="h-48 w-full overflow-hidden relative bg-gray-800">
                        <img src="{{ asset('storage/' . $relatedBerita->gambar) }}"
                             alt="{{ $relatedBerita->judul }}"
                             onerror="this.onerror=null; this.src='{{ asset('images/placeholder-news.png') }}';"
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">

                        <div class="absolute top-3 right-3 bg-[#7C18B6] text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                            {{ $relatedBerita->created_at->format('d M Y') }}
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-white font-bold text-lg leading-snug mb-4 line-clamp-2 group-hover:text-[#4B7BEC] transition-colors">
                            {{ $relatedBerita->judul }}
                        </h3>

                        <a href="{{ route('berita.show', $relatedBerita) }}"
                           class="inline-flex items-center gap-2 text-[#7C18B6] hover:text-[#a78bfa] font-semibold transition-colors">
                            Baca Selengkapnya <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

@endsection
