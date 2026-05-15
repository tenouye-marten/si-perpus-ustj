<?php

namespace Database\Seeders;

use App\Models\Prodi;
use App\Models\Skripsi;
use Illuminate\Database\Seeder;

class SkripsiSeeder extends Seeder
{
    /**
     * Run database seeds
     */
    public function run(): void
    {
        /**
         * Loop semua prodi
         */
        Prodi::query()->each(function ($prodi) {

            /**
             * Generate 5 skripsi
             */
            Skripsi::factory(5)->create([

                'prodi_id' => $prodi->id,

            ]);
        });
    }
}