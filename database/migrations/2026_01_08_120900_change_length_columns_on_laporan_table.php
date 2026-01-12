<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            ALTER TABLE laporan
            MODIFY kategori VARCHAR(25) NULL,
            MODIFY judul VARCHAR(70) NOT NULL,
            MODIFY file_path VARCHAR(130) NOT NULL
        ");
    }

    public function down(): void
    {
        // balik ke ukuran sebelumnya (default 255)
        DB::statement("
            ALTER TABLE laporan
            MODIFY kategori VARCHAR(255) NULL,
            MODIFY judul VARCHAR(255) NOT NULL,
            MODIFY file_path VARCHAR(255) NOT NULL
        ");
    }
};
