<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
Route::middleware(['auth'])->group(function () {
    Route::post('/comment-store', [CommentController::class, 'store'])->middleware('throttle:2,1')->name('comment.store');
    Route::post('/comment-update', [CommentController::class, 'update'])->middleware('throttle:1,1')->name('comment.update');
    Route::get('/comment-delete/{comment}', [CommentController::class, 'destroy'])->name('comment.delete');
});
