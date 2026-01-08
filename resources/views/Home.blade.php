@extends('Master_page')

@section('title', 'Home')

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
                font-size: 36px;
                margin-bottom: 15px;
                color: #2c3e50;
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
                background: #f5f6fa;
                width: 260px;
                padding: 30px;
                border-radius: 10px;
                text-decoration: none;
                color: #333;
                transition: transform 0.3s, box-shadow 0.3s;
                box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            }

            .card:hover {
                transform: translateY(-8px);
                box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            }

            .card h2 {
                margin-bottom: 10px;
                color: #00a8ff;
            }

            .card span {
                font-size: 40px;
                display: block;
                margin-bottom: 15px;
            }
        </style>

        <h1>Welcome to MyShop</h1>
        <p>Your place for outdoor gear & home essentials</p>

        <div class="categories">
            <a href="{{ url('/produits/hicking') }}" class="card">
                <span>🥾</span>
                <h2>Hiking</h2>
                <p>Outdoor equipment for your adventures</p>
            </a>

            <a href="{{ url('/produits/electromenager') }}" class="card">
                <span>🏠</span>
                <h2>Electroménager</h2>
                <p>Essential appliances for everyday life</p>
            </a>
        </div>
    </section>

@endsection
