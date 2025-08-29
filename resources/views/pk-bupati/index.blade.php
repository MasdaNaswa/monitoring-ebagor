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
    <main class="flex-1 px-4 md:px-8 py-6 bg-[#F8FAFC]">

        <!-- Filter Tahun & Semester + Tombol Tambah -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 md:gap-6 px-4 md:px-6 py-4">
            <div class="flex flex-col md:flex-row items-center gap-4">
                <div class="flex items-center gap-3">
                    <label class="font-semibold text-gray-700 text-sm md:text-base">Tahun:</label>
                    <select id="yearFilter" class="py-2 px-3 rounded border border-gray-300 hover:border-primary transition focus:outline-none focus:ring-2 focus:ring-blue-200 text-sm md:text-base">
                        <option value="2025" {{ (isset($currentYear) && $currentYear == '2025') ? 'selected' : '' }}>2025</option>
                        <option value="2026" {{ (isset($currentYear) && $currentYear == '2026') ? 'selected' : '' }}>2026</option>
                        <option value="2027" {{ (isset($currentYear) && $currentYear == '2027') ? 'selected' : '' }}>2027</option>
                    </select>
                </div>
                <div class="flex items-center gap-3">
                    <label class="font-semibold text-gray-700 text-sm md:text-base">Semester:</label>
                    <select id="semesterFilter" class="py-2 px-3 rounded border border-gray-300 hover:border-primary transition focus:outline-none focus:ring-2 focus:ring-blue-200 text-sm md:text-base">
                        <option value="1" {{ (isset($currentSemester) && $currentSemester == '1') ? 'selected' : '' }}>I</option>
                        <option value="2" {{ (isset($currentSemester) && $currentSemester == '2') ? 'selected' : '' }}>II</option>
                    </select>
                </div>
            </div>

            <button class="flex items-center gap-2 bg-primary text-white py-2 px-4 rounded hover:bg-primary-dark transition focus:outline-none focus:ring-2 focus:ring-blue-300 text-sm md:text-base"
                onclick="openModal('addModal')">
                <i class="fas fa-plus"></i>
                <span>Tambah Data</span>
            </button>
        </div>

        <!-- Table -->
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
                            <td class="py-3 px-4 text-sm max-w-xs truncate" title="{{ $item['sasaranStrategis'] }}">{{ $item['sasaranStrategis'] }}</td>
                            <td class="py-3 px-4 text-sm max-w-xs truncate" title="{{ $item['indikatorKinerja'] }}">{{ $item['indikatorKinerja'] }}</td>
                            <td class="py-3 px-4 text-sm"><span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded">{{ $item['target2025'] }}</span></td>
                            <td class="py-3 px-4 text-sm font-semibold">{{ $item['satuan'] }}</td>
                            <td class="py-3 px-4 text-sm max-w-xs truncate" title="{{ $item['penanggungJawab'] }}">{{ $item['penanggungJawab'] }}</td>
                            <td class="py-3 px-4">
                                <div class="flex justify-center gap-1">
                                    <button class="p-2 text-green-600 hover:bg-green-100 rounded-lg transition-colors" title="Lihat" onclick="showDetail({{ $index }})"><i class="fas fa-eye text-sm"></i></button>
                                    <button class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition-colors" title="Edit" onclick="editData({{ $index }})"><i class="fas fa-edit text-sm"></i></button>
                                    <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition-colors" title="Hapus" onclick="deleteData({{ $index }})"><i class="fas fa-trash text-sm"></i></button>
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

    @include('components.tambah-modal-pk-bupati')
    @include('components.ubah-modal-pk-bupati')
    @include('components.detail-modal-pk-bupati')
    @include('components.hapus-modal')
    @include('components.footer')
</div>

<script>
const pkData = {!! isset($pkData) ? json_encode($pkData) : '[]' !!};
const indikatorData = {!! isset($indikatorData) ? json_encode($indikatorData) : '{}' !!};
let currentYear = '{{ isset($currentYear) ? $currentYear : "2025" }}';
let currentSemester = '{{ isset($currentSemester) ? $currentSemester : "1" }}';

document.addEventListener('DOMContentLoaded', () => {
    const yearFilter = document.getElementById("yearFilter");
    const semesterFilter = document.getElementById("semesterFilter");
    yearFilter?.addEventListener("change", function() {
        window.location.href = `?year=${this.value}&semester=${currentSemester}`;
    });
    semesterFilter?.addEventListener("change", function() {
        window.location.href = `?year=${currentYear}&semester=${this.value}`;
    });
});

function openModal(id){document.getElementById(id)?.classList.remove('hidden'); document.body.style.overflow='hidden';}
function closeModal(id){document.getElementById(id)?.classList.add('hidden'); document.body.style.overflow='auto';}

function editData(index){ if(pkData[index]) { populateEditForm(index); openModal('editModal'); } }
function populateEditForm(index){ const data=pkData[index]; if(!data) return; const set=(id,val)=>{const e=document.getElementById(id); if(e)e.value=val??'';}; set('editId',index); set('editNo',data.no); set('editTarget2025',data.target2025); set('editSatuan',data.satuan); set('editProgram',data.program); set('editAnalisisEvaluasi',data.analisisEvaluasi); set('editPenanggungJawab',data.penanggungJawab); for(let i=1;i<=4;i++){ set('editTargetTW'+i,data['targetTW'+i]); set('editRealisasiTW'+i,data['realisasiTW'+i]); set('editPaguAnggaranTW'+i,data['paguAnggaranTW'+i]); set('editRealisasiAnggaranTW'+i,data['realisasiAnggaranTW'+i]); } }

function showDetail(index){ const data=pkData[index]; if(!data) return; const set=(id,text)=>{const e=document.getElementById(id); if(e)e.textContent=text??'-';}; set('detailNo',data.no); set('detailTahun',data.tahun??currentYear); set('detailSasaranStrategis',data.sasaranStrategis); set('detailIndikatorKinerja',data.indikatorKinerja); set('detailTarget2025',data.target2025); set('detailSatuan',data.satuan); set('detailProgram',data.program); set('detailAnalisisEvaluasi',data.analisisEvaluasi); set('detailPenanggungJawab',data.penanggungJawab); for(let i=1;i<=4;i++){ set('detailTargetTW'+i,data['targetTW'+i]); set('detailRealisasiTW'+i,data['realisasiTW'+i]); set('detailPaguTW'+i,data['paguAnggaranTW'+i]); set('detailRealisasiAnggaranTW'+i,data['realisasiAnggaranTW'+i]); } openModal('detailModal'); }

function deleteData(index){ const data=pkData[index]; if(!data) return; openModal('hapusModal'); const e=document.getElementById('hapusItem'); if(e)e.textContent=`No ${data.no} - ${data.sasaranStrategis}`; }
</script>
@endsection
