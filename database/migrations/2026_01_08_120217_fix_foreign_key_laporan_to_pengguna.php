<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Hapus foreign key lama (ke users)
        DB::statement("
            ALTER TABLE laporan 
            DROP FOREIGN KEY laporan_id_user_foreign
        ");

        // Tambah foreign key baru ke tabel pengguna
        DB::statement("
            ALTER TABLE laporan
            ADD CONSTRAINT laporan_id_user_foreign
            FOREIGN KEY (id_user)
            REFERENCES pengguna(id_user)
            ON DELETE CASCADE
        ");
    }

    public function down(): void
    {
        // Rollback ke users (jika diperlukan)
        DB::statement("
            ALTER TABLE laporan 
            DROP FOREIGN KEY laporan_id_user_foreign
        ");

        DB::statement("
            ALTER TABLE laporan
            ADD CONSTRAINT laporan_id_user_foreign
            FOREIGN KEY (id_user)
            REFERENCES users(id)
            ON DELETE CASCADE
        ");
    }
};
