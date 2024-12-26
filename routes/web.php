<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndikatorController;
use Illuminate\Support\Facades\Route;

// Route halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route dashboard
Route::get('/dashboard', function () {
    $nav = 'Dashboard';
    // return view('dashboard', compact('nav'));
    return redirect()->route('indikator-kesehatan.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup route dengan middleware auth
Route::middleware('auth')->group(function () {
    // Route untuk profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Tambahkan route untuk Indikator Kesehatan
    Route::resource('indikator-kesehatan', IndikatorController::class);
});

// Route untuk otentikasi
require __DIR__.'/auth.php';
