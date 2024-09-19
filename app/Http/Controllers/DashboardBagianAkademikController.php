<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardBagianAkademikController extends Controller
{
    public function index()
    {
        $data = [
            'nama' => 'Rocky Gerung Bagian Akademik',
            'nim' => '1234567890',
        ];

        return view ('dashboardBagianAkademik', compact('data'));
    }
}
