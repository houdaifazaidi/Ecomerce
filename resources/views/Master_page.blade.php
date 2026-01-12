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
    </style>
</head>
<body>

    @include('Menu')

    <main>
        @yield('content')
    </main>

    @include('Footer')

</body>
</html>
