<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    /**
     * Mass assignment
     */
    protected $fillable = [

        'judul',

        'slug',

        'cover',

        'penulis',

        'penerbit',

        'tahun_terbit',

        'isbn',

        'deskripsi',

    ];

    /**
     * Relasi many to many
     * Buku memiliki banyak prodi
     */
    public function prodis(): BelongsToMany
    {
        return $this->belongsToMany(
            Prodi::class,
            'book_prodi',
            'book_id',
            'prodi_id'
        );
    }

    /**
     * Route model binding menggunakan slug
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}