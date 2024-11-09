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
use App\Http\Controllers\JadwalPengisianIRSController;
use App\Http\Controllers\penyusunanjadwal;
use App\Http\Controllers\resetpassword;
use App\Http\Controllers\pembagiankelas;
use App\Http\Controllers\pembagiankelasInfo;
use App\Http\Controllers\perwalian;
use App\Http\Controllers\inputnilai;
use App\Http\Controllers\inputnilaiInfo;
use App\Http\Controllers\jadwalmengajar;
use App\Http\Controllers\PenyusunanJadwalController;
use App\Http\Controllers\verifikasiIRS;
use App\Http\Controllers\verifikasijadwal;
use App\Http\Controllers\verifikasiRuangKuliah;
use App\Http\Controllers\profile;
use App\Http\Controllers\ThemeController;
use App\Models\JadwalPengisianIRS;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('auth') -> name('registrasi');
Route::post('/update-status', [RegistrasiController::class, 'updateStatus'])->name('update-status');

Route::get('/khs', [KHSController::class, 'index'])->middleware('auth')->name('khs');

// Route untuk index
Route::get('/pengisianirs', [PengisianIRS::class, 'index'])->middleware('auth')->name('pengisianirs');


Route::post('/irs-rekap/store', [PengisianIRS::class, 'store'])->name('irs-rekap.store');
Route::delete('/irs-rekap/destroy', [PengisianIRS::class, 'destroy'])->name('irs-rekap.destroy');
Route::post('/irs-rekap/ajukan', [PengisianIRS::class, 'storeToIrsLempar'])->name('irs.ajukan');
// Route::post('/irs-rekap/batal', [PengisianIRS::class, 'batalIRS']);

Route::get('/dashboardMahasiswa', [DashboardMahasiswaController::class, 'index'])->middleware('auth') ->name('dashboardMahasiswa');

Route::get('/dashboardPembimbingAkademik', [DashboardPembimbingAkademikController::class, 'index'])->middleware('auth')->name('dashboardPembimbingAkademik');

Route::get('/dashboardBagianAkademik', [DashboardBagianAkademikController::class, 'index'])->middleware('auth')->name('dashboardBagianAkademik');

Route::get('/dashboardDekan', [DashboardDekanController::class, 'index'])->middleware('auth')->name('dashboardDekan');

//KAPRODI
Route::get('/dashboardKaprodi', [DashboardKaprodiController::class, 'index'])->middleware('auth')->name('dashboardKaprodi');

Route::get('/penyusunanjadwal', [PenyusunanJadwalController::class, 'index'])->middleware('auth')->name('Penyusunanjadwal');

Route::post('/penyusunan-jadwal/store', [PenyusunanJadwalController::class, 'store'])->name('penyusunan-jadwal.store');

Route::get('/jadwalpengisianIRS', [JadwalPengisianIRSController::class, 'index'])->middleware('auth')->name('jadwalpengisianIRS');

Route::patch('/jadwal-pengisian/{id}', [JadwalPengisianIRSController::class, 'update']);

Route::get('/resetpassword', function () {
    return view('resetpassword');

})->name('resetpassword');

Route::get('/profile', function () {
    return view('profile');

})->name('profile');

Route::get('/pembagiankelas', [pembagiankelas::class, 'index'])->middleware('auth')->name('pembagiankelas');

Route::get('/pembagiankelasInfo', [pembagiankelasInfo::class, 'index'])->middleware('auth')->name('pembagiankelasInfo');
Route::post('/simpan-ruangan', [pembagiankelasInfo::class, 'simpanRuangan'])->name('simpan.ruangan');
Route::get('/perwalian', [perwalian::class, 'index'])->middleware('auth')->name('perwalian');

Route::get('/inputnilai', [inputnilai::class, 'index'])->middleware('auth')->name('inputnilai');

Route::get('/inputnilaiInfo', [inputnilaiInfo::class, 'index'])->middleware('auth')->name('inputnilaiInfo');

Route::get('/jadwalmengajar', [jadwalmengajar::class, 'index'])->middleware('auth')->name('jadwalmengajar');

Route::get('/verifikasiIRS', [verifikasiIRS::class, 'index'])->middleware('auth')->name('verifikasiIRS');
Route::post('/verifikasiIRS/approve', [verifikasiIRS::class, 'approveIRS'])->name('verifikasiIRS.approve');

Route::post('/verifikasi-irs/setujui', [verifikasiIRS::class, 'setujuiIRS'])->name('verifikasi-irs.setujui');
Route::post('/verifikasi-irs/tolak', [verifikasiIRS::class, 'tolakIRS'])->name('verifikasi-irs.tolak');
Route::post('/verifikasi-irs/batal', [verifikasiIRS::class, 'batalkanIRS'])->name('verifikasi-irs.batal');


Route::get('/verifikasijadwal', [verifikasijadwal::class, 'index'])->middleware('auth')->name('verifikasijadwal');

Route::get('/verifikasiRuangKuliah', [verifikasiRuangKuliah::class, 'index'])->middleware('auth')->name('verifikasiRuangKuliah');
Route::post('/verifikasi-ruang/{prodi}', [verifikasiRuangKuliah::class, 'verifikasi'])->name('verifikasi.ruang');
Route::post('/tolak-ruang/{prodi}', [verifikasiRuangKuliah::class, 'tolak'])->name('tolak.ruang');
Route::get('/search-mata-kuliah', [PengisianIRS::class, 'searchMataKuliah'])->name('search.mata_kuliah');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');


//Theme Dark Light
Route::get('/', [ThemeController::class,'readCookie']);

Route::post('/cookie/create/update',[ThemeController::class,'createAndUpdate'])->name('create-update'); 

