<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengajuanSertifikatController;
use App\Http\Controllers\KelayakanUsahaController;
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

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/event', [AdminController::class, 'event'])->name('admin.event');
Route::post('/event', [AdminController::class, 'store'])->name('event.store');
Route::put('/event/update/{id_event}', [AdminController::class, 'update'])->name('event.update');
Route::delete('/event/{id_event}', [AdminController::class, 'destroy'])->name('event.delete');
Route::get('/event/{id_event}', [AdminController::class, 'show'])->name('event.show');
Route::get('/halal', [PengajuanSertifikatController::class, 'halal'])->name('halal');
Route::get('/koki', [PengajuanSertifikatController::class, 'koki'])->name('koki');
Route::get('/asisten-koki', [PengajuanSertifikatController::class, 'asisten'])->name('asisten');

// Rute untuk halaman anggota
Route::get('/anggota/dashboard', function () {
    return view('anggota.dashboard-anggota'); // Halaman dashboard anggota
})->name('dashboard-anggota');

Route::get('/pengajuanSertifikat', [AnggotaController::class, 'pengajuan'])->name('pengajuan');
// Route::get('/ajukan-sertifikat-halal', [PengajuanSertifikatController::class, 'create'])->name('pengajuan.sertifikat-halal.create');
Route::post('/ajukan-sertifikat-halal', [PengajuanSertifikatController::class, 'storeHalal']);
Route::get('/ajukan-sertifikat-halal', [PengajuanSertifikatController::class, 'create'])->name('anggota.pengajuanSertifikat');
Route::post('/ajukan-sertifikat-koki', [PengajuanSertifikatController::class, 'storeKoki']);
Route::get('/ajukan-sertifikat-koki', [PengajuanSertifikatController::class, 'createKoki'])->name('anggota.pengajuanSertifikat');
Route::post('/ajukan-sertifikat-asisten-koki', [PengajuanSertifikatController::class, 'storeAsisten']);
Route::get('/ajukan-sertifikat-asisten-koki', [PengajuanSertifikatController::class, 'createAsisten'])->name('anggota.pengajuanSertifikat');
// Route::post('/ajukan-sertifikat-halal', [PengajuanSertifikatController::class, 'storeHalal'])->name('pengajuan.sertifikat-halal.store');
Route::get('/dashboard-anggota', [AnggotaController::class, 'dashboard'])->name('dashboard');
Route::get('/event-anggota', [AnggotaController::class, 'event'])->name('event');
Route::get('/riwayat-event', [AnggotaController::class, 'riwayat'])->name('riwayat');
Route::get('/kelayakan-usaha', [AnggotaController::class, 'kelayakanUsaha'])->name('kelayakanUsaha');
Route::post('/ajukan-kelayakan-finansial', [KelayakanUsahaController::class, 'storeFinansial']);
Route::post('/ajukan-kelayakan-operasional', [KelayakanUsahaController::class, 'storeOperasional']);
Route::post('/ajukan-kelayakan-pemasaran', [KelayakanUsahaController::class, 'storePemasaran']);
Route::get('/profile-user', [ProfileController::class, 'profile'])->name('profile');
// Route::get('/profile-edit', [ProfileController::class, 'editProfile'])->name('profile.edit');
// Route::get('/profile/password', [ProfileController::class, 'editPassword'])->name('profile.password');
// Route::post('/profile/edit', [ProfileController::class, 'updateProfile'])->name('profile.update');
// Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



// require __DIR__ . '/auth.php';
