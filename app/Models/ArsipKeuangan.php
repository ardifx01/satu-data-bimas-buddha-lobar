<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipKeuangan extends Model
{
    use HasFactory;

    protected $table = 'arsip_keuangan';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'judul',
        'nomor_arsip',
        'kategori',
        'tanggal',
        'file_path',
        'keterangan',
    ];

    // Jika ingin format tanggal otomatis jadi Carbon
    protected $dates = ['tanggal'];
}