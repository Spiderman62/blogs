<?php
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');
Route::inertia('/about', 'About');
Route::inertia('/contact', 'Contact');
Route::get('/category/{id}', [BlogController::class, 'category'])->name('category');
Route::get('/blog-detail/{blog}', [BlogController::class, 'blogDetail'])->name('blogDetail');
