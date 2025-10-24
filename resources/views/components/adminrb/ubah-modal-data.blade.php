<div id="editModal{{ $item['id'] }}" class="hidden fixed inset-0 z-[9999] bg-black bg-opacity-50">
    <div class="flex items-center justify-center min-h-screen px-4 py-6">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden">

            <!-- Header -->
            <div class="flex justify-between items-center bg-yellow-50 px-6 py-4 border-b border-gray-200">
                <h5 class="text-lg font-semibold flex items-center gap-2 text-yellow-600">
                    <i class="fas fa-edit"></i> Ubah Sasaran
                </h5>
            </div>

            <!-- Body -->
            <form method="POST" action="{{ route('sasaran.update', $item['id']) }}" class="px-2 py-2 space-y-5">
                @csrf
                @method('PUT')

                <!-- Wrapper untuk memberi jarak kanan-kiri -->
                <div class="space-y-5 px-4"> <!-- <--- tambahkan px-4 di wrapper ini -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">Kategori</label>
                        <select name="kategori"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-200 focus:border-yellow-500"
                            required>
                            <option value="" disabled selected>Pilih kategori</option>
                            <option value="rb_general">RB General</option>
                            <option value="rb_tematik">RB Tematik</option>
                            <option value="pk_bupati">PK Bupati</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Sasaran</label>
                        <input type="text" name="nama" value="{{ $item['nama'] }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-200 focus:border-yellow-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Indikator</label>
                        <textarea name="indikator" rows="4"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-200 focus:border-yellow-500">@foreach ($item['indikator'] as $indikator){{ $indikator['nama'] }}, @endforeach</textarea>
                        <p class="text-xs text-gray-400 mt-1">Pisahkan dengan koma</p>
                    </div>
                </div>

                <!-- Footer -->
                <div class="flex justify-end gap-3 pt-5 mb-6 border-gray-200 px-4">
                    <!-- <--- ditambah mt-2 supaya tombol naik -->
                    <button type="button" class="bg-red-500 hover:bg-gray-300 text-white px-6 py-2 rounded-lg"
                        onclick="closeModal('editModal{{ $item['id'] }}')">Batal</button>
                    <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded-lg">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>