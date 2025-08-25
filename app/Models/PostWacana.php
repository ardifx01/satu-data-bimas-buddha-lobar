<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostWacana extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'judul',
        'slug',
        'kategori_id',
        'deskripsi',
        'konten',
        'audio',
        'video',
        'gambar',
        'tanggal_terbit',
        'status',
    ];

    protected $casts = [
        'tanggal_terbit' => 'datetime',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriWacana::class, 'kategori_id');
    }
}