<?php
// components/modal-edit.php
?>
<!-- Modal Edit Dokumen -->
<div id="modalEdit" class="modal-edit hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl w-11/12 max-w-4xl max-h-screen overflow-y-auto">
        <div class="modal-header flex justify-between items-center p-4 border-b">
            <h3 class="text-lg font-semibold flex items-center gap-2">
                <i class="fas fa-edit text-blue-500"></i> Edit Dokumen
            </h3>
            <button class="btn-close text-gray-500 hover:text-gray-700 text-2xl" onclick="closeModal('modalEdit')">
                &times;
            </button>
        </div>
        <div class="modal-body p-5">
            <form id="formEdit" class="space-y-4">
                <input type="hidden" id="editId">
                
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
                    <label class="block text-sm font-medium text-gray-700 mb-1">File Saat Ini</label>
                    <div class="flex items-center justify-between bg-gray-100 p-3 rounded-md">
                        <div class="flex items-center">
                            <i class="fas fa-file-word text-blue-500 text-xl mr-2"></i>
                            <span>laporan_skm_triwulan_1.docx</span>
                        </div>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Terverifikasi</span>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Upload File Baru (Opsional)</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-md p-4 text-center">
                        <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-2"></i>
                        <p class="text-sm text-gray-500">Seret file ke sini atau klik untuk memilih</p>
                        <input type="file" class="hidden" id="fileEditUpload" />
                        <button type="button" class="mt-2 bg-blue-100 text-blue-700 px-3 py-1 rounded text-sm hover:bg-blue-200">
                            Pilih File
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                    <textarea class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" rows="3" placeholder="Tambahkan keterangan tentang dokumen ini">Laporan triwulan pertama tahun 2023</textarea>
                </div>
                
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition" onclick="closeModal('modalEdit')">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>