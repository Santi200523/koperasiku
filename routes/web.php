<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('anggota.index');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Modul Anggota
    Route::resource('anggota', AnggotaController::class);
});

// Modul Manajemen User (Khusus Admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';