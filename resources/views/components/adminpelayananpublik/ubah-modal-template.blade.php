<div id="editTemplateModal{{ $template['id'] }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-[9999]">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 relative">
        <!-- Header -->
        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            <i class="fas fa-edit text-yellow-600"></i> Edit Template
        </h2>

        <form action="{{ route('adminpelayananpublik.template.update', $template['id']) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Nama Template -->
            <div>
                <label class="block text-sm font-semibold text-gray-700">Nama Template</label>
                <input type="text" name="nama_template" value="{{ $template['nama_template'] }}" required
                       class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
            </div>

            <!-- Kategori -->
            <div>
                <label class="block text-sm font-semibold text-gray-700">Kategori</label>
                <select name="kategori_id" required
                        class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                    @foreach($kategories as $kategori)
                        <option value="{{ $kategori['id'] }}" @selected($kategori['id'] == $template['kategori']['id'])>
                            {{ $kategori['nama_kategori'] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- File -->
            <div>
                <label class="block text-sm font-semibold text-gray-700">Ganti File (Opsional)</label>
                <input type="file" name="file"
                       class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4 ">
                <button type="button" onclick="closeModal('editTemplateModal{{ $template['id'] }}')"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                    Batal
                </button>
                <button type="submit"
                        class="px-5 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
