<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('CheckAdmin')->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');
    // Categories
    Route::get('/admin-category', [AdminController::class, 'category'])->name('adminCategory');
    Route::get('/admin-blog', [AdminController::class, 'blog'])->name('adminBlog');

    Route::get('/admin-add-category', [AdminController::class, 'addCategory'])->name('adminAddCategory');
    Route::post('/admin-handle-add-category', [AdminController::class, 'handleAddCategory'])->name('adminHandleAddCategory');

    Route::get('/admin-edit-category/{category}', [AdminController::class, 'editCategory'])->name('adminEditCategory');
    Route::patch('/admin-handle-edit-category', [AdminController::class, 'handleEditCategory'])->name('adminHandleEditCategory');

    Route::delete('/admin-delete-category/{category}', [AdminController::class, 'deleteCategory'])->name('adminHandleDeleteCategory');

    // Blogs
    Route::get('/admin-add-blog', [AdminController::class, 'addBlog'])->name('adminAddBlog');
    Route::post('/admin-handle-add-blog', [AdminController::class, 'handleAddBlog'])->name('adminHandleAddBlog');
    Route::get('/admin-edit-blog/{blog}', [AdminController::class, 'editBlog'])->name('adminEditBlog');
    Route::post('/admin-handle-edit-blog/{blog}', [AdminController::class, 'handleEditBlog'])->name('adminHandleEditBlog');
    Route::delete('/admin-delete-blog/{blog}', [AdminController::class, 'deleteBlog'])->name('adminHandleDeleteBlog');
});
