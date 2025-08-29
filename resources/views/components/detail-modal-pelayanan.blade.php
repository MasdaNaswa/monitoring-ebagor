<?php
// components/modal-detail.php
?>
<!-- Modal Detail Dokumen -->
<div id="modalDetail" class="modal-detail hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl w-11/12 max-w-4xl max-h-screen overflow-y-auto">
        <div class="modal-header flex justify-between items-center p-4 border-b">
            <h3 class="text-lg font-semibold flex items-center gap-2">
                <i class="fas fa-eye text-blue-500"></i> Detail Dokumen
            </h3>
            <button class="btn-close text-gray-500 hover:text-gray-700 text-2xl" onclick="closeModal('modalDetail')">
                &times;
            </button>
        </div>
        <div class="modal-body p-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama File</label>
                    <div class="p-2 bg-gray-50 rounded-md">Laporan_SKM_Triwulan_Diskominfo_2023-10-15.docx</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Dokumen</label>
                    <div class="p-2 bg-gray-50 rounded-md">Laporan SKM</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Periode</label>
                    <div class="p-2 bg-gray-50 rounded-md">Triwulan I - 2023</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <div class="p-2 bg-green-50 text-green-800 rounded-md font-medium">Terverifikasi</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Upload</label>
                    <div class="p-2 bg-gray-50 rounded-md">15 Oktober 2023, 14:30</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Diupload Oleh</label>
                    <div class="p-2 bg-gray-50 rounded-md">Admin OPD (Diskominfo)</div>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                <div class="p-3 bg-gray-50 rounded-md">
                    Laporan Survei Kepuasan Masyarakat untuk triwulan pertama tahun 2023. Berisi data hasil survei dari 500 responden.
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition" onclick="closeModal('modalDetail')">
                    <i class="fas fa-times mr-2"></i> Tutup
                </button>
                <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    <i class="fas fa-download mr-2"></i> Unduh
                </button>
            </div>
        </div>
    </div>
</div>