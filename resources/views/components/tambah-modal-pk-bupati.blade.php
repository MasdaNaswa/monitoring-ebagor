<div id="addModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-6xl max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="flex justify-between items-center bg-blue-600 text-white p-6 rounded-t-lg sticky top-0 z-10">
            <h3 class="text-xl font-semibold flex items-center gap-2">
                <i class="fas fa-plus-circle"></i> Tambah Data PK Bupati
            </h3>
            <button class="btn-close text-2xl hover:text-gray-200" onclick="closeModal('addModal')">&times;</button>
        </div>

        <!-- Modal Body -->
        <div class="p-6">
            <form id="pkForm">
                <input type="hidden" id="editIndex" />

                <!-- Informasi Dasar -->
                <div class="mb-6 p-6 bg-gray-50 rounded-lg border-l-4 border-blue-500">
                    <h3 class="text-md font-semibold text-blue-800 mb-4">Informasi Dasar</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">NO</label>
                            <input type="text" id="no" name="no" required 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sasaran Strategis</label>
                        <select id="sasaranStrategis" name="sasaranStrategis" required 
                                onchange="updateIndikator()"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Pilih Sasaran Strategis</option>
                            <option value="1">1. Meningkatnya Investasi Daerah</option>
                            <option value="2">2. Berkembangnya Sektor Ekonomi Dominan</option>
                            <option value="3">3. Meningkatnya Pendapatan Asli Daerah</option>
                            <option value="4">4. Meningkatnya Akses Kebutuhan Insfrastruktur Dasar Masyarakat Yang Merata</option>
                            <option value="5">5. Terwujudnya Prasarana Penghubung yang Optimal</option>
                            <option value="6">6. Meningkatnya Derajat Kesehatan Masyarakat</option>
                            <option value="7">7. Meningkatnya Derajat Pendidikan Masyarakat</option>
                            <option value="8">8. Terwujudnya Kesetaraan Gender</option>
                            <option value="9">9. Terwujudnya Pengendalian Penduduk</option>
                            <option value="10">10. Meningkatnya Peran Pemuda Dalam Pembangunan</option>
                            <option value="11">11. Meningkatnya Peran Serta Masyarakat Dalam Pelestarian Nilai Budaya Daerah</option>
                            <option value="12">12. Meningkatnya Kesejahteraan Sosial</option>
                            <option value="13">13. Mendorong Perluasan Dan Kesempatan Kerja Bagi Tenaga Kerja di Daerah</option>
                            <option value="14">14. Meningkatnya Pengelolaan dan Kelestarian Lingkungan Hidup</option>
                            <option value="15">15. Meningkatnya Kualitas Udara, Tanah dan Air</option>
                            <option value="16">16. Terwujudnya Birokrasi Yang Profesional, Bersih dan Akuntabel</option>
                            <option value="17">17. Meningkatnya Kualitas Pelayanan Publik</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Indikator Kinerja</label>
                        <select id="indikatorKinerja" name="indikatorKinerja" required 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Pilih Sasaran Strategis terlebih dahulu</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Target 2025</label>
                            <input type="text" id="target2025" name="target2025" required 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Satuan</label>
                            <input type="text" id="satuan" name="satuan" required 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>

                <!-- Target dan Realisasi per Triwulan -->
                <div class="mb-6 p-6 bg-green-50 rounded-lg border-l-4 border-green-500">
                    <h3 class="text-md font-semibold text-green-800 mb-4">Target dan Realisasi per Triwulan</h3>
                    
                    <div class="flex gap-2 border-b pb-2 mb-4">
                        <button type="button" class="tablinks px-4 py-2 rounded-md bg-gray-200" onclick="openFormTab(event, 'triwulan1')">Triwulan I</button>
                        <button type="button" class="tablinks px-4 py-2 rounded-md bg-gray-100" onclick="openFormTab(event, 'triwulan2')">Triwulan II</button>
                        <button type="button" class="tablinks px-4 py-2 rounded-md bg-gray-100" onclick="openFormTab(event, 'triwulan3')">Triwulan III</button>
                        <button type="button" class="tablinks px-4 py-2 rounded-md bg-gray-100" onclick="openFormTab(event, 'triwulan4')">Triwulan IV</button>
                    </div>

                    <!-- Triwulan 1 -->
                    <div id="triwulan1" class="tabcontent">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Target</label>
                                <input type="text" id="targetTW1" name="targetTW1" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Realisasi</label>
                                <input type="text" id="realisasiTW1" name="realisasiTW1" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Pagu Anggaran</label>
                                <input type="text" id="paguAnggaranTW1" name="paguAnggaranTW1" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Realisasi Anggaran</label>
                                <input type="text" id="realisasiAnggaranTW1" name="realisasiAnggaranTW1" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Triwulan 2 -->
                    <div id="triwulan2" class="tabcontent hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Target</label>
                                <input type="text" id="targetTW2" name="targetTW2" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Realisasi</label>
                                <input type="text" id="realisasiTW2" name="realisasiTW2" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Pagu Anggaran</label>
                                <input type="text" id="paguAnggaranTW2" name="paguAnggaranTW2" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Realisasi Anggaran</label>
                                <input type="text" id="realisasiAnggaranTW2" name="realisasiAnggaranTW2" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Triwulan 3 -->
                    <div id="triwulan3" class="tabcontent hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Target</label>
                                <input type="text" id="targetTW3" name="targetTW3" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Realisasi</label>
                                <input type="text" id="realisasiTW3" name="realisasiTW3" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Pagu Anggaran</label>
                                <input type="text" id="paguAnggaranTW3" name="paguAnggaranTW3" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Realisasi Anggaran</label>
                                <input type="text" id="realisasiAnggaranTW3" name="realisasiAnggaranTW3" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Triwulan 4 -->
                    <div id="triwulan4" class="tabcontent hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Target</label>
                                <input type="text" id="targetTW4" name="targetTW4" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Realisasi</label>
                                <input type="text" id="realisasiTW4" name="realisasiTW4" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Pagu Anggaran</label>
                                <input type="text" id="paguAnggaranTW4" name="paguAnggaranTW4" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Realisasi Anggaran</label>
                                <input type="text" id="realisasiAnggaranTW4" name="realisasiAnggaranTW4" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Program dan Analisis -->
                <div class="mb-6 p-6 bg-amber-50 rounded-lg border-l-4 border-amber-500">
                    <h3 class="text-md font-semibold text-amber-800 mb-4">Program dan Analisis</h3>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Program</label>
                        <input type="text" id="program" name="program" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Penjelasan Analisis dan Evaluasi</label>
                        <textarea id="analisisEvaluasi" name="analisisEvaluasi" rows="3" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Penanggung Jawab</label>
                        <select id="penanggungJawab" name="penanggungJawab" required 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Pilih Penanggung Jawab</option>
                            <option value="Dinas Penanaman Modal dan Pelayanan Satu Pintu">Dinas Penanaman Modal dan Pelayanan Satu Pintu</option>
                            <option value="Dinas Pangan dan Pertanian">Dinas Pangan dan Pertanian</option>
                            <option value="Dinas Perikanan">Dinas Perikanan</option>
                            <option value="Badan Pendapatan Daerah">Badan Pendapatan Daerah</option>
                            <option value="Dinas Pekerjaan Umum dan Penataan Ruang">Dinas Pekerjaan Umum dan Penataan Ruang</option>
                            <option value="Dinas Perhubungan">Dinas Perhubungan</option>
                            <option value="Dinas Kesehatan">Dinas Kesehatan</option>
                            <option value="Dinas Pendidikan dan Kebudayaan">Dinas Pendidikan dan Kebudayaan</option>
                            <option value="Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak">Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak</option>
                            <option value="Dinas Kepemudaan dan Olahraga">Dinas Kepemudaan dan Olahraga</option>
                            <option value="Dinas Sosial">Dinas Sosial</option>
                            <option value="Dinas Tenaga Kerja dan Periindustrian">Dinas Tenaga Kerja dan Periindustrian</option>
                            <option value="Dinas Lingkungan Hidup">Dinas Lingkungan Hidup</option>
                            <option value="Bagian Tata Pembangunan">Bagian Tata Pembangunan</option>
                            <option value="Bagian Organisasi">Bagian Organisasi</option>
                            <option value="Baperlitbang Kabupaten Karimun">Baperlitbang Kabupaten Karimun</option>
                            <option value="Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</option>
                            <option value="Dinas Kependudukan dan Pencatatan Sipil">Dinas Kependudukan dan Pencatatan Sipil</option>
                            <option value="RSUD M.SANI">RSUD M.SANI</option>
                        </select>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-end gap-3 mt-6 pt-6 border-t">
                    <button type="button" onclick="closeModal('addModal')" 
                            class="px-4 py-2 bg-gray-500 text-black rounded-md hover:bg-gray-600 transition">
                        Batal
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Fungsi untuk beralih tab form
function openFormTab(evt, tabId) {
    // Sembunyikan semua tab content
    document.querySelectorAll('.tabcontent').forEach(tab => {
        tab.classList.add('hidden');
    });

    // Tampilkan tab yang dipilih
    document.getElementById(tabId).classList.remove('hidden');

    // Update tombol tab yang aktif
    document.querySelectorAll('.tablinks').forEach(btn => {
        btn.classList.remove('bg-gray-200');
        btn.classList.add('bg-gray-100');
    });

    evt.currentTarget.classList.remove('bg-gray-100');
    evt.currentTarget.classList.add('bg-gray-200');
}

// Fungsi untuk update dropdown indikator
function updateIndikator() {
    const sasaranSelect = document.getElementById("sasaranStrategis");
    const indikatorSelect = document.getElementById("indikatorKinerja");
    const selectedSasaran = sasaranSelect.value;

    // Data indikator berdasarkan sasaran strategis
    const indikatorData = {
        1: ["Nilai Investasi"],
        2: ["Nilai PDRB Sektor Pertanian, Kehutanan Dan Perikanan (Dalam Miliar Rp)"],
        3: ["Persentase PAD Terhadap Pendapatan Daerah"],
        4: ["Rasio KK yang Terlayani Insfrastruktur Dasar"],
        5: ["Rasio Panjang Dalam Kondisi Baik", "Rasio Konektivitas Angkutan Laut", "Rasio Konektivitas Angkutan Darat"],
        6: ["Angka Harapan Hidup"],
        7: ["Angka Harapan Lama Sekolah", "Rata - Rata Lama Sekolah"],
        8: ["Indeks Pembangunan Gender"],
        9: ["Laju Pertumbuhan Penduduk"],
        10: ["Indeks Pembangunan Pemuda"],
        11: ["Rasio SDM Kebudayaan Berprestasi"],
        12: ["Persentase PPKS Mandiri"],
        13: ["Tingkat Pengangguran Terbuka"],
        14: ["Luas Ruang Terbuka Hijau", "Indeks Kinerja Pengelolaan sampah"],
        15: ["Indeks Kualitas Air", "Indeks Kualitas Udara", "Indeks Kualitas Lahan"],
        16: ["Nilai LPPD", "Indeks Reformasi Birokrasi", "Nilai Manajemen Risiko Indeks"],
        17: ["Indeks Pelayanan Publik"]
    };

    // Kosongkan dropdown indikator
    indikatorSelect.innerHTML = '<option value="">Pilih Indikator Kinerja</option>';

    // Jika sasaran strategis dipilih, isi dropdown indikator
    if (selectedSasaran && indikatorData[selectedSasaran]) {
        indikatorData[selectedSasaran].forEach((indikator) => {
            const option = document.createElement("option");
            option.value = indikator;
            option.textContent = indikator;
            indikatorSelect.appendChild(option);
        });
    }
}

// Setup form submit
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('pkForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Ambil data dari form
            const formData = {
                no: document.getElementById('no').value,
                sasaranStrategis: document.getElementById('sasaranStrategis').options[document.getElementById('sasaranStrategis').selectedIndex].text,
                indikatorKinerja: document.getElementById('indikatorKinerja').value,
                target2025: document.getElementById('target2025').value,
                satuan: document.getElementById('satuan').value,
                targetTW1: document.getElementById('targetTW1').value,
                realisasiTW1: document.getElementById('realisasiTW1').value,
                targetTW2: document.getElementById('targetTW2').value,
                realisasiTW2: document.getElementById('realisasiTW2').value,
                targetTW3: document.getElementById('targetTW3').value,
                realisasiTW3: document.getElementById('realisasiTW3').value,
                targetTW4: document.getElementById('targetTW4').value,
                realisasiTW4: document.getElementById('realisasiTW4').value,
                paguAnggaranTW1: document.getElementById('paguAnggaranTW1').value,
                realisasiAnggaranTW1: document.getElementById('realisasiAnggaranTW1').value,
                paguAnggaranTW2: document.getElementById('paguAnggaranTW2').value,
                realisasiAnggaranTW2: document.getElementById('realisasiAnggaranTW2').value,
                paguAnggaranTW3: document.getElementById('paguAnggaranTW3').value,
                realisasiAnggaranTW3: document.getElementById('realisasiAnggaranTW3').value,
                paguAnggaranTW4: document.getElementById('paguAnggaranTW4').value,
                realisasiAnggaranTW4: document.getElementById('realisasiAnggaranTW4').value,
                program: document.getElementById('program').value,
                analisisEvaluasi: document.getElementById('analisisEvaluasi').value,
                penanggungJawab: document.getElementById('penanggungJawab').value
            };

            // Tambahkan data baru
            pkData.push(formData);
            
            // Reload tabel
            loadTableData();
            
            // Tutup modal
            closeModal('addModal');
            
            // Reset form
            form.reset();
            
            alert('Data berhasil ditambahkan!');
        });
    }
});

// Fungsi untuk memuat data ke tabel
function loadTableData() {
    const tbody = document.querySelector("tbody");
    tbody.innerHTML = "";

    if (pkData.length === 0) {
        tbody.innerHTML = '<tr><td colspan="7" class="py-4 px-4 text-center text-gray-500">Tidak ada data</td></tr>';
        return;
    }

    pkData.forEach((item, index) => {
        const row = document.createElement("tr");
        row.className = "hover:bg-blue-50 transition-colors";
        row.innerHTML = `
            <td class="py-3 px-4 font-medium text-gray-900 text-sm">${item.no}</td>
            <td class="py-3 px-4 text-sm max-w-xs">
                <div class="truncate" title="${item.sasaranStrategis}">${item.sasaranStrategis}</div>
            </td>
            <td class="py-3 px-4 text-sm max-w-xs">
                <div class="truncate" title="${item.indikatorKinerja}">${item.indikatorKinerja}</div>
            </td>
            <td class="py-3 px-4 text-sm">
                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded">${item.target2025}</span>
            </td>
            <td class="py-3 px-4 text-sm">
                <span class="font-semibold">${item.satuan}</span>
            </td>
            <td class="py-3 px-4 text-sm max-w-xs">
                <div class="truncate" title="${item.penanggungJawab}">${item.penanggungJawab}</div>
            </td>
            <td class="py-3 px-4">
                <div class="flex justify-center gap-1">
                    <button class="p-2 text-green-600 hover:bg-green-100 rounded-lg transition-colors" title="Lihat" onclick="showDetail(${index})">
                        <i class="fas fa-eye text-sm"></i>
                    </button>
                    <button class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition-colors" title="Edit" onclick="editData(${index})">
                        <i class="fas fa-edit text-sm"></i>
                    </button>
                    <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition-colors" title="Hapus" onclick="deleteData(${index})">
                        <i class="fas fa-trash text-sm"></i>
                    </button>
                </div>
            </td>
        `;
        tbody.appendChild(row);
    });
}
</script>