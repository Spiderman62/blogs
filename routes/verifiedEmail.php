<?php

use App\Http\Controllers\SendEmailController;
use Illuminate\Support\Facades\Route;
Route::middleware(['guest'])->group(function () {
    Route::get('/email/verify',[SendEmailController::class,'notice'])->name('verification.notice');
    Route::get('/email-verify/{id}/{expiration}',[SendEmailController::class,'handler'])->name('verification.verify');
    Route::post('/email/verification-notification', [SendEmailController::class,'resend'])->middleware(['throttle:6,1'])->name('verification.send');
});
