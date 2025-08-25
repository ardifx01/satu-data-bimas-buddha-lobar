<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriWacana extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi (mass assignment)
    protected $fillable = ['nama'];

    // Relasi ke PostWacana (satu kategori memiliki banyak wacana)
    public function postWacanas()
    {
        return $this->hasMany(PostWacana::class, 'kategori_id');
    }
}