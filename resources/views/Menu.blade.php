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
            align-items: center;
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

        .auth-links {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .logout-form {
            margin: 0;
        }

        .logout-form button {
            background: none;
            border: none;
            color: #001f3f;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            font-size: 14px;
            position: relative;
            transition: color 0.3s;
        }

        .logout-form button:hover {
            color: #7a8fa0;
        }

        .user-welcome {
            color: #001f3f;
            font-weight: 600;
            font-size: 14px;
        }

        .admin-badge {
            background-color: #dc3545;
            color: white;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 5px;
        }

        .user-badge {
            background-color: #28a745;
            color: white;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 5px;
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

        <!-- Authenticated Users -->
        @auth
            <!-- User-only Links -->
            @if (Auth::user()->role === 'user')
                <a href="{{ route('espaceclient') }}">Espace Client</a>
            @endif

            <!-- Admin-only Links -->
            @if (Auth::user()->role === 'admin')
                <a href="{{ route('articles.create') }}">Ajouter Produit</a>
                <a href="{{ route('articles.index') }}">Gestion Produits</a>
                <a href="{{ route('email') }}">Envoyer Email</a>
            @endif

            <!-- Logout for both user and admin -->
            <span class="user-welcome">
                {{ Auth::user()->name }}
                @if (Auth::user()->role === 'admin')
                    <span class="admin-badge">Admin</span>
                @elseif (Auth::user()->role === 'user')
                    <span class="user-badge">Client</span>
                @endif
            </span>

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit">Déconnexion</button>
            </form>
        @endauth

        <!-- Visitors (not authenticated) -->
        @guest
            <a href="{{ route('login') }}">Connexion</a>
            <a href="{{ route('register') }}">Inscription</a>
        @endguest
    </nav>
</header>
