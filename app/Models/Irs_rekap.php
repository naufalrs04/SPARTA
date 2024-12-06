<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Irs_rekap extends Model
{
    use HasFactory;
   
    protected $table = 'irs_rekap';
    protected $fillable = [
        'mahasiswa_id',
        'semester',
        'jadwal_id',
        'kode_mk',
        'nama_mk',
        'kelas',
        'ruang',
        'sks',
        'status_pengambilan',
        'status_pengajuan',
        'prioritas',
    ];
}