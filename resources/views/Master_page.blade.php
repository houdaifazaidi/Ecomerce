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
            background-color: #f5f6fa;
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
            background-color: #2c3e50;
            color: #fff;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            max-width: 90px;
            border-radius: 6px;
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
