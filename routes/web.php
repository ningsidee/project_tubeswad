<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndikatorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchedulingController;

// Route halaman utama
Route::get('/', function () {
    // return redirect()->route('dashboard');
    return view('welcome');
});

// Route dashboard
Route::get('/dashboard', function () {
    $nav = 'Dashboard';
    return view('dashboard', compact('nav'));
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('schedulings', SchedulingController::class)->middleware('auth');
    Route::resource('indikator-kesehatan', IndikatorController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route untuk otentikasi
require __DIR__.'/auth.php';
