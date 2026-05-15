<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skripsi extends Model
{
    use HasFactory;

    /**
     * Mass assignment
     */
    protected $fillable = [

        'prodi_id',

        'nama_penulis',

        'npm',

        'judul',

        'slug',

        'dosen_pembimbing',

        'cover',

        'tahun',

        'abstrak',
    ];

    /**
     * Relasi ke prodi
     */
    public function prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class);
    }

    /**
     * Route model binding
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}