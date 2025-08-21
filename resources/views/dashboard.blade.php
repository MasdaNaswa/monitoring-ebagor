@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  @include('components.header')

  <div class="content-body">
    <!-- Welcome Section - Di sebelah kiri (normal) -->
    <div class="welcome-container">
      <div class="welcome-text">
        <h2>Selamat Datang, Diskominfo Kab. Karimun</h2>
        <p>Anda login sebagai <b>OPD</b> dengan akses ke modul <b>RB General</b> dan <b>RB Tematik</b>.</p>
      </div>
    </div>

    <!-- Statistik - Di tengah -->
    <div class="stats-container">
      <div class="stat-card">
        <i class="material-icons" style="font-size:32px;color:#4361ee;">description</i>
        <div class="stat-value">142</div>
        <div class="stat-label">Total Dokumen</div>
      </div>
      <div class="stat-card green">
        <i class="material-icons" style="font-size:32px;color:#3fbc93;">check_circle</i>
        <div class="stat-value">98</div>
        <div class="stat-label">Selesai</div>
      </div>
      <div class="stat-card orange">
        <i class="material-icons" style="font-size:32px;color:#ffd166;">pending</i>
        <div class="stat-value">32</div>
        <div class="stat-label">Dalam Proses</div>
      </div>
      <div class="stat-card blue">
        <i class="material-icons" style="font-size:32px;color:#3a86ff;">assignment_returned</i>
        <div class="stat-value">12</div>
        <div class="stat-label">Perlu Revisi</div>
      </div>
    </div>
  </div>

  @include('components.footer')
@endsection