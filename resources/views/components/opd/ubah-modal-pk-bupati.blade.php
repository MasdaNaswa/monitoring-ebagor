<?php
$sasaranOptions = [
    1 => "1. Meningkatnya Investasi Daerah",
    2 => "2. Berkembangnya Sektor Ekonomi Dominan",
    // ... (opsi lainnya)
];

$penanggungJawabOptions = [
    "Dinas Penanaman Modal dan Pelayanan Satu Pintu",
    // ... (opsi lainnya)
];
?>

<div id="editModal" class="modal fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-[9999] p-4">
    <div class="modal-content bg-white rounded-lg shadow-xl w-11/12 max-w-6xl max-h-[90vh] overflow-y-auto relative">
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

                <!-- Informasi Dasar -->
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

                <!-- Tab Triwulan -->
                <div class="form-section mb-6">
                    <div class="tab flex border border-gray-300 bg-gray-100 rounded-t-md overflow-hidden">
                        <button type="button" class="tablinks px-4 py-2 bg-gray-200 font-medium active" onclick="openFormTab(event, 'editTriwulan1', this.parentElement.parentElement)">Triwulan I</button>
                        <button type="button" class="tablinks px-4 py-2 bg-gray-100 font-medium" onclick="openFormTab(event, 'editTriwulan2', this.parentElement.parentElement)">Triwulan II</button>
                        <button type="button" class="tablinks px-4 py-2 bg-gray-100 font-medium" onclick="openFormTab(event, 'editTriwulan3', this.parentElement.parentElement)">Triwulan III</button>
                        <button type="button" class="tablinks px-4 py-2 bg-gray-100 font-medium" onclick="openFormTab(event, 'editTriwulan4', this.parentElement.parentElement)">Triwulan IV</button>
                    </div>

                    <?php for($i=1;$i<=4;$i++): ?>
                    <div id="editTriwulan<?= $i ?>" class="tabcontent p-4 border border-t-0 rounded-b-md <?= $i>1?'hidden':'' ?>">
                        <div class="form-row flex gap-4 mb-4">
                            <div class="form-group flex-1">
                                <label for="editTargetTW<?= $i ?>" class="block font-medium mb-1">Target</label>
                                <input type="text" id="editTargetTW<?= $i ?>" name="targetTW<?= $i ?>" class="w-full px-3 py-2 border rounded-md">
                            </div>
                            <div class="form-group flex-1">
                                <label for="editRealisasiTW<?= $i ?>" class="block font-medium mb-1">Realisasi</label>
                                <input type="text" id="editRealisasiTW<?= $i ?>" name="realisasiTW<?= $i ?>" class="w-full px-3 py-2 border rounded-md">
                            </div>
                        </div>
                        <div class="form-row flex gap-4">
                            <div class="form-group flex-1">
                                <label for="editPaguAnggaranTW<?= $i ?>" class="block font-medium mb-1">Pagu Anggaran</label>
                                <input type="text" id="editPaguAnggaranTW<?= $i ?>" name="paguAnggaranTW<?= $i ?>" class="w-full px-3 py-2 border rounded-md">
                            </div>
                            <div class="form-group flex-1">
                                <label for="editRealisasiAnggaranTW<?= $i ?>" class="block font-medium mb-1">Realisasi Anggaran</label>
                                <input type="text" id="editRealisasiAnggaranTW<?= $i ?>" name="realisasiAnggaranTW<?= $i ?>" class="w-full px-3 py-2 border rounded-md">
                            </div>
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>

                <!-- Program & Evaluasi -->
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

                <div class="form-actions flex justify-end gap-3 pt-6 
                mt-6">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition-colors flex items-center gap-2" onclick="closeModal('editModal')">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-dark transition-colors flex items-center gap-2">
                         Simpan 
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
