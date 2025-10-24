@extends('layouts.adminpelayananpublik')

@section('title', 'Daftar Laporan OPD')

@section('content')
<div class="flex flex-col min-h-screen bg-[#F8FAFC]">
    <!-- Header -->
    <header class="bg-white shadow sticky top-0 z-30">
        <div class="flex justify-between items-center py-4 px-6 md:px-8">
            <h1 class="text-xl md:text-2xl font-semibold flex items-center gap-2">
                <i class="fas fa-file-alt text-blue-600"></i>
                <span>Daftar Laporan OPD</span>
            </h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 px-4 md:px-8 py-6">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-200">
            <div class="px-4 md:px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg md:text-xl font-semibold text-gray-800">Laporan Masuk</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-3 px-4 text-left text-xs font-semibold text-gray-700 uppercase border-b">No</th>
                            <th class="py-3 px-4 text-left text-xs font-semibold text-gray-700 uppercase border-b">Nama OPD</th>
                            <th class="py-3 px-4 text-left text-xs font-semibold text-gray-700 uppercase border-b">Kategori</th>
                            <th class="py-3 px-4 text-left text-xs font-semibold text-gray-700 uppercase border-b">Dokumen</th>
                            <th class="py-3 px-4 text-center text-xs font-semibold text-gray-700 uppercase border-b">Status</th>
                            <th class="py-3 px-4 text-left text-xs font-semibold text-gray-700 uppercase border-b">Catatan Admin</th>
                            <th class="py-3 px-4 text-center text-xs font-semibold text-gray-700 uppercase border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($laporans as $laporan)
                        <tr class="hover:bg-blue-50 transition-colors">
                            <td class="py-3 px-4 text-sm">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4 text-sm">{{ $laporan['opd']['nama_opd'] }}</td>
                            <td class="py-3 px-4 text-sm">{{ $laporan['kategori'] }}</td>
                            <td class="py-3 px-4 text-sm">
                                <a href="{{ asset($laporan['file']) }}" target="_blank" class="text-blue-600 hover:underline">
                                    {{ $laporan['nama_file'] }}
                                </a>
                            </td>
                            <td class="py-3 px-4 text-center text-sm">
                                <span class="px-2 py-1 rounded text-white 
                                    {{ $laporan['status'] == 'Terverifikasi' ? 'bg-green-600' : 'bg-yellow-500' }}">
                                    {{ $laporan['status'] }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-sm">{{ $laporan['catatan_admin'] ?: '-' }}</td>
                            <td class="py-3 px-4 text-center flex justify-center gap-2">
                                <!-- Download -->
                                <a href="{{ asset($laporan['file']) }}" target="_blank" class="p-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                    <i class="fas fa-download"></i>
                                </a>

                                <!-- Edit buka modal -->
                                <button type="button" onclick="openModal('editModal{{ $laporan['id'] }}')" class="p-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <!-- Delete buka modal hapus -->
                                <button type="button" onclick="openModal('hapusLaporanModal{{ $laporan['id'] }}')" class="p-2 bg-red-600 text-white rounded hover:bg-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>

                                <!-- Modal Edit -->
                                @include('components.adminpelayananpublik.ubah-modal-laporan', ['laporan' => $laporan])

                                <!-- Modal Hapus -->
                                @include('components.adminpelayananpublik.hapus-modal-laporan', ['laporan' => $laporan])
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    @include('components.footer')
</div>

<!-- Script untuk modal -->
<script>
function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
}
function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
}
</script>
@endsection
