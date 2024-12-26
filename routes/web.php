<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AktivitasHarianController;
use App\Http\Controllers\PolaMakanController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk Aktivitas Harian menggunakan resource controller
Route::resource('aktivitas_harian', AktivitasHarianController::class);

// Rute untuk Pola Makan menggunakan resource controller
Route::resource('pola_makan', PolaMakanController::class);


require __DIR__.'/auth.php';
