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
use App\Http\Controllers\pembagiankelas;
use App\Http\Controllers\pembagiankelasInfo;
use App\Http\Controllers\perwalian;
use App\Http\Controllers\inputnilai;
use App\Http\Controllers\inputnilaiInfo;
use App\Http\Controllers\jadwalmengajar;
use App\Http\Controllers\verifikasiIRS;

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

Route::get('/pembagiankelas', [pembagiankelas::class, 'index'])->middleware('auth')->name('pembagiankelas');

Route::get('/pembagiankelasInfo', [pembagiankelasInfo::class, 'index'])->middleware('auth')->name('pembagiankelasInfo');

Route::get('/perwalian', [perwalian::class, 'index'])->middleware('auth')->name('perwalian');

Route::get('/inputnilai', [inputnilai::class, 'index'])->middleware('auth')->name('inputnilai');

Route::get('/inputnilaiInfo', [inputnilaiInfo::class, 'index'])->middleware('auth')->name('inputnilaiInfo');

Route::get('/jadwalmengajar', [jadwalmengajar::class, 'index'])->middleware('auth')->name('jadwalmengajar');

Route::get('/verifikasiIRS', [verifikasiIRS::class, 'index'])->middleware('auth')->name('verifikasiIRS');