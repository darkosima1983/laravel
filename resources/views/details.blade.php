@extends('layout')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
<div class="container my-5">
     {{-- SUCCESS --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERRORS --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        {{-- Slika proizvoda --}}
        <div class="col-md-6 mb-4">
            @if($product->image)
                <img 
                    src="{{ asset('storage/images/' . $product->image) }}" 
                    class="img-fluid rounded shadow-sm"
                    alt="{{ $product->name }}"
                >
            @else
                <img 
                    src="https://via.placeholder.com/500x400?text=Kein+Bild"
                    class="img-fluid rounded shadow-sm"
                    alt="Kein Bild"
                >
            @endif
        </div>

        {{-- Detalji + forma --}}
        <div class="col-md-6">
            <h2 class="mb-3">{{ $product->name }}</h2>

            <p class="text-muted">
                {{ $product->description }}
            </p>

            <p>
                <strong>Preis:</strong>
                <span class="fs-5">{{ $product->price }} €</span>
            </p>

            <p>
                <strong>Verfügbar:</strong>
                {{ $product->amount }} Stück
            </p>

            {{-- ADD TO CART FORMA --}}
            <form method="POST" action="{{ route('cart.add') }}" class="mt-4">
                @csrf

                {{-- product id --}}
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">


                <div class="mb-3">
                    <label for="amount" class="form-label">
                        Menge
                    </label>
                    <input
                        type="number"
                        name="amount"
                        id="amount"
                        class="form-control"
                        min="1"
                        value="1"
                        required
                    >
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        Add to cart
                    </button>

                    <a href="{{ url('/shop') }}" class="btn btn-outline-secondary">
                        Zurück zum Shop
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
