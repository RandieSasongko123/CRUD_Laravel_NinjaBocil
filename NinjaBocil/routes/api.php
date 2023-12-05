<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TailedController;
use App\Http\Controllers\KarakterController;
use App\Http\Controllers\AuthenticationController;


// Skill Route API
Route::get('/skills', [SkillController::class, 'index']);
// Route::post('/skills', [SkillController::class, 'store']);
// Route::delete('/skills/{id}', [SkillController::class, 'destroy']);


// Karakter Route API
Route::get('/karakters', [KarakterController::class, 'index']);
// Route::post('/karakters', [KarakterController::class, 'store']);
// Route::delete('/karakters/{id}', [KarakterController::class, 'destroy']);


// Tailed Route API
Route::get('/taileds', [TailedController::class, 'index']);
// Route::post('/taileds', [TailedController::class, 'store']);
// Route::get('/taileds/{id}', [TailedController::class, 'destroy']);

// User Route API
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/me', [AuthenticationController::class, 'me']);

    // Menuju untuk membuat atau create data
    Route::post('/skills', [SkillController::class, 'store']);
    Route::post('/karakters', [KarakterController::class, 'store']);
    Route::post('/taileds', [TailedController::class, 'store']);

    // Menuju untuk menghapus data secara softdelete
    Route::delete('/skills/{id}', [SkillController::class, 'destroy']);
    Route::delete('/karakters/{id}', [KarakterController::class, 'destroy']);
    Route::delete('/taileds/{id}', [TailedController::class, 'destroy']);
});
