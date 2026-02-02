@extends('Master_page')

@section('title', 'Gestion Produits - Admin')

@section('content')
<style>
    /* CSS Variables for easy updates */
    :root {
        --navy: #001f3f;
        --success: #28a745;
        --info: #17a2b8;
        --warning: #ffc107;
        --danger: #dc3545;
        --light-gray: #e0e6ed;
    }

    .gestion-section {
        width: 100%;
        padding: 20px 0;
    }

    .header-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
        gap: 20px;
    }

    .header-actions h1 {
        color: var(--navy);
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
    }

    .btn-add-product {
        background-color: var(--success);
        color: white;
        padding: 12px 25px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
    }

    /* Grid layout - ensures cards take equal space */
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
    }

    .product-card-admin {
        background: white;
        border: 1px solid var(--light-gray);
        border-radius: 12px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
        transition: 0.3s;
    }

    .product-card-admin:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    /* --- THE ULTIMATE IMAGE FIX --- */
    .product-img-wrapper-admin {
        position: relative; /* Needed for absolute children */
        width: 100% !important;
        padding-top: 75%; /* Forces a 4:3 Aspect Ratio */
        background-color: #f8f9fa;
        overflow: hidden;
        display: block;
    }

    .product-img-admin {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
        max-width: none !important; /* Overrides global "max-width: 100%" */
        object-fit: cover; /* Crops to fill perfectly */
        object-position: center;
        display: block;
    }
    /* ------------------------------ */

    .product-info-admin {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-category-badge {
        background: #eef2f7;
        color: var(--navy);
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 10px;
        width: fit-content;
    }

    .product-info-admin h3 {
        margin: 0 0 10px 0;
        font-size: 1.1rem;
        color: var(--navy);
    }

    .product-price {
        font-size: 1.2rem;
        font-weight: 800;
        color: var(--danger);
        margin-bottom: 5px;
    }

    .product-solde {
        font-size: 0.85rem;
        margin-bottom: 15px;
    }

    .product-solde.active {
        color: #856404;
        background: #fff3cd;
        padding: 2px 8px;
        border-radius: 4px;
        font-weight: 600;
    }

    .product-actions-admin {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
        margin-top: auto;
    }

    .btn {
        padding: 10px;
        border-radius: 6px;
        text-align: center;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        border: none;
    }

    .btn-view { background: var(--info); color: white; }
    .btn-edit { background: var(--warning); color: black; }
    .btn-delete { 
        background: var(--danger); 
        color: white; 
        grid-column: span 2; 
        margin-top: 5px;
    }

    /* Modal Styling */
    .delete-modal {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.7);
        z-index: 9999;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(2px);
    }

    .delete-modal.show { display: flex; }

    .modal-content {
        background: white;
        padding: 30px;
        border-radius: 15px;
        max-width: 400px;
        width: 90%;
        text-align: center;
    }

    .modal-actions {
        display: flex;
        gap: 10px;
        margin-top: 25px;
    }

    .modal-btn {
        flex: 1;
        padding: 12px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        border: none;
    }

    .modal-btn-cancel { background: #eee; }
    .modal-btn-confirm { background: var(--danger); color: white; }
</style>

<div class="gestion-section">
    <div class="header-actions">
        <h1>⚙️ Gestion Produits</h1>
        <a href="{{ route('articles.create') }}" class="btn-add-product">+ Nouveau</a>
    </div>

    @if ($products->count() > 0)
        <div class="products-grid">
            @foreach ($products as $product)
                <div class="product-card-admin">
                    <div class="product-img-wrapper-admin">
                        <img src="{{ $product->image }}" alt="{{ $product->nom }}" class="product-img-admin">
                    </div>
                    <div class="product-info-admin">
                        <span class="product-category-badge">{{ $product->categorie }}</span>
                        <h3>{{ $product->nom }}</h3>
                        <div class="product-price">{{ $product->prix }} DH</div>
                        
                        @if ($product->solde > 0)
                            <div class="product-solde active">-{{ $product->solde }}%</div>
                        @else
                            <div class="product-solde">Prix Standard</div>
                        @endif

                        <div class="product-actions-admin">
                            <a href="{{ route('articles.show', $product->id) }}" class="btn btn-view">Voir</a>
                            <a href="{{ route('articles.edit', $product->id) }}" class="btn btn-edit">Modifier</a>
                            <button type="button" class="btn btn-delete" onclick="openDeleteModal({{ $product->id }}, '{{ addslashes($product->nom) }}')">Supprimer</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="margin-top: 40px; display: flex; justify-content: center;">
            {{ $products->links() }}
        </div>
    @else
        <div style="text-align: center; padding: 100px 20px;">
            <h2>Aucun produit trouvé</h2>
        </div>
    @endif
</div>

<div id="deleteModal" class="delete-modal">
    <div class="modal-content">
        <h3>Confirmation</h3>
        <p>Supprimer <strong id="productName"></strong> ?</p>
        <div class="modal-actions">
            <button type="button" class="modal-btn modal-btn-cancel" onclick="closeDeleteModal()">Annuler</button>
            <form id="deleteForm" method="POST" style="flex: 1;">
                @csrf
                @method('DELETE')
                <button type="submit" class="modal-btn modal-btn-confirm" style="width: 100%;">Supprimer</button>
            </form>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(productId, productName) {
        document.getElementById('productName').textContent = productName;
        const form = document.getElementById('deleteForm');
        form.action = `/articles/${productId}`;
        document.getElementById('deleteModal').classList.add('show');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('show');
    }

    window.onclick = function(event) {
        if (event.target === document.getElementById('deleteModal')) closeDeleteModal();
    }
</script>
@endsection