<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pk_bupati', function (Blueprint $table) {
            $table->string('sasaran_strategis', 100)->nullable()->change();
            $table->string('indikator_kinerja', 100)->nullable()->change();
            $table->string('target_2025', 100)->nullable()->change();
            $table->string('satuan', 100)->nullable()->change();
            $table->string('target_per_tw', 100)->nullable()->change();
            $table->string('realisasi_per_tw', 100)->nullable()->change();
            $table->string('program', 100)->nullable()->change();
            $table->string('realisasi_per_tri_wulan', 100)->nullable()->change();
            $table->string('penanggung_jawab', 100)->nullable()->change();
            $table->string('pagu_anggaran', 100)->nullable()->change();
            $table->string('realisasi_anggaran', 100)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('pk_bupati', function (Blueprint $table) {
            $table->string('sasaran_strategis', 255)->nullable()->change();
            $table->string('indikator_kinerja', 255)->nullable()->change();
            $table->string('target_2025', 255)->nullable()->change();
            $table->string('satuan', 255)->nullable()->change();
            $table->string('target_per_tw', 255)->nullable()->change();
            $table->string('realisasi_per_tw', 255)->nullable()->change();
            $table->string('program', 255)->nullable()->change();
            $table->string('realisasi_per_tri_wulan', 255)->nullable()->change();
            $table->string('penanggung_jawab', 255)->nullable()->change();
            $table->string('pagu_anggaran', 255)->nullable()->change();
            $table->string('realisasi_anggaran', 255)->nullable()->change();
        });
    }
};
