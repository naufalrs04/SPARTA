<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengisianIRS;
use App\Http\Controllers\KHSController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\DashboardDekanController;
use App\Http\Controllers\DashboardKaprodiController;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\DashboardBagianAkademikController;
use App\Http\Controllers\DashboardPembimbingAkademikController;
use App\Http\Controllers\jadwalpengisianIRS;
use App\Http\Controllers\penyusunanjadwal;
use App\Http\Controllers\resetpassword;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('auth') -> name('registrasi');
Route::post('/update-status', [RegistrasiController::class, 'updateStatus'])->name('update-status');


Route::get('/khs', [KHSController::class, 'index'])->middleware('auth')->name('khs');

Route::get('/pengisianirs', [PengisianIRS::class, 'index'])->middleware('auth')->name('pengisianirs');

Route::get('/dashboardMahasiswa', [DashboardMahasiswaController::class, 'index'])->middleware('auth') ->name('dashboardMahasiswa');

Route::get('/dashboardPembimbingAkademik', [DashboardPembimbingAkademikController::class, 'index'])->middleware('auth')->name('dashboardPembimbingAkademik');

Route::get('/dashboardBagianAkademik', [DashboardBagianAkademikController::class, 'index'])->middleware('auth')->name('dashboardBagianAkademik');

Route::get('/dashboarddekan', [DashboardDekanController::class, 'index'])->middleware('auth')->name('dashboardDekan');

//KAPRODI
Route::get('/dashboardKaprodi', [DashboardKaprodiController::class, 'index'])->middleware('auth')->name('dashboardKaprodi');

Route::get('/penyusunanjadwal', [penyusunanjadwal::class, 'index'])->middleware('auth')->name('Penyusunanjadwal');

Route::get('/jadwalpengisianIRS', [jadwalpengisianIRS::class, 'index'])->middleware('auth')->name('jadwalpengisianIRS');

Route::get('/resetpassword', function () {
    return view('resetpassword');
})->name('resetpassword');