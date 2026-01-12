<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('evaluasi_kemenpan', function (Blueprint $table) {
            $table->id('id_evaluasi_kemenpan');
            $table->unsignedBigInteger('id_user');
            $table->string('nama_opd', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->date('tanggal_pengisian')->nullable();

            // ENUM untuk jawaban evaluasi
            $jawabanOptions = ['Sangat Tidak Setuju', 'Tidak Setuju', 'Setuju', 'Sangat Setuju'];

            // Struktur 1-32
            for ($i=1; $i<=32; $i++) {
                $table->enum("struktur_$i", $jawabanOptions)->nullable();
            }

            // Proses 1-30
            for ($i=1; $i<=30; $i++) {
                $table->enum("proses_$i", $jawabanOptions)->nullable();
            }

            $table->float('skor_struktur')->nullable();
            $table->float('skor_proses')->nullable();
            $table->float('total_skor')->nullable();
            $table->string('tingkat_kematangan', 0)->nullable();
            $table->string('status', 50)->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('id_user')
                  ->references('id_user')->on('pengguna')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluasi_kemenpan');
    }
};
