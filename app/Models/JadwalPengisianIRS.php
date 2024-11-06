<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPengisianIRS extends Model
{
    use HasFactory;

    // $table->string('keterangan');
    // $table->date('jadwalmulai')->nullable();
    // $table->date('jadwalberakhir')->nullable(); 
    protected $fillable = [
        'keterangan',
        'jadwalmulai',
        'jadwalberakhir'
    ];
}
