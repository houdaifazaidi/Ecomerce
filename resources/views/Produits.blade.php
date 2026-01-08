@extends('Master_page')

@section('title', ucfirst($categorie))

@section('content')
    <h1>Category: {{ ucfirst($categorie) }}</h1>

    @if (count($products) === 0)
        <p>No products found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <img src="{{ asset('imgs/' . $product['image']) }}" alt="{{ $product['nom'] }}">
                        </td>
                        <td>{{ $product['nom'] }}</td>
                        <td>{{ $product['prix'] }} DH</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
{{-- 
@extends('Master_page')

@section('title', ucfirst($categorie))

@section('content')
    <h1>Category: {{ ucfirst($categorie) }}</h1>

    @if (count($products) === 0)
        <p>No products found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <img src="{{ asset('imgs/' . $product['image']) }}" alt="{{ $product['nom'] }}">
                        </td>
                        <td>{{ $product['nom'] }}</td>
                        <td>{{ $product['prix'] }} DH</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection --}}
