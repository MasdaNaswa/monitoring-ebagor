<!-- Detail Modal RB Tematik -->
<div id="detailModal" class="hidden fixed inset-0 z-[9999] ">
    <div class="flex items-center justify-center w-full h-full bg-black bg-opacity-40">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-6xl max-h-[90vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex justify-between items-center bg-blue-600 text-white p-6 rounded-t-lg sticky top-0 z-10">
                <h3 class="text-xl font-semibold flex items-center gap-2">
                    Detail Rencana Aksi RB Tematik
                </h3>
            </div>

            <!-- Modal Body -->
            <div class="p-6 space-y-6">
                <!-- Header -->
                <div class="text-center mb-6 pb-4 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-blue-700">
                        DETAIL RENCANA AKSI RB TEMATIK TAHUN <span id="detailTahunHeader">2025</span>
                    </h2>
                </div>

                <!-- Informasi Dasar -->
                <div class="mb-6 p-6 bg-gray-50 rounded-lg border-l-4 border-blue-500 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">No</label>
                            <input type="text" id="detailNo" readonly class="w-full p-2 border border-gray-300 rounded-md bg-gray-100"/>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Permasalahan</label>
                            <input type="text" id="detailPermasalahan" readonly class="w-full p-2 border border-gray-300 rounded-md bg-gray-100"/>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Sasaran Tematik</label>
                            <input type="text" id="detailSasaranTematik" readonly class="w-full p-2 border border-gray-300 rounded-md bg-gray-100"/>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Indikator</label>
                            <input type="text" id="detailIndikator" readonly class="w-full p-2 border border-gray-300 rounded-md bg-gray-100"/>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Target</label>
                            <input type="text" id="detailTarget" readonly class="w-full p-2 border border-gray-300 rounded-md bg-gray-100"/>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Satuan</label>
                            <input type="text" id="detailSatuan" readonly class="w-full p-2 border border-gray-300 rounded-md bg-gray-100"/>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600">Rencana Aksi</label>
                        <textarea id="detailRencanaAksi" readonly rows="3" class="w-full p-2 border border-gray-300 rounded-md bg-gray-100"></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Output</label>
                            <input type="text" id="detailOutput" readonly class="w-full p-2 border border-gray-300 rounded-md bg-gray-100"/>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Satuan Output</label>
                            <input type="text" id="detailSatuanOutput" readonly class="w-full p-2 border border-gray-300 rounded-md bg-gray-100"/>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Indikator Output</label>
                            <input type="text" id="detailIndikatorOutput" readonly class="w-full p-2 border border-gray-300 rounded-md bg-gray-100"/>
                        </div>
                    </div>
                </div>

                <!-- Anggaran TW -->
                <div class="mb-6 p-6 bg-purple-50 rounded-lg border-l-4 border-purple-500 space-y-4">
                    <h3 class="text-md font-semibold text-purple-800 mb-4">Renaksi Tahun <span id="detailTahunAnggaran">2025</span></h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label>TW1 Target</label>
                            <input type="text" id="detailTw1Target" readonly class="w-full p-2 border rounded-md bg-gray-100"/>
                        </div>
                        <div>
                            <label>TW1 Rp</label>
                            <input type="text" id="detailTw1Rp" readonly class="w-full p-2 border rounded-md bg-gray-100"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label>TW2 Target</label>
                            <input type="text" id="detailTw2Target" readonly class="w-full p-2 border rounded-md bg-gray-100"/>
                        </div>
                        <div>
                            <label>TW2 Rp</label>
                            <input type="text" id="detailTw2Rp" readonly class="w-full p-2 border rounded-md bg-gray-100"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label>TW3 Target</label>
                            <input type="text" id="detailTw3Target" readonly class="w-full p-2 border rounded-md bg-gray-100"/>
                        </div>
                        <div>
                            <label>TW3 Rp</label>
                            <input type="text" id="detailTw3Rp" readonly class="w-full p-2 border rounded-md bg-gray-100"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label>TW4 Target</label>
                            <input type="text" id="detailTw4Target" readonly class="w-full p-2 border rounded-md bg-gray-100"/>
                        </div>
                        <div>
                            <label>TW4 Rp</label>
                            <input type="text" id="detailTw4Rp" readonly class="w-full p-2 border rounded-md bg-gray-100"/>
                        </div>
                    </div>
                </div>

                <!-- Koordinator & Pelaksana -->
                <div class="mb-6 p-6 bg-gray-50 rounded-lg border-l-4 border-green-500">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label>Koordinator</label>
                            <input type="text" id="detailKoordinator" readonly class="w-full p-2 border border-gray-300 rounded-md bg-gray-100"/>
                        </div>
                        <div>
                            <label>Pelaksana</label>
                            <input type="text" id="detailPelaksana" readonly class="w-full p-2 border border-gray-300 rounded-md bg-gray-100"/>
                        </div>
                    </div>
                </div>

                <!-- Tombol Tutup -->
                <div class="flex justify-end gap-3 mt-6 pt-6">
                    <button type="button" class="px-4 py-2  bg-blue-700 text-white rounded-md hover:bg-blue-800 transition"
                            onclick="closeModal('detailModal')">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
