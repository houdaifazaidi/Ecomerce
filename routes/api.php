<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\RProduitController;
use App\Http\Controllers\Api\ProduitControllerApi;




Route::apiResource('articles', ProduitControllerApi::class);
Route::get('/filter', [ProduitControllerApi::class, 'filtrer']);