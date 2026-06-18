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
    Route::get('/email', [RProduitController::class,'email'])->name('email');
});

// Product Show Route (available to all)
Route::get('/articles/{id}', [RProduitController::class, 'show'])->name('articles.show');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/send/email', [RProduitController::class, 'sendEmail'])->name('send.email');

// Cart Routes
Route::middleware(['auth'])->group(function () {
    Route::get('cart', [App\Http\Controllers\CartController::class, 'showCart'])->name('cart');
    Route::get('add-to-cart/{id}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('add_to_cart');
    Route::patch('update-cart', [App\Http\Controllers\CartController::class, 'updateCart'])->name('update_cart');
    Route::delete('remove-from-cart', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('remove_from_cart');
});

// Language Switcher Route
Route::get('/language/{locale}', [App\Http\Controllers\LanguageController::class, 'switch'])->name('language.switch');