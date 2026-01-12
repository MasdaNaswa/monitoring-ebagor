<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('template_laporan', function (Blueprint $table) {
            $table->string('nama_template', 70)->change();
            $table->string('file_path', 100)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('template_laporan', function (Blueprint $table) {
            $table->string('nama_template')->change(); // default biasanya 255
            $table->string('file_path')->change();     // default biasanya 255
        });
    }
};
