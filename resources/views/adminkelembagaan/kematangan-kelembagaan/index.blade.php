@extends('layouts.adminkelembagaan')

@section('title', 'Hasil Survei Kematangan Kelembagaan')
@section('page-title', 'Hasil Survei Kematangan Kelembagaan')
@section('menu-kematangan', 'text-blue-600 font-bold')

@section('content')
    <div class="flex flex-col min-h-screen bg-[#F8FAFC]">

        <!-- Header -->
        <header class="bg-white shadow sticky top-0 z-30">
            <div class="flex justify-between items-center py-4 px-6 md:px-8">
                <h1 class="text-xl md:text-2xl font-semibold flex items-center gap-2">
                    <i class="fas fa-chart-line text-blue-600"></i>
                    <span class="hidden sm:inline">Hasil Survei Kematangan Kelembagaan</span>
                </h1>

                <!-- Filter OPD -->
                <div class="relative">
                    <i class="fas fa-building absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <select name="opd" onchange="this.form.submit()"
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full">
                        <option value="">Semua OPD</option>
                        @foreach($listOPD as $opd)
                            <option value="{{ $opd }}" {{ request('opd') == $opd ? 'selected' : '' }}>
                                {{ $opd }}
                            </option>
                        @endforeach
                    </select>
                </div>


            </div>
        </header>

        <!-- Statistik -->
        <div class="px-4 md:px-8 py-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Total Kemenpan -->
                <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Total Survei KemenPAN</p>
                            <p class="text-2xl font-bold text-blue-600">{{ $stats['total_kemenpan'] }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-chart-pie text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Kemendagri -->
                <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Total Survei Kemendagri</p>
                            <p class="text-2xl font-bold text-green-600">{{ $stats['total_kemendagri'] }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                            <i class="fas fa-chart-bar text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Rata-rata Kemenpan -->
                <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Rata-rata Skor KemenPAN</p>
                            <p class="text-2xl font-bold text-yellow-600">{{ $stats['avg_kemenpan'] }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">
                            <i class="fas fa-star text-yellow-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Rata-rata Kemendagri -->
                <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Rata-rata Skor Kemendagri</p>
                            <p class="text-2xl font-bold text-purple-600">{{ $stats['avg_kemendagri'] }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                            <i class="fas fa-star-half-alt text-purple-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Konten Utama -->
        <main class="flex-1 px-4 md:px-8 py-6">

            <!-- Tab Kemenpan / Kemendagri -->
            <div class="mb-6">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8">
                        <button id="tabKemenpan"
                            class="tab-button py-4 px-1 border-b-2 font-medium text-sm border-blue-500 text-blue-600">
                            <i class="fas fa-chart-pie mr-2"></i>
                            Hasil Survei KemenPAN
                        </button>
                        <button id="tabKemendagri"
                            class="tab-button py-4 px-1 border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">
                            <i class="fas fa-chart-bar mr-2"></i>
                            Hasil Survei Kemendagri
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Konten Kemenpan -->
            <div id="contentKemenpan" class="tab-content">
                <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-3 px-4 font-semibold border-b border-gray-200">No</th>
                                    <th class="py-3 px-4 font-semibold border-b border-gray-200">Nama OPD</th>
                                    <th class="py-3 px-4 font-semibold border-b border-gray-200">Tanggal Pengisian</th>
                                    <th class="py-3 px-4 font-semibold border-b border-gray-200">Skor Struktur</th>
                                    <th class="py-3 px-4 font-semibold border-b border-gray-200">Skor Proses</th>
                                    <th class="py-3 px-4 font-semibold border-b border-gray-200">Total Skor</th>
                                    <th class="py-3 px-4 font-semibold border-b border-gray-200">Tingkat Kematangan</th>
                                    <th class="py-3 px-4 text-center font-semibold border-b border-gray-200">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($evaluasiKemenpan as $index => $evaluasi)
                                    @php $interpretasi = $evaluasi->getInterpretasi(); @endphp
                                    <tr class="hover:bg-blue-50 transition-colors">
                                        <td class="py-3 px-4">
                                            {{ $index + 1 + (($evaluasiKemenpan->currentPage() - 1) * $evaluasiKemenpan->perPage()) }}
                                        </td>
                                        <td class="py-3 px-4 font-medium text-gray-900">{{ $evaluasi->nama_opd }}</td>
                                        <td class="py-3 px-4">{{ date('d M Y', strtotime($evaluasi->created_at)) }}</td>
                                        <td class="py-3 px-4">{{ $evaluasi->skor_struktur }}</td>
                                        <td class="py-3 px-4">{{ $evaluasi->skor_proses }}</td>
                                        <td class="py-3 px-4 font-bold">
                                            <span class="px-2 py-1 rounded-full text-xs {{ $interpretasi['warna'] }}">
                                                {{ $evaluasi->total_skor }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4">
                                            <span class="px-2 py-1 rounded-full text-xs {{ $interpretasi['warna'] }}">
                                                {{ $interpretasi['level'] }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4 text-center flex justify-center gap-3">
                                           <button
    x-data
    @click="$dispatch('open-modal-kemenpan', {{ $evaluasi->id}})"
    class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition"
    title="Lihat Detail">
    <i class="fas fa-eye text-sm"></i>
</button>


                                            <button type="button"
                                                class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition"
                                                onclick="openHapusModal({{ $evaluasi->id}}, 'kemenpan', '{{ $evaluasi->nama_opd }}')"
                                                title="Hapus Data">
                                                <i class="fas fa-trash text-sm"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center p-6 text-gray-500">
                                            <i class="fas fa-inbox text-3xl mb-2 text-gray-300"></i>
                                            <p>Belum ada hasil survei KemenPAN</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if($evaluasiKemenpan->hasPages())
                        <div class="px-4 py-3 border-t border-gray-200">
                            {{ $evaluasiKemenpan->appends(request()->except('kemenpan_page'))->links() }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Konten Kemendagri -->
            <div id="contentKemendagri" class="tab-content hidden">
                <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-3 px-4 font-semibold border-b border-gray-200">No</th>
                                    <th class="py-3 px-4 font-semibold border-b border-gray-200">Nama OPD</th>
                                    <th class="py-3 px-4 font-semibold border-b border-gray-200">Tanggal Pengisian</th>
                                    <th class="py-3 px-4 font-semibold border-b border-gray-200">Total Skor</th>
                                    <th class="py-3 px-4 font-semibold border-b border-gray-200">Tingkat Maturitas</th>
                                    <th class="py-3 px-4 text-center font-semibold border-b border-gray-200">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($evaluasiKemendagri as $index => $evaluasi)
                                    <tr class="hover:bg-green-50 transition-colors">
                                        <td class="py-3 px-4">
                                            {{ $index + 1 + (($evaluasiKemendagri->currentPage() - 1) * $evaluasiKemendagri->perPage()) }}
                                        </td>
                                        <td class="py-3 px-4 font-medium text-gray-900">{{ $evaluasi->nama_opd }}</td>
                                        <td class="py-3 px-4">{{ date('d M Y', strtotime($evaluasi->created_at)) }}</td>
                                        <td class="py-3 px-4 font-bold text-green-600">{{ $evaluasi->total_skor }}</td>
                                        <td class="py-3 px-4">
                                            <span class="px-2 py-1 rounded-full text-xs 
                                                                    @if($evaluasi->tingkat_maturitas == 'SANGAT TINGGI') bg-green-100 text-green-800
                                                                    @elseif($evaluasi->tingkat_maturitas == 'TINGGI') bg-blue-100 text-blue-800
                                                                    @elseif($evaluasi->tingkat_maturitas == 'SEDANG') bg-yellow-100 text-yellow-800
                                                                    @elseif($evaluasi->tingkat_maturitas == 'RENDAH') bg-orange-100 text-orange-800
                                                                    @else bg-red-100 text-red-800 @endif">
                                                {{ $evaluasi->tingkat_maturitas }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4 text-center flex justify-center gap-3">
                                            <a href="{{ route('adminkelembagaan.kematangan-kelembagaan.show-kemendagri', $evaluasi->id) }}"
                                                class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition"
                                                title="Lihat Detail">
                                                <i class="fas fa-eye text-sm"></i>
                                            </a>
                                            <button type="button"
                                                class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition"
                                                onclick="openHapusModal({{ $evaluasi->id }}, 'kemendagri', '{{ $evaluasi->nama_opd }}')"
                                                title="Hapus Data">
                                                <i class="fas fa-trash text-sm"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-6 text-gray-500">
                                            <i class="fas fa-inbox text-3xl mb-2 text-gray-300"></i>
                                            <p>Belum ada hasil survei Kemendagri</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if($evaluasiKemendagri->hasPages())
                        <div class="px-4 py-3 border-t border-gray-200">
                            {{ $evaluasiKemendagri->appends(request()->except('kemendagri_page'))->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </main>

        <!-- Modal Hapus -->
        @include('components.adminkelembagaan.hapus-modal-survei')

        <!-- Modal Detail Kemenpan -->
        @include('components.adminkelembagaan.detail-modal-survei-kemenpan', [
    'evaluasi' => null,
    'nama_opd' => null,
    'jawaban' => null,
    'interpretasi' => null,
    'detailPerhitungan' => null
])


        {{-- Footer --}}
        @include('components.footer')

    </div>
@endsection

@push('scripts')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script >
        // Tab functionality
        document.getElementById('tabKemenpan').addEventListener('click', function () {
            setActiveTab('kemenpan');
        });
        document.getElementById('tabKemendagri').addEventListener('click', function () {
            setActiveTab('kemendagri');
        });
        function setActiveTab(tabName) {
            const tabs = document.querySelectorAll('.tab-button');
            tabs.forEach(tab => {
                tab.classList.remove('border-blue-500', 'text-blue-600');
                tab.classList.add('border-transparent', 'text-gray-500');
            });
            const activeTab = document.getElementById('tab' + tabName.charAt(0).toUpperCase() + tabName.slice(1));
            activeTab.classList.remove('border-transparent', 'text-gray-500');
            activeTab.classList.add('border-blue-500', 'text-blue-600');

            const contents = document.querySelectorAll('.tab-content');
            contents.forEach(content => content.classList.add('hidden'));
            document.getElementById('content' + tabName.charAt(0).toUpperCase() + tabName.slice(1)).classList.remove('hidden');
        }

        // Delete modal
        function openHapusModal(id, type, opdName) {
            const modal = document.getElementById('hapusModalSurvei');
            const form = document.getElementById('hapusFormSurvei');
            const opdSpan = document.getElementById('opdNameSurvei');
            form.action = `/adminkelembagaan/kematangan-kelembagaan/${id}?type=${type}`;
            opdSpan.textContent = opdName;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closeHapusModal() {
            const modal = document.getElementById('hapusModalSurvei');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('hapusModalSurvei');
            if (modal) {
                modal.addEventListener('click', function (e) {
                    if (e.target === modal) closeHapusModal();
                });
            }
        });
    </script>
@endpush