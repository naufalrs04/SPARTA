<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

class RegistrasiController extends Controller
{
    //
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        return view('/registrasi', compact('user'));
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->first();

        if ($mahasiswa) {
            $mahasiswa->status = $request->status;
            $mahasiswa->save();

            return response('Status berhasil diperbarui !', 200);
        }
    }
}
