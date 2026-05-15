<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    /**
     * Model factory
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        /**
         * Judul random buku
         */
        $judul = fake()->randomElement([

            'Analisis Sistem Informasi',

            'Dasar Teknik Sipil',

            'Pengantar Arsitektur Modern',

            'Manajemen Proyek Teknologi',

            'Konsep Pemrograman Web',

            'Teknologi Basis Data',

            'Sistem Informasi Geografis',

            'Perencanaan Kota Modern',

            'Jaringan Komputer Lanjut',

            'Metode Penelitian Akademik',

            'Pengantar Teknik Lingkungan',

            'Kecerdasan Buatan Modern',

            'Machine Learning Dasar',

            'Keamanan Sistem Informasi',

            'Manajemen Keuangan',

            'Akuntansi Dasar',

            'Teknik Pertambangan Modern',

            'Geologi Struktur',

            'Sistem Kendali Elektro',

            'Farmasi Klinis',

            'Analis Kesehatan Dasar',

            'Dasar Ilmu Pemerintahan',

            'Hubungan Internasional',

            'Sastra Inggris Akademik',

            'Pemrograman Laravel',

            'Basis Data Modern',

            'Sistem Operasi',

            'Pemrograman Android',

            'Teknik Elektro Industri',

            'Rekayasa Perangkat Lunak',

        ]);

        return [

            /**
             * JUDUL
             */
            'judul' => $judul,

            /**
             * SLUG
             */
            'slug' => Str::slug(
                $judul . '-' . fake()->unique()->numberBetween(100, 9999)
            ),

            /**
             * COVER KOSONG
             */
            'cover' => null,

            /**
             * PENULIS
             */
            'penulis' => fake()->name(),

            /**
             * PENERBIT
             */
            'penerbit' => fake()->company(),

            /**
             * TAHUN TERBIT
             */
            'tahun_terbit' => fake()->numberBetween(2010, 2026),

            /**
             * ISBN
             */
            'isbn' => fake()->isbn13(),

            /**
             * DESKRIPSI
             */
            'deskripsi' => fake()->paragraphs(4, true),

            /**
             * TIMESTAMP
             */
            'created_at' => now(),

            'updated_at' => now(),
        ];
    }
}