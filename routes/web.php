<?php
use App\Http\Controllers\CageController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AuthController;

Route::get('/', [CageController::class, 'index']);
Route::resource('cages', CageController::class);
Route::resource('animals', AnimalController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('animals', AnimalController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('cages', CageController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);