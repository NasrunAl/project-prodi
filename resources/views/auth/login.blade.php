@extends('layouts.main')

@section('content')
    {{-- Kontainer utama yang menengahkan form login di layar --}}
    <div class="min-h-[80vh] flex items-center justify-center bg-polije-blue bg-opacity-50 relative">
        {{-- Gambar latar belakang dengan opacity rendah --}}
        <div class="absolute inset-0 bg-cover bg-center bg-[url('{{ asset('images/kampus-bg.jpg') }}')] opacity-20"></div>
    
        {{-- Kotak form dengan efek glassmorphism (background blur) --}}
        <div class="relative w-full max-w-md bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl p-8 shadow-2xl"> 
            <h2 class="text-2xl font-serif text-center text-white mb-8 tracking-wide">Masuk</h2>
            
            <form action="{{ route('login.process') }}" method="POST">
                @csrf {{-- Token CSRF untuk keamanan form Laravel --}}
    
                {{-- Blok ini akan tampil jika ada error validasi dari controller --}}
                @if ($errors->any())
                    <div class="mb-4 text-xs text-red-300 bg-red-900/40 border border-red-500/40 rounded-lg px-3 py-2">
                        {{ $errors->first() }} {{-- Menampilkan pesan error pertama --}}
                    </div>
                @endif
    
                {{-- Input untuk Email --}}
                <div class="mb-6 relative">
                    <input type="email" name="email" id="email" placeholder="Email" 
                           value="{{ old('email') }}" {{-- 'old' untuk menjaga input jika validasi gagal --}}
                           class="w-full bg-transparent border-b-2 border-gray-400 focus:border-indigo-400 text-white placeholder-gray-300 outline-none py-2 transition-colors duration-300">
                    <label for="email" class="absolute right-2 top-3 text-gray-400"> {{-- Ikon di dalam input --}}
                        <i class="fas fa-envelope"></i>
                    </label>
                </div>
    
                {{-- Input untuk Password --}}
                <div class="mb-8 relative">
                    <input type="password" name="password" id="password" placeholder="Password"
                           class="w-full bg-transparent border-b-2 border-gray-400 focus:border-indigo-400 text-white placeholder-gray-300 outline-none py-2 transition-colors duration-300">
                    <label for="password" class="absolute right-2 top-3 text-gray-400">
                        <i class="fas fa-lock"></i>
                    </label>
                </div>
    
                {{-- Tombol Submit Form --}}
                <div class="text-center mt-10">
                    <button type="submit"
                            class="bg-indigo-800 hover:bg-indigo-700 text-white px-10 py-2.5 rounded-full shadow-lg transform hover:scale-105 duration-300 font-semibold tracking-wider">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection