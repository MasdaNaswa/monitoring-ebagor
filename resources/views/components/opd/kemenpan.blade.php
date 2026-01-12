@props(['action', 'cancelUrl', 'user'])

@php
    $survey = [
        "DIMENSI STRUKTUR — 1. Subdimensi Kompleksitas" => [
            "Desain organisasi yang ada saat ini perlu disesuaikan dengan ketentuan peraturan perundang-undangan.",
            "Terdapat indikasi bahwa desain organisasi yang ada bersifat kompleks.",
            "Terdapat indikasi bahwa desain organisasi yang ada bersifat sederhana.",
            "Tingkatan unit organisasi yang ada saat ini perlu disesuaikan tugas dan fungsinya dari tingkatan unit organisasi paling atas sampai paling bawah.",
            "Terdapat indikasi adanya tingkatan unit organisasi yang tugas dan fungsinya bersifat umum.",
            "Terdapat indikasi adanya tingkatan unit organisasi yang tugas dan fungsinya bersifat spesifik.",
            "Penataan perangkat daerah telah ditetapkan sesuai dengan substansi pewadahan dan/atau perumpunan urusan pemerintahan yang menjadi kewenangan daerah.",
            "Jumlah Cabang Dinas/UPTD yang dibentuk menunjukkan indikasi melebihi kebutuhan. (Hanya untuk OPD yang memiliki UPTD)",
            "Cabang Dinas/UPTD yang dibentuk dinilai secara sinergis mendukung tercapainya tujuan pembentukan organisasi. (Hanya untuk OPD yang memiliki UPTD)",
            "Nomenklatur unit organisasi saat ini perlu disesuaikan dengan tugas dan fungsinya.",
            "Jenjang jabatan yang ada sudah sesuai kebutuhan.",
            "Jumlah jabatan pada setiap tingkatan sudah sesuai kebutuhan.",
            "Jabatan-jabatan fungsional sudah memenuhi kebutuhan.",
            "Penempatan jabatan fungsional mendukung efisiensi dan efektivitas unit operasional."
        ],

        "DIMENSI STRUKTUR — 2. Subdimensi Formalisasi" => [
            "Tugas dan fungsi unit organisasi yang ada saat ini perlu dirumuskan secara jelas sesuai dengan strategi organisasi dalam peraturan tentang organisasi dan tata kerja",
            "Mekanisme pelaksanaan tugas dan fungsi serta kewenangan setiap unit kerja dari manajemen tertinggi sampai manajemen menengah ke bawah telah dituangkan secara jelas dalam prosedur formal yang berkekuatan hukum di dalam organisasi.",
            "Mekanisme hubungan antar unit organisasi yang ada saat ini perlu dirumuskan secara jelas sesuai dengan strategi organisasi dalam peraturan tentang organisasi dan tata kerja.",
            "Rencana strategis dituangkan secara jelas di dalam keputusan resmi organisasi.",
            "Kebijakan-kebijakan organisasi selalu dituangkan secara jelas dan tegas di dalam keputusan resmi organisasi.",
            "Seluruh proses kerja telah dituangkan secara sistematis di dalam peraturan tentang standar operasional prosedur.",
            "Standarisasi pelayanan publik telah diformalkan."
        ],

        "DIMENSI STRUKTUR — 3. Subdimensi Sentralisasi" => [
            "Kewenangan pengambilan keputusan yang ada saat ini perlu dirumuskan secara jelas sesuai dengan strategi organisasi.",
            "Setiap tingkatan manajemen dapat mengambil keputusan sesuai dengan kewenangan yang dimiliki.",
            "Terdapat indikasi bahwa tingkatan manajemen yang lebih tinggi mengambil alih keputusan dari kewenangan manajemen yang lebih rendah (di bawahnya).",
            "Terdapat indikasi bahwa tingkatan manajemen yang lebih rendah dapat mengambil keputusan melebihi kewenangannya.",
            "Permasalahan yang bersifat lintas bidang atau sektoral telah dituangkan dalam Keputusan instansi pemerintah guna mencapai kinerja instansi induk.",
            "Permasalahan yang bersifat lintas bidang atau sektoral harus diputuskan oleh manajemen tertinggi dari instansi induk.",
            "Pimpinan utama instansi hanya membuat keputusan-keputusan yang bersifat strategis dan kebijakan.",
            "Pimpinan madya pada tingkat manajemen menengah mempunyai wewenang untuk membuat keputusan-keputusan taktis dan manajerial.",
            "Pimpinan pratama pada unit operasional mempunyai wewenang untuk membuat keputusan-keputusan teknis operasional.",
            "Pendelegasian kewenangan membuat keputusan-keputusan telah diberikan oleh pimpinan instansi kepada pimpinan unit organisasi tingkat menengah.",
            "Pendelegasian wewenang untuk melaksanakan tugas dan fungsi yang bersifat teknis dan operasional telah diberikan kepada pimpinan unit organisasi tingkat menengah ke pimpinan organisasi tingkat bawah."
        ],

        "DIMENSI PROSES — 1. Subdimensi Keselarasan" => [
            "Seluruh sasaran strategis dari atas sampai bawah terkait dengan visi dan misi organisasi.",
            "Setiap proses kerja dalam Proses Bisnis/SOP memiliki keterkaitan dengan sasaran strategis.",
            "Setiap proses kerja memiliki keterkaitan dengan jabatan dalam struktur organisasi.",
            "Proses kerja unit bawah merupakan penjabaran dari proses kerja unit atas (vertikal).",
            "Keterkaitan proses kerja antar unit telah dipetakan dengan baik.",
            "Koordinasi antar unit kerja telah dilakukan dengan baik.",
            "Keterkaitan proses kerja lintas sektor telah dipetakan.",
            "Koordinasi lintas organisasi telah terlaksana dengan baik."
        ],

        "DIMENSI PROSES — 2. Subdimensi Tata Kelola dan Kepatuhan" => [
            "Struktur Organisasi dan Tata Kerja (SOTK) organisasi dari tingkatan manajemen tertinggi sampai tingkatan menengah ke bawah telah sesuai dengan peraturan perundangan.",
            "Seluruh kepentingan strategis pemangku kepentingan organisasi, mulai dari tingkat manajemen tertinggi sampai tingkat manajemen menengah ke bawah telah dipetakan dengan baik.",
            "Setiap proses kerja yang terkait dengan kebutuhan informasi publik dan tidak bersifat rahasia telah dijalankan secara transparan (transparansi).",
            "Setiap tahapan pekerjaan yang terdapat di dalam proses kerja padaa tingkatan manajemen tertinggi sampai manajemen menengah ke bawah telah memiliki kesesuaian dan kejelasan fungsi, struktur, dan penanggung jawab pekerjaan (akuntabilitas).",
            "Setiap proses kerja telah memiliki sistem dan mekanisme pertanggungjawaban (termasuk pelaporan) yang jelas (tanggung jawab).",
            "Tidak terdapat indikasi intervensi yang signifikan di dalam setiap pelaksanaan proses kerja dalam organisasi, baik pada tingkatan manajemen tertinggi sampai dengan manajemen menengah ke bawah.",
            "Aparat pelaksana proses kerja dapat melaksanakan tugas secara mandiri sesuai dengan kewenangan tugas pokok dan fungsinya masing-masing."
        ],

        "DIMENSI PROSES — 3. Subdimensi Perbaikan dan Peningkatan Proses" => [
            "Standar operasional prosedur selalu diperbarui secara periodik.",
            "Standar operasional prosedur sebagian besar (lebih dari 50%) dinilai perlu segera diperbaharui karena sudah tidak relevan dan telah dibuat lebih dari 5 (lima) tahun.",
            "Organisasi selalu melakukan pengembangan terhadap sistem proses kerja.",
            "Terdapat indikasi bahwa organisasi lebih berorientasi pada hal-hal yang bersifat rutinitas dibandingkan dengan hal-hal yang bersifat strategis."
        ],

        "DIMENSI PROSES — 4. Subdimensi Manajemen Risiko" => [
            "Manajemen risiko organisasi telah diperkenalkan di dalam organisasi.",
            "Organisasi telah memiliki kebijakan manajemen risiko yang memadai.",
            "Risiko-risiko utama organisasi telah diidentifikasi dengan baik",
            "Risiko-risiko utama organisasi yang telah diidentifikasi belum diukur (peluang terjadinya maupun dampaknya) dengan metode yang memadai.",
            "Organisasi belum melaksanakan kebijakan manajemen risiko.",
            "Organisasi telah memiliki sistem monitoring risiko yang memadai."
        ],

        "DIMENSI PROSES — 5. Subdimensi Teknologi Informasi" => [
            "Organisasi telah memiliki rancangan arsitektur penerapan Teknologi informasi.",
            "Organisasi telah memiliki kebijakan IT (e-government) yang memadai",
            "Sebagian besar proses kerja telah memanfaatkan teknologi informasi secara memadai.",
            "Sebagian besar proses kerja masih dilaksanakan secara manual.",
            "Seluruh informasi publik terkait dengan keberadaan dan tupoksi organisasi telah dipublikasikan secara periodik di dalam website organisasi."
        ],
    ];

    $fieldNames = [];
    for ($i = 1; $i <= 32; $i++) {
        $fieldNames["struktur_{$i}"] = "struktur_{$i}";
    }
    for ($i = 1; $i <= 30; $i++) {
        $fieldNames["proses_{$i}"] = "proses_{$i}";
    }

    $options = ["Sangat Tidak Setuju", "Tidak Setuju", "Setuju", "Sangat Setuju"];
    
    // Daftar OPD tanpa UPTD (harus sama dengan di controller)
    $opdTanpaUPTD = [
        'Sekretariat Daerah',
        'Sekretariat DPRD',
        'Inspektorat Daerah',
        'Dinas Pendidikan dan Kebudayaan',
        'Rumah Sakit Umum Daerah Muhammad Sani',
        'Rumah Sakit Umum Daerah Tanjung Batu Kundur',
        'Dinas Perumahan Rakyat dan Kawasan Pemukiman',
        'Dinas Sosial',
        'Dinas Kependudukan dan Pencatatan Sipil',
        'Dinas Pemberdayaan Masyarakat dan Desa',
        'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu',
        'Dinas Kepemudaan dan Olahraga',
        'Dinas Pariwisata',
        'Dinas Perpustakaan dan Kearsipan',
        'Dinas Tenaga Kerja dan Perindustrian',
        'Diskominfo',
        'Satuan Polisi Pamong Praja',
        'Badan Perencanaan, Penelitian dan Pengembangan',
        'Badan Pengelola Keuangan dan Aset Daerah',
        'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia',
        'Badan Kesatuan Bangsa dan Politik',
        'Badan Penanggulangan Bencana Daerah dan Pemadam Kebakaran',
        'Kecamatan Karimun',
        'Kecamatan Tebing',
        'Kecamatan Meral',
        'Kecamatan Meral Barat',
        'Kecamatan Buru',
        'Kecamatan Kundur',
        'Kecamatan Kundur Barat',
        'Kecamatan Kundur Utara',
        'Kecamatan Belat',
        'Kecamatan Ungar',
        'Kecamatan Moro',
        'Kecamatan Durai',
        'Kecamatan Selat Gelam',
        'Kecamatan Sugie Besar'
    ];
    
    // Cek apakah OPD ini tanpa UPTD
    $isOPDTanpaUPTD = in_array($user->nama_opd, $opdTanpaUPTD);
    
    // Opsi khusus untuk pertanyaan opsional
    $optionalOptions = array_merge($options, ["Tidak Diisi"]);
@endphp

<div class="max-h-[calc(90vh-4rem)] overflow-y-auto">
    <form action="{{ $action }}" method="POST" class="space-y-0 bg-white">
        @csrf

        <!-- Pesan sukses / error -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Header -->
        <div class="sticky top-0 z-10 bg-gradient-to-r from-blue-700 to-blue-900 p-6 shadow-lg">
            <div class="flex items-start justify-between">
                <div class="pr-4">
                    <h3 class="text-2xl font-bold text-white mb-2">EVALUASI KELEMBAGAAN INSTANSI PEMERINTAH</h3>
                    <p class="text-blue-100 text-sm">
                        <i class="fas fa-balance-scale mr-2"></i>
                        Sesuai Permen PAN RB Nomor 20 Tahun 2018 tentang Pedoman Evaluasi Kelembagaan Instansi Pemerintah
                    </p>
                </div>
            </div>
        </div>

        <!-- Container utama -->
        <div class="p-6 space-y-8">
            <!-- Section Informasi OPD -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100 shadow-sm">
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <i class="fas fa-building text-blue-600 text-lg"></i>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-800">Informasi OPD</h4>
                </div>
                
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                            <i class="fas fa-landmark text-blue-500 text-sm"></i>
                            Nama OPD
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="nama_opd" 
                               value="{{ old('nama_opd', $user->nama_opd) }}" 
                               required 
                               placeholder="Masukkan nama OPD"
                               class="mt-1 block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm"
                               readonly>
                        @error('nama_opd')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        
                        <!-- Debug info -->
                        <input type="hidden" name="is_opd_tanpa_uptd" value="{{ $isOPDTanpaUPTD ? '1' : '0' }}">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                            <i class="fas fa-envelope text-blue-500 text-sm"></i>
                            Email
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="email" 
                               name="email" 
                               value="{{ old('email', $user->email) }}" 
                               required 
                               placeholder="Email"
                               class="mt-1 block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm"
                               readonly>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <!-- Info tambahan -->
                @if($isOPDTanpaUPTD)
                <div class="mt-4 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                    <div class="flex items-center gap-2 text-blue-700">
                        <i class="fas fa-info-circle"></i>
                        <span class="text-sm font-medium">OPD ini tidak memiliki UPTD. Pertanyaan 8 dan 9 bersifat opsional.</span>
                    </div>
                </div>
                @endif
            </div>

            <!-- Separator -->
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-white px-4 text-sm text-blue-500 font-semibold">
                        <i class="fas fa-list-check mr-2"></i>
                        KUESIONER EVALUASI
                    </span>
                </div>
            </div>

            <!-- Container pertanyaan -->
            <div class="space-y-8">
                @php $questionCounter = 1; @endphp

                @foreach($survey as $subdimensi => $questions)
                    @php $displayNumber = 1; @endphp
                    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                        <!-- Header subdimensi -->
                        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="bg-white/20 p-2 rounded-lg">
                                    <i class="fas fa-layer-group text-white text-sm"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">{{ $subdimensi }}</h4>
                            </div>
                        </div>

                        <!-- Body pertanyaan -->
                        <div class="p-6 space-y-6">
                            @foreach($questions as $index => $q)
                                @php
                                    $fieldName = $questionCounter <= 32 ? 'struktur_' . $questionCounter : 'proses_' . ($questionCounter - 32);
                                    $oldValue = old($fieldName);

                                    // Opsional untuk pertanyaan 8 & 9 Subdimensi Kompleksitas
                                    $isOptional = false;
                                    if(($questionCounter == 8 || $questionCounter == 9) && $isOPDTanpaUPTD) {
                                        $isOptional = true;
                                    }
                                    
                                    // Gunakan opsi yang sesuai
                                    $currentOptions = $isOptional ? $optionalOptions : $options;
                                @endphp

                                <div class="space-y-4 p-5 rounded-lg border border-gray-100 hover:bg-gray-50/50 transition-colors duration-200 hover:border-blue-100">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0">
                                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 font-semibold text-sm">
                                                {{ $displayNumber }}
                                            </span>
                                        </div>

                                        <div class="flex-grow min-w-0">
                                            <p class="text-gray-800 font-medium leading-relaxed mb-4">{{ $q }}</p>
                                            
                                            @if($isOptional)
                                            <div class="mb-3 p-2 bg-yellow-50 border border-yellow-200 rounded text-sm text-yellow-700">
                                                <i class="fas fa-exclamation-circle mr-1"></i>
                                                Pertanyaan ini opsional untuk OPD tanpa UPTD
                                            </div>
                                            @endif

                                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                                                @foreach($currentOptions as $opt)
                                                    @php
                                                        $colorClasses = [
                                                            'Sangat Setuju' => 'border-green-200 hover:border-green-300 hover:bg-green-50',
                                                            'Setuju' => 'border-blue-200 hover:border-blue-300 hover:bg-blue-50',
                                                            'Tidak Setuju' => 'border-yellow-200 hover:border-yellow-300 hover:bg-yellow-50',
                                                            'Sangat Tidak Setuju' => 'border-red-200 hover:border-red-300 hover:bg-red-50',
                                                            'Tidak Diisi' => 'border-gray-200 hover:border-gray-300 hover:bg-gray-50'
                                                        ];
                                                        $colorClass = $colorClasses[$opt] ?? 'border-gray-200 hover:border-gray-300 hover:bg-gray-50';
                                                    @endphp

                                                    <label class="flex items-center p-4 rounded-lg border-2 cursor-pointer transition-all duration-200 bg-white {{ $colorClass }} group">
                                                        <input type="radio"
                                                               name="{{ $fieldName }}"
                                                               value="{{ $opt }}"
                                                               @if(!$isOptional) required @endif
                                                               @if($oldValue == $opt || ($isOptional && !$oldValue && $opt == 'Tidak Diisi')) checked @endif
                                                               class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 group-hover:scale-110 transition-transform duration-200">
                                                        <span class="ml-3 text-sm font-medium">{{ $opt }}</span>
                                                    </label>
                                                @endforeach
                                                @error($fieldName)
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php 
                                    $displayNumber++;
                                    $questionCounter++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Progress & tombol -->
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-5 border border-gray-200">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-3">
                        <div class="bg-blue-100 p-2 rounded-lg">
                            <i class="fas fa-chart-line text-blue-600"></i>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-700 block">Progress pengisian survei</span>
                            <span class="text-xs text-gray-500">Pastikan semua bagian telah diisi</span>
                        </div>
                    </div>
                    <span class="text-sm font-semibold text-blue-600 bg-white px-3 py-1 rounded-full border border-blue-200">
                        {{ count($survey) }}/{{ count($survey) }}
                    </span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-gradient-to-r from-green-500 to-green-600 h-2.5 rounded-full" style="width: 100%"></div>
                </div>

                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-6 border-t border-gray-200">
                    <div class="text-sm text-gray-500 flex items-center gap-2">
                        <i class="fas fa-info-circle text-blue-500"></i>
                        <span>Pastikan semua pertanyaan telah diisi sebelum mengirim</span>
                    </div>
                    <div class="flex gap-3">
                       <button type="button"
        @click="$dispatch('close-kemenpan')"
        class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-all duration-200 font-medium shadow-sm flex items-center gap-2 hover:shadow">
    Batal
</button>

                        <button type="submit"
                                class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 font-medium shadow-sm flex items-center gap-2 hover:shadow-lg active:scale-[0.98] transform transition-transform">
                            <i class="fas fa-paper-plane"></i>
                            Kirim Survei
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>