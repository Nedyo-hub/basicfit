<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;


// Homepagina
Route::get('/', function () {
    return view('welcome');
});

// Dashboard voor ingelogde gebruikers
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Publieke profielpagina (toegankelijk voor iedereen)
Route::get('/profile/{user:username}', [ProfileController::class, 'show'])->name('profile.show');

// Gebruikersprofiel en bewerkingsroutes (alleen voor ingelogde gebruikers)
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes 
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/user/create', [AdminController::class, 'createUser'])->name('admin.user.create');
    Route::patch('/admin/user/promote/{id}', [AdminController::class, 'promoteUser'])->name('admin.user.promote');
    Route::patch('/admin/user/demote/{id}', [AdminController::class, 'demoteUser'])->name('admin.user.demote');
});

// Publieke routes voor nieuws
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

// Admin routes voor het beheren van het    nieuws
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::patch('/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
});


use App\Http\Controllers\FAQController;

// FAQ Routes
Route::resource('faq', FAQController::class)->except(['show']);


// Authenticatie routes
require __DIR__ . '/auth.php';


