@extends('layouts.app')

@section('title', 'Monitoring Bagor - RB Tematik')

@section('content')
    <div class="flex flex-col min-h-screen">

        <!-- Header -->
        <header class="bg-white shadow sticky top-0 z-30">
            <div class="flex justify-between items-center py-4 px-6 md:px-8">
                <h1 class="text-xl md:text-2xl font-semibold flex items-center gap-2">
                    <i class="fas fa-file-alt text-blue-600"></i>
                    <span class="hidden sm:inline">RB Tematik</span>
                </h1>
                <div class="relative group">
                    <button
                        class="flex items-center gap-2 bg-gray-100 rounded-full px-3 py-1 hover:bg-gray-200 transition-colors">
                        <i class="fas fa-user-circle text-xl md:text-2xl text-blue-600"></i>
                        <span class="text-sm md:text-base">Admin OPD</span>
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-lg rounded-md opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-opacity duration-200 z-50">
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

        <!-- Konten Utama -->
        <main class="flex-1 px-4 md:px-8 py-6 bg-[#F8FAFC]">
            <div class="flex flex-col md:flex-row justify-between items-center px-4 md:px-6 py-4 gap-4 md:gap-0">
                <div class="flex items-center gap-3">
                    <label class="font-semibold text-gray-700 text-sm md:text-base">Tahun:</label>
                    @php
                        $startYear = 2024;
                        $currentYear = now()->year;
                        $selectedYear = request()->get('year', $currentYear);
                        $years = range($startYear, $currentYear);
                    @endphp
                    <form method="GET">
                        <select name="year" id="yearFilter"
                            class="py-2 px-3 rounded border border-gray-300 hover:border-blue-500 transition focus:outline-none focus:ring-2 focus:ring-blue-200 text-sm md:text-base"
                            onchange="this.form.submit()">
                            @foreach($years as $year)
                                <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>


                <div class="flex gap-2">
                    <button
                        class="flex items-center gap-2 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-300 text-sm md:text-base"
                        onclick="openModal('addModal')">
                        <span>Tambah </span>
                    </button>

                </div>
            </div>


            <!-- Table Container -->
            <div class="bg-white shadow rounded-lg mt-6 overflow-hidden border border-gray-200">
                <div
                    class="px-4 md:px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                    <h2 class="text-lg md:text-xl font-semibold text-gray-800">Daftar RB Tematik</h2>
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
                                <th
                                    class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">
                                    No</th>
                                <th
                                    class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">
                                    Permasalahan</th>
                                <th
                                    class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">
                                    Sasaran Tematik</th>
                                <th
                                    class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">
                                    Indikator</th>
                                <th
                                    class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">
                                    Target</th>
                                <th
                                    class="py-3 px-4 text-left font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">
                                    Capaian</th>
                                <th
                                    class="py-3 px-4 text-center font-semibold text-gray-700 text-xs md:text-sm uppercase tracking-wider whitespace-nowrap border-b border-gray-200">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($rbTematik as $index => $item)
                                <tr class="hover:bg-blue-50 transition-colors">
                                    <td class="py-3 px-4 font-medium text-gray-900 text-sm">{{ $index + 1 }}</td>
                                    <td class="py-3 px-4 text-sm max-w-xs">
                                        <div class="truncate" title="{{ $item->permasalahan }}">{{ $item->permasalahan }}</div>
                                    </td>
                                    <td class="py-3 px-4 text-sm max-w-xs">
                                        <div class="truncate" title="{{ $item->sasaran_tematik }}">{{ $item->sasaran_tematik }}
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-sm">{{ $item->indikator }}</td>
                                    <td class="py-3 px-4 text-sm"><span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded">{{ $item->target }}
                                            ({{ $item->satuan }})</span></td>
                                    <td class="py-3 px-4 text-sm"><span class="font-semibold">{{ $item->capaian }}</span></td>
                                    <td class="py-3 px-4">
                                        <div class="flex justify-center gap-1">
                                            <!-- Detail -->
                                            <button class="p-2 text-green-600 hover:bg-green-100 rounded-lg"
                                                onclick="openModal('detailModal')">
                                                <i class="fas fa-eye text-sm"></i>
                                            </button>

                                            <!-- Edit -->
                                            <button class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg"
                                                onclick="openModal('editModal')">
                                                <i class="fas fa-edit text-sm"></i>
                                            </button>

                                            <!-- Hapus -->
                                            <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg"
                                                onclick="openModal('hapusModal')">
                                                <i class="fas fa-trash text-sm"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-4 text-center text-gray-500">Tidak ada data RB Tematik</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>

            <!-- Modals -->
            @include('components.opd.tambah-modal-rb-tematik')
            @include('components.opd.ubah-modal-rb-tematik')
            @include('components.opd.detail-modal-rb-tematik')
        </main>

        <!-- Footer -->
        @include('components.footer')
    </div>

    <script>
    function openModal(id) { 
        document.getElementById(id)?.classList.remove('hidden'); 
        document.body.style.overflow = 'hidden'; 
    }
    function closeModal(id) { 
        document.getElementById(id)?.classList.add('hidden'); 
        document.body.style.overflow = 'auto'; 
    }

    // Hapus alert, biarkan onchange tetap jalan jika mau submit form
    document.getElementById('yearFilter')?.addEventListener('change', function () {
        // Bisa tambahkan logic submit form atau AJAX di sini jika dibutuhkan
        // Misal: this.form.submit();
    });
</script>

@endsection