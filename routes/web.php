<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommentController; 

// Authenticatie routes
require __DIR__ . '/auth.php';

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
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    // Admin dashboard
    Route::get('/admin/dashboard', [AdminController ::class, 'dashboard'])->name('admin.dashboard');

    // Admin gebruikersbeheer
    Route::get('/admin/users', [AdminController::class, 'dashboard'])->name('admin.users.index');
    Route::post('/admin/users/{id}/promote', [AdminController::class, 'promote'])->name('admin.user.promote');
    Route::post('/admin/users/{id}/demote', [AdminController::class, 'demote'])->name('admin.user.demote');

// Route voor het aanmaken van een nieuwe gebruiker
Route::get('/admin/users/create', [AdminController::class, 'create'])->name('admin.user.create');
Route::post('/admin/users/store', [AdminController::class, 'store'])->name('admin.user.store');

    

// Nieuwsbeheer voor Admins
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::patch('/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
});

// Publieke routes voor nieuws
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');


    // FAQ- en categoriebeheer
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('faqs', FAQController::class)->except(['show']);
});

// Publieke routes voor nieuws
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

// Publieke FAQ-pagina
Route::get('/faq', [FAQController::class, 'index'])->name('faq.index');
Route::resource('faqs', FAQController::class)->except(['show']);


// Contact routes
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');




// Reacties routes
Route::post('/comments/{news}', [CommentController::class, 'store'])->name('comments.store');
