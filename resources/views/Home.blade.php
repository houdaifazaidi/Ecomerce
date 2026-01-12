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
                text-align: center;
            }

            .home h1 {
                font-size: 48px;
                margin-bottom: 10px;
                color: #001f3f;
            }

            .home h2 {
                font-size: 24px;
                color: #7a8fa0;
                margin-bottom: 20px;
                font-weight: 400;
            }

            .home p {
                font-size: 18px;
                color: #555;
                margin-bottom: 40px;
            }

            .categories {
                display: flex;
                justify-content: center;
                gap: 30px;
                flex-wrap: wrap;
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
    </section>

@endsection
