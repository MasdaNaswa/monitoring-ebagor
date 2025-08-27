@extends('layouts.app')

@section('title', 'PK Bupati - E-BAGOR')

@section('content')
<div class="flex flex-col min-h-screen">

    <!-- Header -->
    <header class="bg-white shadow sticky top-0 z-30">
        <div class="flex justify-between items-center py-4 px-6 md:px-8">
            <h1 class="text-xl md:text-2xl font-semibold flex items-center gap-2">
                <i class="fas fa-file-alt text-blue-600"></i>
                <span class="hidden sm:inline">PK Bupati</span>
            </h1>
            <div class="relative group">
                <button class="flex items-center gap-2 bg-gray-100 rounded-full px-3 py-1 hover:bg-gray-200 transition-colors">
                    <i class="fas fa-user-circle text-xl md:text-2xl text-blue-600"></i>
                    <span class="text-sm md:text-base">Admin OPD</span>
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-lg rounded-md opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-opacity duration-200 z-50">
                    <ul class="py-2 text-gray-700 text-sm">
                        <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Profil Saya</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- Konten Utama -->
    <main class="flex-1 px-4 md:px-8 py-6">

        <!-- Filter Tahun & Semester + Tombol Tambah -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 md:gap-6 px-4 md:px-6 py-4">
            <div class="flex flex-col md:flex-row items-center gap-4">
                <!-- Tahun -->
                <div class="flex items-center gap-3">
                    <label class="font-semibold text-gray-700 text-sm md:text-base">Tahun:</label>
                    <select id="yearFilter" class="py-2 px-3 rounded border border-gray-300 hover:border-primary transition focus:outline-none focus:ring-2 focus:ring-blue-200 text-sm md:text-base">
                        <option value="2025" {{ $currentYear == '2025' ? 'selected' : '' }}>2025</option>
                        <option value="2026" {{ $currentYear == '2026' ? 'selected' : '' }}>2026</option>
                        <option value="2027" {{ $currentYear == '2027' ? 'selected' : '' }}>2027</option>
                    </select>
                </div>
                <!-- Semester -->
                <div class="flex items-center gap-3">
                    <label class="font-semibold text-gray-700 text-sm md:text-base">Semester:</label>
                    <select id="semesterFilter" class="py-2 px-3 rounded border border-gray-300 hover:border-primary transition focus:outline-none focus:ring-2 focus:ring-blue-200 text-sm md:text-base">
                        <option value="1" {{ $currentSemester == '1' ? 'selected' : '' }}>I</option>
                        <option value="2" {{ $currentSemester == '2' ? 'selected' : '' }}>II</option>
                    </select>
                </div>
            </div>

            <!-- Tombol Tambah Data -->
            <button class="flex items-center gap-2 bg-primary text-white py-2 px-4 rounded hover:bg-primary-dark transition focus:outline-none focus:ring-2 focus:ring-blue-300 text-sm md:text-base"
                onclick="openModal('addModal')">
                <i class="fas fa-plus"></i>
                <span>Tambah Data</span>
            </button>
        </div>

        <!-- Table Container -->
        <div class="bg-white shadow rounded-lg mt-6 overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">NO</th>
                            <th class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">Sasaran Strategis</th>
                            <th class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">Indikator Kinerja</th>
                            <th class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">Target 2025</th>
                            <th class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">Satuan</th>
                            <th class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">Penanggung Jawab</th>
                            <th class="py-3 px-4 text-center font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @if(empty($pkData))
                        <tr>
                            <td colspan="7" class="py-4 px-4 text-center text-gray-500">Tidak ada data</td>
                        </tr>
                        @else
                        @foreach($pkData as $index => $item)
                        <tr class="hover:bg-blue-50 transition-colors">
                            <td class="py-3 px-4 font-medium text-gray-900 text-sm">{{ $item['no'] }}</td>
                            <td class="py-3 px-4 text-sm max-w-xs">
                                <div class="truncate" title="{{ $item['sasaranStrategis'] }}">{{ $item['sasaranStrategis'] }}</div>
                            </td>
                            <td class="py-3 px-4 text-sm max-w-xs">
                                <div class="truncate" title="{{ $item['indikatorKinerja'] }}">{{ $item['indikatorKinerja'] }}</div>
                            </td>
                            <td class="py-3 px-4 text-sm">
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded">{{ $item['target2025'] }}</span>
                            </td>
                            <td class="py-3 px-4 text-sm">
                                <span class="font-semibold">{{ $item['satuan'] }}</span>
                            </td>
                            <td class="py-3 px-4 text-sm max-w-xs">
                                <div class="truncate" title="{{ $item['penanggungJawab'] }}">{{ $item['penanggungJawab'] }}</div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="flex justify-center gap-1">
                                    <button class="p-2 text-green-600 hover:bg-green-100 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-green-200" title="Lihat" onclick="showDetail({{ $index }})">
                                        <i class="fas fa-eye text-sm"></i>
                                    </button>
                                    <button class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-200" title="Edit" onclick="editData({{ $index }})">
                                        <i class="fas fa-edit text-sm"></i>
                                    </button>
                                    <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-red-200" title="Hapus" onclick="deleteData({{ $index }})">
                                        <i class="fas fa-trash text-sm"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Modals -->
    @include('components.tambah-modal-pk-bupati')
    @include('components.ubah-modal-pk-bupati')
    @include('components.detail-modal-pk-bupati')

    <!-- Footer -->
    @include('components.footer')
</div>

<!-- Scripts -->
<script>
const pkData = @json($pkData);
let currentYear = '{{ $currentYear }}';
let currentSemester = '{{ $currentSemester }}';

// Filter tahun & semester
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById("yearFilter").addEventListener("change", function() {
        window.location.href = `?year=${this.value}&semester=${currentSemester}`;
    });
    document.getElementById("semesterFilter").addEventListener("change", function() {
        window.location.href = `?year=${currentYear}&semester=${this.value}`;
    });
});

// Modal open/close
function openModal(id) { document.getElementById(id)?.classList.remove('hidden'); document.body.style.overflow='hidden'; }
function closeModal(id) { document.getElementById(id)?.classList.add('hidden'); document.body.style.overflow='auto'; }

// Show detail modal
function showDetail(index) {
    const data = pkData[index];
    if (!data) return;
    openDetailModalWithData(data);
}

// Open detail modal with data
function openDetailModalWithData(data) {
    let detailHTML = `
        <div class="bg-gray-50 rounded-lg p-4 mb-5">
            <h3 class="text-primary text-md font-semibold mb-4">Informasi Dasar</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div><label class="block font-medium mb-1">NO</label><div class="p-2 border-b border-gray-200">${data.no}</div></div>
                <div><label class="block font-medium mb-1">Tahun</label><div class="p-2 border-b border-gray-200">2025</div></div>
            </div>
            <div class="mb-4"><label class="block font-medium mb-1">Sasaran Strategis</label><div class="p-2 border-b border-gray-200">${data.sasaranStrategis}</div></div>
            <div class="mb-4"><label class="block font-medium mb-1">Indikator Kinerja</label><div class="p-2 border-b border-gray-200">${data.indikatorKinerja}</div></div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div><label class="block font-medium mb-1">Target 2025</label><div class="p-2 border-b border-gray-200">${data.target2025}</div></div>
                <div><label class="block font-medium mb-1">Satuan</label><div class="p-2 border-b border-gray-200">${data.satuan}</div></div>
            </div>
            <div class="mb-4"><label class="block font-medium mb-1">Program</label><div class="p-2 border-b border-gray-200">${data.program || "-"}</div></div>
            <div class="mb-4"><label class="block font-medium mb-1">Penjelasan Analisis dan Evaluasi</label><div class="p-2 border-b border-gray-200">${data.analisisEvaluasi || "-"}</div></div>
            <div class="mb-4"><label class="block font-medium mb-1">Penanggung Jawab</label><div class="p-2 border-b border-gray-200">${data.penanggungJawab}</div></div>
        </div>

        <div class="bg-gray-50 rounded-lg p-4 mb-5">
            <h3 class="text-primary text-md font-semibold mb-4">Target dan Realisasi per Triwulan</h3>
            <div class="flex gap-2 mb-4">
                <button type="button" class="tablinks active" onclick="openDetailTab(event, 'detailTriwulan1')">Triwulan I</button>
                <button type="button" class="tablinks" onclick="openDetailTab(event, 'detailTriwulan2')">Triwulan II</button>
                <button type="button" class="tablinks" onclick="openDetailTab(event, 'detailTriwulan3')">Triwulan III</button>
                <button type="button" class="tablinks" onclick="openDetailTab(event, 'detailTriwulan4')">Triwulan IV</button>
            </div>

            ${['1','2','3','4'].map(i => `
                <div id="detailTriwulan${i}" class="tabcontent" style="display: ${i==1 ? 'block':'none'};">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div><label class="block font-medium mb-1">Target</label><div class="p-2 border-b border-gray-200">${data['targetTW'+i] || '-'}</div></div>
                        <div><label class="block font-medium mb-1">Realisasi</label><div class="p-2 border-b border-gray-200">${data['realisasiTW'+i] || '-'}</div></div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div><label class="block font-medium mb-1">Pagu Anggaran</label><div class="p-2 border-b border-gray-200">${data['paguAnggaranTW'+i] || '-'}</div></div>
                        <div><label class="block font-medium mb-1">Realisasi Anggaran</label><div class="p-2 border-b border-gray-200">${data['realisasiAnggaranTW'+i] || '-'}</div></div>
                    </div>
                </div>
            `).join('')}
        </div>
    `;

    document.getElementById("detailContent").innerHTML = detailHTML;
    openModal("detailModal");
}

// Tabs
function openDetailTab(evt, tabId) {
    document.querySelectorAll('#detailContent .tabcontent').forEach(tc => tc.style.display = 'none');
    document.querySelectorAll('#detailContent .tablinks').forEach(btn => btn.classList.remove('active'));
    document.getElementById(tabId).style.display = 'block';
    evt.currentTarget.classList.add('active');
}
</script>
@endsection
