<!-- Modal -->
<div id="addModal" class="fixed inset-0 bg-black bg-opacity-40 items-center justify-center z-[9999] p-4 hidden">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-6xl max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="flex justify-between items-center bg-indigo-600 text-white p-6 rounded-t-lg sticky top-0 z-10">
            <h3 class="text-xl font-semibold flex items-center gap-2">
                Tambah Rencana Aksi RB General 2025
            </h3>
        </div>

        <!-- Modal Body -->
        <div class="p-6">
            <form id="tambahRenaksiRB">
                <!-- Bagian Header -->
                <div class="text-center mb-6 pb-4 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-indigo-700">RENCANA AKSI RB GENERAL TAHUN 2025</h2>
                </div>

                <!-- Bagian Input Data -->
                <div class="mb-6 p-6 bg-gray-50 rounded-lg border-l-4 border-indigo-500">
                    <!-- NO & Sasaran Strategi -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="form-group">
                            <label for="no" class="block text-sm font-medium text-gray-700 mb-1">NO</label>
                            <input type="text" id="no" name="no" readonly 
                                class="w-full p-2 border border-gray-300 rounded-md bg-gray-100" />
                        </div>
                        <div class="form-group">
                            <label for="sasaranStrategi" class="block text-sm font-medium text-gray-700 mb-1">SASARAN STRATEGI</label>
                            <select id="sasaranStrategi" name="sasaranStrategi" required
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

                    <!-- Indikator & Target -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="form-group">
                            <label for="indikator" class="block text-sm font-medium text-gray-700 mb-1">INDIKATOR CAPAIAN SASARAN STRATEGI DAN IMPLEMENTASI KEBIJAKAN PERCEPATAN</label>
                            <select id="indikator" name="indikator" required
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Pilih Indikator</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="target" class="block text-sm font-medium text-gray-700 mb-1">TARGET</label>
                            <input type="text" id="target" name="target"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <!-- Satuan & Target 2025 -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="form-group">
                            <label for="satuan" class="block text-sm font-medium text-gray-700 mb-1">SATUAN</label>
                            <select id="satuan" name="satuan"
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
                            <label for="target2025" class="block text-sm font-medium text-gray-700 mb-1">Target Tahun 2025</label>
                            <input type="text" id="target2025" name="target2025"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <!-- Rencana Aksi -->
                    <div class="mb-4">
                        <label for="rencanaAksi" class="block text-sm font-medium text-gray-700 mb-1">Rencana Aksi</label>
                        <textarea id="rencanaAksi" name="rencanaAksi" rows="3"
                            class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    </div>

                    <!-- Output -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="form-group">
                            <label for="output" class="block text-sm font-medium text-gray-700 mb-1">OUT PUT</label>
                            <input type="text" id="output" name="output"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div class="form-group">
                            <label for="satuanOutput" class="block text-sm font-medium text-gray-700 mb-1">SATUAN OUTPUT</label>
                            <input type="text" id="satuanOutput" name="satuanOutput"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div class="form-group">
                            <label for="indikatorOutput" class="block text-sm font-medium text-gray-700 mb-1">INDIKATOR OUTPUT</label>
                            <input type="text" id="indikatorOutput" name="indikatorOutput"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>
                </div>

                <!-- Anggaran per Triwulan -->
                <div class="mb-6 p-6 bg-gray-50 rounded-lg border-l-4 border-blue-500">
                    <h3 class="text-md font-semibold text-gray-800 mb-4">Anggaran Tahun 2025</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="form-group">
                            <label for="tw1Target" class="block text-sm font-medium text-gray-700 mb-1">TW1 Target</label>
                            <input type="text" id="tw1Target" name="tw1Target"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div class="form-group">
                            <label for="tw1Rp" class="block text-sm font-medium text-gray-700 mb-1">TW1 Rp</label>
                            <input type="number" id="tw1Rp" name="tw1Rp"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="form-group">
                            <label for="tw2Target" class="block text-sm font-medium text-gray-700 mb-1">TW2 Target</label>
                            <input type="text" id="tw2Target" name="tw2Target"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div class="form-group">
                            <label for="tw2Rp" class="block text-sm font-medium text-gray-700 mb-1">TW2 Rp</label>
                            <input type="number" id="tw2Rp" name="tw2Rp"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="form-group">
                            <label for="tw3Target" class="block text-sm font-medium text-gray-700 mb-1">TW3 Target</label>
                            <input type="text" id="tw3Target" name="tw3Target"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div class="form-group">
                            <label for="tw3Rp" class="block text-sm font-medium text-gray-700 mb-1">TW3 Rp</label>
                            <input type="number" id="tw3Rp" name="tw3Rp"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-group">
                            <label for="tw4Target" class="block text-sm font-medium text-gray-700 mb-1">TW4 Target</label>
                            <input type="text" id="tw4Target" name="tw4Target"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div class="form-group">
                            <label for="tw4Rp" class="block text-sm font-medium text-gray-700 mb-1">TW4 Rp</label>
                            <input type="number" id="tw4Rp" name="tw4Rp"
                                class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>
                </div>

                <!-- Rumus -->
                <div class="mb-4">
                    <label for="rumus" class="block text-sm font-medium text-gray-700 mb-1">Rumus</label>
                    <input type="text" id="rumus" name="rumus"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Catatan Khusus -->
                <div class="mb-6 p-6 bg-amber-50 rounded-lg border-l-4 border-amber-500">
                    <h3 class="text-md font-semibold text-amber-800 mb-4 flex items-center gap-2">
                        <i class="fas fa-clipboard-check"></i> Catatan Khusus Inspektorat
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-group">
                            <label for="catatanevaluasi" class="block text-sm font-medium text-amber-700 mb-1">Catatan Evaluasi</label>
                            <input type="text" id="catatanevaluasi" name="catatanevaluasi"
                                class="w-full p-2 border border-amber-300 rounded-md bg-amber-100 text-amber-800" readonly />
                        </div>
                        <div class="form-group">
                            <label for="catatanperbaikan" class="block text-sm font-medium text-amber-700 mb-1">Catatan Perbaikan</label>
                            <input type="text" id="catatanperbaikan" name="catatanperbaikan"
                                class="w-full p-2 border border-amber-300 rounded-md bg-amber-100 text-amber-800" readonly />
                        </div>
                    </div>
                </div>

                <!-- Unit Kerja -->
                <div class="mb-6 p-6 bg-gray-50 rounded-lg border-l-4 border-green-500">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-group">
                            <label for="unitKerja" class="block text-sm font-medium text-gray-700 mb-1">UNIT KERJA / SATUAN KERJA PELAKSANAAN</label>
                            <select id="unitKerja" name="unitKerja" required
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
                            <label for="pelaksana" class="block text-sm font-medium text-gray-700 mb-1">PELAKSANA</label>
                            <select id="pelaksana" name="pelaksana"
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
                <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-gray-200">
                    <button type="button" class="px-4 py-2 bg-gray-500 text-black rounded-md hover:bg-gray-600 transition flex items-center justify-center gap-2"
                        onclick="closeModal('addModal')">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition flex items-center justify-center gap-2">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fungsi toggle modal
    window.openModal = function(id) {
        const modal = document.getElementById(id);
        modal?.classList.remove('hidden');
        modal?.classList.add('flex');
    }

    window.closeModal = function(id) {
        const modal = document.getElementById(id);
        modal?.classList.remove('flex');
        modal?.classList.add('hidden');
    }

    // Fungsi untuk menambahkan opsi
    function addOption(selectElement, value, text) {
        const option = document.createElement('option');
        option.value = value;
        option.textContent = text;
        selectElement.appendChild(option);
    }

    const sasaranStrategi = document.getElementById('sasaranStrategi');
    const indikatorSelect = document.getElementById('indikator');

    sasaranStrategi?.addEventListener('change', function() {
        const selectedValue = this.value;

        indikatorSelect.innerHTML = '<option value="">Pilih Indikator</option>';

        if (selectedValue === 'A') {
            addOption(indikatorSelect, 'A1', 'Indeks SPBE');
            addOption(indikatorSelect, 'A2', 'Tingkat Kematangan Digital Pemerintah Daerah');
        } else if (selectedValue === 'B') {
            addOption(indikatorSelect, 'B1', 'Nilai kompetensi ASN');
            addOption(indikatorSelect, 'B2', 'Indeks Kepuasan Masyarakat terhadap Pelayanan Publik');
        } else if (selectedValue === 'C') {
            addOption(indikatorSelect, 'C1', 'Indeks Reformasi Birokrasi');
            addOption(indikatorSelect, 'C2', 'Nilai Akuntabilitas Kinerja Instansi Pemerintah');
        } else if (selectedValue === 'D') {
            addOption(indikatorSelect, 'D1', 'Tingkat Efektivitas Kelembagaan');
            addOption(indikatorSelect, 'D2', 'Indeks Inovasi Daerah');
        } else if (selectedValue === 'E') {
            addOption(indikatorSelect, 'E1', 'Indeks Kepuasan Masyarakat');
            addOption(indikatorSelect, 'E2', 'Tingkat Kepatuhan Pelayanan Publik');
        }
    });

    // Generate nomor otomatis
    const noField = document.getElementById('no');
    if (noField) {
        noField.value = 'RB-GEN-' + new Date().getTime().toString().slice(-4);
    }
});
</script>
