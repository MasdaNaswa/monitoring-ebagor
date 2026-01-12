<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('evaluasi_kemendagri', function (Blueprint $table) {
            $table->float('total_skor')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('evaluasi_kemendagri', function (Blueprint $table) {
            $table->float('total_skor')->nullable()->change();
        });
    }
};
