<div id="editModal{{ $laporan['id_laporan'] }}"
    class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black bg-opacity-50 px-4 py-6">

    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">

        <!-- Header -->
        <div class="flex justify-between items-center bg-green-50 px-6 py-4 border-b border-gray-200">
            <h5 class="text-lg font-semibold text-green-600">
                <i class="fas fa-edit"></i> Update Status & Catatan
            </h5>
        </div>

        <!-- Form -->
        <form action="{{ route('adminpelayananpublik.laporan.update', $laporan['id_laporan']) }}" method="POST"
            class="px-6 py-4 space-y-5">
            @csrf

            <!-- Status -->
            <div class="flex flex-col gap-2 text-left">
                <label for="status{{ $laporan['id_laporan'] }}" class="text-gray-700 text-sm text-left">Status</label>
                <select name="status" id="status{{ $laporan['id_laporan'] }}"
                    class="statusSelect border border-gray-300 rounded p-2 text-sm w-full focus:ring-2 focus:ring-green-400 focus:outline-none text-left"
                    data-target="catatan{{ $laporan['id_laporan'] }}">
                    <option value="Diproses" @selected($laporan['status'] == 'Diproses')>Diproses</option>
                    <option value="Revisi" @selected($laporan['status'] == 'Revisi')>Revisi</option>
                    <option value="Disetujui" @selected($laporan['status'] == 'Disetujui')>Disetujui</option>
                </select>
            </div>

            <!-- Catatan -->
            <div class="flex flex-col gap-2 text-left">
                <label for="catatan{{ $laporan['id_laporan'] }}" class="text-gray-700 text-sm text-left">Catatan</label>
                <textarea
                    name="catatan"
                    id="catatan{{ $laporan['id_laporan'] }}"
                    rows="3"
                    class="catatanTextarea border border-gray-300 rounded p-2 text-sm w-full focus:ring-2 focus:ring-green-400 focus:outline-none text-left"
                    placeholder="Tambahkan catatan..."
                    @if($laporan['status'] != 'Revisi') disabled style="background: #f1f1f1;" @endif
                >{{ old('catatan', $laporan['catatan'] ?? '') }}</textarea>
            </div>

            <!-- Tombol aksi -->
            <div class="flex justify-end gap-3 pt-2 border-gray-200">
                <button type="button" onclick="closeModal('editModal{{ $laporan['id_laporan'] }}')"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-2 rounded-lg transition">
                    Batal
                </button>
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg transition">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".statusSelect").forEach(select => {
        select.addEventListener("change", function () {
            const targetId = this.getAttribute("data-target");
            const textarea = document.getElementById(targetId);

            if (this.value === "Revisi") {
                textarea.disabled = false;
                textarea.style.background = "white";
            } else {
                textarea.disabled = true;
                textarea.style.background = "#f1f1f1";
                textarea.value = ""; // Optional: kosongkan catatan
            }
        });
    });
});
</script>
