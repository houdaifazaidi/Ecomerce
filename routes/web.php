<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\RProduitController;

Route::get('/', [ProduitController::class, 'getAllProduits']);

Route::get('/produits/{cat}', [ProduitController::class,'getProdByCat']) ;

// About Page
Route::get('/a-propos', function () {
    return view('APropos');
});

// Contact Page
Route::get('/contact', function () {
    return view('Contact');
});

// User Routes (Espace Client) - Protected by User Middleware
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/espaceclient', [ProduitController::class, 'espaceclient'])->name('espaceclient');
});

// Admin Routes (Product Management) - Protected by Admin Middleware
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/articles', [RProduitController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [RProduitController::class, 'create'])->name('articles.create');
    Route::post('/articles', [RProduitController::class, 'store'])->name('articles.store');
    Route::get('/articles/{id}/edit', [RProduitController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{id}', [RProduitController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{id}', [RProduitController::class, 'destroy'])->name('articles.destroy');
});

// Product Show Route (available to all)
Route::get('/articles/{id}', [RProduitController::class, 'show'])->name('articles.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
