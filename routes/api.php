<?php

use App\Http\Controllers\AgamasApiController;
use App\Http\Controllers\PenduduksApiController;
use App\Http\Controllers\KksApiController;
use App\Http\Controllers\AnggotakksApiController;
use App\Http\Controllers\HubungankksApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


// Register routes
Route::post('/register', [AuthController::class, 'register']);

// Login routes
Route::post('/login', [AuthController::class, 'login']);

Route::prefix('agamas')->group(function () {
    Route::get('/', [AgamasApiController::class, 'index']); 
    Route::post('/', [AgamasApiController::class, 'store']); 
    Route::get('/{id}', [AgamasApiController::class, 'show']); 
    Route::put('/{id}', [AgamasApiController::class, 'update']); 
    Route::delete('/{id}', [AgamasApiController::class, 'destroy']); 
});

Route::prefix('penduduks')->group(function () {
    Route::get('/', [PenduduksApiController::class, 'index']); 
    Route::post('/', [PenduduksApiController::class, 'store']); 
    Route::get('/{id}', [PenduduksApiController::class, 'show']); 
    Route::put('/{id}', [PenduduksApiController::class, 'update']); 
    Route::delete('/{id}', [PenduduksApiController::class, 'destroy']); 
});

Route::prefix('kks')->group(function () {
    Route::get('/', [KksApiController::class, 'index']); 
    Route::post('/', [KksApiController::class, 'store']); 
    Route::get('/{id}', [KksApiController::class, 'show']); 
    Route::put('/{id}', [KksApiController::class, 'update']); 
    Route::delete('/{id}', [KksApiController::class, 'destroy']); 
});

Route::prefix('anggotakks')->group(function () {
    Route::get('/', [AnggotakksApiController::class, 'index']); 
    Route::post('/', [AnggotakksApiController::class, 'store']); 
    Route::get('/{id}', [AnggotakksApiController::class, 'show']); 
    Route::put('/{id}', [AnggotakksApiController::class, 'update']); 
    Route::delete('/{id}', [AnggotakksApiController::class, 'destroy']); 
});

Route::prefix('hubungankks')->group(function () {
    Route::get('/', [HubungankksApiController::class, 'index']); 
    Route::post('/', [HubungankksApiController::class, 'store']); 
    Route::get('/{id}', [HubungankksApiController::class, 'show']); 
    Route::put('/{id}', [HubungankksApiController::class, 'update']); 
    Route::delete('/{id}', [HubungankksApiController::class, 'destroy']); 
});

