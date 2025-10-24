<div id="tambahTemplateModal" 
     class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black bg-opacity-50 px-4 py-6">

    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 relative">
        <!-- Header -->
        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            <i class="fas fa-plus text-green-600"></i> Tambah 
        </h2>

        <form action="{{ route('adminpelayananpublik.template.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Nama Template -->
            <div>
                <label class="block text-sm font-semibold text-gray-700">Nama Template</label>
                <input type="text" name="nama_template" required
                       class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500">
            </div>

            <!-- Kategori -->
            <div>
                <label class="block text-sm font-semibold text-gray-700">Kategori</label>
                <select name="kategori_id" required
                        class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    <option value="">Pilih Kategori</option>
                    @foreach($kategories as $kategori)
                        <option value="{{ $kategori['id'] }}">{{ $kategori['nama_kategori'] }}</option>
                    @endforeach
                </select>
            </div>

            <!-- File -->
            <div>
                <label class="block text-sm font-semibold text-gray-700">File Template</label>
                <input type="file" name="file" required
                       class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500">
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" onclick="closeModal('tambahTemplateModal')"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                    Batal
                </button>
                <button type="submit"
                        class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
 