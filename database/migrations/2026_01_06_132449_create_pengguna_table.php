<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama_opd', 50);
            $table->string('email', 50)->unique();
            $table->string('password', 255);
            $table->string('role', 50);
            $table->string('created_by', 50)->nullable();

            $table->rememberToken();          // buat dulu
            $table->longText('gmail_token')->nullable(); // tanpa after()

            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }

};
