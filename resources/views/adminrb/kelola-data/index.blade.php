@extends('layouts.adminrb')

@section('title', 'Monitoring Bagor')
@section('page-title', 'Kelola Sasaran & Indikator')

@section('menu-sasaran', 'text-blue-600 font-bold')

@section('content')
<div class="flex flex-col min-h-screen bg-[#F8FAFC]">

    <!-- Header -->
    <header class="bg-white shadow sticky top-0 z-30">
        <div class="flex justify-between items-center py-4 px-6 md:px-8">
            <h1 class="text-xl md:text-2xl font-semibold flex items-center gap-2">
                <i class="fas fa-bullseye text-blue-600"></i>
                <span class="hidden sm:inline">Kelola Sasaran & Indikator</span>
            </h1>
        </div>
    </header>

    <!-- Tombol Tambah Sasaran -->
    <div class="px-4 md:px-6 py-4 flex justify-end">
        <button
            class="flex items-center gap-2 bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition focus:outline-none focus:ring-2 focus:ring-green-300 text-sm md:text-base"
            onclick="openModal('tambahSasaranModal')">
            Tambah
        </button>
    </div>

    <!-- Konten Utama -->
    <main class="flex-1 px-4 md:px-8 py-6">
        <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-200 mt-4">

            <div class="px-4 md:px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg md:text-xl font-semibold text-gray-800">Daftar Sasaran & Indikator</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-3 px-4 text-left font-semibold text-gray-700 text-xs uppercase tracking-wider border-b">No</th>
                            <th class="py-3 px-4 text-left font-semibold text-gray-700 text-xs uppercase tracking-wider border-b">Kategori</th>
                            <th class="py-3 px-4 text-left font-semibold text-gray-700 text-xs uppercase tracking-wider border-b">Sasaran</th>
                            <th class="py-3 px-4 text-left font-semibold text-gray-700 text-xs uppercase tracking-wider border-b">Indikator</th>
                            <th class="py-3 px-4 text-center font-semibold text-gray-700 text-xs uppercase tracking-wider border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($sasaran as $item)
                            <tr class="hover:bg-blue-50 transition-colors">
                                <td class="py-3 px-4 text-sm font-medium text-gray-900">{{ $item['id'] }}</td>
                                <td class="py-3 px-4 text-sm font-medium text-gray-900">{{ $item['nama'] }}</td>
                                <td class="py-3 px-4 text-sm">{{ $item['nama'] }}</td>
                                <td class="py-3 px-4 text-sm">
                                    <ul class="list-disc list-inside text-gray-700">
                                        @foreach ($item['indikator'] as $indikator)
                                            <li>{{ $indikator['nama'] }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex justify-center gap-2">
                                        <!-- Edit -->
                                        <button class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-lg"
                                                onclick="openModal('editModal{{ $item['id'] }}')">
                                            <i class="fas fa-edit text-sm"></i>
                                        </button>
                                        <!-- Hapus -->
                                        <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg"
                                                onclick="openModal('hapusModal{{ $item['id'] }}')">
                                            <i class="fas fa-trash text-sm"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            {{-- Modal Components --}}
                            @include('components.adminrb.ubah-modal-data', ['item' => $item])
                            @include('components.adminrb.hapus-modal-data', ['item' => $item])
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 text-center text-gray-500">Belum ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    @include('components.footer')
</div>

{{-- Modal Tambah Sasaran --}}
@include('components.adminrb.tambah-modal-data')

@endsection

@push('scripts')
<script>
    function openModal(id) {
        const modal = document.getElementById(id);
        if(modal){
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        if(modal){
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }
</script>
@endpush
