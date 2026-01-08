<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::get('/produits/{cat}', function ($cat) {
    $produits = [];
    if ($cat == 'hicking') {
        $produits = [
            ["nom" => "Sac à dos", "prix" => 200, "image" => "photo_2026-01-08_15-44-36.jpg"],
            ["nom" => "Tente", "prix" => 300, "image" => "photo_2026-01-08_15-44-40.jpg"],
            ["nom" => "Montre GPS", "prix" => 150, "image" => "photo_2026-01-08_15-44-44.jpg"]
        ];
    } elseif ($cat == 'electromenager') {
        $produits = [
            ["nom" => "Machine à laver", "prix" => 3000, "image" => "photo_2026-01-08_15-44-29.jpg"],
            ["nom" => "Four", "prix" => 1500, "image" => "photo_2026-01-08_15-43-47.jpg"],
            ["nom" => "Micro-onde", "prix" => 1000, "image" => "photo_2026-01-08_15-44-32.jpg"]
        ];
    }
    return view('Produits', [
        'products' => $produits,
        'categorie' => $cat
    ]);
});


