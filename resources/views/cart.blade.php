@extends('layout')

@section('title', 'Warenkorb')

@section('content')
<div class="container my-5">

    <h2 class="mb-4 text-center">🛒 Warenkorb</h2>

    @php
        $cart = session('product', null); // ako ne postoji, vrati null
    @endphp

    @if($cart) {{-- samo ako cart postoji --}}
        @php
            $product = \App\Models\Product::find($cart['id']);
        @endphp

        @if($product)
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Produkt</th>
                        <th>Menge</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $cart['amount'] }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="text-center mt-4">
                <a href="{{ url('/shop') }}" class="btn btn-secondary">← Zum Shop</a>
            </div>
        @endif
    @else
        <div class="alert alert-info text-center">
            Ihr Warenkorb ist leer.
        </div>
        <div class="text-center mt-4">
            <a href="{{ url('/shop') }}" class="btn btn-primary">Zum Shop</a>
        </div>
    @endif

</div>
@endsection


