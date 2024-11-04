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
        'mata_kuliah_id',
        'ruangan_id',
        'semester',
        'sks',
        'status_pengajuan',
    ];
}