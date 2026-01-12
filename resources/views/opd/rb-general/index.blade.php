@extends('layouts.app')

@section('title', 'Monitoring Bagor')

@section('content')
    <div class="flex flex-col min-h-screen">

        <!-- Header -->
        <header class="bg-white shadow sticky top-0 z-30">
            <div class="flex justify-between items-center py-4 px-6 md:px-8">
                <h1 class="text-xl md:text-2xl font-semibold flex items-center gap-2">
                    <i class="fas fa-file-alt text-blue-600"></i>
                    <span class="hidden sm:inline">RB General</span>
                </h1>
                <!-- Bagian tombol Admin OPD -->
                <div class="relative group">
                    <button
                        class="flex items-center gap-2 bg-gray-100 rounded-full px-3 py-1 hover:bg-gray-200 transition-colors">
                        <i class="fas fa-user-circle text-xl md:text-2xl text-blue-600"></i>
                        <span class="text-sm md:text-base">Admin OPD</span>
                    </button>

                    <!-- Dropdown profil -->
                    <div
                        class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-lg rounded-md opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-opacity duration-200 z-50">
                        <ul class="py-2 text-gray-700 text-sm">
                            <li>
                                <a href="{{ route('opd.profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">
                                    Profil Saya
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </header>

        <!-- Konten Utama -->
        <main class="flex-1 px-4 md:px-8 py-6 bg-[#F8FAFC]">
            <div class="flex flex-col md:flex-row justify-between items-center px-4 md:px-6 py-4 gap-4 md:gap-0">
                <div class="flex items-center gap-3">
                    <label class="font-semibold text-gray-700 text-sm md:text-base">Tahun:</label>
                    @php
                        $startYear = 2024;
                        $currentYear = now()->year;
                        $selectedYear = request()->get('year', $currentYear);
                        $years = range($startYear, $currentYear);
                    @endphp
                    <form method="GET">
                        <select name="year" id="yearFilter"
                            class="py-2 px-3 rounded border border-gray-300 hover:border-blue-500 transition focus:outline-none focus:ring-2 focus:ring-blue-200 text-sm md:text-base"
                            onchange="this.form.submit()">
                            @foreach($years as $year)
                                <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>


                <div class="flex gap-2">
                    <button
                        class="flex items-center gap-2 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-300 text-sm md:text-base"
                        onclick="openModal('addModal')">
                        <span>Tambah</span>
                    </button>

                </div>
            </div>

            <!-- Table Container -->
            <div class="bg-white shadow rounded-lg mt-6 overflow-hidden border border-gray-200">
                <div
                    class="px-4 md:px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                    <h2 class="text-lg md:text-xl font-semibold text-gray-800">Daftar RB General</h2>
                    <div class="relative w-full sm:w-auto">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" placeholder="Cari..."
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 w-full text-sm">
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">
                                    No</th>
                                <th
                                    class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">
                                    Sasaran Strategis</th>
                                <th
                                    class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">
                                    Indikator</th>
                                <th
                                    class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">
                                    Target</th>
                                <th
                                    class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">
                                    Capaian</th>
                                <th
                                    class="py-3 px-4 text-center font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-blue-50 transition-colors">
                                <td class="py-3 px-4 font-medium text-gray-900 text-sm">1</td>
                                <td class="py-3 px-4 text-sm max-w-xs">
                                    <div class="truncate" title="Terciptanya Tata Kelola Pemerintahan Digital">
                                        Terciptanya Tata Kelola Pemerintahan Digital
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-sm">Indeks SPBE</td>
                                <td class="py-3 px-4 text-sm">
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded">75
                                        (Nilai)</span>
                                </td>
                                <td class="py-3 px-4 text-sm">
                                    <span class="font-semibold">68</span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex justify-center gap-1">
                                        <button
                                            class="p-2 text-green-600 hover:bg-green-100 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-green-200"
                                            title="Lihat" onclick="openDetailModal()">
                                            <i class="fas fa-eye text-sm"></i>
                                        </button>
                                        <button
                                            class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-200"
                                            title="Edit" onclick="openEditModal()">
                                            <i class="fas fa-edit text-sm"></i>
                                        </button>
                                        <button
                                            class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-red-200"
                                            title="Hapus" onclick="openHapusModal(1)">
                                            <i class="fas fa-trash text-sm"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div
                    class="px-4 md:px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between space-y-3 sm:space-y-0">
                    <div class="text-xs md:text-sm text-gray-700">
                        Menampilkan <span class="font-semibold">1-1</span> dari <span class="font-semibold">1</span> entri
                    </div>
                    <div class="flex space-x-1">
                        <button
                            class="px-2 py-1.5 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors focus:outline-none focus:ring-2 focus:ring-gray-300 text-sm">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button
                            class="px-3 py-1.5 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-300 text-sm">
                            1
                        </button>
                        <button
                            class="px-2 py-1.5 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors focus:outline-none focus:ring-2 focus:ring-gray-300 text-sm">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </main>

        <!-- Modals -->
        @include('components.opd.tambah-modal-rb-general')
        @include('components.opd.ubah-modal-rb-general')
        @include('components.opd.detail-modal-rb-general')
        @include('components.opd.hapus-modal')

        <!-- Footer -->
        @include('components.footer')
    </div>

    <!-- Scripts -->
    <script>
        // Modal umum
        function openModal(id) { document.getElementById(id)?.classList.remove('hidden'); }
        function closeModal(id) { document.getElementById(id)?.classList.add('hidden'); }

        // Modal Hapus
        function openHapusModal(id) {
            const form = document.getElementById("hapusForm");
            form.action = `/rb-general/${id}`;
            openModal("hapusModal");
        }

        // Dummy data detail
        const detailSampleData = {
            no: 'RB-GEN-001', tahun: '2025', sasaranStrategi: 'A. Terwujudnya Transformasi Digital',
            indikator: 'Indeks SPBE', target: '75', satuan: 'Nilai', target2025: '75',
            rencanaAksi: 'Meningkatkan indeks SPBE melalui digitalisasi layanan publik dan optimalisasi sistem informasi pemerintah daerah.',
            output: 'Laporan Implementasi SPBE', satuanOutput: 'Dokumen', indikatorOutput: 'Tersedianya laporan implementasi SPBE yang komprehensif',
            tw1Target: '20', tw1Rp: '50.000.000', tw2Target: '40', tw2Rp: '75.000.000',
            tw3Target: '60', tw3Rp: '60.000.000', tw4Target: '75', tw4Rp: '65.000.000',
            totalAnggaran: '250.000.000', rumus: '(Capaian / Target) × 100', catatanEvaluasi: 'Perlu peningkatan capaian pada triwulan 3 untuk memenuhi target akhir tahun',
            catatanPerbaikan: 'Koordinasi intensif dengan OPD terkait diperlukan untuk mempercepat implementasi',
            unitKerja: 'Dinas Komunikasi dan Informatika (Diskominfo)', pelaksana: 'Seluruh Perangkat Daerah',
            status: 'Draft', lastUpdated: '12 November 2023, 14:30 WIB'
        };

        // Modal detail
        function openDetailModal() { openDetailModalWithData(detailSampleData); }
        function openDetailModalWithData(data) {
            const statusEl = document.getElementById('detailStatus');
            if (statusEl) { statusEl.textContent = data.status; statusEl.className = 'px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800'; }
            openModal('detailModal');
        }

        // Modal edit
        function openEditModal() { openEditModalWithData(detailSampleData); }
        function openEditModalWithData(data) { openModal('editModal'); }

        // Event DOM loaded
        document.addEventListener('DOMContentLoaded', function () {
            const editForm = document.getElementById('editRenaksiRB');
            if (editForm) { editForm.addEventListener('submit', e => { e.preventDefault(); alert('Data berhasil diperbarui!'); closeModal('editModal'); }); }
            const tambahForm = document.getElementById('tambahRenaksiRB');
            if (tambahForm) { tambahForm.addEventListener('submit', e => { e.preventDefault(); alert('Data berhasil ditambahkan!'); closeModal('addModal'); }); }
        });
    </script>
@endsection