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

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk halaman register
Route::get('/register', [RegisterController::class, 'registerShow'])->name('registerForm');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Rute untuk proses autentikasi (login)
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

// Rute untuk halaman admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard'); // Halaman dashboard admin
})->name('admin.dashboard');

// Rute untuk halaman anggota
Route::get('/anggota/dashboard', function () {
    return view('anggota.dashboard'); // Halaman dashboard anggota
})->name('anggota.dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



// require __DIR__ . '/auth.php';
