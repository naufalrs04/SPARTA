<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IRSKuliahMahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mk',
        'kode_mk',
        'sks_mk',
        'smt_mk',
        'prodi_mk',
        'tahunajaran',
        'dosen',
        'kelas',
        'hari',
        'jammulai',
        'jamakhir',
    ];
}
