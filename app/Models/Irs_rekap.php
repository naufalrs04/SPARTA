<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Irs_rekap extends Model
{
    use HasFactory;

   
    protected $table = 'irs_rekap';
    // Add this line to specify the primary key
    protected $primaryKey = 'mata_kuliah_id'; // or whichever column is your primary key

    protected $fillable = [
        'mahasiswa_id',
        'mata_kuliah_id',
        'ruangan_id',
        'semester',
        'status_pengajuan',
    ];
}