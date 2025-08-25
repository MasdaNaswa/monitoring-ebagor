<div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-6xl max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="flex justify-between items-center bg-indigo-600 text-white p-6 rounded-t-lg sticky top-0 z-10">
            <h3 class="text-xl font-semibold flex items-center gap-2">
                 Ubah  Rencana Aksi RB General
            </h3>
            <button class="text-white hover:text-gray-200 text-2xl" onclick="closeModal('editModal')">
                &times;
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6">
            <form id="editRenaksiRB">
                <!-- Bagian Header -->
                <div class="text-center mb-6 pb-4 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-indigo-700">UBAH RENCANA AKSI RB GENERAL TAHUN <span id="editTahunHeader">2025</span></h2>
                </div>

                <!-- Bagian Input Data -->
                <div class="mb-6 p-6 bg-gray-50 rounded-lg border-l-4 border-indigo-500">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="form-group">
                            <label for="editNo" class="block text-sm font-medium text-gray-700 mb-1">NO</label>
                            <input type="text" id="editNo" name="editNo" readonly 
                                class="w-full p-2 border border-gray-300 rounded-md bg-gray-100" />
                        </div>
                        <div class="form-group">
                            <label for="editSasaranStrategi" class="block text-sm font-medium text-gray-700 mb-1">SASARAN STRATEGI</label>
                            <select id="editSasaranStrategi" name="editSasaranStrategi" required
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Pilih Sasaran Strategi</option>
                                <option value="A">A. Terwujudnya Transformasi Digital</option>
                                <option value="B">B. Terciptanya Aparatur Negara yang Kompeten dan Berkinerja Tinggi Berdasarkan Sistem Merit</option>
                                <option value="C">C. Terbangunnya Perilaku Birokrasi yang Beretika dan Inovatif</option>
                                <option value="D">D. Terbangunnya Kapabilitas Kelembagaan Berkinerja Tinggi yang berbaris Jejaring dan Lincah</option>
                                <option value="E">E. Terwujudnya Kebijakan dan Pelayanan Publik yang Berkualitas dan Inklusif</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="form-group">
                            <label for="editIndikator" class="block text-sm font-medium text-gray-700 mb-1">INDIKATOR CAPAIAN SASARAN STRATEGI DAN IMPLEMENTASI KEBIJAKAN PERCEPATAN</label>
                            <select id="editIndikator" name="editIndikator" required
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Pilih Indikator</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editTarget" class="block text-sm font-medium text-gray-700 mb-1">TARGET</label>
                            <input type="text" id="editTarget" name="editTarget"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="form-group">
                            <label for="editSatuan" class="block text-sm font-medium text-gray-700 mb-1">SATUAN</label>
                            <select id="editSatuan" name="editSatuan"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Pilih Satuan</option>
                                <option value="Nilai">Nilai</option>
                                <option value="Persen">Persen</option>
                                <option value="Bulan">Bulan</option>
                                <option value="OPD">OPD</option>
                                <option value="Laporan">Laporan</option>
                                <option value="Surat Keputusan">Surat Keputusan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editTarget2025" class="block text-sm font-medium text-gray-700 mb-1">Target Tahun 2025</label>
                            <input type="text" id="editTarget2025" name="editTarget2025"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="editRencanaAksi" class="block text-sm font-medium text-gray-700 mb-1">Rencana Aksi</label>
                        <textarea id="editRencanaAksi" name="editRencanaAksi" rows="3"
                            class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="form-group">
                            <label for="editOutput" class="block text-sm font-medium text-gray-700 mb-1">OUT PUT</label>
                            <input type="text" id="editOutput" name="editOutput"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div class="form-group">
                            <label for="editSatuanOutput" class="block text-sm font-medium text-gray-700 mb-1">SATUAN OUTPUT</label>
                            <input type="text" id="editSatuanOutput" name="editSatuanOutput"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div class="form-group">
                            <label for="editIndikatorOutput" class="block text-sm font-medium text-gray-700 mb-1">INDIKATOR OUTPUT</label>
                            <input type="text" id="editIndikatorOutput" name="editIndikatorOutput"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>
                </div>

                <!-- Bagian Anggaran per Triwulan -->
                <div class="mb-6 p-6 bg-gray-50 rounded-lg border-l-4 border-blue-500">
                    <h3 class="text-md font-semibold text-gray-800 mb-4">Anggaran Tahun <span id="editTahunAnggaran">2025</span></h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="form-group">
                            <label for="editTw1Target" class="block text-sm font-medium text-gray-700 mb-1">TW1 Target</label>
                            <input type="text" id="editTw1Target" name="editTw1Target"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div class="form-group">
                            <label for="editTw1Rp" class="block text-sm font-medium text-gray-700 mb-1">TW1 Rp</label>
                            <input type="number" id="editTw1Rp" name="editTw1Rp"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="form-group">
                            <label for="editTw2Target" class="block text-sm font-medium text-gray-700 mb-1">TW2 Target</label>
                            <input type="text" id="editTw2Target" name="editTw2Target"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div class="form-group">
                            <label for="editTw2Rp" class="block text-sm font-medium text-gray-700 mb-1">TW2 Rp</label>
                            <input type="number" id="editTw2Rp" name="editTw2Rp"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="form-group">
                            <label for="editTw3Target" class="block text-sm font-medium text-gray-700 mb-1">TW3 Target</label>
                            <input type="text" id="editTw3Target" name="editTw3Target"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div class="form-group">
                            <label for="editTw3Rp" class="block text-sm font-medium text-gray-700 mb-1">TW3 Rp</label>
                            <input type="number" id="editTw3Rp" name="editTw3Rp"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-group">
                            <label for="editTw4Target" class="block text-sm font-medium text-gray-700 mb-1">TW4 Target</label>
                            <input type="text" id="editTw4Target" name="editTw4Target"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div class="form-group">
                            <label for="editTw4Rp" class="block text-sm font-medium text-gray-700 mb-1">TW4 Rp</label>
                            <input type="number" id="editTw4Rp" name="editTw4Rp"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>
                </div>

                <!-- Rumus -->
                <div class="mb-4">
                    <label for="editRumus" class="block text-sm font-medium text-gray-700 mb-1">Rumus</label>
                    <input type="text" id="editRumus" name="editRumus"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Catatan -->
                <div class="mb-6 p-6 bg-amber-50 rounded-lg border-l-4 border-amber-500">
                    <h3 class="text-md font-semibold text-amber-800 mb-4 flex items-center gap-2">
                        <i class="fas fa-clipboard-check"></i> Catatan Khusus Inspektorat
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-group">
                            <label for="editCatatanEvaluasi" class="block text-sm font-medium text-amber-700 mb-1">Catatan Evaluasi</label>
                            <input type="text" id="editCatatanEvaluasi" name="editCatatanEvaluasi"
                                class="w-full p-2 border border-amber-300 rounded-md bg-amber-100 text-amber-800" readonly />
                        </div>
                        <div class="form-group">
                            <label for="editCatatanPerbaikan" class="block text-sm font-medium text-amber-700 mb-1">Catatan Perbaikan</label>
                            <input type="text" id="editCatatanPerbaikan" name="editCatatanPerbaikan"
                                class="w-full p-2 border border-amber-300 rounded-md bg-amber-100 text-amber-800" readonly />
                        </div>
                    </div>
                </div>

                <!-- Bagian Unit Kerja -->
                <div class="mb-6 p-6 bg-gray-50 rounded-lg border-l-4 border-green-500">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-group">
                            <label for="editUnitKerja" class="block text-sm font-medium text-gray-700 mb-1">UNIT KERJA / SATUAN KERJA PELAKSANAAN</label>
                            <select id="editUnitKerja" name="editUnitKerja" required
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Pilih Unit Kerja</option>
                                <option value="Diskominfo">Diskominfo</option>
                                <option value="Baperlitbang">Baperlitbang</option>
                                <option value="BPKAD">BPKAD</option>
                                <option value="Bagian Organisasi Sekda">Bagian Organisasi Sekda</option>
                                <option value="Inspektorat Daerah">Inspektorat Daerah</option>
                                <option value="BKPSDM">BKPSDM</option>
                                <option value="Bagian Hukum Sekretariat Daerah">Bagian Hukum Sekretariat Daerah</option>
                                <option value="Bagian PBJ Setda">Bagian PBJ Setda</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editPelaksana" class="block text-sm font-medium text-gray-700 mb-1">PELAKSANA</label>
                            <select id="editPelaksana" name="editPelaksana"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Pilih Pelaksana</option>
                                <option value="Seluruh Perangkat Daerah">Seluruh Perangkat Daerah</option>
                                <option value="Unit Pelayan Publik">Unit Pelayan Publik</option>
                                <option value="Unit Layanan Publik">Unit Layanan Publik</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                    <button type="button" class="px-4 py-2 bg-gray-500 text-black rounded-md hover:bg-gray-600 transition flex items-center justify-center gap-2"
                        onclick="closeModal('editModal')">
                         Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition flex items-center justify-center gap-2">
                       Simpan 
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Fungsi untuk membuka modal edit dengan data yang sudah diisi
function openEditModal(data) {
    // Isi form dengan data yang diterima
    document.getElementById('editNo').value = data.no || '';
    document.getElementById('editSasaranStrategi').value = data.sasaranStrategi || '';
    document.getElementById('editIndikator').value = data.indikator || '';
    document.getElementById('editTarget').value = data.target || '';
    document.getElementById('editSatuan').value = data.satuan || '';
    document.getElementById('editTarget2025').value = data.target2025 || '';
    document.getElementById('editRencanaAksi').value = data.rencanaAksi || '';
    document.getElementById('editOutput').value = data.output || '';
    document.getElementById('editSatuanOutput').value = data.satuanOutput || '';
    document.getElementById('editIndikatorOutput').value = data.indikatorOutput || '';
    document.getElementById('editTw1Target').value = data.tw1Target || '';
    document.getElementById('editTw1Rp').value = data.tw1Rp || '';
    document.getElementById('editTw2Target').value = data.tw2Target || '';
    document.getElementById('editTw2Rp').value = data.tw2Rp || '';
    document.getElementById('editTw3Target').value = data.tw3Target || '';
    document.getElementById('editTw3Rp').value = data.tw3Rp || '';
    document.getElementById('editTw4Target').value = data.tw4Target || '';
    document.getElementById('editTw4Rp').value = data.tw4Rp || '';
    document.getElementById('editRumus').value = data.rumus || '';
    document.getElementById('editCatatanEvaluasi').value = data.catatanEvaluasi || '';
    document.getElementById('editCatatanPerbaikan').value = data.catatanPerbaikan || '';
    document.getElementById('editUnitKerja').value = data.unitKerja || '';
    document.getElementById('editPelaksana').value = data.pelaksana || '';
    
    // Update header tahun
    const tahunHeader = document.getElementById('editTahunHeader');
    const tahunAnggaran = document.getElementById('editTahunAnggaran');
    if (tahunHeader && tahunAnggaran) {
        tahunHeader.textContent = data.tahun || '2025';
        tahunAnggaran.textContent = data.tahun || '2025';
    }
    
    // Buka modal
    openModal('editModal');
    
    // Update opsi indikator berdasarkan sasaran strategi
    updateEditIndikatorOptions(data.sasaranStrategi);
}

// Fungsi untuk mengupdate opsi indikator berdasarkan sasaran strategi
function updateEditIndikatorOptions(sasaranStrategi) {
    const indikatorSelect = document.getElementById('editIndikator');
    
    // Kosongkan opsi indikator sebelumnya
    indikatorSelect.innerHTML = '<option value="">Pilih Indikator</option>';
    
    // Tambahkan opsi berdasarkan pilihan sasaran strategi
    if (sasaranStrategi === 'A') {
        addOption(indikatorSelect, 'A1', 'Indeks SPBE');
        addOption(indikatorSelect, 'A2', 'Tingkat Kematangan Digital Pemerintah Daerah');
    } else if (sasaranStrategi === 'B') {
        addOption(indikatorSelect, 'B1', 'Nilai kompetensi ASN');
        addOption(indikatorSelect, 'B2', 'Indeks Kepuasan Masyarakat terhadap Pelayanan Publik');
    } else if (sasaranStrategi === 'C') {
        addOption(indikatorSelect, 'C1', 'Indeks Reformasi Birokrasi');
        addOption(indikatorSelect, 'C2', 'Nilai Akuntabilitas Kinerja Instansi Pemerintah');
    } else if (sasaranStrategi === 'D') {
        addOption(indikatorSelect, 'D1', 'Tingkat Efektivitas Kelembagaan');
        addOption(indikatorSelect, 'D2', 'Indeks Inovasi Daerah');
    } else if (sasaranStrategi === 'E') {
        addOption(indikatorSelect, 'E1', 'Indeks Kepuasan Masyarakat');
        addOption(indikatorSelect, 'E2', 'Tingkat Kepatuhan Pelayanan Publik');
    }
}

// Fungsi untuk menambahkan opsi ke select
function addOption(selectElement, value, text) {
    const option = document.createElement('option');
    option.value = value;
    option.textContent = text;
    selectElement.appendChild(option);
}

// Event listener untuk perubahan sasaran strategi di form edit
document.addEventListener('DOMContentLoaded', function() {
    const sasaranStrategi = document.getElementById('editSasaranStrategi');
    
    if (sasaranStrategi) {
        sasaranStrategi.addEventListener('change', function() {
            updateEditIndikatorOptions(this.value);
        });
    }
    
    // Handle form submission
    const editForm = document.getElementById('editRenaksiRB');
    if (editForm) {
        editForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // Simpan perubahan data di sini
            alert('Data berhasil diperbarui!');
            closeModal('editModal');
        });
    }
});
</script>