<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\DashboardDekanController;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\DashboardDosenPengampuController;
use App\Http\Controllers\DashboardPembimbingAkademikController;
use App\Http\Controllers\DashboardBagianAkademikController;
use App\Http\Controllers\DashboardKaprodiController;
use App\Http\Controllers\RegistrasiController;
Route::get('/', function () {
    return view('login');
});

Route::get('/dashboardMahasiswa', [DashboardMahasiswaController::class, 'index'])->name('dashboardMahasiswa');

Route::get('/dashboarddekan', [DashboardDekanController::class, 'index'])->name('dashboardDekan');

Route::get('/dashboarddosenpengampu', [DashboardDosenPengampuController::class, 'index'])->name('dashboardDosenPengampu');

Route::get('/dashboardpembimbingakademik', [DashboardPembimbingAkademikController::class, 'index'])->name('dashboardPembimbingAkademik');

Route::get('/dashboardbagianakademik', [DashboardBagianAkademikController::class, 'index'])->name('dashboardBagianAkademik');

Route::get('/dashboardkaprodi', [DashboardKaprodiController::class, 'index'])->name('dashboardKaprodi');

Route::get('/dashboardkaprodi', [DashboardKaprodiController::class, 'index'])->name('dashboardKaprodi');

Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('Registrasi');