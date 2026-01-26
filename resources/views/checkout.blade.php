@extends('layout')

@section('title', 'Bestellung bestätigen')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">🧾 Bestellung bestätigen</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    @php
        $total = 0;
    @endphp

    @if(count($cart) === 0)
        <div class="alert alert-info">
            Ihr Warenkorb ist leer.
        </div>
        <a href="{{ url('/shop') }}" class="btn btn-primary">Zum Shop</a>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Produkt</th>
                    <th>Menge</th>
                    <th>Preis</th>
                    <th>Gesamt</th>
                </tr>
            </thead>
            <tbody>
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
                    <th colspan="3" class="text-end">Gesamtsumme</th>
                    <th>{{ number_format($total, 2) }} €</th>
                </tr>
            </tfoot>
        </table>

        <form method="POST" action="{{ route('cart.finish') }}">
            @csrf
            <div class="d-flex justify-content-between">
                <a href="{{ route('cart.view') }}" class="btn btn-secondary">
                    ← Zurück zum Warenkorb
                </a>
                <button type="submit" class="btn btn-success">
                    ✅ Bestellung abschließen
                </button>
            </div>
        </form>
    @endif
</div>
@endsection