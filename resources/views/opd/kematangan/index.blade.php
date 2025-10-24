{{-- resources/views/kelembagaan/kematangan.blade.php --}}
@extends('layouts.app')

@section('title', 'Kematangan Kelembagaan')

@section('content')
    <div class="min-h-screen bg-gradient-to-b bg-[#F8FAFC]">
        <!-- Header -->
        <header class="bg-white shadow sticky top-0 z-30">
            <div class="flex justify-between items-center py-4 px-6 md:px-8">
                <h1 class="text-xl md:text-2xl font-semibold flex items-center gap-2">
                    <i class="fas fa-chart-line text-blue-600"></i>
                    <span class="hidden sm:inline">Kematangan Kelembagaan</span>
                </h1>
                <div class="relative group">
                    <button
                        class="flex items-center gap-2 bg-gray-100 rounded-full px-3 py-1 hover:bg-gray-200 transition-colors">
                        <i class="fas fa-user-circle text-xl md:text-2xl text-blue-600"></i>
                        <span class="text-sm md:text-base">Admin OPD</span>
                    </button>

                    <div
                        class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-lg rounded-md opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-opacity duration-200 z-50">
                        <ul class="py-2 text-gray-700 text-sm">
                            <li>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">
                                    Profil Saya
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </header>


        {{-- Card di pojok kiri atas --}}
       <div class="relative">
    <div class="absolute top-6 left-6 w-80 bg-white border border-gray-200 shadow-lg rounded-xl p-6 z-20">
        {{-- Decorative shapes --}}
        <div class="absolute top-0 right-0 w-24 h-24 bg-blue-100 rounded-full -mt-12 -mr-12 opacity-40"></div>
        <div class="absolute bottom-0 left-0 w-24 h-24 bg-blue-100 rounded-full -mb-12 -ml-12 opacity-40"></div>

        {{-- Content --}}
        <div class="relative z-10 text-left">
            <i class="fas fa-external-link-alt text-blue-600 text-5xl mb-4"></i>
            <h2 class="text-lg font-bold mb-2">Form Kematangan Kelembagaan</h2>
            <p class="text-gray-700 mb-4 text-sm">
                OPD dapat menilai kematangan kelembagaan mereka melalui form ini. Pastikan semua informasi terisi lengkap.
            </p>

            <a href="https://forms.gle/XXXXXXXXXXXXX" target="_blank"
                class="w-full inline-block py-3 px-4 bg-gradient-to-r from-blue-500 to-blue-700 text-white font-semibold rounded-xl shadow-md hover:scale-105 transform transition-all text-center">
                Buka Form
            </a>
        </div>
    </div>
</div>

    </div>
@endsection