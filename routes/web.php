<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('index');
});

Route::middleware("guest")->group(function(){
    Route::get("/login",[AuthController::class,"Loginform"])->name("login");
    Route::post("/login",[AuthController::class,"login"]);
    Route::get("register",[AuthController::class,"registrasiForm"]);
    Route::post("/register",[AuthController::class,"register"])->name("register");
});


Route::middleware("auth")->group(function(){
    Route::post("/logout",[AuthController::class,"logout"])->name('logout'); 
});


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('password.update');
});