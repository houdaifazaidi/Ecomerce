<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article as Produit;
use Cloudinary\Cloudinary;

class ProduitControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits=Produit::all();
        return response()->json($produits);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'categorie' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'description' => 'nullable|string',
        ]);

        // image exist?
        if (!$request->hasFile('image')) {
            return response()->json(['error' => 'Image file is required.'], 400);
        }

        try {
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key'    => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
            ]);

            $result = $cloudinary->uploadApi()->upload(
                $request->file('image')->getRealPath(),
                ['folder' => 'produits']
            );

            $validated['image'] = $result['secure_url'];

            $Produit = Produit::create($validated);
            return response()->json(['message' => 'produit ajouté avec succès!', 'product' => $Produit], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error uploading image: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function filtrer(Request $request)
    {
        // Récupération de la chaîne de caractères de recherche
        $query = $request->input('p');

        // Recherche des articles correspondants
        $produits = Produit::where('nom', 'like', "%$query%")->get();

        // Renvoi des articles au format JSON
        return response()->json($produits);


   }
}
