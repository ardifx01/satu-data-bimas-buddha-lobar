<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = [
        'category_id', 
        'title', 
        'no_surat', 
        'jenis', 
        'tgl', 
        'pengirim', 
        'penerima', 
        'deskripsi', 
        'file_path'
        ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}