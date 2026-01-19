@extends('layout')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            @if($product->image)
                <img src="{{ asset('storage/images/' . $product->image) }}" class="img-fluid">
            @endif
        </div>

        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p><strong>Preis:</strong> {{ $product->price }} €</p>
            <p><strong>Menge:</strong> {{ $product->amount }}</p>

            <a href="{{ url('/shop') }}" class="btn btn-secondary">
                Zurück zum Shop
            </a>
        </div>
    </div>
</div>
@endsection
