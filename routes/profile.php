<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
Route::middleware(['auth'])->group(function () {
    Route::get('/profile',[ProfileController::class, 'create'])->name('profile');
    Route::post('/profile-image',[ProfileController::class, 'changeAvatar'])->name('profile.store');
    Route::post('/profile-username',[ProfileController::class, 'changeUsername'])->name('profile.username');
    Route::post('/profile-password',[ProfileController::class, 'changePassword'])->name('profile.password');
});
