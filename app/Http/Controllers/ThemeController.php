<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function readCookie(Request $request){

        $theme = $request->cookie('theme');

        return view('components.navbar', compact('theme'));
    }

    public function createAndUpdate(Request $request){
        $theme = $request->input('theme');

        if($theme && in_array($theme,['light','dark'])){
            $cookie = cookie('theme', $theme, 60*24*365);
        }
        return back()->withCookie($cookie);
    }

    public function dashboard(Request $request) {
        $theme = $request->cookie('theme') ?? 'light';

        return view('dashboardBagianAkademik', compact('theme', 'data'));
    }

}
