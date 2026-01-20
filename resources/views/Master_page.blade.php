<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'MyShop')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            padding: 40px 8%;
        }

        h1 {
            margin-bottom: 20px;
            color: #001f3f;
        }

        h2 {
            color: #001f3f;
        }

        /* table (used in Produits) */
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            text-align: center;
        }

        th {
            background-color: #001f3f;
            color: #fff;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            max-width: 90px;
            border-radius: 6px;
        }

        a {
            color: #001f3f;
            text-decoration: none;
        }

        a:hover {
            color: #7a8fa0;
        }

        button, .btn {
            background-color: #001f3f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover, .btn:hover {
            background-color: #7a8fa0;
        }

        /* Flash Messages */
        .alert {
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            animation: slideInDown 0.3s ease;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-close {
            float: right;
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
            color: inherit;
            opacity: 0.7;
        }

        .alert-close:hover {
            opacity: 1;
        }

        @keyframes slideInDown {
            from {
                transform: translateY(-30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

    @include('Menu')

    <!-- Flash Messages -->
    @if (session('success'))
        <div class="alert alert-success" id="successAlert">
            <span class="alert-close" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error" id="errorAlert">
            <span class="alert-close" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('error') }}
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    @include('Footer')

</body>
</html>
