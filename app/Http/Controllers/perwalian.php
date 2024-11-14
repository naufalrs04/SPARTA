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

        // Ambil tema dari cookie atau gunakan 'light' sebagai default
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
            // Get the sorting parameter from the request
            $sortBy = $request->input('sort'); 

            // Validate the sorting parameter
            if (!in_array($sortBy, ['nama', 'nim'])) {
                return response()->json(['error' => 'Invalid sort parameter'], 400);
            }

            // Fetch the sorted mahasiswa records, joining with the users table using the correct columns
            $mahasiswas = Mahasiswa::with('user')->get();

            // Return the updated rows as HTML using the mahasiswa_table_rows view
            return view('components.mahasiswa_table_rows', compact('mahasiswas'));

        } catch (\Exception $e) {
            // Return a detailed error response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}