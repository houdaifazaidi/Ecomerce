@extends('Master_page')

@section('title', 'Home')

@section('content')
    <h1>Welcome to MyShop</h1>

    <p>
        Discover our products:
    </p>

    <ul>
        <li><a href="{{ url('/produits/hicking') }}">Hiking equipment</a></li>
        <li><a href="{{ url('/produits/electromenager') }}">Electroménager</a></li>
    </ul>
@endsection
