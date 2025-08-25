<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataUmat extends Model
{
    protected $fillable = [
        'vihara_id', 
        'nama', 
        'nik', 
        'alamat', 
        'telepon', 
        'email', 
        'jenis_kelamin', 
        'tanggal_lahir'
    ];

    public function datavihara()
    {
        return $this->belongsTo(DataVihara::class, 'vihara_id');
    }
}