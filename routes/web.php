<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgamasController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\KksController;
use App\Http\Controllers\HubungankksController;
use App\Http\Controllers\PenduduksController;
use App\Http\Controllers\AnggotakksController;
use App\Http\Controllers\WebController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




// routes/web.php
Route::get('/register', [WebController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [WebController::class, 'register'])->name('register');

Route::get('/', [WebController::class, 'showLoginForm'])->name('login.form');
Route::post('/', [WebController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/beranda', [BerandaController::class, 'mainIndex'])->name('main.index');
Route::get('/detail-master', [DetailController::class, 'detailMaster'])->name('detail.master');
Route::get('/detail-transaksi', [DetailController::class, 'detailTransaksi'])->name('detail.transaksi');

Route::get('/agamas', [AgamasController::class, 'index'])->name('agamas.index');
Route::get('/agamas/create', [AgamasController::class, 'create'])->name('agamas.create'); // Tambahkan rute create di sini
Route::post('/agamas', [AgamasController::class, 'store'])->name('agamas.store');
Route::get('/agamas/{id}', [AgamasController::class, 'show'])->name('agamas.show');
Route::get('/agamas/{id}/edit', [AgamasController::class, 'edit'])->name('agamas.edit');
Route::put('/agamas/{id}', [AgamasController::class, 'update'])->name('agamas.update');
Route::delete('/agamas/{id}', [AgamasController::class, 'destroy'])->name('agamas.destroy');


Route::get('/kks', [KksController::class, 'index'])->name('kks.index');
Route::get('/kks/create', [KksController::class, 'create'])->name('kks.create');
Route::post('/kks', [KksController::class, 'store'])->name('kks.store');
Route::get('/kks/{id}', [KksController::class, 'show'])->name('kks.show');
Route::get('/kks/{id}/edit', [KksController::class, 'edit'])->name('kks.edit');
Route::put('/kks/{id}', [KksController::class, 'update'])->name('kks.update');
Route::delete('/kks/{id}', [KksController::class, 'destroy'])->name('kks.destroy');


Route::get('/hubungankks', [HubungankksController::class, 'index'])->name('hubungankks.index');
Route::get('/hubungankks/create', [HubungankksController::class, 'create'])->name('hubungankks.create');
Route::post('/hubungankks', [HubungankksController::class, 'store'])->name('hubungankks.store');
Route::get('/hubungankks/{id}', [HubungankksController::class, 'show'])->name('hubungankks.show');
Route::get('/hubungankks/{id}/edit', [HubungankksController::class, 'edit'])->name('hubungankks.edit');
Route::put('/hubungankks/{id}', [HubungankksController::class, 'update'])->name('hubungankks.update');
Route::delete('/hubungankks/{id}', [HubungankksController::class, 'destroy'])->name('hubungankks.destroy');

Route::get('/penduduks', [PenduduksController::class, 'index'])->name('penduduks.index');
Route::get('/penduduks/create', [PenduduksController::class, 'create'])->name('penduduks.create');
Route::post('/penduduks', [PenduduksController::class, 'store'])->name('penduduks.store');
Route::get('/penduduks/{id}', [PenduduksController::class, 'show'])->name('penduduks.show');
Route::get('/penduduks/{id}/edit', [PenduduksController::class, 'edit'])->name('penduduks.edit');
Route::put('/penduduks/{id}', [PenduduksController::class, 'update'])->name('penduduks.update');
Route::delete('/penduduks/{id}', [PenduduksController::class, 'destroy'])->name('penduduks.destroy');


// Index Page
Route::get('/anggotakks', [AnggotakksController::class, 'index'])->name('anggotakks.index');

// Create Form
Route::get('/anggotakks/create', [AnggotakksController::class, 'create'])->name('anggotakks.create');

// Store Data
Route::post('/anggotakks', [AnggotakksController::class, 'store'])->name('anggotakks.store');

// Show Data
Route::get('/anggotakks/{id}', [AnggotakksController::class, 'show'])->name('anggotakks.show');

// Edit Form
Route::get('/anggotakks/{id}/edit', [AnggotakksController::class, 'edit'])->name('anggotakks.edit');

// Update Data
Route::put('/anggotakks/{id}', [AnggotakksController::class, 'update'])->name('anggotakks.update');

// Delete Data
Route::delete('/anggotakks/{id}', [AnggotakksController::class, 'destroy'])->name('anggotakks.destroy');

    // Rute logout
 Route::get('/logout', [WebController::class, 'logout'])->name('logout');

   
});




