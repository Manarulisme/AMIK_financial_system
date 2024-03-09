<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HutangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PiutangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RekeningBankController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Jika belum login
Route::middleware(['guest'])->group(function () {
    Route::get('/asup', [LoginController::class, 'index'])->name('login');
    Route::post('/asup', [LoginController::class, 'login']);
    Route::get('/daftaruser', [RegisterController::class, 'create'])->name('register');
    Route::post('/daftaruser', [RegisterController::class, 'store']);
});

//Jika sudah login dan melakukan akses ke "/login"
Route::get('/home', function () {
    return redirect('/dashboard');
});

//Jika sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::resource('/dashboard', DashboardController::class);
    Route::resource('dashboard/kategori', KategoriController::class);
    Route::resource('dashboard/rekeningbank', RekeningBankController::class);
    Route::resource('dashboard/datapengguna', UserController::class);
    Route::resource('dashboard/pemasukan', PemasukanController::class);
    Route::resource('dashboard/pengeluaran', PengeluaranController::class);
    Route::resource('dashboard/hutang', HutangController::class);
    Route::resource('dashboard/piutang', PiutangController::class);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard/datapengguna/{user_id}/update', [UserController::class, 'edit']);
    Route::get('/dashboard/laporan',[LaporanController::class,'index']);
    Route::get('/dashboard/laporan/cetak_pemasukan',[LaporanController::class,'cetakPemasukan'])->name('cetak_pemasukan');
    Route::get('/dashboard/laporan/cetak_pemasukan/{$tanggalAwal}/{$tanggalAkhir}', 'LaporanController@cetakPemasukanPertanggal')->name('CetakPemasukanPertanggal');
    Route::get('/dashboard/laporan/cetak_pemasukan/print', [LaporanController::class, 'CobaCetak'])->name('CobaCetak');
});
