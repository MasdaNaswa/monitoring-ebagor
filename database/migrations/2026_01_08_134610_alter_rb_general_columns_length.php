<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rb_general', function (Blueprint $table) {
            $columns = [
                'sasaran_strategi',
                'indikator_capaian',
                'target',
                'satuan',
                'output',
                'target_tahun_2025',
                'anggaran_tahun_2025',
                'renaksi_tahun_2025_tw1',
                'renaksi_tahun_2025_tw2',
                'renaksi_tahun_2025_tw3',
                'renaksi_tahun_2025_tw4',
                'realisasi_renaksi_tw1',
                'realisasi_renaksi_tw2',
                'realisasi_renaksi_tw4',
                'rumus',
                'unit_kerja',
            ];

            foreach ($columns as $column) {
                $table->string($column, 100)->nullable()->change();
            }
        });
    }

    public function down(): void
    {
        Schema::table('rb_general', function (Blueprint $table) {
            $columns = [
                'sasaran_strategi',
                'indikator_capaian',
                'target',
                'satuan',
                'output',
                'target_tahun_2025',
                'anggaran_tahun_2025',
                'renaksi_tahun_2025_tw1',
                'renaksi_tahun_2025_tw2',
                'renaksi_tahun_2025_tw3',
                'renaksi_tahun_2025_tw4',
                'realisasi_renaksi_tw1',
                'realisasi_renaksi_tw2',
                'realisasi_renaksi_tw4',
                'rumus',
                'unit_kerja',
            ];

            foreach ($columns as $column) {
                $table->string($column, 255)->nullable()->change();
            }
        });
    }
};
