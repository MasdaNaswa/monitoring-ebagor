@extends('layouts.adminrb')

@section('title', 'Dashboard Admin RB')
@section('page-title', 'Dashboard')

@section('menu-dashboard', 'text-blue-600 font-bold')

@section('content')
<div class="flex flex-col min-h-screen bg-[#F8FAFC]">

    <!-- Header -->
    <header class="bg-white shadow sticky top-0 z-30">
        <div class="flex justify-between items-center py-4 px-6 md:px-8">
            <h1 class="text-xl md:text-2xl font-semibold flex items-center gap-2">
                <i class="fas fa-users text-blue-600"></i>
                <span class="hidden sm:inline">Akun OPD</span>
            </h1>
        </div>
    </header>

    <!-- Tombol Tambah Akun -->
    <div class="px-4 md:px-6 py-4 flex justify-end">
        <button
            class="flex items-center gap-2 bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition focus:outline-none focus:ring-2 focus:ring-green-300 text-sm md:text-base"
            onclick="openModal('addOPDModal')">
            Tambah 
        </button>
    </div>

    <!-- Konten Utama -->
    <main class="flex-1 px-4 md:px-8 py-6">
        <!-- Table Container -->
        <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-200 mt-4">
            <div
                class="px-4 md:px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                <h2 class="text-lg md:text-xl font-semibold text-gray-800">Daftar Akun OPD</h2>
                <div class="relative w-full sm:w-auto">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" placeholder="Cari..."
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 w-full text-sm">
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider border-b border-gray-200">No</th>
                            <th class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider border-b border-gray-200">Nama OPD</th>
                            <th class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider border-b border-gray-200">Email</th>
                            <th class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider border-b border-gray-200">Role</th>
                            <th class="py-3 px-4 text-center font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider border-b border-gray-200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-blue-50 transition-colors">
                            <td class="py-3 px-4 font-medium text-gray-900 text-sm">1</td>
                            <td class="py-3 px-4 text-sm">Dinas Pendidikan</td>
                            <td class="py-3 px-4 text-sm">disdik@mail.com</td>
                            <td class="py-3 px-4 text-sm">OPD</td>
                            <td class="py-3 px-4">
                                <div class="flex justify-center gap-2">
                                    <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg"
                                        onclick="openHapus(1)">
                                        <i class="fas fa-trash text-sm"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50 transition-colors">
                            <td class="py-3 px-4 font-medium text-gray-900 text-sm">2</td>
                            <td class="py-3 px-4 text-sm">Dinas Kesehatan</td>
                            <td class="py-3 px-4 text-sm">diskes@mail.com</td>
                            <td class="py-3 px-4 text-sm">OPD</td>
                            <td class="py-3 px-4">
                                <div class="flex justify-center gap-2">
                                    <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg"
                                        onclick="openHapus(2)">
                                        <i class="fas fa-trash text-sm"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    {{-- Footer --}}
    @include('components.footer')

</div>

{{-- Modals --}}
@include('adminrb.kelola-akun.partials.add-modal')
@include('adminrb.kelola-akun.partials.hapus-modal') 

@endsection

@push('scripts')
<script>
    function openModal(id) {
        const modal = document.getElementById(id);
        if(modal){
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        if(modal){
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    function openDetail(nama, email, role, status) {
        document.getElementById('detailNama').value = nama;
        document.getElementById('detailEmail').value = email;
        document.getElementById('detailRole').value = role;
        document.getElementById('detailStatus').value = status;
        openModal('detailModal'); // ✅ pakai detailModal
    }

    function openHapus(id) {
        document.getElementById('deleteId').value = id;
        openModal('hapusModal'); // ✅ pakai hapusModal
    }
</script>

@endpush
