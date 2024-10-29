<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\irs_rekap;

class verifikasiIRS extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Daftar mahasiswa yang sudah mengajukan IRS
        $list_mahasiswa = irs_rekap::all();
        foreach ($list_mahasiswa as $daftar_mahasiswa) {
            $daftar_mahasiswa->nama = Mahasiswa::where('id', $daftar_mahasiswa->mahasiswa_id)->first()->nama;
            $daftar_mahasiswa->semester = Mahasiswa::where('id', $daftar_mahasiswa->mahasiswa_id)->first()->semester;
        }

        return view('verifikasiIRS', compact('user', 'list_mahasiswa'));
    }
}