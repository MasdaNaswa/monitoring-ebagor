<!-- Modal Tambah Akun OPD -->
<div id="addOPDModal" class="hidden fixed inset-0 bg-black bg-opacity-40 items-center justify-center z-[9999] p-4">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md overflow-y-auto">
        <div class="flex justify-between items-center bg-green-600 text-white p-4 rounded-t-lg">
            <h3 class="text-lg font-semibold">Tambah Akun OPD</h3>
            <button onclick="closeModal('addOPDModal')" class="text-white font-bold">&times;</button>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-600">Nama OPD</label>
                <input type="text" class="w-full p-2 border rounded-md" placeholder="Nama OPD">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" class="w-full p-2 border rounded-md" placeholder="Email">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" class="w-full p-2 border rounded-md" placeholder="Password">
            </div>
            <div class="flex justify-end gap-2">
                <button class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600" onclick="closeModal('addOPDModal')">Batal</button>
                <button class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Simpan</button>
            </div>
        </div>
    </div>
</div>
