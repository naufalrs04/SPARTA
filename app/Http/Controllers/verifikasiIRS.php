<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\irs_rekap;
use App\Models\Mata_Kuliah;
use Illuminate\Support\Facades\DB;

class verifikasiIRS extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        // Ambil data dosen berdasarkan NIP
        $user = Auth::user();
        $dosen = Dosen::where('nip', $user->nim_nip)->first();
    
        // Ambil semua mahasiswa bimbingan dosen
        $mhs_perwalian = Mahasiswa::where('id_wali', $dosen->id)->get();
        
        foreach ($mhs_perwalian as $mhs) {
            $mhs->rekap = irs_rekap::where('mahasiswa_id', $mhs->id)->get();
            $mhs->nama = User::where('nim_nip', $mhs->nim)->first()->nama;
            $mhs->total_sks = irs_rekap::where('mahasiswa_id', $mhs->id)->sum('sks');
        }

        return view('verifikasiIRS', compact('user', 'mhs_perwalian'));
    }

}
