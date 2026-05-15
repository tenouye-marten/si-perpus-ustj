<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fakultas')->insert([

            [
                'kode_fakultas' => 'FTSP',
                'nama_fakultas' => 'Fakultas Teknik Sipil dan Perencanaan',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'kode_fakultas' => 'FTIK',
                'nama_fakultas' => 'Fakultas Teknologi Industri dan Kebumian',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'kode_fakultas' => 'FIKOM',
                'nama_fakultas' => 'Fakultas Ilmu Komputer dan Manajemen',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'kode_fakultas' => 'FESOSPOL',
                'nama_fakultas' => 'Fakultas Ekonomi, Sastra dan Sosial Politik',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'kode_fakultas' => 'FIKES',
                'nama_fakultas' => 'Fakultas Ilmu Kesehatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}