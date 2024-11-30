<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ForgotPasswordController;
Route::inertia('/', 'Home')->name('home');
Route::inertia('/about', 'About');
Route::inertia('/contact', 'Contact');

Route::get('/category/{id}', [BlogController::class, 'category'])->name('category');
Route::get('/blog-detail/{blog}', [BlogController::class, 'blogDetail'])->name('blogDetail');

Route::middleware('auth')->group(function () {
    //    Logout
    Route::post('/logout', [AuthController::class, 'logout']);

});
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/admin.php';
require_once __DIR__ . '/profile.php';
