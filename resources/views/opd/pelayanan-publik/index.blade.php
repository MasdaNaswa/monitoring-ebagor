@extends('layouts.app')

@section('title', 'Monitoring Bagor')

@section('content')
<div class="flex min-h-screen">
    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col transition-all duration-300" id="mainContent ">
        <!-- HEADER -->
        <header class="bg-white shadow-sm py-4 px-6 sticky top-0 z-40 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <!-- Sidebar toggle button -->
                <button id="sidebarToggle" class="md:hidden p-2 rounded bg-gray-100 hover:bg-gray-200">
                    <i class="fas fa-bars text-gray-700"></i>
                </button>
                <h1 class="text-xl font-semibold flex items-center gap-2">
                    <i class="fas fa-file-alt text-primary"></i> Unggah Dokumen Pelayanan Publik
                </h1>
            </div>
            <div class="header-actions flex items-center gap-4">
                <div class="profile-dropdown relative">
                    <button
                        class="profile-btn flex items-center gap-2 bg-transparent border-none cursor-pointer text-gray-900 font-medium py-1 px-3 rounded-full transition-all hover:bg-primary-light">
                        <i class="fas fa-user-circle text-primary text-2xl"></i>
                        <span>Admin OPD</span>
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-lg rounded-md opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-opacity duration-200 z-50 profile-dropdown-content">
                        <ul class="py-2 text-gray-700 text-sm">
                            <li>
                                <a href="{{ route('opd.profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">
                                    Profil Saya
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <div class="content-container flex-1 py-6 px-4 md:px-6 bg-[#F8FAFC] ">
            <div class="tabs flex border-b border-gray-200 mb-6">
                <div class="tab py-3 px-5 cursor-pointer border-b-2 border-transparent transition-all font-medium text-gray-600 hover:text-primary"
                    data-tab="template">Download Template</div>
                <div class="tab py-3 px-5 cursor-pointer border-b-2 border-transparent transition-all font-medium text-gray-600 hover:text-primary"
                    data-tab="upload">Unggah Dokumen</div>
            </div>

            <div class="tab-container">
                <!-- Tab Template -->
                <div id="template" class="tab-content">
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-5">
                        <h2 class="text-lg font-medium mb-4 pb-3 border-b border-gray-200 flex items-center gap-2">
                            <i class="fas fa-file-download text-primary"></i> Template Dokumen
                        </h2>
                        <p class="mb-4">Silakan pilih kategori laporan:</p>

                        <!-- Category Tabs -->
                        <div class="category-tabs flex border-b border-gray-200 mb-6">
                            @foreach($kategories as $kategori)
                                <div class="category-tab py-2 px-5 cursor-pointer border-b-2 border-transparent transition-all text-gray-600"
                                    data-category="kategori-{{ $kategori->id_kategori }}">
                                    {{ $kategori->nama_kategori }}
                                </div>
                            @endforeach
                        </div>

                        <!-- Category Content -->
                        <div class="category-contents">
                            @foreach($kategories as $kategori)
                                <div id="kategori-{{ $kategori->id_kategori }}" class="category-content hidden">
                                    @php
                                        $templateKategori = $templates->where('id_kategori', $kategori->id_kategori);
                                    @endphp

                                    <div class="template-list grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                                        @if ($templateKategori->count() > 0)
                                            @foreach ($templateKategori as $template)
                                                <div
                                                    class="template-item flex items-start p-4 border border-gray-200 rounded-lg cursor-pointer hover:border-primary hover:shadow-md">
                                                    <div class="template-icon mr-4 text-primary text-3xl">
                                                        <i class="fas fa-file-word"></i>
                                                    </div>
                                                    <div class="template-info flex-1">
                                                        <div class="template-name font-medium mb-1">
                                                            {{ $template->nama_template }}
                                                        </div>
                                                        <div class="template-desc text-sm text-gray-500 mb-3">
                                                            Template laporan kategori {{ $kategori->nama_kategori }}.
                                                        </div>
                                                        <a href="{{ Storage::url($template->file_path) }}"
                                                            class="btn-primary bg-primary text-white py-2 px-4 rounded text-sm hover:bg-primary-dark"
                                                            download>
                                                            <i class="fas fa-download"></i> Unduh
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-gray-500">Belum ada template yang dibuat untuk kategori ini.</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-lg font-medium mb-4 pb-3 border-b border-gray-200 flex items-center gap-2">
                            <i class="fas fa-info-circle text-primary"></i> Petunjuk Pengisian
                        </h2>
                        <ol class="list-decimal pl-5 space-y-2">
                            <li>Pilih kategori laporan yang sesuai</li>
                            <li>Klik pada template untuk melihat preview</li>
                            <li>Isi laporan sesuai periode menggunakan template</li>
                            <li>Download template</li>
                            <li>Simpan dokumen dengan format: <strong>NAMA_DOKUMEN_NAMA_OPD_TANGGAL</strong></li>
                            <li>Unggah dokumen melalui menu Unggah Dokumen</li>
                        </ol>
                    </div>
                </div>

                <!-- Tab Upload -->
                <div id="upload" class="tab-content hidden">
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-5">
                        <h2 class="text-lg font-medium mb-4 pb-3 border-b border-gray-200 flex items-center gap-2">
                            <i class="fas fa-cloud-upload-alt text-primary"></i> Unggah Dokumen
                        </h2>

                        <div id="uploadArea"
                            class="upload-area border-2 border-dashed border-gray-300 rounded-lg p-8 text-center my-5 cursor-pointer hover:border-primary">
                            <i class="fas fa-cloud-upload-alt text-primary text-4xl mb-4"></i>
                            <h3 class="font-medium mb-2">Seret file ke sini atau klik untuk memilih</h3>
                            <p class="text-gray-500 mb-1">Format: .doc, .docx, .pdf,</p>
                            <p class="text-gray-500">Maksimal 2MB</p>
                        </div>

                        {{-- Recent Documents --}}
                        <div class="bg-white p-6 rounded-lg shadow mt-4">
                            <h2 class="text-lg font-semibold flex items-center gap-2 border-b pb-2 mb-4">
                                <i class="fas fa-history text-blue-600"></i> Dokumen Terbaru
                            </h2>
                            <ul class="space-y-4">
                                @forelse ($laporans as $doc)
                                    <li class="flex items-center justify-between p-4 border rounded hover:shadow-md transition overflow-visible">
                                        <div class="flex items-center gap-4">
                                            {{-- File Icon --}}
                                            <div @class([
                                                'w-10 h-10 flex items-center justify-center rounded',
                                                'bg-red-100 text-red-600' => Str::endsWith($doc->file_path, '.pdf'),
                                                'bg-green-100 text-green-600' => Str::endsWith($doc->file_path, '.xls') || Str::endsWith($doc->file_path, '.xlsx'),
                                                'bg-blue-100 text-blue-600' => !Str::endsWith($doc->file_path, '.pdf')
                                                    && !Str::endsWith($doc->file_path, '.xls')
                                                    && !Str::endsWith($doc->file_path, '.xlsx'),
                                            ])>
                                                <i class="fas fa-file"></i>
                                            </div>

                                            {{-- Document Info --}}
                                            <div class="flex flex-col">
                                                <div class="font-medium">{{ $doc->judul }}</div>
                                                <div class="text-sm text-gray-500 mb-1">
                                                    Diunggah pada {{ $doc->tanggal_upload }} - {{ $doc->kategori }}
                                                </div>

                                                @if($doc->catatan)
                                                    @php
                                                        $maxLength = 30; // Panjang maksimal tampilan singkat
                                                        $fullCatatan = $doc->catatan;
                                                        $shortCatatan = strlen($fullCatatan) > $maxLength
                                                            ? substr($fullCatatan, 0, $maxLength) . '...'
                                                            : $fullCatatan;
                                                    @endphp

                                                    <div class="relative inline-block group text-xs italic text-gray-700 cursor-pointer">
                                                        Catatan Admin: {{ $shortCatatan }}

                                                        @if(strlen($fullCatatan) > $maxLength)
                                                            <div
                                                                class="absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-64 max-w-xs bg-gray-800 text-white text-xs rounded py-1 px-2 opacity-0 group-hover:opacity-100 transition-opacity z-50 whitespace-normal break-words shadow-lg">
                                                                {{ $fullCatatan }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- Action Buttons & Status --}}
                                        <div class="flex items-center gap-2">
                                            @php
                                                $statusText = strtolower($doc->status);
                                                if (str_contains($statusText, 'revisi')) {
                                                    $badgeClass = 'bg-yellow-100 text-yellow-700';
                                                } elseif ($statusText === 'disetujui' || $statusText === 'terverifikasi') {
                                                    $badgeClass = 'bg-green-100 text-green-600';
                                                } elseif ($statusText === 'diproses') {
                                                    $badgeClass = 'bg-red-100 text-red-600';
                                                }
                                            @endphp

                                            <span class="px-2 py-1 text-xs font-medium rounded {{ $badgeClass }}">
                                                {{ $doc->status }}
                                            </span>

                                            <a href="{{ route('laporan.download', $doc->id_laporan) }}">
                                                <i class="material-icons text-blue-600 cursor-pointer">download</i>
                                            </a>

                                            @if($doc->status != 'Terverifikasi')
                                                <form action="{{ route('laporan.hapus', $doc->id_laporan) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        onclick="openDeleteModal('hapusModal', '{{ route('laporan.hapus', $doc->id_laporan) }}')">
                                                        <i class="material-icons text-red-600 cursor-pointer">delete</i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </li>
                                @empty
                                    <p class="text-gray-500">Belum ada dokumen.</p>
                                @endforelse
                            </ul>

                            {{-- Pagination --}}
                            @if ($laporans->total() > $laporans->perPage())
                                <div class="mt-6 flex justify-center">
                                    <nav class="inline-flex items-center space-x-1">
                                        {{-- Previous Page Link --}}
                                        @if ($laporans->onFirstPage())
                                            <span class="px-3 py-2 text-gray-400 bg-gray-200 rounded-l-lg cursor-not-allowed select-none">Prev</span>
                                        @else
                                            <a href="{{ $laporans->previousPageUrl() }}"
                                                class="px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-l-lg hover:bg-blue-50 hover:text-blue-600 transition">
                                                Prev
                                            </a>
                                        @endif

                                        {{-- Pagination Elements --}}
                                        @foreach ($laporans->getUrlRange(1, $laporans->lastPage()) as $page => $url)
                                            @if ($page == $laporans->currentPage())
                                                <span class="px-3 py-2 bg-blue-600 text-white border border-blue-600 rounded transition">{{ $page }}</span>
                                            @elseif($page == 1 || $page == $laporans->lastPage() || ($page >= $laporans->currentPage() - 1 && $page <= $laporans->currentPage() + 1))
                                                <a href="{{ $url }}" class="px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded hover:bg-blue-50 hover:text-blue-600 transition">{{ $page }}</a>
                                            @elseif($page == $laporans->currentPage() - 2 || $page == $laporans->currentPage() + 2)
                                                <span class="px-3 py-2 text-gray-400 select-none">...</span>
                                            @endif
                                        @endforeach

                                        {{-- Next Page Link --}}
                                        @if ($laporans->hasMorePages())
                                            <a href="{{ $laporans->nextPageUrl() }}"
                                                class="px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-r-lg hover:bg-blue-50 hover:text-blue-600 transition">
                                                Next
                                            </a>
                                        @else
                                            <span class="px-3 py-2 text-gray-400 bg-gray-200 rounded-r-lg cursor-not-allowed select-none">Next</span>
                                        @endif
                                    </nav>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.footer')
@include('components.opd.unggah-modal-yanlik')
@include('components.opd.hapus-modal-yanlik')

<!-- SCRIPTS -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // ===== PROFILE DROPDOWN =====
    const profileBtn = document.querySelector('.profile-btn');
    const dropdownContent = document.querySelector('.profile-dropdown-content');
    profileBtn.addEventListener('click', e => { e.stopPropagation(); dropdownContent.classList.toggle('hidden'); });
    document.addEventListener('click', e => { if (!e.target.closest('.profile-dropdown')) dropdownContent.classList.add('hidden'); });

    // ===== TABS =====
    const tabs = document.querySelectorAll('.tab');
    tabs.forEach(tab => tab.addEventListener('click', () => {
        tabs.forEach(t => { t.classList.remove('active', 'border-primary', 'text-primary'); t.classList.add('text-gray-600'); });
        document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));
        tab.classList.add('active', 'border-primary', 'text-primary'); tab.classList.remove('text-gray-600');
        document.getElementById(tab.getAttribute('data-tab')).classList.remove('hidden');
    }));
    if (tabs.length > 0) tabs[0].click();

    // ===== CATEGORY TABS =====
    const categoryTabs = document.querySelectorAll('.category-tab');
    categoryTabs.forEach(tab => tab.addEventListener('click', () => {
        categoryTabs.forEach(t => { t.classList.remove('active', 'border-primary', 'text-primary'); t.classList.add('text-gray-600'); });
        document.querySelectorAll('.category-content').forEach(c => c.classList.add('hidden'));
        tab.classList.add('active', 'border-primary', 'text-primary'); tab.classList.remove('text-gray-600');
        document.getElementById(tab.getAttribute('data-category')).classList.remove('hidden');
    }));
    if (categoryTabs.length > 0) categoryTabs[0].click();

    // FUNCTION MODAL HAPUS
    window.openDeleteModal = function (id, actionUrl = '#') {
        const modal = document.getElementById(id);
        const form = document.getElementById('hapusForm');
        if (form) form.action = actionUrl;
        if (modal) modal.classList.remove('hidden');
    }

    window.closeModal = function (id) {
        const modal = document.getElementById(id);
        if (modal) modal.classList.add('hidden');
    }
    
    // Open/Close Modal Unggah
    window.openUploadModal = function () {
        const modal = document.getElementById('unggahModal');
        if (modal) modal.classList.remove('hidden');
    }
    
    window.closeUploadModal = function () {
        const modal = document.getElementById('unggahModal');
        if (modal) modal.classList.add('hidden');
    }

    // Click upload area → buka modal
    const uploadArea = document.getElementById('uploadArea');
    if (uploadArea) uploadArea.addEventListener('click', () => { window.openUploadModal(); });
});
</script>
@endsection