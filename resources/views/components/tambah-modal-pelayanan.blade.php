<?php
// components/modal-tambah.php
?>
<!-- Modal Tambah Dokumen -->
<div id="modalTambah" class="modal-tambah hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl w-11/12 max-w-4xl max-h-screen overflow-y-auto">
        <div class="modal-header flex justify-between items-center p-4 border-b">
            <h3 class="text-lg font-semibold flex items-center gap-2">
                <i class="fas fa-plus-circle text-blue-500"></i> Unggah Dokumen Baru
            </h3>
            <button class="btn-close text-gray-500 hover:text-gray-700 text-2xl" onclick="closeModal('modalTambah')">
                &times;
            </button>
        </div>
        <div class="modal-body p-5">
            <form id="formTambah" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Dokumen</label>
                        <select class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih Jenis Dokumen</option>
                            <option value="skm">Laporan SKM</option>
                            <option value="fkp">Laporan FKP</option>
                            <option value="berita-acara">Berita Acara</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Periode</label>
                        <select class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih Periode</option>
                            <option value="triwulan">Triwulan</option>
                            <option value="semester">Semester</option>
                            <option value="tahunan">Tahunan</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Upload File</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-md p-4 text-center">
                        <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-2"></i>
                        <p class="text-sm text-gray-500">Seret file ke sini atau klik untuk memilih</p>
                        <input type="file" class="hidden" id="fileUpload" />
                        <button type="button" class="mt-2 bg-blue-100 text-blue-700 px-3 py-1 rounded text-sm hover:bg-blue-200">
                            Pilih File
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                    <textarea class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" rows="3" placeholder="Tambahkan keterangan tentang dokumen ini"></textarea>
                </div>
                
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition" onclick="closeModal('modalTambah')">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                        <i class="fas fa-upload mr-2"></i> Unggah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>