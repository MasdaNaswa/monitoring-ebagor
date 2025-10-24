@extends('layouts.adminrb')

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

        <!-- Konten Utama -->
        <main class="flex-1 px-4 md:px-8 py-6 bg-[#F8FAFC]">

            <!-- Filter + Tombol -->
            <div class="flex flex-col md:flex-row justify-between items-center px-4 md:px-6 py-4 gap-4 md:gap-0">
                <div class="flex items-center gap-3">
                    <label class="font-semibold text-gray-700 text-sm md:text-base">Tahun:</label>
                    <select id="yearFilter"
                        class="py-2 px-3 rounded border border-gray-300 hover:border-blue-500 transition focus:outline-none focus:ring-2 focus:ring-blue-200 text-sm md:text-base">
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                    </select>
                </div>

                <div class="flex gap-2">
                    <button
                        class="flex items-center gap-2 bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition focus:outline-none focus:ring-2 focus:ring-green-300 text-sm md:text-base"
                        onclick="openModal('unduhModal')">
                        <span>Unduh</span>
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

                <!-- RB General Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">
                                    No</th>
                                <th
                                    class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">
                                    OPD</th>
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
                                <td class="py-3 px-4 font-medium text-gray-900 text-sm">Dinas Kesehatan</td>
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
                                <td class="py-3 px-4 text-sm"><span class="font-semibold">68</span></td>
                                <td class="py-3 px-4">
                                    <div class="flex justify-center gap-1">
                                        <button
                                            class="p-2 text-green-600 hover:bg-green-100 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-green-200"
                                            title="Lihat" onclick="opendetailModal()">
                                            <i class="fas fa-eye text-sm"></i>
                                        </button>
                                        <button
                                            class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-yellow-200"
                                            title="Edit" onclick="openEditModal(1)">
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
                <div class="px-4 md:px-6 py-4 border-t flex justify-between text-sm text-gray-600">
                    <span>Menampilkan 1 entri</span>
                    <div class="flex gap-1">
                        <button class="px-2 py-1 rounded bg-gray-200"><i class="fas fa-chevron-left"></i></button>
                        <button class="px-3 py-1 rounded bg-blue-600 text-white">1</button>
                        <button class="px-2 py-1 rounded bg-gray-200"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </main>

        <!-- Modals -->
        @include('components.adminrb.tambah-modal-opd')
        @include('components.adminrb.unduh-modal')
        @include('components.footer')

        <!-- Modal Detail -->
        @include('components.adminrb.detail-modal-opd-rb-general')

        <!-- Modal Hapus -->
        @include('components.adminrb.hapus-modal-opd-rb-general')
    </div>

    <!-- Scripts -->
    <script>
        function openModal(id) {
            document.getElementById(id)?.classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id)?.classList.add('hidden');
        }

        function openHapusModal(id) {
            const form = document.getElementById("hapusForm");
            if (form) form.action = `/rb-general/${id}`;
            openModal("hapusModal");
        }

        // Data Dummy untuk detail modal
        const detailSampleData = {
            no: "1",
            sasaranStrategi: "Terciptanya Tata Kelola Pemerintahan Digital",
            indikator: "Indeks SPBE",
            target: "75 (Nilai)",
            satuan: "Nilai",
            target2025: "75",
            rencanaAksi: "Meningkatkan digitalisasi layanan publik",
            output: "Laporan SPBE",
            satuanOutput: "Dokumen",
            indikatorOutput: "Kelengkapan Laporan",
            tw1Target: "20",
            tw1Rp: "1000000",
            tw2Target: "25",
            tw2Rp: "1500000",
            tw3Target: "15",
            tw3Rp: "1000000",
            tw4Target: "15",
            tw4Rp: "1000000",
            rumus: "TW1+TW2+TW3+TW4",
            catatanEvaluasi: "Perlu perbaikan sistem",
            catatanPerbaikan: "Update modul layanan",
            unitKerja: "BKD",
            pelaksana: "Admin OPD"
        };

        // Fungsi buka modal detail
        function opendetailModal() {
            opendetailModalWithData(detailSampleData);
        }

        function opendetailModalWithData(data) {
            document.getElementById('detailNo').value = data.no;
            document.getElementById('detailSasaranStrategi').value = data.sasaranStrategi;
            document.getElementById('detailIndikator').value = data.indikator;
            document.getElementById('detailTarget').value = data.target;

            if (document.getElementById('detailSatuan')) {
                document.getElementById('detailSatuan').value = data.satuan;
            }
            if (document.getElementById('detailTarget2025')) {
                document.getElementById('detailTarget2025').value = data.target2025;
            }

            document.getElementById('detailRencanaAksi').value = data.rencanaAksi;
            document.getElementById('detailOutput').value = data.output;
            document.getElementById('detailSatuanOutput').value = data.satuanOutput;
            document.getElementById('detailIndikatorOutput').value = data.indikatorOutput;
            document.getElementById('detailTw1Target').value = data.tw1Target;
            document.getElementById('detailTw1Rp').value = data.tw1Rp;
            document.getElementById('detailTw2Target').value = data.tw2Target;
            document.getElementById('detailTw2Rp').value = data.tw2Rp;
            document.getElementById('detailTw3Target').value = data.tw3Target;
            document.getElementById('detailTw3Rp').value = data.tw3Rp;
            document.getElementById('detailTw4Target').value = data.tw4Target;
            document.getElementById('detailTw4Rp').value = data.tw4Rp;
            document.getElementById('detailRumus').value = data.rumus;
            document.getElementById('detailCatatanEvaluasi').value = data.catatanEvaluasi;
            document.getElementById('detailCatatanPerbaikan').value = data.catatanPerbaikan;
            document.getElementById('detailUnitKerja').value = data.unitKerja;
            document.getElementById('detailPelaksana').value = data.pelaksana;

            openModal('detailModal');
        }

        document.addEventListener('DOMContentLoaded', function () {
            const editForm = document.getElementById('editRenaksiRB');
            if (editForm) {
                editForm.addEventListener('submit', e => {
                    e.preventDefault();
                    alert('Data berhasil diperbarui!');
                    closeModal('editModal');
                });
            }
            const tambahForm = document.getElementById('tambahRenaksiRB');
            if (tambahForm) {
                tambahForm.addEventListener('submit', e => {
                    e.preventDefault();
                    alert('Data berhasil ditambahkan!');
                    closeModal('addModal');
                });
            }
        });
    </script>
@endsection