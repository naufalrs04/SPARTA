<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardDekanController;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\DashboardDosenPengampuController;
use App\Http\Controllers\DashboardPembimbingAkademikController;
use App\Http\Controllers\DashboardBagianAkademikController;
use App\Http\Controllers\DashboardKaprodiController;
use App\Http\Controllers\RegistrasiController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

Route::get('/dashboardMahasiswa', [DashboardMahasiswaController::class, 'index'])->middleware('auth')->name('dashboardMahasiswa');

Route::get('/dashboarddekan', [DashboardDekanController::class, 'index'])->middleware('auth')->name('dashboardDekan');

Route::get('/dashboarddosenpengampu', [DashboardDosenPengampuController::class, 'index'])->middleware('auth')->name('dashboardDosenPengampu');

Route::get('/dashboardpembimbingakademik', [DashboardPembimbingAkademikController::class, 'index'])->middleware('auth')->name('dashboardPembimbingAkademik');

Route::get('/dashboardbagianakademik', [DashboardBagianAkademikController::class, 'index'])->middleware('auth')->name('dashboardBagianAkademik');

Route::get('/dashboardkaprodi', [DashboardKaprodiController::class, 'index'])->middleware('auth')->name('dashboardKaprodi');


Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('auth')->name('registrasi');
