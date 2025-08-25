<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramBantuan extends Model
{
    protected $fillable = [
        'vihara_id', 
        'nama_program', 
        'deskripsi', 
        'status', 
        'tanggal_pengajuan', 
        'tanggal_pencairan', 
        'jumlah_bantuan'
    ];

    public function datavihara()
    {
        return $this->belongsTo(DataVihara::class, 'vihara_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}