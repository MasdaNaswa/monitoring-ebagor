@extends('layouts.adminpelayananpublik')

@section('title', 'Dashboard Admin Pelayanan Publik')
@section('page-title', 'Dashboard')

@section('menu-dashboard', 'text-blue-600 font-bold')

@section('content')

  <div class="flex flex-col min-h-screen">

    <!-- Konten utama -->
    <div class="flex-1">

      <header class="bg-white shadow sticky top-0 z-30">
        <div class="flex justify-between items-center py-4 px-6 md:px-8">
          <h1 class="text-xl md:text-2xl font-semibold flex items-center gap-2">
            <i class="fas fa-file-alt text-blue-600"></i>
            <span class="hidden sm:inline">Dashboard</span>
          </h1>
        </div>
      </header>

      <!-- Welcome Section -->
      <div class="welcome-container mb-8 px-6 md:px-8">
        <div class="welcome-text">
          <h2 class="text-2xl font-semibold text-gray-800">Selamat Datang, Admin Pelayanan Publik</h2>
          <p class="text-gray-500 mt-1">Pantau dan kelola reformasi birokrasi dengan mudah</p>
        </div>
      </div>

      <!-- Statistik Cards -->
      <div class="stats-container grid grid-cols-1 md:grid-cols-2 gap-6 px-6 md:px-8 mb-8">

        <!-- Card 1: Jumlah Dokumen -->
        <div
          class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500 hover:shadow-lg transition-all duration-200 relative group">
          <div class="flex items-center justify-between mb-3">
            <h3 class="text-gray-700 font-semibold flex items-center gap-2">
              Jumlah Dokumen
              <i class="fas fa-info-circle text-blue-500 cursor-pointer"></i>
            </h3>
            <i class="fas fa-file-alt text-blue-500 text-2xl"></i>
          </div>
          <div class="text-4xl font-bold text-gray-800">{{ $totalDokumen ?? 0 }}</div>
          <p class="text-gray-500 text-sm mt-1">Total dokumen yang dikelola</p>

          <!-- Tooltip Status Dokumen -->
          <div
            class="absolute right-0 top-10 translate-y-1 bg-slate-800 text-white text-xs rounded-lg shadow-lg px-4 py-3 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 invisible group-hover:visible transition-all duration-300 ease-out z-50 w-60">
            <div class="absolute -top-2 right-6 w-3 h-3 bg-slate-800 rotate-45"></div>
            <p class="font-semibold mb-2 text-slate-100 border-b border-slate-600 pb-1">Status Dokumen:</p>
            <ul class="space-y-1.5 text-[13px]">
              <li class="flex justify-between"><span>Proses</span>
                <span class="text-blue-400">{{ $dokumenProses ?? 0 }}</span>
              </li>
              <li class="flex justify-between"><span>Direvisi</span>
                <span class="text-yellow-400">{{ $dokumenDirevisi ?? 0 }}</span>
              </li>
              <li class="flex justify-between"><span>Disetujui</span>
                <span class="text-green-400">{{ $dokumenDisetujui ?? 0 }}</span>
              </li>
            </ul>
          </div>
        </div>

        <!-- Card 2: Jumlah Akun Terdaftar -->
        <div
          class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500 hover:shadow-lg transition-all duration-200">
          <div class="flex items-center justify-between mb-3">
            <h3 class="text-gray-700 font-semibold">Jumlah Akun Terdaftar</h3>
            <i class="fas fa-users text-green-500 text-2xl"></i>
          </div>
          <div class="text-4xl font-bold text-gray-800">{{ $totalAkun ?? 0 }}</div>
          <p class="text-gray-500 text-sm mt-1">Total akun OPD yang terdaftar</p>
        </div>

      </div>
    </div>

    <!-- Footer -->
    @include('components.footer')

  </div>
@endsection