<div id="hapusModal" class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black bg-opacity-50">
  <div class="bg-white rounded-xl shadow-xl w-full max-w-md animate-fadeIn overflow-hidden">

    <!-- Header -->
    <div class="flex justify-between items-center border-b px-5 py-4 bg-red-50">
      <h5 class="text-lg font-semibold flex items-center gap-2 text-red-600">
        <i class="fas fa-trash"></i> Konfirmasi Hapus
      </h5>
    </div>

    <!-- Body -->
    <div class="p-6">
      <p class="text-gray-700">
        Apakah kamu yakin ingin menghapus akun ini?
      </p>
    </div>

    <!-- Footer -->
    <div class="flex justify-end gap-3 px-5 py-4  bg-gray-50">
      <button type="button" onclick="closeModal('hapusModal')"
        class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg transition">
        Batal
      </button>
      <form id="deleteForm" method="POST" action="">
        @csrf
        @method('DELETE')
        <input type="hidden" id="deleteId" name="id">
        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg transition">
          Hapus
        </button>
      </form>

    </div>

  </div>
</div>
