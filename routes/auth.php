<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
//    Login
    Route::get('/login',[AuthController::class,'createLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
//    Register
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

//    Forgot the password
    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'handler'])->name('password.update');

    // Send email to verified


});
Route::middleware('auth')->group(function () {
    //    Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});
