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
        'irs_id',
        'semester',
        'status',
        'total_sks',
        'ip_semester',
    ];
}
