<?php

use Illuminate\Support\Facades\Route;
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


Route::resource('articles', RProduitController::class);