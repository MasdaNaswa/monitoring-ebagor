<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rb_tematik', function (Blueprint $table) {
            $table->id();
            $table->text('permasalahan')->nullable();
            $table->string('sasaran_tematik')->nullable();
            $table->string('indikator')->nullable();
            $table->string('target')->nullable();
            $table->string('satuan')->nullable();
            $table->text('rencana_aksi')->nullable();
            $table->string('output')->nullable();
            $table->string('target_tahun_2025')->nullable();
            $table->string('anggaran_tahun_2025')->nullable();
            $table->string('renaksi_tw1')->nullable();
            $table->string('renaksi_tw2')->nullable();
            $table->string('renaksi_tw3')->nullable();
            $table->string('renaksi_tw4')->nullable();
            $table->string('rumus')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->string('koordinator')->nullable();
            $table->string('pelaksana')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rb_tematik');
    }
};
