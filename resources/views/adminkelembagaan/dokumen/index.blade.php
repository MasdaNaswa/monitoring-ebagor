@extends('layouts.adminkelembagaan')

@section('title', 'Semua Laporan OPD')

@section('content')
<div class="flex flex-col min-h-screen bg-[#F8FAFC]">

    <!-- Header -->
    <header class="bg-white shadow sticky top-0 z-30">
        <div class="flex justify-between items-center py-4 px-6 md:px-8">
            <h1 class="text-xl md:text-2xl font-semibold flex items-center gap-2">
                <i class="material-icons text-blue-600">list</i>
                <span class="hidden sm:inline">Semua Laporan OPD</span>
            </h1>
        </div>
    </header>

    <!-- Konten Utama -->
    <main class="flex-1 px-4 md:px-8 py-6">
        <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-200 mt-4">
            <!-- Table Header -->
            <div class="px-4 md:px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                <h2 class="text-lg md:text-xl font-semibold text-gray-800">Daftar Laporan OPD</h2>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-3 px-4 font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">No</th>
                            <th class="py-3 px-4 font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">Nama OPD</th>
                            <th class="py-3 px-4 font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">Nama Dokumen</th>
                            <th class="py-3 px-4 font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">Tanggal Upload</th>
                            <th class="py-3 px-4 font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">Status</th>
                            <th class="py-3 px-4 font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">Catatan</th>
                            <th class="py-3 px-4 text-center font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($dokumen as $index => $item)
                        <tr class="hover:bg-blue-50 transition-colors">
                            <td class="py-3 px-4 font-medium text-gray-900">{{ $index + 1 }}</td>
                            <td class="py-3 px-4">{{ $item->opd->nama_opd ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $item->nama_dokumen }}</td>
                            <td class="py-3 px-4">{{ $item->created_at->format('d M Y') }}</td>
                            <td class="py-3 px-4">{{ $item->status ?? 'Belum diperiksa' }}</td>
                            <td class="py-3 px-4">{{ $item->catatan ?? '-' }}</td>
                            <td class="py-3 px-4 text-center flex justify-center gap-3">
                                <!-- Download Icon -->
                                <a href="{{ asset('storage/' . $item->file) }}" download
                                   class="text-blue-600 hover:text-blue-800" title="Download">
                                    <i class="fas fa-download text-lg"></i>
                                </a>

                                <!-- Update Status & Catatan Icon -->
                                <a href="javascript:void(0);" 
                                   class="text-green-600 hover:text-green-800" 
                                   title="Update Status & Catatan"
                                   onclick="openStatusModal({{ $item->id }}, '{{ $item->status ?? '' }}', '{{ $item->catatan ?? '' }}')">
                                    <i class="fas fa-edit text-lg"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center p-4 text-gray-500">Belum ada dokumen dari OPD</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    {{-- Footer --}}
    @include('components.footer')

</div>

{{-- Modal Update Status & Catatan --}}
@include('components.adminkelembagaan.ubah-modal-dokumen')

@endsection

@push('scripts')
<script>
    function openStatusModal(id, status, catatan) {
        const modal = document.getElementById('statusModal');
        const form = document.getElementById('statusForm');

        form.action = `/admin/kelola-dokumen/${id}`;
        document.getElementById('statusInput').value = status;
        document.getElementById('catatanInput').value = catatan;

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeStatusModal() {
        const modal = document.getElementById('statusModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
</script>
@endpush
