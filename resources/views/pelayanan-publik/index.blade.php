@extends('layouts.app')

@section('title', 'Monitoring Bagor - RB Tematik')

@section('content')
<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    @include('components.sidebar') <!-- pastikan id="sidebar" di sidebar -->

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col transition-all duration-300" id="mainContent">

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
                    <button class="profile-btn flex items-center gap-2 bg-transparent border-none cursor-pointer text-gray-900 font-medium py-1 px-3 rounded-full transition-all hover:bg-primary-light">
                        <i class="fas fa-user-circle text-primary text-2xl"></i>
                        <span>Admin OPD</span>
                    </button>
                    <div class="profile-dropdown-content absolute right-0 bg-white shadow-lg rounded-md py-2 min-w-[200px] hidden z-50">
                        <a href="../Admin/profil.html" class="profile-dropdown-item flex items-center gap-3 px-4 py-2 text-gray-700 no-underline transition-all hover:bg-primary-light hover:text-primary">
                            <i class="fas fa-user text-gray-500"></i> Profil Saya
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <div class="content-container flex-1 py-6 px-4 md:px-6">

            <div class="tabs flex border-b border-gray-200 mb-6">
                <div class="tab py-3 px-5 cursor-pointer border-b-2 border-transparent transition-all font-medium text-gray-600 hover:text-primary" data-tab="template">Download Template</div>
                <div class="tab py-3 px-5 cursor-pointer border-b-2 border-transparent transition-all font-medium text-gray-600 hover:text-primary" data-tab="upload">Unggah Dokumen</div>
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
                            <div class="category-tab py-2 px-5 cursor-pointer border-b-2 border-transparent transition-all text-gray-600" data-category="skm">Laporan SKM</div>
                            <div class="category-tab py-2 px-5 cursor-pointer border-b-2 border-transparent transition-all text-gray-600" data-category="fkp">Laporan FKP</div>
                        </div>

                        <!-- Category Content -->
                        <div class="category-contents">
                            <!-- SKM -->
                            <div id="skm" class="category-content">
                                <div class="template-list grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                                    <div class="template-item flex items-start p-4 border border-gray-200 rounded-lg cursor-pointer hover:border-primary hover:shadow-md" onclick="showPreview('Laporan SKM', '/templates/skm.docx', 'SKM')">
                                        <div class="template-icon mr-4 text-primary text-3xl"><i class="fas fa-file-word"></i></div>
                                        <div class="template-info flex-1">
                                            <div class="template-name font-medium mb-1">Laporan SKM</div>
                                            <div class="template-desc text-sm text-gray-500 mb-3">
                                                Format laporan Survei Kepuasan Masyarakat (Triwulan/Semester/Tahunan)
                                            </div>
                                            <div class="template-periods flex flex-wrap gap-2">
                                                <a href="/templates/skm-triwulan.docx" class="btn-outline inline-flex items-center gap-1 bg-white border border-primary text-primary py-1 px-3 rounded text-sm hover:bg-primary-light" download>Triwulan</a>
                                                <a href="/templates/skm-semester.docx" class="btn-outline inline-flex items-center gap-1 bg-white border border-primary text-primary py-1 px-3 rounded text-sm hover:bg-primary-light" download>Semester</a>
                                                <a href="/templates/skm-tahunan.docx" class="btn-outline inline-flex items-center gap-1 bg-white border border-primary text-primary py-1 px-3 rounded text-sm hover:bg-primary-light" download>Tahunan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- FKP -->
                            <div id="fkp" class="category-content hidden">
                                <div class="template-list grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                                    <div class="template-item flex items-start p-4 border border-gray-200 rounded-lg cursor-pointer hover:border-primary hover:shadow-md" onclick="showPreview('Berita Acara FKP', '/templates/fkp-berita-acara.docx', 'FKP')">
                                        <div class="template-icon mr-4 text-primary text-3xl"><i class="fas fa-file-word"></i></div>
                                        <div class="template-info flex-1">
                                            <div class="template-name font-medium mb-1">Berita Acara FKP</div>
                                            <div class="template-desc text-sm text-gray-500 mb-3">Format berita acara Forum Konsultasi Publik</div>
                                            <a href="/templates/fkp-berita-acara.docx" class="btn-primary bg-primary text-white py-2 px-4 rounded text-sm hover:bg-primary-dark" download>
                                                <i class="fas fa-download"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-lg font-medium mb-4 pb-3 border-b border-gray-200 flex items-center gap-2">
                            <i class="fas fa-info-circle text-primary"></i> Petunjuk Pengisian
                        </h2>
                        <ol class="list-decimal pl-5 space-y-2">
                            <li>Pilih kategori laporan yang sesuai (SKM atau FKP)</li>
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
                        <div class="upload-area border-2 border-dashed border-gray-300 rounded-lg p-8 text-center my-5 cursor-pointer hover:border-primary" id="uploadArea">
                            <i class="fas fa-cloud-upload-alt text-primary text-4xl mb-4"></i>
                            <h3 class="font-medium mb-2">Seret file ke sini atau klik untuk memilih</h3>
                            <p class="text-gray-500 mb-1">Format: .doc, .docx, .pdf</p>
                            <p class="text-gray-500">Maksimal 10MB</p>
                            <input type="file" id="fileInput" class="hidden" accept=".doc,.docx,.xls,.xlsx,.pdf"/>
                        </div>

                        <div class="file-list mt-5 space-y-3" id="fileList"></div>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-lg font-medium mb-4 pb-3 border-b border-gray-200 flex items-center gap-2">
                            <i class="fas fa-exclamation-triangle text-primary"></i> Ketentuan Unggah Dokumen
                        </h2>
                        <ul class="list-disc pl-5 space-y-2">
                            <li>Pastikan dokumen telah diisi sesuai template</li>
                            <li>Nama file harus sesuai format: <strong>NAMA_DOKUMEN_NAMA_OPD_TANGGAL</strong></li>
                            <li>Dokumen akan diverifikasi oleh admin 1-3 hari kerja</li>
                            <li>Status dokumen dapat dilihat di halaman ini</li>
                            <li>Dokumen yang sudah terverifikasi tidak dapat dihapus</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- PREVIEW MODAL -->
<div class="template-preview fixed inset-0 bg-black bg-opacity-80 z-50 flex items-center justify-center hidden" id="templatePreview">
    <div class="preview-container bg-white rounded-lg w-11/12 max-w-4xl max-h-[90vh] p-5 flex flex-col">
        <div class="preview-header flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium" id="previewTitle">Preview Dokumen</h3>
            <span class="close-preview text-2xl text-gray-500 cursor-pointer" onclick="closePreview()">&times;</span>
        </div>
        <div class="preview-content flex-1 overflow-auto border border-gray-200 p-4 mb-4">
            <iframe id="previewIframe" class="w-full h-96 md:h-[70vh] border-none"></iframe>
        </div>
        <div class="preview-actions flex justify-end gap-3">
            <button class="btn-outline bg-white border border-primary text-primary py-2 px-4 rounded hover:bg-primary-light" onclick="closePreview()">
                <i class="fas fa-times mr-1"></i> Tutup
            </button>
            <a id="downloadBtn" class="btn-primary bg-primary text-white py-2 px-4 rounded flex items-center hover:bg-primary-dark" download>
                <i class="fas fa-download mr-1"></i> Unduh Dokumen
            </a>
        </div>
    </div>
</div>

@include('components.footer')

<!-- SCRIPTS -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ===== PROFILE DROPDOWN =====
    const profileBtn = document.querySelector('.profile-btn');
    const dropdownContent = document.querySelector('.profile-dropdown-content');
    profileBtn.addEventListener('click', e => { e.stopPropagation(); dropdownContent.classList.toggle('hidden'); });
    document.addEventListener('click', e => { if (!e.target.closest('.profile-dropdown')) dropdownContent.classList.add('hidden'); });

    // ===== TABS =====
    const tabs = document.querySelectorAll('.tab');
    tabs.forEach(tab => tab.addEventListener('click', () => {
        tabs.forEach(t => { t.classList.remove('active','border-primary','text-primary'); t.classList.add('text-gray-600'); });
        document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));
        tab.classList.add('active','border-primary','text-primary'); tab.classList.remove('text-gray-600');
        document.getElementById(tab.getAttribute('data-tab')).classList.remove('hidden');
    }));
    if(tabs.length>0) tabs[0].click();

    // ===== CATEGORY TABS =====
    const categoryTabs = document.querySelectorAll('.category-tab');
    categoryTabs.forEach(tab => tab.addEventListener('click', () => {
        categoryTabs.forEach(t => { t.classList.remove('active','border-primary','text-primary'); t.classList.add('text-gray-600'); });
        document.querySelectorAll('.category-content').forEach(c => c.classList.add('hidden'));
        tab.classList.add('active','border-primary','text-primary'); tab.classList.remove('text-gray-600');
        document.getElementById(tab.getAttribute('data-category')).classList.remove('hidden');
    }));
    if(categoryTabs.length>0) categoryTabs[0].click();

    // ===== FILE UPLOAD =====
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('fileInput');
    const fileList = document.getElementById('fileList');
    uploadArea.addEventListener('click', () => fileInput.click());
    fileInput.addEventListener('change', function(){ if(this.files.length>0)addFileToList(this.files[0]); });
    uploadArea.addEventListener('dragover', e=>{ e.preventDefault(); uploadArea.classList.add('border-primary','bg-primary-light'); });
    uploadArea.addEventListener('dragleave', ()=>{ uploadArea.classList.remove('border-primary','bg-primary-light'); });
    uploadArea.addEventListener('drop', e=>{ e.preventDefault(); uploadArea.classList.remove('border-primary','bg-primary-light'); if(e.dataTransfer.files.length>0) addFileToList(e.dataTransfer.files[0]); });

    function addFileToList(file){
        const fileItem = document.createElement('div');
        fileItem.className='file-item flex items-center p-3 border border-gray-200 rounded';
        let ext=file.name.split('.').pop().toLowerCase(), icon='fa-file';
        if(['doc','docx'].includes(ext)) icon='fa-file-word';
        else if(['xls','xlsx'].includes(ext)) icon='fa-file-excel';
        else if(ext==='pdf') icon='fa-file-pdf';
        fileItem.innerHTML=`<i class="fas ${icon} text-gray-500 mr-3"></i>
            <div class="file-name flex-1 text-sm">${file.name}</div>
            <div class="file-actions flex items-center gap-2">
                <span class="badge-warning bg-yellow-100 text-yellow-800 py-1 px-2 rounded text-xs font-medium">Menunggu Verifikasi</span>
                <button class="btn-outline bg-white border border-primary text-primary p-1 rounded text-sm hover:bg-primary-light"><i class="fas fa-trash text-xs"></i></button>
            </div>`;
        fileItem.querySelector('button').addEventListener('click',()=>fileItem.remove());
        fileList.prepend(fileItem);
        alert(`File "${file.name}" berhasil diunggah (simulasi)`);
    }

    // ===== PREVIEW =====
    window.showPreview=function(name,url,cat){
        const preview=document.getElementById('templatePreview'), iframe=document.getElementById('previewIframe'), btn=document.getElementById('downloadBtn'), title=document.getElementById('previewTitle');
        title.textContent=`Preview ${name}`;
        const ext=url.split('.').pop().toLowerCase();
        iframe.src=(ext==='pdf')?url:`https://docs.google.com/gview?url=${encodeURIComponent(url)}&embedded=true`;
        if(cat==='SKM'){
            btn.innerHTML='<i class="fas fa-download mr-1"></i> Pilih Periode SKM';
            btn.href='#'; btn.onclick=function(){ showSkmOptions(); return false; };
        } else { btn.href=url; btn.setAttribute('download',url.split('/').pop()); btn.innerHTML='<i class="fas fa-download mr-1"></i> Unduh Dokumen'; btn.onclick=null; }
        preview.classList.remove('hidden');
    };
    window.closePreview=function(){ document.getElementById('templatePreview').classList.add('hidden'); document.getElementById('previewIframe').src=''; };

    function showSkmOptions(){
        const modal=document.createElement('div'); modal.innerHTML=`<div class="skm-options-modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded-lg text-center">
                <h3 class="text-lg font-medium mb-4">Pilih Periode Laporan SKM</h3>
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="/templates/skm-triwulan.docx" class="skm-option bg-primary text-white py-2 px-4 rounded" download>Triwulan</a>
                    <a href="/templates/skm-semester.docx" class="skm-option bg-primary text-white py-2 px-4 rounded" download>Semester</a>
                    <a href="/templates/skm-tahunan.docx" class="skm-option bg-primary text-white py-2 px-4 rounded" download>Tahunan</a>
                </div>
            </div>
        </div>`;
        document.body.appendChild(modal);
        modal.querySelector('.skm-options-modal').addEventListener('click', e => { if(e.target===modal.querySelector('.skm-options-modal')) document.body.removeChild(modal); });
    }

    // ===== SIDEBAR TOGGLE =====
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    const toggleBtn = document.getElementById('sidebarToggle');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('translate-x-[-100%]');
        if (sidebar.classList.contains('translate-x-[-100%]')) {
            mainContent.style.marginLeft = '0';
        } else {
            mainContent.style.marginLeft = '16rem'; // w-64 = 16rem
        }
    });

    // Reset sidebar saat resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            sidebar.classList.remove('translate-x-[-100%]');
            mainContent.style.marginLeft = '16rem';
        }
    });
});
</script>
@endsection
