<!-- resources/views/components/adminkelembagaan/detail-modal-survei-kemendagri.blade.php -->
<div x-data="{ open: false, evaluasi: @json($evaluasi), jawaban: @json($jawaban), detailPerhitungan: @json($detailPerhitungan), totalMentah: {{ $totalMentah }}, skorNormalized: {{ $skorNormalized }} }" 
     x-show="open" 
     id="detailModalKemendagri" 
     class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-[9999]">
    
    <div class="bg-white rounded-lg shadow-lg w-full max-w-6xl mx-4 overflow-y-auto max-h-[90vh] scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-100">
        <!-- Header -->
        <div class="sticky top-0 bg-white z-10 border-b px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                <i class="fas fa-clipboard-list text-yellow-600"></i>
                Detail Survei Kemendagri
            </h2>
            <button @click="open = false; $dispatch('close-modal')" 
                    class="text-gray-400 hover:text-gray-600 transition p-2 rounded-full hover:bg-gray-100">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="px-6 py-4 space-y-6">
            @if($evaluasi)
                <!-- Informasi Umum -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                    <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                        <p class="text-sm text-blue-600 font-medium mb-1">
                            <i class="fas fa-building mr-2"></i>Nama OPD
                        </p>
                        <p class="text-gray-900 font-bold text-lg">{{ $evaluasi->nama_opd }}</p>
                    </div>
                    
                    <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                        <p class="text-sm text-green-600 font-medium mb-1">
                            <i class="fas fa-calendar-alt mr-2"></i>Tanggal Pengisian
                        </p>
                        <p class="text-gray-900 font-bold text-lg">{{ date('d M Y H:i', strtotime($evaluasi->created_at)) }}</p>
                    </div>
                    
                    <div class="bg-purple-50 p-4 rounded-lg border border-purple-100">
                        <p class="text-sm text-purple-600 font-medium mb-1">
                            <i class="fas fa-envelope mr-2"></i>Email
                        </p>
                        <p class="text-gray-900 font-bold text-lg">{{ $evaluasi->email }}</p>
                    </div>
                </div>

                <!-- Statistik Skor -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-100">
                        <p class="text-sm text-yellow-600 font-medium mb-1">
                            <i class="fas fa-calculator mr-2"></i>Skor Mentah (1-55)
                        </p>
                        <p class="text-gray-900 font-bold text-2xl">{{ $totalMentah }}/55</p>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 mt-2">
                            <div class="bg-yellow-500 h-2.5 rounded-full" 
                                 :style="'width: ' + ({{ $totalMentah }}/55)*100 + '%'"></div>
                        </div>
                    </div>
                    
                    <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-100">
                        <p class="text-sm text-indigo-600 font-medium mb-1">
                            <i class="fas fa-chart-line mr-2"></i>Skor Normalisasi (0-100)
                        </p>
                        <p class="text-gray-900 font-bold text-2xl">{{ number_format($skorNormalized, 2) }}</p>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 mt-2">
                            <div class="bg-indigo-500 h-2.5 rounded-full" 
                                 :style="'width: ' + {{ $skorNormalized }} + '%'"></div>
                        </div>
                    </div>
                    
                    <div class="bg-orange-50 p-4 rounded-lg border border-orange-100">
                        <p class="text-sm text-orange-600 font-medium mb-1">
                            <i class="fas fa-trophy mr-2"></i>Tingkat Maturitas
                        </p>
                        @php
                            $peringkat = $evaluasi->tingkat_maturitas;
                            $warna = match($peringkat) {
                                'P-5' => 'bg-green-100 text-green-800 border-green-200',
                                'P-4' => 'bg-blue-100 text-blue-800 border-blue-200',
                                'P-3' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                'P-2' => 'bg-orange-100 text-orange-800 border-orange-200',
                                'P-1' => 'bg-red-100 text-red-800 border-red-200',
                                default => 'bg-gray-100 text-gray-800 border-gray-200'
                            };
                        @endphp
                        <div class="{{ $warna }} px-3 py-1 rounded-full inline-block mt-1">
                            <p class="font-bold text-lg">{{ $peringkat }}</p>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi Peringkat -->
                @php
                    $deskripsi = $evaluasi->getDeskripsiPeringkat();
                @endphp
                <div class="bg-gradient-to-r from-gray-50 to-blue-50 p-5 rounded-xl border border-blue-200 mb-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                        <i class="fas fa-info-circle text-blue-600"></i>
                        {{ $deskripsi['label'] }}
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div class="bg-white p-3 rounded-lg border">
                            <p class="text-sm text-gray-600 mb-1">Range Skor</p>
                            <p class="font-bold text-gray-800">{{ $deskripsi['skor_range'] }}</p>
                        </div>
                        <div class="bg-white p-3 rounded-lg border">
                            <p class="text-sm text-gray-600 mb-1">Kondisi Organisasi</p>
                            <p class="font-bold text-gray-800">{{ $deskripsi['kondisi'] }}</p>
                        </div>
                        <div class="bg-white p-3 rounded-lg border">
                            <p class="text-sm text-gray-600 mb-1">Kemampuan</p>
                            <p class="font-bold text-gray-800">{{ $deskripsi['kemampuan'] }}</p>
                        </div>
                    </div>
                    <p class="text-gray-700 bg-white p-3 rounded-lg border">
                        {{ $deskripsi['keterangan'] }}
                    </p>
                    @if($deskripsi['kekurangan'] != '-')
                        <div class="mt-3 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <p class="text-sm text-yellow-800 font-medium">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                Kekurangan: {{ $deskripsi['kekurangan'] }}
                            </p>
                        </div>
                    @endif
                </div>

                <!-- Detail Perhitungan -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                        <i class="fas fa-calculator text-green-600"></i>
                        Detail Perhitungan Variabel
                    </h3>
                    <div class="overflow-x-auto border border-gray-200 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Variabel</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Tingkat</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Skor Mentah</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Bobot</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($detailPerhitungan as $variabel => $data)
                                    @php
                                        $skor = $data['skor_mentah'] ?? 0;
                                        $tingkat = $data['tingkat'] ?? 'Tingkat I';
                                        $warna = match($tingkat) {
                                            'Tingkat V' => 'bg-green-100 text-green-800',
                                            'Tingkat IV' => 'bg-blue-100 text-blue-800',
                                            'Tingkat III' => 'bg-yellow-100 text-yellow-800',
                                            'Tingkat II' => 'bg-orange-100 text-orange-800',
                                            'Tingkat I' => 'bg-red-100 text-red-800',
                                            default => 'bg-gray-100 text-gray-800'
                                        };
                                    @endphp
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 whitespace-nowrap font-medium text-gray-900">
                                            {{ $variabel }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <span class="px-3 py-1 text-xs font-medium rounded-full {{ $warna }}">
                                                {{ $tingkat }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-gray-700 font-bold">
                                            {{ $skor }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-gray-700">
                                            5
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- Total -->
                                <tr class="bg-gray-50 font-bold">
                                    <td class="px-4 py-3 whitespace-nowrap text-gray-900">TOTAL</td>
                                    <td class="px-4 py-3 whitespace-nowrap">-</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-gray-900">{{ $totalMentah }}/55</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-gray-900">55</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">
                        * Skor maksimal per variabel: 5 (Tingkat V), minimal: 1 (Tingkat I)
                    </p>
                </div>

                <!-- Jawaban dan File -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                        <i class="fas fa-file-alt text-purple-600"></i>
                        Jawaban dan Dokumen Pendukung
                    </h3>
                    
                    <div class="space-y-4">
                        @foreach($jawaban as $variabel => $data)
                            <div class="border border-gray-200 rounded-lg overflow-hidden">
                                <div class="bg-gray-50 px-4 py-3 border-b border-gray-200">
                                    <h4 class="font-bold text-gray-800 flex items-center gap-2">
                                        <i class="fas fa-folder text-blue-500"></i>
                                        {{ $variabel }}
                                    </h4>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Tingkat: 
                                        <span class="font-bold {{ match($data['tingkat']) {
                                            'Tingkat V' => 'text-green-600',
                                            'Tingkat IV' => 'text-blue-600',
                                            'Tingkat III' => 'text-yellow-600',
                                            'Tingkat II' => 'text-orange-600',
                                            'Tingkat I' => 'text-red-600',
                                            default => 'text-gray-600'
                                        } }}">
                                            {{ $data['tingkat'] }}
                                        </span>
                                    </p>
                                </div>
                                
                                <div class="p-4">
                                    @if(!empty($data['files']))
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                            @foreach($data['files'] as $file)
                                                <div class="border border-gray-200 rounded-lg p-3 hover:bg-gray-50 transition">
                                                    <div class="flex items-start gap-3">
                                                        @php
                                                            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                                                            $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                                                            $isPDF = strtolower($extension) === 'pdf';
                                                        @endphp
                                                        
                                                        @if($isImage)
                                                            <div class="bg-blue-100 p-3 rounded-lg">
                                                                <i class="fas fa-image text-blue-600 text-xl"></i>
                                                            </div>
                                                        @elseif($isPDF)
                                                            <div class="bg-red-100 p-3 rounded-lg">
                                                                <i class="fas fa-file-pdf text-red-600 text-xl"></i>
                                                            </div>
                                                        @else
                                                            <div class="bg-gray-100 p-3 rounded-lg">
                                                                <i class="fas fa-file text-gray-600 text-xl"></i>
                                                            </div>
                                                        @endif
                                                        
                                                        <div class="flex-1 min-w-0">
                                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                                {{ $file['name'] }}
                                                            </p>
                                                            <p class="text-xs text-gray-500">
                                                                {{ strtoupper($extension) }}
                                                            </p>
                                                            <div class="flex gap-2 mt-2">
                                                                <a href="{{ $file['url'] }}" 
                                                                   target="_blank"
                                                                   class="text-xs px-3 py-1 bg-blue-100 text-blue-700 hover:bg-blue-200 rounded transition inline-flex items-center gap-1">
                                                                    <i class="fas fa-eye"></i> Lihat
                                                                </a>
                                                                <a href="{{ $file['url'] }}" 
                                                                   download
                                                                   class="text-xs px-3 py-1 bg-green-100 text-green-700 hover:bg-green-200 rounded transition inline-flex items-center gap-1">
                                                                    <i class="fas fa-download"></i> Unduh
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="text-center py-4">
                                            <i class="fas fa-folder-open text-gray-300 text-4xl mb-2"></i>
                                            <p class="text-gray-500">Tidak ada dokumen pendukung</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Status dan Catatan -->
                <div class="border-t pt-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Status Evaluasi</h4>
                            @php
                                $statusColor = match($evaluasi->status) {
                                    'Disetujui' => 'bg-green-100 text-green-800 border-green-200',
                                    'Diproses' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                    'Revisi' => 'bg-red-100 text-red-800 border-red-200',
                                    default => 'bg-gray-100 text-gray-800 border-gray-200'
                                };
                            @endphp
                            <span class="px-3 py-1 rounded-full text-sm font-medium {{ $statusColor }}">
                                {{ $evaluasi->status }}
                            </span>
                        </div>
                        
                        @if($evaluasi->catatan)
                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-2">Catatan Admin</h4>
                                <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                                    <p class="text-gray-700">{{ $evaluasi->catatan }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            @else
                <div class="text-center py-12">
                    <i class="fas fa-exclamation-circle text-gray-300 text-5xl mb-4"></i>
                    <p class="text-gray-500 text-lg">Data detail belum tersedia.</p>
                </div>
            @endif
        </div>

        <!-- Footer -->
        <div class="sticky bottom-0 bg-white border-t px-6 py-4 flex justify-end gap-3">
            <button @click="open = false; $dispatch('close-modal')" 
                    class="px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-lg transition duration-200 flex items-center gap-2">
                <i class="fas fa-times"></i> Tutup
            </button>
        </div>
    </div>
</div>

<script>
    // Event listener untuk buka modal dari tombol
    document.addEventListener('open-modal-kemendagri', event => {
        const modal = document.getElementById('detailModalKemendagri');
        if(modal){
            modal.classList.remove('hidden');
            modal.__x.$data.open = true;
            document.body.classList.add('overflow-hidden');
        }
    });

    // Event listener untuk tutup modal
    document.addEventListener('close-modal', () => {
        const modal = document.getElementById('detailModalKemendagri');
        if(modal){
            modal.classList.add('hidden');
            modal.__x.$data.open = false;
            document.body.classList.remove('overflow-hidden');
        }
    });
</script>