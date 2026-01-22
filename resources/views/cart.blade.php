@extends('layout')

@section('title', 'Warenkorb')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">🛒 Warenkorb</h2>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(count($cart) > 0)
        @foreach($cart as $item)
            <p><strong>Produkt:</strong> {{ $item['name'] }}</p>
            <p><strong>Menge:</strong> {{ $item['amount'] }}</p>
            <p><strong>Preis pro Stück:</strong> {{ $item['price'] }} €</p>
            <p><strong>Gesamtpreis:</strong> {{ $item['price'] * $item['amount'] }} €</p>
            <hr>
        @endforeach

        <a href="{{ url('/shop') }}" class="btn btn-secondary">← Zum Shop</a>
    @else
        <div class="alert alert-info">
            Ihr Warenkorb ist leer.
        </div>
        <a href="{{ url('/shop') }}" class="btn btn-primary">Zum Shop</a>
    @endif
</div>
@endsection


