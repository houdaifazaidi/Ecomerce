<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article as Produit;
use App\Http\Requests\AddProductRequest;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class RProduitController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Produit::paginate(50);
        return view('gestionproduits', ['products' => $products]);
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
        $product = Produit::findOrFail($id);
        return view('showproduit', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {    
        $product = Produit::findOrFail($id);
        return view('editproduit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Produit::findOrFail($id);
        
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'categorie' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'solde' => 'nullable|integer|min:0|max:100',
        ]);

        try {
            if ($request->hasFile('image')) {
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
            }

            $product->update($validated);
            return redirect('/')->with('success', 'Produit mis à jour avec succès.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erreur lors de la mise à jour: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Produit::findOrFail($id);
            $product->delete();
            return redirect('/')->with('success', 'Produit supprimé avec succès.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erreur lors de la suppression: ' . $e->getMessage()]);
        }
    }
    public function email()
    {
        return view('email');
    } 
    public function sendEmail(Request $request)
    {
        $data = [
        'recipient_email' => $request->input('recipient_email'),
        'subject' => $request->input('subject'),
        'message' => $request->input('message'),
        ];
        // Envoyer l'e-mail en utilisant la classe Mailable
        Mail::to($data['recipient_email'])->send(new TestMail($data));
        return back()->with('success','Email sent successfully!');
    }
}
