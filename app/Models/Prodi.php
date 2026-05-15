<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
     protected $fillable = [
        'fakultas_id',
        'kode_prodi',
        'nama_prodi'
    ];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function books()
{
    return $this->belongsToMany(Book::class);
}

public function skripsis()
{
    return $this->hasMany(Skripsi::class);
}


}
