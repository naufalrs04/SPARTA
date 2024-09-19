<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPembimbingAkademikController extends Controller
{
    public function index()
    {
        $data = [
            'nama' => 'Rocky Gerung Pembimbing Akademik',
            'nim' => '1941720051',
        ];

        return view ('dashboardPembimbingAkademik', compact('data'));
    }
}
