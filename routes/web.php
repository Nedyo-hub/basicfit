<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {
   
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
    
    Route::post('/admin/user/create', [AdminController::class, 'createUser'])->name('admin.user.create');

    
    Route::patch('/admin/user/promote/{id}', [AdminController::class, 'promoteUser'])->name('admin.user.promote');

    
    Route::patch('/admin/user/demote/{id}', [AdminController::class, 'demoteUser'])->name('admin.user.demote');
});

// Publieke profielpagina 
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

// Profielpagina bewerken (alleen voor ingelogde gebruikers)
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});


require __DIR__.'/auth.php';
