<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

class RegistrasiController extends Controller
{
    //
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Ambil tema dari cookie atau gunakan 'light' sebagai default
        $theme = $request->cookie('theme') ?? 'light';
        
        return view('/registrasi', compact('user', 'theme'));
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('nim', $user->nim_nip)->first();

        if ($mahasiswa) {
            $mahasiswa->status = $request->status;
            $mahasiswa->save();

            return response('Status berhasil diperbarui !', 200);
        }
    }
}
