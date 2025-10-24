<!-- Edit Modal RB Tematik -->
<div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-40 items-center justify-center z-[9999] p-4">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-6xl max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="flex justify-between items-center bg-indigo-600 text-white p-6 rounded-t-lg sticky top-0 z-10">
            <h3 class="text-xl font-semibold flex items-center gap-2">
                Ubah Rencana Aksi RB Tematik <span id="editTahunHeader">2025</span>
            </h3>
           
        </div>

        <!-- Modal Body -->
        <div class="p-6">
            <form id="editRenaksiRB" class="space-y-6">
                <!-- Judul -->
                <div class="text-center mb-6 pb-4 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-indigo-700">RENCANA AKSI RB TEMATIK TAHUN <span id="editTahunHeader2">2025</span></h2>
                </div>

                <!-- Informasi Dasar -->
                <div class="mb-6 p-6 bg-gray-50 rounded-lg border-l-4 border-indigo-500 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="editNo" class="block text-sm font-medium text-gray-700 mb-1">NO</label>
                            <input type="text" id="editNo" name="editNo" readonly class="w-full p-2 border border-gray-300 rounded-md bg-gray-100" />
                        </div>
                        <div>
                            <label for="editPermasalahan" class="block text-sm font-medium text-gray-700 mb-1">PERMASALAHAN</label>
                            <select id="editPermasalahan" name="editPermasalahan" required class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Pilih Permasalahan</option>
                                <option value="Penanggulangan Kemiskinan">Penanggulangan Kemiskinan</option>
                                <option value="Peningkatan Investasi">Peningkatan Investasi</option>
                                <option value="Mendukung Ketahanan Pangan Nasional">Mendukung Ketahanan Pangan Nasional</option>
                                <option value="Pengelolaan Sumber Daya dan Hilirisasi">Pengelolaan Sumber Daya dan Hilirisasi</option>
                                <option value="Peningkatan Kualitas dan Akses Layanan Kesehatan">Peningkatan Kualitas dan Akses Layanan Kesehatan</option>
                                <option value="Peningkatan Akses, Kualitas dan Mutu Layanan Pendidikan">Peningkatan Akses, Kualitas dan Mutu Layanan Pendidikan</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="editSasaranTematik" class="block text-sm font-medium text-gray-700 mb-1">SASARAN TEMATIK</label>
                            <input type="text" id="editSasaranTematik" name="editSasaranTematik" class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div>
                            <label for="editIndikator" class="block text-sm font-medium text-gray-700 mb-1">INDIKATOR</label>
                            <input type="text" id="editIndikator" name="editIndikator" class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="editTarget" class="block text-sm font-medium text-gray-700 mb-1">TARGET</label>
                            <input type="text" id="editTarget" name="editTarget" class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div>
                            <label for="editSatuan" class="block text-sm font-medium text-gray-700 mb-1">SATUAN</label>
                            <input type="text" id="editSatuan" name="editSatuan" class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <div>
                        <label for="editRencanaAksi" class="block text-sm font-medium text-gray-700 mb-1">RENCANA AKSI</label>
                        <textarea id="editRencanaAksi" name="editRencanaAksi" rows="3" class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="editOutput" class="block text-sm font-medium text-gray-700 mb-1">OUTPUT</label>
                            <input type="text" id="editOutput" name="editOutput" class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div>
                            <label for="editSatuanOutput" class="block text-sm font-medium text-gray-700 mb-1">SATUAN OUTPUT</label>
                            <input type="text" id="editSatuanOutput" name="editSatuanOutput" class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div>
                            <label for="editIndikatorOutput" class="block text-sm font-medium text-gray-700 mb-1">INDIKATOR OUTPUT</label>
                            <input type="text" id="editIndikatorOutput" name="editIndikatorOutput" class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>
                </div>

                <!-- Anggaran TW1–TW4 -->
                <div class="mb-6 p-6 bg-gray-50 rounded-lg border-l-4 border-blue-500">
                    <h3 class="text-md font-semibold text-gray-800 mb-4">Renaksi Tahun <span id="editTahunAnggaran">2025</span></h3>
                    @foreach (['1','2','3','4'] as $tw)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="editTw{{ $tw }}Target" class="block text-sm font-medium text-gray-700 mb-1">TW{{ $tw }} Target</label>
                            <input type="text" id="editTw{{ $tw }}Target" name="editTw{{ $tw }}Target" class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div>
                            <label for="editTw{{ $tw }}Rp" class="block text-sm font-medium text-gray-700 mb-1">TW{{ $tw }} Rp</label>
                            <input type="number" id="editTw{{ $tw }}Rp" name="editTw{{ $tw }}Rp" class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Koordinator & Pelaksana -->
                <div class="mb-6 p-6 bg-gray-50 rounded-lg border-l-4 border-green-500">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="editKoordinator" class="block text-sm font-medium text-gray-700 mb-1">KOORDINATOR</label>
                            <select id="editKoordinator" name="editKoordinator" class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Pilih Koordinator</option>
                            </select>
                        </div>
                        <div>
                            <label for="editPelaksana" class="block text-sm font-medium text-gray-700 mb-1">PELAKSANA</label>
                            <select id="editPelaksana" name="editPelaksana" class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Pilih Pelaksana</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                    <button type="button" onclick="closeModal('editModal')" class="px-4 py-2 bg-gray-500 text-black rounded-md hover:bg-gray-600 transition flex items-center justify-center gap-2">
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
