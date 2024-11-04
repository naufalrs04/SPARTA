<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruangan_prodi extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruangan_id',
        'nama_prodi',
        'status_pengajuan',
    ];
}
