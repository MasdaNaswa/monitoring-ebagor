<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminPenggunaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pengguna')->insert([
            [
                'id_user'        => 1,
                'nama_opd'       => 'Bagian_Organisasi',
                'email'          => 'bagorkabupatenkarimun@gmail.com',
                'password'       => '$2y$12$bMgu6/J5T53d3lvblC5DBujTlvXHieJdYrSIIZPvkPvmspihMuvrW',
                'role'           => 'ADMIN_KELEMBAGAAN',
                'created_by'     => 'ADMIN_KELEMBAGAAN',
                'remember_token' => null,
                'gmail_token'    => null,
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'id_user'        => 2,
                'nama_opd'       => 'Bagian_Organisasi',
                'email'          => 'yanlikkarimun2022@gmail.com',
                'password'       => '$2y$12$I2YqeCRPHm.gbX8HKzHMoO0xrnu0i3p6M5hM6pNhuxgWOLmrdkH7y',
                'role'           => 'ADMIN_PELAYANAN_PUBLIK',
                'created_by'     => 'ADMIN_PELAYANAN_PUBLIK',
                'remember_token' => null,
                'gmail_token'    => null,
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
            [
                'id_user'        => 3,
                'nama_opd'       => 'Bagian_Organisasi',
                'email'          => 'organisasi.karimun@gmail.com',
                'password'       => '$2y$12$P53M44nYppz.GGA/d/BqdOSfNNECLp37UrSj1i2GCrl2gUjpeOpum',
                'role'           => 'ADMIN_RB',
                'created_by'     => 'ADMIN_RB',
                'remember_token' => null,
                'gmail_token'    => null,
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ],
        ]);
    }
}
