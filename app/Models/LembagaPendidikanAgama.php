<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LembagaPendidikanAgama extends Model
{
    protected $fillable = [
        'nama_lembaga', 
        'alamat', 
        'kota', 
        'provinsi', 
        'nama_ketua_lembaga', 
        'kontak'
    ];
}