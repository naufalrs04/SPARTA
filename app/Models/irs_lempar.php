<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class irs_lempar extends Model
{
    use HasFactory;

    protected $table = 'irs_lempar';

    protected $fillable = [
        'mahasiswa_id',
        'semester',
        'jumlah_sks',
        'status_persetujuan',
    ];
}
