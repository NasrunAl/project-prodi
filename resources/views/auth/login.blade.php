@extends('layouts.main')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center bg-polije-blue bg-opacity-50 relative">
    <div class="absolute inset-0 bg-[url('{{ asset('images/kampus-bg.png') }}')] opacity-20"></div>

    <div class="relative w-full max-w-md bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl p-8 shadow-2xl">
        <h2 class="text-2xl font-serif text-center text-white mb-8 tracking-wide">Masuk</h2>
        
        <form action="#" method="POST">
            @csrf
            <div class="mb-6 relative">
                <input type="email" name="email" placeholder="Email" 
                    class="w-full bg-transparent border-b border-gray-400 text-white py-2 px-1 focus:outline-none focus:border-polije-gold placeholder-gray-400 transition-colors">
                <i class="fas fa-envelope absolute right-2 top-3 text-gray-400"></i>
            </div>

            <div class="mb-8 relative">
                <input type="password" name="password" placeholder="Password" 
                    class="w-full bg-transparent border-b border-gray-400 text-white py-2 px-1 focus:outline-none focus:border-polije-gold placeholder-gray-400 transition-colors">
                <i class="fas fa-lock absolute right-2 top-3 text-gray-400"></i>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-indigo-800 hover:bg-indigo-700 text-white px-10 py-2 rounded-full shadow-lg transform transition hover:scale-105 duration-300 font-semibold">
                    Masuk
                </button>
            </div>
            
            <div class="text-right mt-4">
                <a href="#" class="text-xs text-gray-400 hover:text-white">Lupa kata sandi?</a>
            </div>
        </form>
    </div>
</div>
@endsection