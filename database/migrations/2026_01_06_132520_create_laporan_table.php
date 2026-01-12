<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->unsignedBigInteger('id_user');
            $table->string('kategori')->nullable();
            $table->string('judul');
            $table->string('file_path');
            $table->date('tanggal_upload')->nullable();
            $table->string('status')->default('Menunggu Verifikasi');
            $table->text('catatan')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
