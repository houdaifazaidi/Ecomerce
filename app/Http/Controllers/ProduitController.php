<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article as Produit;

class ProduitController extends Controller
{
    public function getProdByCat(Request $rq){


        $cat=$rq->route('cat');

        $produits = Produit::where('categorie', '=', $cat)->get();

        return view('Produits', [
        'products' => $produits,
        'categorie' => $cat
        ]);

}
}
