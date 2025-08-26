<!-- Add Modal RB Tematik -->
<div id="addModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-6xl max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="flex justify-between items-center bg-indigo-600 text-white p-6 rounded-t-lg sticky top-0 z-10">
            <h3 class="text-xl font-semibold flex items-center gap-2">
                 Tambah Rencana Aksi RB Tematik <?= $currentYear ?>
            </h3>
        </div>

        <!-- Modal Body -->
        <div class="p-6">
            <form id="tambahRenaksiRB" class="space-y-6">
                <!-- Judul -->
                <div class="text-center mb-6 pb-4 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-indigo-700">RENCANA AKSI RB TEMATIK TAHUN <?= $currentYear ?></h2>
                </div>

                <!-- Informasi Dasar -->
                <div class="mb-6 p-6 bg-gray-50 rounded-lg border-l-4 border-indigo-500 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="no" class="block text-sm font-medium text-gray-700 mb-1">NO</label>
                            <input type="text" id="no" name="no" readonly 
                                   value="<?= count($dataForYear) + 1 ?>"
                                   class="w-full p-2 border border-gray-300 rounded-md bg-gray-100" />
                        </div>
                        <div>
                            <label for="permasalahan" class="block text-sm font-medium text-gray-700 mb-1">PERMASALAHAN</label>
                            <select id="permasalahan" name="permasalahan" required
                                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
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
                            <label for="sasaranTematik" class="block text-sm font-medium text-gray-700 mb-1">SASARAN TEMATIK</label>
                            <input type="text" id="sasaranTematik" name="sasaranTematik"
                                   class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div>
                            <label for="indikator" class="block text-sm font-medium text-gray-700 mb-1">INDIKATOR</label>
                            <input type="text" id="indikator" name="indikator"
                                   class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="target" class="block text-sm font-medium text-gray-700 mb-1">TARGET</label>
                            <input type="text" id="target" name="target"
                                   class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div>
                            <label for="satuan" class="block text-sm font-medium text-gray-700 mb-1">SATUAN</label>
                            <input type="text" id="satuan" name="satuan"
                                   class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <div>
                        <label for="rencanaAksi" class="block text-sm font-medium text-gray-700 mb-1">RENCANA AKSI</label>
                        <textarea id="rencanaAksi" name="rencanaAksi" rows="3"
                                  class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="output" class="block text-sm font-medium text-gray-700 mb-1">OUTPUT</label>
                            <input type="text" id="output" name="output"
                                   class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div>
                            <label for="satuanOutput" class="block text-sm font-medium text-gray-700 mb-1">SATUAN OUTPUT</label>
                            <input type="text" id="satuanOutput" name="satuanOutput"
                                   class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div>
                            <label for="indikatorOutput" class="block text-sm font-medium text-gray-700 mb-1">INDIKATOR OUTPUT</label>
                            <input type="text" id="indikatorOutput" name="indikatorOutput"
                                   class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>
                </div>

                <!-- Anggaran TW -->
                <div class="mb-6 p-6 bg-gray-50 rounded-lg border-l-4 border-blue-500">
                    <h3 class="text-md font-semibold text-gray-800 mb-4">Renaksi Tahun <?= $currentYear ?></h3>
                    @foreach (['1','2','3','4'] as $tw)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="tw{{ $tw }}Target" class="block text-sm font-medium text-gray-700 mb-1">TW{{ $tw }} Target</label>
                            <input type="text" id="tw{{ $tw }}Target" name="tw{{ $tw }}Target"
                                   class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div>
                            <label for="tw{{ $tw }}Rp" class="block text-sm font-medium text-gray-700 mb-1">TW{{ $tw }} Rp</label>
                            <input type="number" id="tw{{ $tw }}Rp" name="tw{{ $tw }}Rp"
                                   class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Koordinator & Pelaksana -->
                <div class="mb-6 p-6 bg-gray-50 rounded-lg border-l-4 border-green-500">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="koordinator" class="block text-sm font-medium text-gray-700 mb-1">KOORDINATOR</label>
                            <select id="koordinator" name="koordinator"
                                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Pilih Koordinator</option>
                                <option value="Baperlitbang">Baperlitbang</option>
                                <option value="DPMPTSP">DPMPTSP</option>
                                <option value="Dinas Pengendalian Penduduk KB, PP dan PA">Dinas Pengendalian Penduduk KB, PP dan PA</option>
                                <option value="DISNAKERIN">DISNAKERIN</option>
                                <option value="Diskominfo">Diskominfo</option>
                            </select>
                        </div>
                        <div>
                            <label for="pelaksana" class="block text-sm font-medium text-gray-700 mb-1">PELAKSANA</label>
                            <select id="pelaksana" name="pelaksana"
                                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Pilih Pelaksana</option>
                                <option value="Dinas PUPR">Dinas PUPR</option>
                                <option value="Dinas Pendidikan dan Kebudayaan">Dinas Pendidikan dan Kebudayaan</option>
                                <option value="Dinas Perhubungan">Dinas Perhubungan</option>
                                <option value="Dinas Perkim">Dinas Perkim</option>
                                <option value="Dinas Kesehatan">Dinas Kesehatan</option>
                                <option value="Dinas Koperasi, Usaha Mikro, Perdagangan dan ESDM">Dinas Koperasi, Usaha Mikro, Perdagangan dan ESDM</option>
                                <option value="Dinas Pertanian">Dinas Pertanian</option>
                                <option value="Dinas Sosial">Dinas Sosial</option>
                                <option value="Dinas Perikanan">Dinas Perikanan</option>
                                <option value="Disnaker">Disnaker</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                    <button type="button" onclick="closeModal('addModal')"
                            class="px-4 py-2 bg-gray-500 text-black rounded-md hover:bg-gray-600 transition flex items-center justify-center gap-2">
                        <i class="fas fa-times"></i> Batal
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition flex items-center justify-center gap-2">
                       Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
