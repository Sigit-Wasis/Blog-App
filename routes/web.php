<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriBlogController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;

Auth::routes();

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/show/{slug}', [BerandaController::class, 'show'])->name('beranda.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/destroy/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

    Route::get('/kategori', [KategoriBlogController::class, 'index'])->name('kategori_blog.index');
    Route::get('/kategori/create', [KategoriBlogController::class, 'create'])->name('kategori_blog.create');
    Route::post('/kategori/store', [KategoriBlogController::class, 'store'])->name('kategori_blog.store');
    Route::get('/kategori/edit/{id}', [KategoriBlogController::class, 'edit'])->name('kategori_blog.edit');
    Route::post('/kategori/update/{id}', [KategoriBlogController::class, 'update'])->name('kategori_blog.update');
    Route::delete('/kategori/destroy/{id}', [KategoriBlogController::class, 'destroy'])->name('kategori_blog.destroy');
});
