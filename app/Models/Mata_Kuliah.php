<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mata_Kuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliahs';

    protected $fillable = [
        'kode',
        'nama',
        'sks',
        'semester',
        'prodi',
    ];

    public function penyusunanJadwal()
    {
        return $this->hasMany(PenyusunanJadwal::class, 'mata_kuliah_id', 'id');
    }
}
