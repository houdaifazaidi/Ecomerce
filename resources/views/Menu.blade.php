<header class="navbar">
    <style>
        .navbar {
            background: #ffffff;
            padding: 15px 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            border-bottom: 3px solid #001f3f;
        }

        .logo-container {
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: opacity 0.3s;
        }

        .logo-container:hover {
            opacity: 0.8;
        }

        .logo-img {
            height: 60px;
            width: auto;
            border-radius: 6px;
        }

        .menu-links {
            display: flex;
            gap: 30px;
        }

        .menu-links a {
            color: #001f3f;
            text-decoration: none;
            font-weight: 600;
            position: relative;
            font-size: 14px;
        }

        .menu-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            left: 0;
            bottom: -5px;
            background: #001f3f;
            transition: 0.3s;
        }

        .menu-links a:hover {
            color: #7a8fa0;
        }

        .menu-links a:hover::after {
            width: 100%;
        }
    </style>

    <a href="{{ url('/') }}" class="logo-container">
        <img src="{{ asset('imgs/logo.png') }}" alt="APEX Logo" class="logo-img">
    </a>

    <nav class="menu-links">
        <a href="{{ url('/') }}">Accueil</a>
        <a href="{{ url('/produits/fournitures') }}">Fournitures</a>
        <a href="{{ url('/produits/mobilier') }}">Mobilier</a>
        <a href="{{ url('/a-propos') }}">À Propos</a>
        <a href="{{ url('/contact') }}">Contact</a>
    </nav>
</header>
