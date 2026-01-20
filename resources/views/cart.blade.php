@extends('layout')

@section('title', 'Warenkorb')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Ihr Warenkorb</h2>

    @foreach($cart as $product)
        <p>{{$product['id'] }}</p> 
        <p>Menge: {{ $product['amount'] }}</p>
        <hr>
    @endforeach
</div>
@endsection
