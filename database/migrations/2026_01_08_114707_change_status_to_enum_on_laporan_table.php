<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            ALTER TABLE laporan 
            MODIFY status 
            ENUM(
                'Diproses',
                'Disetujui',
                'Revisi'
            )
            NOT NULL
            DEFAULT 'Diproses'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE laporan 
            MODIFY status 
            VARCHAR(255)
            NOT NULL
        ");
    }
};
