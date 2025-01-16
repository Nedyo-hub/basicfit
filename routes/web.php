<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommentController; 
use App\Http\Controllers\ForumController;


// Authenticatie routes

require __DIR__ . '/auth.php';

// Publieke routes
Route::group([], function () {
    // Homepagina
    Route::get('/', function () {
        return view('welcome');
    });

    // Publieke profielpagina
    Route::get('/profile/{user_id}', [ProfileController::class, 'show'])->name('profile.show');

    // Publieke routes voor nieuws
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

    // Publieke FAQ-pagina
    Route::get('/faq', [FAQController::class, 'index'])->name('faq.index');

    // Contact routes
    Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
});

// Routes voor ingelogde gebruikers
Route::middleware(['auth'])->group(function () {
    // Dashboard voor ingelogde gebruikers
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    // Gebruikersprofiel en bewerkingsroutes
    Route::get('/profile/edit/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Forum routes
    Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
    Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/{topic}', [ForumController::class, 'show'])->name('forum.show');
    Route::post('/forum/{topic}/reply', [ForumController::class, 'reply'])->name('forum.reply');
});


// Admin routesw
Route::middleware(['auth', 'admin'])->group(function () {
    // Admin dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Admin gebruikersbeheer
    Route::get('/admin/users', [AdminController::class, 'dashboard'])->name('admin.users.index');
    Route::post('/admin/users/{id}/promote', [AdminController::class, 'promote'])->name('admin.user.promote');
    Route::post('/admin/users/{id}/demote', [AdminController::class, 'demote'])->name('admin.user.demote');
    Route::get('/admin/users/create', [AdminController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/users/store', [AdminController::class, 'store'])->name('admin.user.store');

    // Nieuwsbeheer voor Admins
    Route::get('/news/create/index', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::patch('/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

    // FAQ- en categoriebeheer
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('faqs', FAQController::class)->except(['show']);
});

// Reacties routes (algemeen)
Route::post('/comments/{news}', [CommentController::class, 'store'])->name('comments.store');

// Forum routes
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/{topic}/reacties', [ForumController::class, 'show'])->name('forum.show');
