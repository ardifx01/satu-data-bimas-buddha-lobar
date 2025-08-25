<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGuruAgamaBuddha extends Model
{
    use HasFactory;

    protected $table = 'data_guru_agama_buddha';

    protected $fillable = [
        'nama',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'no_hp',
        'email',
        'alamat',
        'tempat_tugas',
        'category_id',
    ];

    public function dataVihara()
    {
        return $this->belongsTo(DataVihara::class, 'nama-vihara');
    }

public function category()
    {
        return $this->belongsTo(Category::class);
    }

}