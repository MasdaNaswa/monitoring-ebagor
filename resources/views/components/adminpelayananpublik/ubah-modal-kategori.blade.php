<div id="editModal{{ $kategori['id'] }}" class="hidden fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center z-[9999]">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md p-6 animate-slide-in">
        <h3 class="text-2xl font-bold text-yellow-600 mb-4">Ubah Kategori</h3>
        <form action="{{ route('adminpelayananpublik.kategori.update', $kategori['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Nama Kategori</label>
                <input type="text" name="nama_kategori" value="{{ $kategori['nama_kategori'] }}"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-yellow-300 focus:border-yellow-500 transition" required>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeModal('editModal{{ $kategori['id'] }}')"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">Batal</button>
                <button type="submit"
                    class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition shadow">Simpan</button>
            </div>
        </form>
    </div>
</div>
