<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });


Route::get('/', [LandingPageController::class, 'landingPage']); // Rute landing page

// Rute untuk halaman login
Route::get('/loginForm', [LoginController::class, 'login'])->name('loginForm');

// Rute untuk halaman register
Route::get('/registerForm', [RegisterController::class, 'register'])->name('registerForm');

// Rute untuk proses autentikasi (login)
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

// Rute untuk dashboard, hanya bisa diakses oleh yang sudah login
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



require __DIR__.'/auth.php';
