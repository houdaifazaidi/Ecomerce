@extends('Master_page')

@section('title', ucfirst($categorie))

@section('content')
<style>
    .produits-section {
        width: 100%;
    }

    .produits-section h1 {
        color: #001f3f;
        margin-bottom: 30px;
    }

    .products-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 25px;
        margin-top: 20px;
        padding: 20px 0;
        width: 100%;
    }

    .product-card {
        background: #ffffff;
        border: 1px solid #e0e6ed;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 100%;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0,31,63,0.15);
        border-color: #001f3f;
    }

    .product-img {
        width: 100%;
        height: 280px;
        object-fit: cover;
        object-position: center;
        background: #f8f9fa;
        display: block;
        max-width: 100%;
        margin: 0;
        padding: 0;
    }

    .product-info {
        padding: 15px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .product-info h3 {
        margin: 0 0 10px 0;
        color: #001f3f;
        font-size: 16px;
    }

    .product-info p {
        margin: 0;
        color: #666;
        font-size: 13px;
        flex: 1;
    }

    .product-price {
        color: #001f3f;
        font-size: 20px;
        font-weight: bold;
        margin-top: 10px;
    }

    .no-products {
        text-align: center;
        padding: 40px;
        background: #f8f9fa;
        border-radius: 10px;
        color: #666;
    }

    .product-actions {
        display: flex;
        gap: 8px;
        margin-top: 15px;
        flex-wrap: wrap;
    }

    .btn {
        flex: 1;
        padding: 8px 12px;
        border: none;
        border-radius: 6px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.3s;
        min-width: 80px;
        display: inline-block;
    }

    .btn-view {
        background-color: #001f3f;
        color: white;
    }

    .btn-view:hover {
        background-color: #003d66;
    }

    .pagination {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    .pagination a, .pagination span {
        padding: 8px 12px;
        border: 1px solid #e0e6ed;
        border-radius: 6px;
        text-decoration: none;
        color: #001f3f;
        transition: all 0.3s;
    }

    .pagination a:hover {
        background-color: #001f3f;
        color: #ffffff;
        border-color: #001f3f;
    }

    .pagination .active span {
        background-color: #001f3f;
        color: #ffffff;
        border-color: #001f3f;
    }

    .pagination .disabled span {
        color: #ccc;
        cursor: not-allowed;
    }

    @media (max-width: 768px) {
        .produits-section h1 {
            font-size: 32px;
            text-align: center;
        }

        .products-container {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }
    }
</style>

<div class="produits-section">
    <h1>{{ ucfirst($categorie) }}</h1>

    @if (count($products) === 0)
        <div class="no-products">
            <p>Aucun produit trouvé dans cette catégorie.</p>
        </div>
    @else
        <div class="products-container">
            @foreach ($products as $product)
                <div class="product-card">
                    <img src="{{ $product->image }}" alt="{{ $product->nom }}" class="product-img">
                    <div class="product-info">
                        <h3>{{ $product->nom }}</h3>
                        <p>{{ $product->description ?? '' }}</p>
                        <div class="product-price">{{ $product->prix }} DH</div>
                        
                        <!-- Action Buttons -->
                        <div class="product-actions">
                            <a href="{{ route('articles.show', $product->id) }}" class="btn btn-view">
                                Voir
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="pagination">
            {{ $products->links('vendor.pagination.custom') }}
        </div>
    @endif
</div>
@endsection
