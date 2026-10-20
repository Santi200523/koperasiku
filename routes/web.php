<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\AngsuranController;

Route::get('/', function () {
    return redirect()->route('anggota.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('anggota.index');
    })->name('dashboard');

    Route::resource('anggota', AnggotaController::class);
    Route::resource('users', UserController::class);
    Route::resource('simpanan', SimpananController::class);
    Route::resource('pinjaman', PinjamanController::class);
    Route::resource('angsuran', AngsuranController::class);
});

require __DIR__.'/auth.php';
