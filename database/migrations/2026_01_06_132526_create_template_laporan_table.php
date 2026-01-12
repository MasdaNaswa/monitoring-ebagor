<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('template_laporan', function (Blueprint $table) {
            $table->id('id_template');
            $table->string('nama_template');
            $table->unsignedBigInteger('id_kategori');
            $table->string('file_path');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('template_laporan');
    }
};
