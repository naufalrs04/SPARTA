<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class perwalian extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        $theme = $request->cookie('theme') ?? 'light';

        $dosennip = Auth::user()->nim_nip;

        $dosen = Dosen::all();

        $mahasiswas = Mahasiswa::with('irsRekaps', 'user')
            ->get()
            ->map(function ($mahasiswa) {
                $mahasiswa->totalsks = $mahasiswa->irsRekaps->sum('sks');
                return $mahasiswa;
            }
        );
            
        return view('perwalian', compact( 'user', 'theme', 'mahasiswas'));
    }

    public function getSortedMahasiswa(Request $request)
    {
        try {
            $sortBy = $request->input('sort'); 
            if (!in_array($sortBy, ['nama', 'nim'])) {
                return response()->json(['error' => 'Invalid sort parameter'], 400);
            }

            $mahasiswas = Mahasiswa::with('user')->get();

            return view('components.mahasiswa_table_rows', compact('mahasiswas'));

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}