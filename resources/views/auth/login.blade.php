@extends('layouts.main')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center bg-polije-blue bg-opacity-50 relative">
    <div class="absolute inset-0 bg-[url('{{ asset('images/kampus-bg.png') }}')] opacity-20"></div>

    <div class="relative w-full max-w-md bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl p-8 shadow-2xl">
        <h2 class="text-2xl font-serif text-center text-white mb-8 tracking-wide">Masuk</h2>
        
<form action="{{ route('login.process') }}" method="POST">
    @csrf

    {{-- Tampilkan error login kalau ada --}}
    @if ($errors->any())
        <div class="mb-4 text-xs text-red-300 bg-red-900/40 border border-red-500/40 rounded-lg px-3 py-2">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="mb-6 relative">
        <input type="email" name="email" placeholder="Email" 
               value="{{ old('email') }}"
               class="w-full bg-transparent border-b ...">
        <i class="fas fa-envelope absolute right-2 top-3 text-gray-400"></i>
    </div>

    <div class="mb-8 relative">
        <input type="password" name="password" placeholder="Password"
               class="w-full bg-transparent border-b ...">
        <i class="fas fa-lock absolute right-2 top-3 text-gray-400"></i>
    </div>

    <div class="text-center">
        <button type="submit"
                class="bg-indigo-800 hover:bg-indigo-700 text-white px-10 py-2 rounded-full shadow-lg transform hover:scale-105 duration-300 font-semibold">
            Masuk
        </button>
    </div>
</form>
    </div>
</div>
@endsection