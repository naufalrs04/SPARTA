<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruangan_prodi extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected table 
=======
    protected $table = 'ruang_prodis';
>>>>>>> 7188b742942190527ff5f6448c263970654abc53
    protected $fillable = [
        'ruangan_id',
        'nama_prodi',
        'status_pengajuan',
    ];
}
