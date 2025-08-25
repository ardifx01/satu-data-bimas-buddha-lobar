<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanPenyuluh extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_penyuluh';

    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'tanggal_kegiatan',
        'lokasi',
        'dokumentasi',
        'status',
    ];

    protected $casts = [
        'tanggal_kegiatan' => 'date',
        'dokumentasi' => 'array', // jika kolomnya json (untuk multi file upload)
    ];

    /**
     * Relasi ke model User (penyuluh).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}