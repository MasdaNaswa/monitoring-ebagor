@extends('layouts.adminkelembagaan')

@section('title', 'Google Form Kematangan Kelembagaan')
@section('page-title', 'Google Form Kematangan Kelembagaan')
@section('menu-kematangan', 'text-blue-600 font-bold')

@section('content')
<div class="flex flex-col min-h-screen bg-[#F8FAFC]">

    <!-- Header -->
    <header class="bg-white shadow sticky top-0 z-30">
        <div class="flex justify-between items-center py-4 px-6 md:px-8">
            <h1 class="text-xl md:text-2xl font-semibold flex items-center gap-2">
                <i class="material-icons text-green-600">category</i>
                <span class="hidden sm:inline">Google Form Kematangan Kelembagaan</span>
            </h1>
        </div>
    </header>

    <!-- Form Tambah GForm -->
    <div class="px-4 md:px-8 py-4 flex flex-col md:flex-row items-center gap-3">
        <form action="{{ route('adminkelembagaan.kematangan-kelembagaan.store') }}" method="POST" class="flex-1 flex gap-3">
            @csrf
            <input type="url" name="link" placeholder="Masukkan link Google Form"
                class="flex-1 border border-gray-300 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-300 focus:border-green-500 transition duration-200" required>
            <button type="submit" 
                class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-200">
                Tambah
            </button>
        </form>
    </div>

    <!-- Konten Utama -->
    <main class="flex-1 px-4 md:px-8 py-6">
        <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-200 mt-4">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-3 px-4 font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider border-b border-gray-200">No</th>
                            <th class="py-3 px-4 font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider border-b border-gray-200">Link Google Form</th>
                            <th class="py-3 px-4 font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider border-b border-gray-200">Tanggal Ditambahkan</th>
                            <th class="py-3 px-4 text-center font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider border-b border-gray-200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($gforms as $index => $gform)
                        <tr class="hover:bg-blue-50 transition-colors">
                            <td class="py-3 px-4 font-medium text-gray-900 text-sm">{{ $index+1 }}</td>
                            <td class="py-3 px-4 text-sm break-all">
                                <a href="{{ $gform['link'] }}" target="_blank" class="text-blue-600 hover:underline">
                                    {{ $gform['link'] }}
                                </a>
                            </td>
                            <td class="py-3 px-4 text-sm">{{ date('d M Y', strtotime($gform['created_at'])) }}</td>
                            <td class="py-3 px-4 text-center">
                                <button 
                                    type="button" 
                                    class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition duration-150"
                                    onclick="openHapusModal({{ $gform['id'] }})">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center p-6 text-gray-500">Belum ada link Google Form</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- Include Modal Hapus --}}
    @include('components.adminkelembagaan.hapus-modal-gform', ['gforms' => $gforms])

</div>
@endsection

@push('scripts')
<script>
    function openHapusModal(id) {
        const modal = document.getElementById(`hapusGFormModal${id}`);
        const form = modal.querySelector('form');
        form.action = `/admin/kematangan-kelembagaan/${id}`; // route destroy sesuai controller
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeHapusModal(id) {
        const modal = document.getElementById(`hapusGFormModal${id}`);
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
</script>
@endpush
