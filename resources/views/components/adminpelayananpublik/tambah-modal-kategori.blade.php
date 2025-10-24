<div id="tambahModal" class="hidden fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 z-[9999]">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md animate-slide-in">
        <h3 class="text-xl font-bold text-green-600 mb-4">Tambah Kategori</h3>
        <form action="{{ route('adminpelayananpublik.kategori.store') }}" method="POST">
            @csrf
            <input type="text" name="nama_kategori" placeholder="Nama Kategori"
                class="w-full border rounded p-2 mb-4" required>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('tambahModal')"
                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">Batal</button>
                <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Simpan</button>
            </div>
        </form>
    </div>
</div>
