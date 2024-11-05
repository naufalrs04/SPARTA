<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenyusunanJadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        // other fields
        'nama_mk',
        'kode_mk',
        'sks_mk',
        'kelas',
        'hari',
        'jammulai',
        'jamakhir'
    ];

    public function mataKuliah()
    {
        return $this->belongsTo(Mata_Kuliah::class, 'mata_kuliah_id');
    }
}
