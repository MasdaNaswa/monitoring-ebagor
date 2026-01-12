<!-- Modal Info Survei -->
<div id="infoModalSurvei" x-show="modalInfoSurvei" x-cloak
    class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-[9999]">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-6">

        <!-- Header -->
        <div class="flex justify-between items-center border-b border-yellow-400 pb-3 mb-4">
            <h3 class="text-lg font-semibold text-yellow-600 flex items-center gap-2">
                <i class="fas fa-info-circle"></i>
                Informasi Survei
            </h3>
        </div>

        <!-- Body -->
        <div class="text-center">
            <i class="fas fa-exclamation-triangle text-yellow-500 text-4xl mb-3 animate-pulse"></i>
            <p class="text-gray-800 text-sm mb-2">
                Anda sudah mengisi survei ini.
            </p>
            <p class="text-gray-500 text-sm">
                Jika ingin mengisi ulang, hasil survei sebelumnya harus dihapus terlebih dahulu oleh admin.
            </p>
        </div>

        <!-- Footer -->
        <div class="mt-6 clearfix">
            <button type="button" @click="modalInfoSurvei = false"
                class="float-right px-4 py-2 rounded-lg bg-yellow-200 text-yellow-800 hover:bg-yellow-300 transition">
                Tutup
            </button>
        </div>

    </div>
</div>