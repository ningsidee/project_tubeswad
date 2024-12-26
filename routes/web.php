<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchedulingController;

// Redirect root to dashboard
Route::get('/', function () {
    // return redirect()->route('dashboard');
    return view('welcome');
});

// Dashboard route
Route::get('/dashboard', function () {
    $nav = 'Dashboard';
    return view('dashboard', compact('nav'));
})->name('dashboard');

// Scheduling routes
Route::resource('schedulings', SchedulingController::class)->middleware('auth');


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// Add additional routes below as needed

// Authentication routes (if not using Breeze, Jetstream, etc.)
require __DIR__ . '/auth.php';