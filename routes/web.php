<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
    Route::view('/dashboard', 'Pages.dashboard')->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});