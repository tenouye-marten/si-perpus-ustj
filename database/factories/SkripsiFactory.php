<?php

namespace Database\Factories;

use App\Models\Skripsi;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SkripsiFactory extends Factory
{
    /**
     * Model factory
     */
    protected $model = Skripsi::class;

    /**
     * Define default state
     */
    public function definition(): array
    {
        /**
         * Judul random skripsi
         */
        $judul = fake()->randomElement([

            'Analisis Sistem Informasi Akademik',

            'Perancangan Website Perpustakaan',

            'Implementasi Machine Learning',

            'Sistem Informasi Geografis',

            'Rancang Bangun Aplikasi Android',

            'Analisis Kualitas Air',

            'Perencanaan Wilayah Kota',

            'Analisis Struktur Bangunan',

            'Sistem Monitoring IoT',

            'Implementasi Laravel Filament',

            'Pemetaan Penyakit ISPA',

            'Analisis Data Mining',

            'Sistem Absensi QR Code',

            'Implementasi Firebase Android',

            'Analisis Kinerja Jaringan',

            'Sistem Informasi Rumah Sakit',

            'Prediksi Cuaca Menggunakan AI',

            'Sistem Pendukung Keputusan',

            'Aplikasi Monitoring Kesehatan',

            'Analisis Sentimen Media Sosial',

        ]);

        return [

            /**
             * PENULIS
             */
            'nama_penulis' => fake()->name(),

            /**
             * NPM UNIQUE
             */
            'npm' => fake()->unique()->numerify('2021########'),

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
             * DOSEN PEMBIMBING
             */
            'dosen_pembimbing' => fake()->name(),

            /**
             * COVER
             */
            'cover' => null,

            /**
             * TAHUN
             */
            'tahun' => fake()->year(),

            /**
             * ABSTRAK
             */
            'abstrak' => fake()->paragraphs(5, true),

            /**
             * TIMESTAMP
             */
            'created_at' => now(),

            'updated_at' => now(),
        ];
    }
}