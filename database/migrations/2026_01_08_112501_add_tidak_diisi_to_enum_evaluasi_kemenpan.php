<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        $jawabanOptions = [
            'Sangat Tidak Setuju',
            'Tidak Setuju',
            'Setuju',
            'Sangat Setuju',
            'Tidak Diisi'
        ];

        $enumString = "'" . implode("','", $jawabanOptions) . "'";

        // struktur_1 - struktur_32
        for ($i = 1; $i <= 32; $i++) {
            DB::statement("
                ALTER TABLE evaluasi_kemenpan 
                MODIFY struktur_$i 
                ENUM($enumString) 
                NULL
            ");
        }

        // proses_1 - proses_30
        for ($i = 1; $i <= 30; $i++) {
            DB::statement("
                ALTER TABLE evaluasi_kemenpan 
                MODIFY proses_$i 
                ENUM($enumString) 
                NULL
            ");
        }
    }

    public function down(): void
    {
        $jawabanOptions = [
            'Sangat Tidak Setuju',
            'Tidak Setuju',
            'Setuju',
            'Sangat Setuju'
        ];

        $enumString = "'" . implode("','", $jawabanOptions) . "'";

        for ($i = 1; $i <= 32; $i++) {
            DB::statement("
                ALTER TABLE evaluasi_kemenpan 
                MODIFY struktur_$i 
                ENUM($enumString) 
                NULL
            ");
        }

        for ($i = 1; $i <= 30; $i++) {
            DB::statement("
                ALTER TABLE evaluasi_kemenpan 
                MODIFY proses_$i 
                ENUM($enumString) 
                NULL
            ");
        }
    }
};
