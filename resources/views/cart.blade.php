@extends('layout')

@section('title', 'Warenkorb')

@section('content')
<div class="container my-5">

    <h2 class="mb-4">🛒 Warenkorb</h2>

    {{-- SUCCESS poruka --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR poruke --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Ako ima proizvoda u korpi --}}
    @if(count($cart) > 0)

        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Produkt</th>
                    <th>Menge</th>
                    <th>Preis</th>
                    <th>Gesamt</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp

                @foreach($cart as $item)
                    @php
                        $itemTotal = $item['price'] * $item['amount'];
                        $total += $itemTotal;
                    @endphp
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['amount'] }}</td>
                        <td>{{ number_format($item['price'], 2) }} €</td>
                        <td>{{ number_format($itemTotal, 2) }} €</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Gesamtpreis:</th>
                    <th>{{ number_format($total, 2) }} €</th>
                </tr>
            </tfoot>
        </table>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ url('/shop') }}" class="btn btn-outline-secondary">
                ← Weiter einkaufen
            </a>

            <a href="{{ route('cart.checkout') }}" class="btn btn-success">
                Zur Kasse →
            </a>
        </div>

    {{-- Ako je korpa prazna --}}
    @else
        <div class="alert alert-info">
            Ihr Warenkorb ist leer.
        </div>
        <a href="{{ url('/shop') }}" class="btn btn-primary">
            Zum Shop
        </a>
    @endif

</div>
@endsection