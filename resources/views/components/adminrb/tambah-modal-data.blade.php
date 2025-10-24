{{-- components/modal-tambah.blade.php --}}
<div id="tambahSasaranModal"
    class="hidden fixed inset-0 bg-black bg-opacity-40 z-[9999]">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md overflow-y-auto">
            <!-- Header -->
            <div class="flex justify-between items-center bg-green-600 text-white p-4 rounded-t-lg">
                <h3 class="text-lg font-semibold">Tambah Sasaran</h3>
            </div>

            <!-- Form -->
            <form action="{{ route('sasaran.store') }}" method="POST" class="p-4 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-600">Kategori</label>
                    <select name="kategori" class="w-full p-2 border rounded-md" required>
                        <option value="" disabled selected>Pilih kategori</option>
                        <option value="rb_general">RB General</option>
                        <option value="rb_tematik">RB Tematik</option>
                        <option value="pk_bupati">PK Bupati</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Nama Sasaran</label>
                    <input type="text" name="nama" class="w-full p-2 border rounded-md" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Indikator</label>
                    <textarea name="indikator[]" rows="3" class="w-full p-2 border rounded-md"
                        placeholder="Pisahkan indikator dengan enter" required></textarea>
                </div>

                <!-- Tombol -->
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal('tambahSasaranModal')"
                        class="px-2 py-2 bg-red-500 text-white rounded hover:bg-gray-600">Batal</button>
                    <button type="submit"
                        class="px-2 py-2 bg-green-500 text-white rounded hover:bg-green-600">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
