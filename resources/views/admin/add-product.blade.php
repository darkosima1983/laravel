@extends('admin.layout')

@section('title', 'Produkt hinzufügen')

@section('content')
<div class="container mt-5">
    <h2>Neues Produkt hinzufügen</h2>
    <form action="{{route('product.add')}}" method="POST" enctype="multipart/form-data">
        @csrf  {{-- Laravel CSRF zaštita --}}

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">Fehler: {{$error}}</p>
                @endforeach
            @endif
        {{-- Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Produktname</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name des Produkts" value="{{ old('name') }}" required>
        </div>

        {{-- Beschreibung --}}
        <div class="mb-3">
            <label for="description" class="form-label">Beschreibung</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Kurze Produktbeschreibung" required>{{ old('description') }}</textarea>
        </div>

        {{-- Menge (amount) --}}
        <div class="mb-3">
            <label for="amount" class="form-label">Menge</label>
            <input type="number" class="form-control" id="amount" name="amount" min="1" value="{{ old('amount') }}" required>
        </div>

        {{-- Preis --}}
        <div class="mb-3">
            <label for="price" class="form-label">Preis (€)</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="z. B. 199.99" value="{{ old('price') }}"  required>
        </div>

         {{-- Bild (Text input) --}}
        <div class="mb-3">
            <label for="image" class="form-label">Produktbild (Dateiname)</label>
            <input type="text" class="form-control" id="image" name="image" placeholder="z. B. image10.jpg" value="{{ old('image') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Speichern</button>
    </form>
</div>
@endsection
