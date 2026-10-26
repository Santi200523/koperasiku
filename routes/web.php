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

    Route::resource('anggota', AnggotaController::class)->parameters(['anggota' => 'anggota']);
    Route::resource('users', UserController::class);
    Route::resource('simpanan', SimpananController::class);
    Route::resource('pinjaman', PinjamanController::class);
    Route::resource('angsuran', AngsuranController::class);
});

Route::get('/profile', function () { return redirect()->route('anggota.index'); })->middleware('auth')->name('profile.edit');

require __DIR__.'/auth.php';

/* KOPERASIKU_MODUL_ROUTES */
\Illuminate\Support\Facades\Route::get('/dashboard', function () {
    return view('dashboard', [
        'totalAnggota' => \App\Models\Anggota::count(),
        'totalSimpanan' => \App\Models\Simpanan::count(),
        'totalPengguna' => \App\Models\User::count(),
    ]);
})->name('dashboard');

\Illuminate\Support\Facades\Route::resource('anggota', \App\Http\Controllers\AnggotaController::class)
    ->except(['show']);

\Illuminate\Support\Facades\Route::resource('simpanan', \App\Http\Controllers\SimpananController::class)
    ->except(['show']);
