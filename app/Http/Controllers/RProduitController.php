<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article as Produit;
use App\Http\Requests\AddProductRequest;
use Cloudinary\Cloudinary;

class RProduitController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addproduit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductRequest $request)
    {
        $validated = $request->validated();

        // Check if image file exists
        if (!$request->hasFile('image')) {
            return back()->withErrors(['image' => 'Image file is required.']);
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
                [
                    'folder' => 'produits',
                ]
            );

            $imageUrl = $result['secure_url'];

            // Save to DB using validated data
            $validated['image'] = $imageUrl;
            Produit::create($validated);

            // Redirect with success
            return back()->with('success', 'Vous avez ajouté un nouveau produit avec succès.');
        } catch (\Exception $e) {
            return back()->withErrors(['image' => 'Error uploading image: ' . $e->getMessage()]);
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
}
