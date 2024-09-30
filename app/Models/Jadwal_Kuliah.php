<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_Kuliah extends Model
{
    use HasFactory;
    protected $table = 'jadwal_kuliah';
    protected $fillable = [
        'mata_kuliah_id',
        'ruangan_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];
    
}
