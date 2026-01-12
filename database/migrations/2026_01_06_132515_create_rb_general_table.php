<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rb_general', function (Blueprint $table) {
            $table->id();
            $table->string('sasaran_strategi')->nullable();
            $table->string('indikator_capaian')->nullable();
            $table->string('target')->nullable();
            $table->string('satuan')->nullable();
            $table->text('rencana_aksi')->nullable();
            $table->string('output')->nullable();
            $table->string('target_tahun_2025')->nullable();
            $table->string('anggaran_tahun_2025')->nullable();
            $table->string('renaksi_tahun_2025_tw1')->nullable();
            $table->string('renaksi_tahun_2025_tw2')->nullable();
            $table->string('renaksi_tahun_2025_tw3')->nullable();
            $table->string('renaksi_tahun_2025_tw4')->nullable();
            $table->string('realisasi_renaksi_tw1')->nullable();
            $table->string('realisasi_renaksi_tw2')->nullable();
            $table->string('realisasi_renaksi_tw4')->nullable();
            $table->string('rumus')->nullable();
            $table->text('catatan_evaluasi')->nullable();
            $table->text('catatan_perbaikan')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rb_general');
    }
};
