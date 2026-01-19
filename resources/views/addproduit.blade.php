@extends('Master_page')
@section('title','Ajouter un produit')

@section('content')

<style>
    .form-container {
        background: #ffffff;
        padding: 50px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        max-width: 600px;
        margin: 0 auto;
    }

    .form-container h1 {
        font-size: 32px;
        margin-bottom: 30px;
        color: #001f3f;
        text-align: center;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #001f3f;
        font-weight: 500;
    }

    .form-control,
    .form-control-file {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #e0e6ed;
        border-radius: 6px;
        font-size: 1rem;
        font-family: inherit;
        transition: border-color 0.3s;
    }

    .form-control:focus,
    .form-control-file:focus {
        outline: none;
        border-color: #001f3f;
        box-shadow: 0 0 0 3px rgba(0, 31, 63, 0.1);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        display: block;
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 6px;
    }

    .file-input-wrapper {
        position: relative;
    }

    .file-input-wrapper input[type="file"] {
        display: none;
    }

    .file-input-label {
        display: block;
        width: 100%;
        padding: 15px;
        background-color: #f8f9fa;
        border: 2px dashed #e0e6ed;
        border-radius: 6px;
        text-align: center;
        cursor: pointer;
        color: #666;
        transition: border-color 0.3s, background-color 0.3s;
    }

    .file-input-label:hover {
        border-color: #001f3f;
        background-color: #f0f4f9;
    }

    .file-name-display {
        margin-top: 8px;
        font-size: 0.9rem;
        color: #666;
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        background-color: #001f3f;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-submit:hover {
        background-color: #7a8fa0;
    }

    .flash-message {
        margin-bottom: 30px;
    }
</style>

<div class="form-container">
    <h1>{{ __('Ajouter un nouveau produit') }}</h1>

    <div class="flash-message">
        @include('incs.flash')
    </div>

    <form method="POST" action="/articles" enctype="multipart/form-data" novalidate>
        @csrf

        <div class="form-group">
            <label for="nom">{{ __('Nom du produit') }}</label>
            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" placeholder="Ex: Chaise de bureau">
            @error('nom')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="prix">{{ __('Prix') }}</label>
            <input id="prix" type="number" step="0.01" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') }}" placeholder="0.00">
            @error('prix')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="categorie">{{ __('Catégorie') }}</label>
            <select id="categorie" class="form-control @error('categorie') is-invalid @enderror" name="categorie">
                <option value="">{{ __('Sélectionnez une catégorie') }}</option>
                <option value="fournitures" {{ old('categorie') == 'fournitures' ? 'selected' : '' }}>
                    {{ __('Fournitures') }}
                </option>
                <option value="mobilier" {{ old('categorie') == 'mobilier' ? 'selected' : '' }}>
                    {{ __('Mobilier') }}
                </option>
            </select>
            @error('categorie')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">{{ __('Image') }}</label>
            <div class="file-input-wrapper">
                <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" accept="image/*">
                <label for="image" class="file-input-label">
                    Cliquez pour sélectionner une image
                </label>
                <div class="file-name-display" id="fileName"></div>
            </div>
            @error('image')
                <span class="invalid-feedback d-block">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn-submit">
            {{ __('Ajouter le produit') }}
        </button>
    </form>
</div>

<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name;
        const display = document.getElementById('fileName');
        if (fileName) {
            display.textContent = '✓ ' + fileName;
            display.style.color = '#28a745';
        } else {
            display.textContent = '';
        }
    });
</script>

@endsection
