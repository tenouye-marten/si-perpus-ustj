<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffSeeder extends Seeder
{
    /**
     * RUN SEEDER
     */
    public function run(): void
    {
        Staff::insert([

            /**
             * KEPALA UPT
             */
            [
                'nama'       => 'Meity L.H Lado, S.Sos., MM',
                'jabatan'    => 'Kepala UPT Perpustakaan',
                'foto'       => null,
                'level'      => 'kepala',
                'bidang'     => 'Pimpinan',
                'urutan'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            /**
             * KOORDINATOR ADMINISTRASI
             */
            [
                'nama'       => 'No Name',
                'jabatan'    => 'Koordinator Administrasi Umum dan Fasilitas',
                'foto'       => null,
                'level'      => 'koordinator',
                'bidang'     => 'Administrasi',
                'urutan'     => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            /**
             * KOORDINATOR LAYANAN
             */
            [
                'nama'       => 'Golprit, S.Ptk',
                'jabatan'    => 'Koordinator Layanan Perpustakaan',
                'foto'       => null,
                'level'      => 'koordinator',
                'bidang'     => 'Layanan',
                'urutan'     => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            /**
             * KOORDINATOR INFORMASI
             */
            [
                'nama'       => 'No Name',
                'jabatan'    => 'Koordinator Informasi dan Komunikasi',
                'foto'       => null,
                'level'      => 'koordinator',
                'bidang'     => 'Informasi & Komunikasi',
                'urutan'     => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}