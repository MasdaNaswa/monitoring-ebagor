<div id="editModal{{ $laporan['id'] }}" 
     class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-[9999] transition-opacity duration-300">
    
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 relative transform transition-all duration-300 scale-95">

        <!-- Header -->
        <h2 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2 text-left">
            <i class="fas fa-exchange-alt text-blue-600"></i>
            Ubah Status & Catatan
        </h2>

        <!-- Form status + catatan -->
        <form action="{{ route('adminpelayananpublik.laporan.update', $laporan['id']) }}" 
              method="POST" class="space-y-5 text-left">
            @csrf
            @method('PUT')

            <!-- Status -->
            <div class="text-left">
                <label class="block text-sm font-semibold text-gray-700 text-left">Status</label>
                <select name="status" 
                        class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-left">
                    <option value="Menunggu" @selected($laporan['status']=='Menunggu')>Menunggu</option>
                    <option value="Terverifikasi" @selected($laporan['status']=='Terverifikasi')>Terverifikasi</option>
                </select>
            </div>

            <!-- Catatan -->
            <div class="text-left">
                <label class="block text-sm font-semibold text-gray-700 text-left">Catatan</label>
                <textarea name="catatan" rows="3"
                          class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-left"
                          placeholder="Tambahkan catatan untuk OPD...">{{ old('catatan', $laporan['catatan'] ?? '') }}</textarea>
            </div>

            <!-- Tombol aksi -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" 
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition"
                        onclick="closeModal('editModal{{ $laporan['id'] }}')">
                     Batal
                </button>
                <button type="submit" 
                        class="px-5 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
