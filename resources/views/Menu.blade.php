<header class="navbar">
    <style>
        .navbar {
            background: linear-gradient(90deg, #1e272e, #2f3640);
            padding: 15px 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
            letter-spacing: 1px;
        }

        .menu-links a {
            color: #fff;
            text-decoration: none;
            margin-left: 25px;
            font-weight: 500;
            position: relative;
        }

        .menu-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            left: 0;
            bottom: -5px;
            background: #00a8ff;
            transition: 0.3s;
        }

        .menu-links a:hover::after {
            width: 100%;
        }
    </style>

    <a href="{{ url('/') }}" class="logo">
        🏔 MyShop
    </a>

    <nav class="menu-links">
        <a href="{{ url('/produits/hicking') }}">Hiking</a>
        <a href="{{ url('/produits/electromenager') }}">Electroménager</a>
    </nav>
</header>
