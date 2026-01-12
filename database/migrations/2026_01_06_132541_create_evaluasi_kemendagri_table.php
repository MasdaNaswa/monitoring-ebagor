<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('evaluasi_kemendagri', function (Blueprint $table) {
            $table->id('id_evaluasi_kemendagri');
            $table->unsignedBigInteger('id_user');
            $table->string('nama_opd')->nullable();
            $table->string('email')->nullable();

            foreach (['i', 'ii', 'iii', 'iv', 'v', 'vi', 'vii', 'viii', 'ix', 'x', 'xi'] as $v) {
                // 👉 ubah ke string(70)
                $table->string("variabel_$v", 200)->nullable();

                for ($j = 1; $j <= 3; $j++) {
                    $table->string("file_path_{$v}_$j", 200)->nullable();
                }
            }

            $table->integer('total_skor')->nullable();
            $table->string('tingkat_maturitas', 50)->nullable();
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
        Schema::dropIfExists('evaluasi_kemendagri');
    }
};
