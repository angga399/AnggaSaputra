<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('index');
});

// Route untuk tamu (belum login)
Route::middleware("guest")->group(function(){
    // Autentikasi
    Route::get("/login", [AuthController::class, "Loginform"])->name("login");
    Route::post("/login", [AuthController::class, "login"]);
    
    // Registrasi
    Route::get("register", [AuthController::class, "registrasiForm"])->name("register");
    Route::post("/register", [AuthController::class, "register"]);

    // Reset Password
    Route::get('/forgot-password', [AuthController::class, 'ForgotPassword'])
         ->name('password.request');
         
    Route::post('/forgot-password', [AuthController::class, 'resetLinkEmail'])
         ->name('password.email');
         
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])
         ->name('password.reset');
         
    Route::post('/reset-password', [AuthController::class, 'reset'])
         ->name('password.update'); // Nama standar Laravel
});

// Route untuk user yang sudah login
Route::middleware("auth")->group(function(){
    // Logout
    Route::post("/logout", [AuthController::class, "logout"])->name('logout');
    
    // Profile
    Route::prefix('profile')->group(function(){
        Route::get('/', [ProfileController::class, 'show'])->name('profile');
        Route::post('/update-password', [ProfileController::class, 'updatePassword'])
             ->name('profile.password.update');
    });
});
