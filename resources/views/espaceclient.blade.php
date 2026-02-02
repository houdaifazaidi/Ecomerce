@extends('Master_page')

@section('title', 'Espace Client - Produits en Solde')

@section('content')
<style>
    :root {
        --navy: #001f3f;
        --success: #28a745;
        --danger: #dc3545;
        --border: #e0e6ed;
    }

    .espaceclient-section {
        width: 100%;
        padding: 20px 0;
    }

    .espaceclient-section h1 {
        color: var(--navy);
        margin-bottom: 10px;
        font-size: 2rem;
        font-weight: 700;
    }

    .section-subtitle {
        color: #666;
        font-size: 1rem;
        margin-bottom: 40px;
    }

    /* Grid layout */
    .products-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 30px;
        margin-top: 20px;
    }

    .product-card {
        background: #ffffff;
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        height: 100%;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0,31,63,0.15);
        border-color: var(--navy);
    }

    /* --- THE SAME IMAGE FIX --- */
    .product-card-wrapper {
        position: relative;
        width: 100% !important;
        padding-top: 80%; /* Consistent aspect ratio */
        overflow: hidden;
        background: #f8f9fa;
        display: block;
    }

    .product-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
        max-width: none !important;
        object-fit: cover;
        object-position: center;
        display: block;
    }

    /* Ensure Ribbon stays on top of absolute image */
    .discount-ribbon {
        position: absolute;
        top: 10px;
        right: 10px;
        background: linear-gradient(135deg, #dc3545, #c82333);
        color: white;
        padding: 6px 15px;
        border-radius: 50px;
        font-weight: 800;
        font-size: 14px;
        box-shadow: 0 4px 10px rgba(220, 53, 69, 0.4);
        z-index: 5;
    }

    .product-info {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .product-info h3 {
        margin: 0 0 10px 0;
        color: var(--navy);
        font-size: 1.1rem;
        font-weight: 700;
    }

    .product-info p {
        margin: 0 0 15px 0;
        color: #666;
        font-size: 0.9rem;
        flex: 1;
        line-height: 1.5;
    }

    .product-price-section {
        margin-top: auto;
        padding-top: 15px;
        border-top: 1px solid #f0f0f0;
    }

    .product-price {
        color: var(--navy);
        font-size: 1.25rem;
        font-weight: 800;
    }

    .original-price {
        color: #999;
        font-size: 0.9rem;
        text-decoration: line-through;
        margin-left: 8px;
    }

    .discount-savings {
        color: var(--success);
        font-size: 0.8rem;
        font-weight: 600;
        margin-top: 5px;
    }

    .btn-view {
        background-color: var(--navy);
        color: white;
        width: 100%;
        margin-top: 15px;
        padding: 12px;
        border-radius: 8px;
        text-align: center;
        text-decoration: none;
        font-weight: 700;
        display: block;
        transition: 0.3s;
    }

    .btn-view:hover {
        background-color: #003366;
        transform: scale(1.02);
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 50px;
    }

    /* Mobile adjustments */
    @media (max-width: 768px) {
        .products-container {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
        }
    }
</style>

<div class="espaceclient-section">
    <h1>🎁 Produits en Solde</h1>
    <p class="section-subtitle">Découvrez nos meilleures offres avec jusqu'à {{ $products->max('solde') ?? 0 }}% de réduction</p>

    @if (count($products) === 0)
        <div style="text-align: center; padding: 100px 20px; background: #f8f9fa; border-radius: 15px;">
            <h2>Aucun produit en solde actuellement</h2>
            <p>Revenez bientôt pour ne rien rater !</p>
            <a href="/" class="btn-view" style="width: auto; display: inline-block; padding: 12px 30px;">Retour à l'accueil</a>
        </div>
    @else
        <div class="products-container">
            @foreach ($products as $product)
                <div class="product-card">
                    <div class="product-card-wrapper">
                        <img src="{{ $product->image }}" alt="{{ $product->nom }}" class="product-img">
                        @if ($product->solde > 0)
                            <div class="discount-ribbon">-{{ $product->solde }}%</div>
                        @endif
                    </div>
                    
                    <div class="product-info">
                        <h3>{{ $product->nom }}</h3>
                        <p>{{ Str::limit($product->description ?? 'Aucune description disponible.', 80) }}</p>
                        
                        <div class="product-price-section">
                            @if ($product->solde > 0)
                                @php
                                    $discountedPrice = $product->prix - ($product->prix * $product->solde / 100);
                                @endphp
                                <div>
                                    <span class="product-price">{{ number_format($discountedPrice, 2) }} DH</span>
                                    <span class="original-price">{{ number_format($product->prix, 2) }} DH</span>
                                </div>
                                <div class="discount-savings">
                                    ✓ Économie: {{ number_format($product->prix - $discountedPrice, 2) }} DH
                                </div>
                            @else
                                <div class="product-price">{{ number_format($product->prix, 2) }} DH</div>
                            @endif
                        </div>
                        
                        <a href="{{ route('articles.show', $product->id) }}" class="btn-view">
                            Détails du produit
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pagination">
            {{ $products->links() }}
        </div>
    @endif
</div>
@endsection