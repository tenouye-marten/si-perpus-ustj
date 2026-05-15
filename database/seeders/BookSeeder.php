<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Prodi;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
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
             * Generate 5 buku
             */
            Book::factory(5)

                ->create()

                ->each(function ($book) use ($prodi) {

                    /**
                     * Simpan relasi pivot
                     */
                    $book->prodis()->attach($prodi->id);

                });
        });
    }
}