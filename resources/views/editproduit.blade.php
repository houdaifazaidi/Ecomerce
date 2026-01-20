@extends('Master_page')

@section('title', 'Modifier le produit: ' . $product->nom)

@section('content')
    <section class="edit-product">
        <style>
            .edit-product {
                background: #ffffff;
                padding: 50px;
                border-radius: 12px;
                box-shadow: 0 4px 15px rgba(0,0,0,0.06);
                max-width: 600px;
                margin: 0 auto;
            }

            .edit-product h1 {
                color: #001f3f;
                margin-bottom: 30px;
                font-size: 28px;
            }

            .back-link {
                display: inline-block;
                margin-bottom: 20px;
                color: #001f3f;
                text-decoration: none;
                font-weight: 500;
            }

            .back-link:hover {
                text-decoration: underline;
            }

            .form-group {
                margin-bottom: 20px;
            }

            label {
                display: block;
                color: #001f3f;
                font-weight: 600;
                margin-bottom: 8px;
            }

            input, textarea, select {
                width: 100%;
                padding: 10px;
                border: 1px solid #e0e6ed;
                border-radius: 6px;
                font-size: 14px;
                box-sizing: border-box;
            }

            textarea {
                resize: vertical;
                min-height: 120px;
            }

            input:focus, textarea:focus, select:focus {
                outline: none;
                border-color: #001f3f;
                box-shadow: 0 0 0 3px rgba(0, 31, 63, 0.1);
            }

            .current-image {
                margin-top: 10px;
                max-width: 200px;
                border-radius: 6px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            }

            .form-actions {
                display: flex;
                gap: 10px;
                margin-top: 30px;
            }

            .btn {
                padding: 12px 25px;
                border: none;
                border-radius: 6px;
                text-decoration: none;
                cursor: pointer;
                font-size: 15px;
                font-weight: 600;
                transition: all 0.3s;
                flex: 1;
                text-align: center;
            }

            .btn-submit {
                background-color: #001f3f;
                color: white;
            }

            .btn-submit:hover {
                background-color: #003d66;
            }

            .btn-cancel {
                background-color: #6c757d;
                color: white;
                text-decoration: none;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .btn-cancel:hover {
                background-color: #5a6268;
            }

            .error {
                color: #dc3545;
                font-size: 13px;
                margin-top: 5px;
            }

            .alert {
                padding: 12px;
                border-radius: 6px;
                margin-bottom: 20px;
            }

            .alert-success {
                background-color: #d4edda;
                color: #155724;
                border: 1px solid #c3e6cb;
            }

            .alert-error {
                background-color: #f8d7da;
                color: #721c24;
                border: 1px solid #f5c6cb;
            }
        </style>

        <a href="{{ route('articles.show', $product->id) }}" class="back-link">← Retour</a>

        <h1>Modifier le produit: {{ $product->nom }}</h1>

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Erreurs détectées:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nom">Nom du produit</label>
                <input 
                    type="text" 
                    id="nom" 
                    name="nom" 
                    value="{{ old('nom', $product->nom) }}" 
                    required
                    placeholder="Ex: Stylo bleu"
                >
                @error('nom')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea 
                    id="description" 
                    name="description"
                    placeholder="Détails du produit..."
                >{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="prix">Prix (DH)</label>
                <input 
                    type="number" 
                    id="prix" 
                    name="prix" 
                    value="{{ old('prix', $product->prix) }}" 
                    required
                    step="0.01"
                    min="0"
                    placeholder="Ex: 99.99"
                >
                @error('prix')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="categorie">Catégorie</label>
                <select id="categorie" name="categorie" required>
                    <option value="">Sélectionnez une catégorie</option>
                    <option value="fournitures" {{ old('categorie', $product->categorie) === 'fournitures' ? 'selected' : '' }}>
                        Fournitures
                    </option>
                    <option value="mobilier" {{ old('categorie', $product->categorie) === 'mobilier' ? 'selected' : '' }}>
                        Mobilier
                    </option>
                </select>
                @error('categorie')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="solde">Solde (%)</label>
                <input 
                    type="number" 
                    id="solde" 
                    name="solde" 
                    value="{{ old('solde', $product->solde) }}" 
                    min="0"
                    max="100"
                    placeholder="Ex: 15"
                >
                @error('solde')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image du produit</label>
                @if ($product->image)
                    <p style="font-size: 13px; color: #666; margin-bottom: 10px;">Image actuelle:</p>
                    <img src="{{ $product->image }}" alt="{{ $product->nom }}" class="current-image">
                @endif
                <input 
                    type="file" 
                    id="image" 
                    name="image" 
                    accept="image/*"
                    placeholder="Sélectionnez une image (optionnel)"
                >
                <small style="color: #666; display: block; margin-top: 5px;">Formats acceptés: JPEG, PNG, JPG, GIF. Taille max: 2MB</small>
                @error('image')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">Mettre à jour</button>
                <a href="{{ route('articles.show', $product->id) }}" class="btn btn-cancel">Annuler</a>
            </div>
        </form>
    </section>
@endsection