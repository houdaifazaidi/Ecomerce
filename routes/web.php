<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

Route::get('/', function () {
    return view('Home');
});


Route::get('/produits/{cat}', [ProduitController::class,'getProdByCat']) ;

// About Page
Route::get('/a-propos', function () {
    return view('APropos');
});

// Contact Page
Route::get('/contact', function () {
    return view('Contact');
});


