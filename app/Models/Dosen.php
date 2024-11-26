<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'status',
        'prodi',
    ];
    
    public function user()
    {
        return $this->hasOne(User::class, 'nim_nip', 'nip'); 
    }
}
