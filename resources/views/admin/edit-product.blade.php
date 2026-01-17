@extends('admin.layout')

@section('title', 'Produkt bearbeiten')

@section('content')
<div class="container mt-5">
    <h2>Produkt bearbeiten</h2>
    <form action="{{ route('product.update', $product) }}" method="POST">
        @csrf
        

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">Fehler: {{ $error }}</p>
            @endforeach
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Produktname</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Beschreibung</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Menge</label>
            <input type="number" class="form-control" id="amount" name="amount"
                   value="{{ old('amount', $product->amount) }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Preis (€)</label>
            <input type="text" class="form-control" id="price" name="price"
                   value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Bild</label>
            <input type="text" class="form-control" id="image" name="image"
                   value="{{ old('image', $product->image) }}">
        </div>

        <button type="submit" class="btn btn-success">Änderungen speichern</button>
        <a href="{{ route('products.all') }}" class="btn btn-secondary">Abbrechen</a>
    </form>
</div>
@endsection
