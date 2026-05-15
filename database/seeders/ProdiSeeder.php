<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * FTSP
         */
        $ftsp = Fakultas::where('kode_fakultas', 'FTSP')->first();

        DB::table('prodis')->insert([

            [
                'fakultas_id' => $ftsp->id,
                'kode_prodi' => '121',
                'nama_prodi' => 'Teknik Sipil S1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'fakultas_id' => $ftsp->id,
                'kode_prodi' => '122',
                'nama_prodi' => 'Arsitektur S1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'fakultas_id' => $ftsp->id,
                'kode_prodi' => '123',
                'nama_prodi' => 'Teknik Lingkungan S1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'fakultas_id' => $ftsp->id,
                'kode_prodi' => '124',
                'nama_prodi' => 'Perencanaan Wilayah dan Kota S1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        /**
         * FTIK
         */
        $ftik = Fakultas::where('kode_fakultas', 'FTIK')->first();

        DB::table('prodis')->insert([

            [
                'fakultas_id' => $ftik->id,
                'kode_prodi' => '221',
                'nama_prodi' => 'Teknik Mesin S1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'fakultas_id' => $ftik->id,
                'kode_prodi' => '222',
                'nama_prodi' => 'Teknik Elektro S1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'fakultas_id' => $ftik->id,
                'kode_prodi' => '223',
                'nama_prodi' => 'Teknik Geologi S1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'fakultas_id' => $ftik->id,
                'kode_prodi' => '224',
                'nama_prodi' => 'Teknik Pertambangan S1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        /**
         * FIKOM
         */
        $fikom = Fakultas::where('kode_fakultas', 'FIKOM')->first();

        DB::table('prodis')->insert([

            [
                'fakultas_id' => $fikom->id,
                'kode_prodi' => '321',
                'nama_prodi' => 'Teknik Informatika S1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'fakultas_id' => $fikom->id,
                'kode_prodi' => '322',
                'nama_prodi' => 'Sistem Informasi S1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        /**
         * FESOSPOL
         */
        $fesospol = Fakultas::where('kode_fakultas', 'FESOSPOL')->first();

        DB::table('prodis')->insert([

            [
                'fakultas_id' => $fesospol->id,
                'kode_prodi' => '421',
                'nama_prodi' => 'Sastra Inggris S1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'fakultas_id' => $fesospol->id,
                'kode_prodi' => '422',
                'nama_prodi' => 'Hubungan Internasional S1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'fakultas_id' => $fesospol->id,
                'kode_prodi' => '423',
                'nama_prodi' => 'Ilmu Pemerintahan S1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'fakultas_id' => $fesospol->id,
                'kode_prodi' => '424',
                'nama_prodi' => 'Akuntansi S1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        /**
         * FIKES
         */
        $fikes = Fakultas::where('kode_fakultas', 'FIKES')->first();

        DB::table('prodis')->insert([

            [
                'fakultas_id' => $fikes->id,
                'kode_prodi' => '521',
                'nama_prodi' => 'Farmasi D-III',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'fakultas_id' => $fikes->id,
                'kode_prodi' => '522',
                'nama_prodi' => 'Analis Kesehatan D-III',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}