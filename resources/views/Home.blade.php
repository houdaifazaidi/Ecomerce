@extends('Master_page')

@section('title', 'APEX - Matériel de Bureau et Fournitures')

@section('content')
<section class="home">
    <style>
        .home {
            background: #ffffff;
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        }

        .home h1 {
            font-size: 48px;
            margin-bottom: 10px;
            color: #001f3f;
            text-align: center;
        }

        .home h2 {
            font-size: 24px;
            color: #7a8fa0;
            margin-bottom: 20px;
            font-weight: 400;
            text-align: center;
        }

        .home p {
            font-size: 18px;
            color: #555;
            margin-bottom: 40px;
            text-align: center;
        }

        .categories {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-bottom: 50px;
        }

        .card {
            background: #f8f9fa;
            border: 2px solid #e0e6ed;
            width: 260px;
            padding: 30px;
            border-radius: 10px;
            text-decoration: none;
            color: #333;
            transition: transform 0.3s, box-shadow 0.3s, border-color 0.3s;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            text-align: center;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            border-color: #001f3f;
        }

        .card h2 {
            margin-bottom: 10px;
            color: #001f3f;
        }

        .card span {
            font-size: 40px;
            display: block;
            margin-bottom: 15px;
        }

        .products-section {
            width: 100%;
        }

        .products-section h3 {
            color: #001f3f;
            margin-bottom: 30px;
            margin-top: 30px;
            font-size: 28px;
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
            .home {
                padding: 20px;
            }

            .home h1 {
                font-size: 32px;
            }

            .products-container {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }
    </style>

    <h1>APEX</h1>
    <h2>Matériel de Bureau et Fournitures</h2>
    <p>Découvrez notre sélection complète d'équipements de bureau et de fournitures de qualité</p>

    <div class="categories">
        <a href="{{ url('/produits/fournitures') }}" class="card">
            <span>✏️</span>
            <h2>Fournitures</h2>
            <p>Stylos, cahiers, agendas et accessoires</p>
        </a>

        <a href="{{ url('/produits/mobilier') }}" class="card">
            <span>🪑</span>
            <h2>Mobilier</h2>
            <p>Bureaux, chaises et rangements</p>
        </a>
    </div>

    @if (count($products) > 0)
        <div class="products-section">
            <h3>Tous nos Produits</h3>
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
        </div>
    @endif
</section>
@endsection
