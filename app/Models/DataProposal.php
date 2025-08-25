<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataProposal extends Model
{
    protected $fillable = [
        'nama_file', 
        'file_path', 
        'status', 
        'tanggal_pengajuan', 
        'tanggal_pencairan', 
        'jumlah_bantuan',
        'vihara_id'
    ];

    public function datavihara()
    {
        return $this->belongsTo(DataVihara::class, 'vihara_id');
    }
}