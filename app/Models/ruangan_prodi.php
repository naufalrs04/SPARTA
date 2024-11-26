<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruangan_prodi extends Model
{
    use HasFactory;
    protected $table = 'ruang_prodis';
    protected $fillable = [
        'ruangan_id',
        'nama_prodi',
        'status_pengajuan',
        'kapasitas',
    ];
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }
}


