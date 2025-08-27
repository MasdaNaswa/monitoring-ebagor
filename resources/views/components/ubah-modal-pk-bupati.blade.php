<?php
// Data untuk dropdown (sama seperti add-modal)
$sasaranOptions = [
    1 => "1. Meningkatnya Investasi Daerah",
    2 => "2. Berkembangnya Sektor Ekonomi Dominan",
    // ... (options lainnya)
];

$penanggungJawabOptions = [
    "Dinas Penanaman Modal dan Pelayanan Satu Pintu",
    // ... (options lainnya)
];
?>

<div id="editModal" class="modal fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="modal-content bg-white rounded-lg shadow-xl w-11/12 max-w-6xl max-h-[90vh] overflow-y-auto">
        <div class="modal-header px-6 py-4 border-b flex justify-between items-center">
            <h3 class="text-lg font-semibold flex items-center gap-2">
                <i class="fas fa-edit text-primary"></i> Edit Data PK Bupati
            </h3>
            <button class="btn-close text-2xl text-gray-500 hover:text-gray-700" onclick="closeModal('editModal')">
                &times;
            </button>
        </div>
        <div class="modal-body p-6">
            <form id="editForm" action="update.php" method="POST">
                <input type="hidden" id="editId" name="id">
                
                <div class="form-section mb-6 p-4 bg-gray-50 rounded-md">
                    <h3 class="text-primary font-semibold mb-4">Informasi Dasar</h3>
                    <div class="form-row flex gap-4 mb-4">
                        <div class="form-group flex-1">
                            <label for="editNo" class="block font-medium mb-1">NO</label>
                            <input type="text" id="editNo" name="no" required class="w-full px-3 py-2 border rounded-md">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="editSasaranStrategis" class="block font-medium mb-1">Sasaran Strategis</label>
                        <select id="editSasaranStrategis" name="sasaranStrategis" required onchange="updateEditIndikator()" class="w-full px-3 py-2 border rounded-md">
                            <option value="">Pilih Sasaran Strategis</option>
                            <?php foreach ($sasaranOptions as $key => $value): ?>
                                <option value="<?= $key ?>"><?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="editIndikatorKinerja" class="block font-medium mb-1">Indikator Kinerja</label>
                        <select id="editIndikatorKinerja" name="indikatorKinerja" required class="w-full px-3 py-2 border rounded-md">
                            <option value="">Pilih Sasaran Strategis terlebih dahulu</option>
                        </select>
                    </div>

                    <div class="form-row flex gap-4">
                        <div class="form-group flex-1">
                            <label for="editTarget2025" class="block font-medium mb-1">Target 2025</label>
                            <input type="text" id="editTarget2025" name="target2025" required class="w-full px-3 py-2 border rounded-md">
                        </div>
                        <div class="form-group flex-1">
                            <label for="editSatuan" class="block font-medium mb-1">Satuan</label>
                            <input type="text" id="editSatuan" name="satuan" required class="w-full px-3 py-2 border rounded-md">
                        </div>
                    </div>
                </div>

                <!-- Tab untuk Target dan Realisasi per Triwulan -->
                <div class="form-section mb-6">
                    <div class="tab flex border border-gray-300 bg-gray-100 rounded-t-md overflow-hidden">
                        <button type="button" class="tablinks px-4 py-2 bg-gray-200 font-medium active" onclick="openFormTab(event, 'editTriwulan1', this.parentElement.parentElement)">
                            Triwulan I
                        </button>
                        <button type="button" class="tablinks px-4 py-2 bg-gray-100 font-medium" onclick="openFormTab(event, 'editTriwulan2', this.parentElement.parentElement)">
                            Triwulan II
                        </button>
                        <button type="button" class="tablinks px-4 py-2 bg-gray-100 font-medium" onclick="openFormTab(event, 'editTriwulan3', this.parentElement.parentElement)">
                            Triwulan III
                        </button>
                        <button type="button" class="tablinks px-4 py-2 bg-gray-100 font-medium" onclick="openFormTab(event, 'editTriwulan4', this.parentElement.parentElement)">
                            Triwulan IV
                        </button>
                    </div>

                    <!-- Triwulan 1 -->
                    <div id="editTriwulan1" class="tabcontent p-4 border border-t-0 rounded-b-md">
                        <div class="form-row flex gap-4 mb-4">
                            <div class="form-group flex-1">
                                <label for="editTargetTW1" class="block font-medium mb-1">Target</label>
                                <input type="text" id="editTargetTW1" name="targetTW1" class="w-full px-3 py-2 border rounded-md">
                            </div>
                            <div class="form-group flex-1">
                                <label for="editRealisasiTW1" class="block font-medium mb-1">Realisasi</label>
                                <input type="text" id="editRealisasiTW1" name="realisasiTW1" class="w-full px-3 py-2 border rounded-md">
                            </div>
                        </div>
                        <div class="form-row flex gap-4">
                            <div class="form-group flex-1">
                                <label for="editPaguAnggaranTW1" class="block font-medium mb-1">Pagu Anggaran</label>
                                <input type="text" id="editPaguAnggaranTW1" name="paguAnggaranTW1" class="w-full px-3 py-2 border rounded-md">
                            </div>
                            <div class="form-group flex-1">
                                <label for="editRealisasiAnggaranTW1" class="block font-medium mb-1">Realisasi Anggaran</label>
                                <input type="text" id="editRealisasiAnggaranTW1" name="realisasiAnggaranTW1" class="w-full px-3 py-2 border rounded-md">
                            </div>
                        </div>
                    </div>

                    <!-- Triwulan 2 -->
                    <div id="editTriwulan2" class="tabcontent p-4 border border-t-0 rounded-b-md hidden">
                        <div class="form-row flex gap-4 mb-4">
                            <div class="form-group flex-1">
                                <label for="editTargetTW2" class="block font-medium mb-1">Target</label>
                                <input type="text" id="editTargetTW2" name="targetTW2" class="w-full px-3 py-2 border rounded-md">
                            </div>
                            <div class="form-group flex-1">
                                <label for="editRealisasiTW2" class="block font-medium mb-1">Realisasi</label>
                                <input type="text" id="editRealisasiTW2" name="realisasiTW2" class="w-full px-3 py-2 border rounded-md">
                            </div>
                        </div>
                        <div class="form-row flex gap-4">
                            <div class="form-group flex-1">
                                <label for="editPaguAnggaranTW2" class="block font-medium mb-1">Pagu Anggaran</label>
                                <input type="text" id="editPaguAnggaranTW2" name="paguAnggaranTW2" class="w-full px-3 py-2 border rounded-md">
                            </div>
                            <div class="form-group flex-1">
                                <label for="editRealisasiAnggaranTW2" class="block font-medium mb-1">Realisasi Anggaran</label>
                                <input type="text" id="editRealisasiAnggaranTW2" name="realisasiAnggaranTW2" class="w-full px-3 py-2 border rounded-md">
                            </div>
                        </div>
                    </div>

                    <!-- Triwulan 3 -->
                    <div id="editTriwulan3" class="tabcontent p-4 border border-t-0 rounded-b-md hidden">
                        <div class="form-row flex gap-4 mb-4">
                            <div class="form-group flex-1">
                                <label for="editTargetTW3" class="block font-medium mb-1">Target</label>
                                <input type="text" id="editTargetTW3" name="targetTW3" class="w-full px-3 py-2 border rounded-md">
                            </div>
                            <div class="form-group flex-1">
                                <label for="editRealisasiTW3" class="block font-medium mb-1">Realisasi</label>
                                <input type="text" id="editRealisasiTW3" name="realisasiTW3" class="w-full px-3 py-2 border rounded-md">
                            </div>
                        </div>
                        <div class="form-row flex gap-4">
                            <div class="form-group flex-1">
                                <label for="editPaguAnggaranTW3" class="block font-medium mb-1">Pagu Anggaran</label>
                                <input type="text" id="editPaguAnggaranTW3" name="paguAnggaranTW3" class="w-full px-3 py-2 border rounded-md">
                            </div>
                            <div class="form-group flex-1">
                                <label for="editRealisasiAnggaranTW3" class="block font-medium mb-1">Realisasi Anggaran</label>
                                <input type="text" id="editRealisasiAnggaranTW3" name="realisasiAnggaranTW3" class="w-full px-3 py-2 border rounded-md">
                            </div>
                        </div>
                    </div>

                    <!-- Triwulan 4 -->
                    <div id="editTriwulan4" class="tabcontent p-4 border border-t-0 rounded-b-md hidden">
                        <div class="form-row flex gap-4 mb-4">
                            <div class="form-group flex-1">
                                <label for="editTargetTW4" class="block font-medium mb-1">Target</label>
                                <input type="text" id="editTargetTW4" name="targetTW4" class="w-full px-3 py-2 border rounded-md">
                            </div>
                            <div class="form-group flex-1">
                                <label for="editRealisasiTW4" class="block font-medium mb-1">Realisasi</label>
                                <input type="text" id="editRealisasiTW4" name="realisasiTW4" class="w-full px-3 py-2 border rounded-md">
                            </div>
                        </div>
                        <div class="form-row flex gap-4">
                            <div class="form-group flex-1">
                                <label for="editPaguAnggaranTW4" class="block font-medium mb-1">Pagu Anggaran</label>
                                <input type="text" id="editPaguAnggaranTW4" name="paguAnggaranTW4" class="w-full px-3 py-2 border rounded-md">
                            </div>
                            <div class="form-group flex-1">
                                <label for="editRealisasiAnggaranTW4" class="block font-medium mb-1">Realisasi Anggaran</label>
                                <input type="text" id="editRealisasiAnggaranTW4" name="realisasiAnggaranTW4" class="w-full px-3 py-2 border rounded-md">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section p-4 bg-gray-50 rounded-md">
                    <div class="form-group mb-4">
                        <label for="editProgram" class="block font-medium mb-1">Program</label>
                        <input type="text" id="editProgram" name="program" class="w-full px-3 py-2 border rounded-md">
                    </div>

                    <div class="form-group mb-4">
                        <label for="editAnalisisEvaluasi" class="block font-medium mb-1">Penjelasan Analisis dan Evaluasi</label>
                        <textarea id="editAnalisisEvaluasi" name="analisisEvaluasi" rows="3" class="w-full px-3 py-2 border rounded-md"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="editPenanggungJawab" class="block font-medium mb-1">Penanggung Jawab</label>
                        <select id="editPenanggungJawab" name="penanggungJawab" required class="w-full px-3 py-2 border rounded-md">
                            <option value="">Pilih Penanggung Jawab</option>
                            <?php foreach ($penanggungJawabOptions as $option): ?>
                                <option value="<?= $option ?>"><?= $option ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-actions flex justify-end gap-3 pt-6 border-t mt-6">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition-colors flex items-center gap-2" onclick="closeModal('editModal')">
                        <i class="fas fa-times"></i> Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-dark transition-colors flex items-center gap-2">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk mengisi form edit dengan data
    function populateEditForm(index) {
        const data = pkData[index];
        
        document.getElementById('editId').value = index;
        document.getElementById('editNo').value = data.no;
        
        // Temukan key sasaran strategis yang sesuai
        let sasaranKey = "";
        for (const [key, indicators] of Object.entries(indikatorData)) {
            if (indicators.includes(data.indikatorKinerja)) {
                sasaranKey = key;
                break;
            }
        }
        
        document.getElementById('editSasaranStrategis').value = sasaranKey;
        
        // Trigger update indikator
        updateEditIndikator();
        
        // Set indikator setelah dropdown terisi
        setTimeout(() => {
            document.getElementById('editIndikatorKinerja').value = data.indikatorKinerja;
        }, 100);
        
        document.getElementById('editTarget2025').value = data.target2025;
        document.getElementById('editSatuan').value = data.satuan;
        
        // Target dan Realisasi TW
        document.getElementById('editTargetTW1').value = data.targetTW1 || "";
        document.getElementById('editRealisasiTW1').value = data.realisasiTW1 || "";
        document.getElementById('editTargetTW2').value = data.targetTW2 || "";
        document.getElementById('editRealisasiTW2').value = data.realisasiTW2 || "";
        document.getElementById('editTargetTW3').value = data.targetTW3 || "";
        document.getElementById('editRealisasiTW3').value = data.realisasiTW3 || "";
        document.getElementById('editTargetTW4').value = data.targetTW4 || "";
        document.getElementById('editRealisasiTW4').value = data.realisasiTW4 || "";
        
        // Pagu Anggaran
        document.getElementById('editPaguAnggaranTW1').value = data.paguAnggaranTW1 || "";
        document.getElementById('editRealisasiAnggaranTW1').value = data.realisasiAnggaranTW1 || "";
        document.getElementById('editPaguAnggaranTW2').value = data.paguAnggaranTW2 || "";
        document.getElementById('editRealisasiAnggaranTW2').value = data.realisasiAnggaranTW2 || "";
        document.getElementById('editPaguAnggaranTW3').value = data.paguAnggaranTW3 || "";
        document.getElementById('editRealisasiAnggaranTW3').value = data.realisasiAnggaranTW3 || "";
        document.getElementById('editPaguAnggaranTW4').value = data.paguAnggaranTW4 || "";
        document.getElementById('editRealisasiAnggaranTW4').value = data.realisasiAnggaranTW4 || "";
        
        // Program dan Evaluasi
        document.getElementById('editProgram').value = data.program || "";
        document.getElementById('editAnalisisEvaluasi').value = data.analisisEvaluasi || "";
        document.getElementById('editPenanggungJawab').value = data.penanggungJawab;
    }
    
    // Fungsi untuk mengupdate dropdown indikator di form edit
    function updateEditIndikator() {
        const sasaranSelect = document.getElementById("editSasaranStrategis");
        const indikatorSelect = document.getElementById("editIndikatorKinerja");
        const selectedSasaran = sasaranSelect.value;

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
</script>