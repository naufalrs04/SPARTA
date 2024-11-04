<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagian_akademik extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'status',
    ];
}
