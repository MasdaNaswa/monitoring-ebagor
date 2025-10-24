@extends('layouts.app')

@section('title', 'Evaluasi Jabatan')

@section('content')
<div class="min-h-screen bg-[#F8FAFC] flex flex-col">

    <!-- Header -->
    <header class="bg-white shadow sticky top-0 z-30">
        <div class="flex justify-between items-center py-4 px-6 md:px-8">
            <h1 class="text-xl md:text-2xl font-semibold flex items-center gap-2">
                <i class="fas fa-clipboard-check text-blue-600"></i>
                <span class="hidden sm:inline"> Evaluasi Jabatan</span>
            </h1>
            <div class="relative group">
                <button class="flex items-center gap-2 bg-gray-100 rounded-full px-3 py-1 hover:bg-gray-200 transition-colors">
                    <i class="fas fa-user-circle text-xl md:text-2xl text-blue-600"></i>
                    <span class="text-sm md:text-base">Admin OPD</span>
                </button>

                <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-lg rounded-md opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-opacity duration-200 z-50">
                    <ul class="py-2 text-gray-700 text-sm">
                        <li>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">
                                Profil Saya
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </header>

    {{-- Content --}}
    <div class="p-6 space-y-6 flex-1">

        {{-- Upload Section --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold flex items-center gap-2 border-b pb-2 mb-4">
                <i class="fas fa-cloud-upload-alt text-blue-600"></i> Unggah Dokumen Evaluasi Jabatan
            </h2>

            <div id="uploadArea" class="border-2 border-dashed border-gray-300 rounded p-12 text-center cursor-pointer hover:border-blue-600 hover:bg-blue-50 transition">
                <i class="fas fa-cloud-upload-alt text-4xl text-blue-600 mb-3"></i>
                <h3 class="text-lg font-medium mb-2">Seret file ke sini atau klik untuk memilih</h3>
                <p class="text-gray-500 mb-1">Format file yang didukung: .doc, .docx, .pdf, .xls, .xlsx</p>
                <p class="text-gray-500">Maksimal ukuran file: 10MB</p>
                <input type="file" id="fileInput" class="hidden" accept=".doc,.docx,.xls,.xlsx,.pdf">
            </div>
        </div>

        {{-- Recent Documents --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold flex items-center gap-2 border-b pb-2 mb-4">
                <i class="fas fa-history text-blue-600"></i> Dokumen Terbaru
            </h2>

            <ul class="space-y-4">
                {{-- Contoh Dokumen 1 --}}
                <li class="flex items-center justify-between p-4 border rounded hover:shadow-md transition">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 flex items-center justify-center rounded bg-blue-100 text-blue-600">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <div>
                            <div class="font-medium">Evaluasi_Jabatan_2023.pdf</div>
                            <div class="text-sm text-gray-500">Diunggah pada 12 Oktober 2023 - 12.5 MB</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-1 text-xs font-medium rounded bg-green-100 text-green-600">Terverifikasi</span>
                        <span class="px-2 py-1 text-xs font-medium rounded bg-gray-100 text-gray-700">Catatan: Lengkap</span>
                        <i class="material-icons text-blue-600 cursor-pointer" title="Download">download</i>
                        <i class="material-icons text-red-600 cursor-pointer" title="Hapus" onclick="openModal('hapusModal')">delete</i>
                    </div>
                </li>

                {{-- Contoh Dokumen 2 --}}
                <li class="flex items-center justify-between p-4 border rounded hover:shadow-md transition">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 flex items-center justify-center rounded bg-green-100 text-green-600">
                            <i class="fas fa-file-excel"></i>
                        </div>
                        <div>
                            <div class="font-medium">Evaluasi_Jabatan_Q3.xlsx</div>
                            <div class="text-sm text-gray-500">Diunggah pada 5 Oktober 2023 - 8.2 MB</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-1 text-xs font-medium rounded bg-green-100 text-green-600">Terverifikasi</span>
                        <span class="px-2 py-1 text-xs font-medium rounded bg-gray-100 text-gray-700">Catatan: Lengkap</span>
                        <i class="material-icons text-blue-600 cursor-pointer" title="Download">download</i>
                        <i class="material-icons text-red-600 cursor-pointer" title="Hapus" onclick="openModal('hapusModal')">delete</i>
                    </div>
                </li>

                {{-- Contoh Dokumen 3 --}}
                <li class="flex items-center justify-between p-4 border rounded hover:shadow-md transition">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 flex items-center justify-center rounded bg-blue-100 text-blue-600">
                            <i class="fas fa-file-word"></i>
                        </div>
                        <div>
                            <div class="font-medium">Laporan_Evaluasi_Jabatan.docx</div>
                            <div class="text-sm text-gray-500">Diunggah pada 28 September 2023 - 5.7 MB</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-1 text-xs font-medium rounded bg-green-100 text-green-600">Terverifikasi</span>
                        <span class="px-2 py-1 text-xs font-medium rounded bg-gray-100 text-gray-700">Catatan: Lengkap</span>
                        <i class="material-icons text-blue-600 cursor-pointer" title="Download">download</i>
                        <i class="material-icons text-red-600 cursor-pointer" title="Hapus" onclick="openModal('hapusModal')">delete</i>
                    </div>
                </li>

            </ul>
        </div>

    </div>
</div>

{{-- Modal hapus --}}
@include('components.opd.hapus-modal-evajab')

<script>
    // Upload simulation
    const uploadArea = document.getElementById("uploadArea");
    const fileInput = document.getElementById("fileInput");

    uploadArea.addEventListener("click", () => fileInput.click());

    fileInput.addEventListener("change", function () {
        if (this.files.length > 0) {
            alert(`File "${this.files[0].name}" berhasil diunggah (simulasi)`);
        }
    });

    uploadArea.addEventListener("dragover", e => {
        e.preventDefault();
        uploadArea.classList.add("border-blue-600", "bg-blue-50");
    });

    uploadArea.addEventListener("dragleave", e => {
        e.preventDefault();
        uploadArea.classList.remove("border-blue-600", "bg-blue-50");
    });

    uploadArea.addEventListener("drop", e => {
        e.preventDefault();
        uploadArea.classList.remove("border-blue-600", "bg-blue-50");
        if (e.dataTransfer.files.length > 0) {
            alert(`File "${e.dataTransfer.files[0].name}" berhasil diunggah (simulasi)`);
        }
    });

    // ✅ Tambahkan fungsi modal ini
    function openModal(id) {
        const modal = document.getElementById(id);
        if (modal) {
            modal.classList.remove('hidden');
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        if (modal) {
            modal.classList.add('hidden');
        }
    }
</script>
@endsection
