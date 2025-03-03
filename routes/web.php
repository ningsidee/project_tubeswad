<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndikatorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AktivitasHarianController;
use App\Http\Controllers\PolaMakanController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\SchedulingController;
use App\Http\Controllers\ArtikelController;

Route::get('/', function () {
    // return redirect()->route('dashboard');
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::resource('schedulings', SchedulingController::class)->middleware('auth');

    Route::resource('communities', CommunityController::class)->middleware('auth');
    Route::post('communities/{community}/join', [CommunityController::class, 'join'])->name('communities.join');
    Route::delete('communities/{community}/leave', [CommunityController::class, 'leave'])->name('communities.leave');

    Route::resource('communities.threads', ThreadController::class);
    Route::resource('indikator-kesehatan', IndikatorController::class);
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('artikel', ArtikelController::class);
    });
    Route::get('/dashboard', [ArtikelController::class, 'dashboard'])->name('dashboard');
    // Rute untuk Aktivitas Harian menggunakan resource controller
    Route::resource('aktivitas_harian', AktivitasHarianController::class);
    // Rute untuk Pola Makan menggunakan resource controller
    Route::resource('pola_makan', PolaMakanController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route untuk otentikasi

require __DIR__ . '/auth.php';
