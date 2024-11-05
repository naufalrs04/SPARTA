<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama'
    ];
    public function ruangans()
    {
        return $this->hasMany(Ruangan::class, 'gedung_id');
    }
}
