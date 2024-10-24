<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class irs_lempar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mahasiswa_id',
        'IPS_sebelumnya',
        'total_SKS',
        'status',
    ];
}
