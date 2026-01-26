<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuTamuController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (TANPA LOGIN)
|--------------------------------------------------------------------------
*/

// ROOT ➜ LANGSUNG KE LOGIN
Route::get('/', function () {
    return redirect()->route('login');
});

// LOGIN
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.process');

// TAMU PUBLIK / SELF CHECK-IN
// Bisa diakses siapa saja tanpa login, biasanya di tablet, QR code, atau PC depan
Route::get('/buku-tamu', [BukuTamuController::class, 'create']);
Route::post('/buku-tamu', [BukuTamuController::class, 'store']);

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ABOUT
    Route::get('/about', [TamuController::class, 'about'])->name('about');

    // SETTINGS
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

    // FORM
    Route::get('/form', [TamuController::class, 'create'])->name('form');

    // DATA TAMU
    Route::get('/data-tamu', [TamuController::class, 'index'])->name('data-tamu');

    // CETAK
    Route::get('/tamu/cetak', [TamuController::class, 'cetakTamu'])->name('cetak-tamu');

    // CRUD TAMU
    Route::resource('tamu', TamuController::class);
});
