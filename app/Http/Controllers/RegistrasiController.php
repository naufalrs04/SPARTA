<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function index()
    {
        $data = [
            'nama' => 'Rocky Gerung Mahasiswa',
            'nim' => '1941720051',
        ];

        return view ('Registrasi', compact('data'));
    } 
}
