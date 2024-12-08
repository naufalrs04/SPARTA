<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenyusunanJadwal extends Model
{
    use HasFactory;

    protected $table ='penyusunan_jadwals';
    
    protected $fillable = [
        'nama_mk',
        'kode_mk',
        'sks_mk',
        'semester_mk',
        'prodi',
        'kelas',
        'tahun_ajaran',
        'dosen',
        'ruang',
        'kapasitas',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'status_pengajuan',
    ];

    public function mataKuliah()
    {
        return $this->belongsTo(Mata_Kuliah::class, 'mata_kuliah_id');
    }
}
