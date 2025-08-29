@extends('layouts.app')

@section('title', 'Analisis Jabatan & Beban Kerja')

@section('content')
<div class="flex flex-col min-h-screen">

    <!-- Header -->
    <header class="bg-white shadow sticky top-0 z-30">
        <div class="flex justify-between items-center py-4 px-6 md:px-8">
            <h1 class="text-xl md:text-2xl font-semibold flex items-center gap-2">
                <i class="fas fa-file-alt text-blue-600"></i>
                <span>Analisis Jabatan & Beban Kerja</span>
            </h1>
        </div>
    </header>

    <!-- Konten Utama -->
    <main class="flex-1 px-4 md:px-8 py-6 bg-[#F8FAFC]">

        <div class="bg-white shadow rounded-lg p-6 max-w-lg mx-auto">
            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block font-medium mb-1">Nama Jabatan / Pegawai</label>
                    <input type="text" name="nama_jabatan" class="w-full border border-gray-300 rounded p-2" required>
                </div>

                <div>
                    <label class="block font-medium mb-1">Beban Kerja</label>
                    <input type="number" name="beban_kerja" class="w-full border border-gray-300 rounded p-2" required>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Simpan
                </button>
            </form>
        </div>

    </main>

    @include('components.footer')
</div>
@endsection
