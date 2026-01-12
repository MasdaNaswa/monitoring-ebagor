<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pk_bupati', function (Blueprint $table) {
            $table->id();
            $table->string('sasaran_strategis')->nullable();
            $table->string('indikator_kinerja')->nullable();
            $table->string('target_2025')->nullable();
            $table->string('satuan')->nullable();
            $table->string('target_per_tw')->nullable();
            $table->string('realisasi_per_tw')->nullable();
            $table->text('penjelasan_analisis')->nullable();
            $table->string('program')->nullable();
            $table->string('realisasi_per_tri_wulan')->nullable();
            $table->string('penanggung_jawab')->nullable();
            $table->string('pagu_anggaran')->nullable();
            $table->string('realisasi_anggaran')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pk_bupati');
    }
};
