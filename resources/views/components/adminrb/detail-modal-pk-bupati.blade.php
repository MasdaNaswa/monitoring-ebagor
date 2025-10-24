<div id="detailModal" class="fixed inset-0 z-[9999] hidden">
    <div class="flex items-center justify-center w-full h-full bg-black bg-opacity-50 p-4">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-6xl max-h-[90vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex justify-between items-center bg-blue-600 text-white p-6 rounded-t-lg sticky top-0 z-10">
                <h3 class="text-xl font-semibold flex items-center gap-2">
                    Detail Data PK Bupati
                </h3>
            </div>

            <!-- Modal Body -->
            <div class="p-6 space-y-6 overflow-y-auto">
                <!-- Header -->
                <div class="text-center mb-6 pb-4 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-blue-700">
                        DETAIL PK BUPATI TAHUN <span id="detailTahunHeader">2025</span>
                    </h2>
                </div>

                <!-- Informasi Dasar -->
                <div class="mb-6 p-6 bg-gray-50 rounded-lg border-l-4 border-blue-500 space-y-4">
                    <h3 class="text-md font-semibold text-blue-800 mb-4">Informasi Dasar</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">No</label>
                            <div class="p-2 border-b border-gray-200 bg-gray-100 rounded" id="detailNo"></div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Tahun</label>
                            <div class="p-2 border-b border-gray-200 bg-gray-100 rounded" id="detailTahun"></div>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600">Sasaran Strategis</label>
                            <div class="p-2 border-b border-gray-200 bg-gray-100 rounded" id="detailSasaranStrategis"></div>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600">Indikator Kinerja</label>
                            <div class="p-2 border-b border-gray-200 bg-gray-100 rounded" id="detailIndikatorKinerja"></div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Target 2025</label>
                            <div class="p-2 border-b border-gray-200 bg-gray-100 rounded" id="detailTarget2025"></div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Satuan</label>
                            <div class="p-2 border-b border-gray-200 bg-gray-100 rounded" id="detailSatuan"></div>
                        </div>
                    </div>
                </div>

                <!-- Target & Realisasi per Triwulan -->
                <div class="mb-6 p-6 bg-green-50 rounded-lg border-l-4 border-green-500 space-y-4">
                    <h3 class="text-md font-semibold text-green-800 mb-4">Target & Realisasi per Triwulan</h3>

                    <div class="tab flex border border-gray-300 bg-gray-100 rounded-t-md overflow-hidden mb-4">
                        <button type="button" class="tablinks px-4 py-2 bg-gray-200 font-medium active"
                            onclick="openDetailTab(event, 'detailTriwulan1')">Triwulan I</button>
                        <button type="button" class="tablinks px-4 py-2 bg-gray-100 font-medium"
                            onclick="openDetailTab(event, 'detailTriwulan2')">Triwulan II</button>
                        <button type="button" class="tablinks px-4 py-2 bg-gray-100 font-medium"
                            onclick="openDetailTab(event, 'detailTriwulan3')">Triwulan III</button>
                        <button type="button" class="tablinks px-4 py-2 bg-gray-100 font-medium"
                            onclick="openDetailTab(event, 'detailTriwulan4')">Triwulan IV</button>
                    </div>

                    <!-- Triwulan content -->
                    <div id="detailTriwulan1" class="tabcontent">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Target TW1</label>
                                <div class="p-2 border border-gray-200 bg-gray-100 rounded" id="detailTargetTW1"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Realisasi TW1</label>
                                <div class="p-2 border border-gray-200 bg-gray-100 rounded" id="detailRealisasiTW1"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Pagu Anggaran TW1</label>
                                <div class="p-2 border border-gray-200 bg-gray-100 rounded" id="detailPaguTW1"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Realisasi Anggaran TW1</label>
                                <div class="p-2 border border-gray-200 bg-gray-100 rounded" id="detailRealisasiAnggaranTW1">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="detailTriwulan2" class="tabcontent hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Target TW2</label>
                                <div class="p-2 border border-gray-200 bg-gray-100 rounded" id="detailTargetTW2"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Realisasi TW2</label>
                                <div class="p-2 border border-gray-200 bg-gray-100 rounded" id="detailRealisasiTW2"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Pagu Anggaran TW2</label>
                                <div class="p-2 border border-gray-200 bg-gray-100 rounded" id="detailPaguTW2"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Realisasi Anggaran TW2</label>
                                <div class="p-2 border border-gray-200 bg-gray-100 rounded" id="detailRealisasiAnggaranTW2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="detailTriwulan3" class="tabcontent hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Target TW3</label>
                                <div class="p-2 border border-gray-200 bg-gray-100 rounded" id="detailTargetTW3"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Realisasi TW3</label>
                                <div class="p-2 border border-gray-200 bg-gray-100 rounded" id="detailRealisasiTW3"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Pagu Anggaran TW3</label>
                                <div class="p-2 border border-gray-200 bg-gray-100 rounded" id="detailPaguTW3"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Realisasi Anggaran TW3</label>
                                <div class="p-2 border border-gray-200 bg-gray-100 rounded" id="detailRealisasiAnggaranTW3">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="detailTriwulan4" class="tabcontent hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Target TW4</label>
                                <div class="p-2 border border-gray-200 bg-gray-100 rounded" id="detailTargetTW4"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Realisasi TW4</label>
                                <div class="p-2 border border-gray-200 bg-gray-100 rounded" id="detailRealisasiTW4"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Pagu Anggaran TW4</label>
                                <div class="p-2 border border-gray-200 bg-gray-100 rounded" id="detailPaguTW4"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Realisasi Anggaran TW4</label>
                                <div class="p-2 border border-gray-200 bg-gray-100 rounded" id="detailRealisasiAnggaranTW4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Program dan Analisis -->
                <div class="mb-6 p-6 bg-amber-50 rounded-lg border-l-4 border-amber-500">
                    <h3 class="text-md font-semibold text-amber-800 mb-4">Program dan Analisis</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Program</label>
                        <div id="detailProgram" class="p-2 border border-gray-200 bg-gray-100 rounded"></div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Penjelasan Analisis dan Evaluasi</label>
                        <div id="detailAnalisisEvaluasi" class="p-2 border border-gray-200 bg-gray-100 rounded"></div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Penanggung Jawab</label>
                        <div id="detailPenanggungJawab" class="p-2 border border-gray-200 bg-gray-100 rounded"></div>
                    </div>
                </div>

                <!-- Tombol Tutup -->
                <div class="flex justify-end gap-3 mt-6 pt-6">
                    <button type="button" class="px-4 py-2  bg-blue-700 text-white rounded-md hover:bg-blue-800 transition"
                        onclick="closeModal('detailModal')">Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
