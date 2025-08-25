<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataVihara extends Model
{
    protected $fillable = [
        'nama_vihara', 
        'alamat', 
        'kota', 
        'provinsi', 
        'nama_ketua_vihara', 
        'kontak',
        'status_tanda_daftar', // ← Tambahkan ini
    ];

    public function archives()
    {
        return $this->hasMany(Archive::class);
    }

    public function dataGuruAgamaBuddhas()
    {
        return $this->hasMany(DataGuruAgamaBuddha::class, 'data_vihara_id');
    }
}