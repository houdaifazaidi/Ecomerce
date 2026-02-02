<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article as Produit;

class ProduitController extends Controller
{
    public function getProdByCat(Request $rq){


        $cat=$rq->route('cat');

        $produits = Produit::where('categorie', '=', $cat)->paginate(5);

        return view('Produits', [
        'products' => $produits,
        'categorie' => $cat
        ]);

    }
    public function getAllProduits(){
    $products = Produit::paginate(4); 
    
    return view('Home', [
        'products' => $products
    ]);
}

public function espaceclient(){
    $products = Produit::where('solde', '>', 0)->paginate(6);
    
    return view('espaceclient', [
        'products' => $products
    ]);
}
}
