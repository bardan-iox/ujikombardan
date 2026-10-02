<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfileController::class, 'index'])->name('profil');

Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
Route::get('/program/{program:slug}', [ProgramController::class, 'show'])->name('program.show');

Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{article:slug}', [ArticleController::class, 'show'])->name('artikel.show');

Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri.index');
Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');

Route::get('/kontak', [ContactController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store');

/*
|--------------------------------------------------------------------------
| ADMIN AUTH (guest)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.attempt');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| ADMIN PANEL (protected by "admin" middleware)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('programs', AdminProgramController::class)->except('show');
    Route::resource('articles', AdminArticleController::class)->except('show');

    Route::resource('gallery', AdminGalleryController::class)->only(['index', 'create', 'store', 'destroy']);

    Route::resource('products', AdminProductController::class)->except('show');

    Route::get('/messages', [ContactMessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{contactMessage}', [ContactMessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{contactMessage}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');
});
