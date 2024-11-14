<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'status',
        'semester',
        'prodi',
        'IPK',
        'IPS_Sebelumnya',
        'id_wali',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nim', 'nim_nip');
    }

    public function irsRekaps()
    {
        return $this->hasMany(IRS_rekap::class, 'mahasiswa_id', 'id');
    }
}
