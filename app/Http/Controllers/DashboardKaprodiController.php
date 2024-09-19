<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardKaprodiController extends Controller
{
    public function index()
    {
        $data = [
            'nama' => 'Rocky Gerung Kaprodi',
            'nim' => '1234567890',
        ];

        return view ('dashboardKaprodi', compact('data'));
    }
}
