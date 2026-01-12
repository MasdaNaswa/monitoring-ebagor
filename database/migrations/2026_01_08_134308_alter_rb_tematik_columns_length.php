<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rb_tematik', function (Blueprint $table) {
            $columns = [
                'sasaran_tematik',
                'indikator',
                'target',
                'satuan',
                'output',
                'target_tahun_2025',
                'anggaran_tahun_2025',
                'renaksi_tw1',
                'renaksi_tw2',
                'renaksi_tw3',
                'renaksi_tw4',
                'rumus',
                'unit_kerja',
                'koordinator',
                'pelaksana',
            ];

            foreach ($columns as $column) {
                $table->string($column, 100)->nullable()->change();
            }
        });
    }

    public function down(): void
    {
        Schema::table('rb_tematik', function (Blueprint $table) {
            $columns = [
                'sasaran_tematik',
                'indikator',
                'target',
                'satuan',
                'output',
                'target_tahun_2025',
                'anggaran_tahun_2025',
                'renaksi_tw1',
                'renaksi_tw2',
                'renaksi_tw3',
                'renaksi_tw4',
                'rumus',
                'unit_kerja',
                'koordinator',
                'pelaksana',
            ];

            foreach ($columns as $column) {
                $table->string($column, 255)->nullable()->change();
            }
        });
    }
};
