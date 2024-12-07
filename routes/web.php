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

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/', [AuthController::class, 'authenticate'])->name('login');

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
Route::delete('/penyusunan-jadwal/{id}', [PenyusunanJadwalController::class, 'destroy']);

// Route::post('/penyusunan-jadwal/store', [PenyusunanJadwalController::class, 'store'])->name('penyusunan-jadwal.store');
Route::post('/jadwal/tambah', [PenyusunanJadwalController::class, 'store'])->name('jadwal.store');
Route::get('/jadwalpengisianIRS', [JadwalPengisianIRSController::class, 'index'])->middleware('auth')->name('jadwalpengisianIRS');
Route::delete('/penyusunan-jadwal/{id}', [PenyusunanJadwalController::class, 'destroy']);

Route::patch('/jadwal-pengisian/{id}', [JadwalPengisianIRSController::class, 'update']);

Route::get('/resetpassword', function () {
    return view('resetpassword');

})->name('resetpassword');

Route::get('/profile', function () {
    return view('profile');

})->name('profile');



Route::get('/pembagiankelasInfo', [pembagiankelasInfo::class, 'index'])->middleware('auth')->name('pembagiankelasInfo');
Route::post('/simpan-ruangan', [pembagiankelasInfo::class, 'simpanRuangan'])->name('simpan.ruangan');
Route::post('/ruangan/store', [PembagiankelasInfo::class, 'storeRuangan'])->name('ruangan.store');
Route::get('/api/ruangans', [PembagiankelasInfo::class, 'getRuangans']);
Route::delete('/api/ruangans/{id}', [PembagiankelasInfo::class, 'deleteRuangan']);

Route::delete('/ruangan/{id}', [pembagiankelasInfo::class, 'destroy'])->name('ruangan.destroy');



Route::get('/perwalian', [perwalian::class, 'index'])->middleware('auth')->name('perwalian');
Route::get('/perwalian-to-fetch-data', [perwalian::class, 'getSortedMahasiswa']);


Route::get('/inputnilai', [inputnilai::class, 'index'])->middleware('auth')->name('inputnilai');

Route::get('/inputnilaiInfo', [inputnilaiInfo::class, 'index'])->middleware('auth')->name('inputnilaiInfo');

Route::get('/jadwalmengajar', [jadwalmengajar::class, 'index'])->middleware('auth')->name('jadwalmengajar');

Route::get('/verifikasiIRS', [verifikasiIRS::class, 'index'])->middleware('auth')->name('verifikasiIRS');
Route::post('/verifikasiIRS/approve', [verifikasiIRS::class, 'approveIRS'])->name('verifikasiIRS.approve');

Route::post('/verifikasi-irs/setujui', [verifikasiIRS::class, 'setujuiIRS'])->name('verifikasi-irs.setujui');
Route::post('/verifikasi-irs/tolak', [verifikasiIRS::class, 'tolakIRS'])->name('verifikasi-irs.tolak');
Route::post('/verifikasi-irs/batal', [verifikasiIRS::class, 'batalkanIRS'])->name('verifikasi-irs.batal');


Route::get('/verifikasijadwal', [verifikasijadwal::class, 'index'])->middleware('auth')->name('verifikasijadwal');
Route::post('/verifikasi-jadwal/{prodi}', [verifikasiJadwal::class, 'verifikasi'])->name('verifikasi.jadwal');
Route::post('/tolak-jadwal/{prodi}', [verifikasiJadwal::class, 'tolak'])->name('tolak.jadwal');


Route::get('/verifikasiRuangKuliah', [verifikasiRuangKuliah::class, 'index'])->middleware('auth')->name('verifikasiRuangKuliah');
Route::post('/verifikasi-ruang/{prodi}', [verifikasiRuangKuliah::class, 'verifikasi'])->name('verifikasi.ruang');
Route::post('/tolak-ruang/{prodi}', [verifikasiRuangKuliah::class, 'tolak'])->name('tolak.ruang');
Route::post('/batal-ruang/{prodi}', [verifikasiRuangKuliah::class, 'batal'])->name('batal.ruang');

Route::get('/search-mata-kuliah', [PengisianIRS::class, 'searchMataKuliah'])->name('search.mata_kuliah');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::post('/cookie/create/update',[ThemeController::class,'createAndUpdate'])->name('create-update'); 