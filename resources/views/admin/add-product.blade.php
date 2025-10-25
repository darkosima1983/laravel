@extends('admin.layout')

@section('title', 'Produkt hinzufügen')

@section('content')
<div class="container mt-5">
    <h2>Neues Produkt hinzufügen</h2>
    <form action="/admin/send-product" method="POST" enctype="multipart/form-data">
        @csrf  {{-- Laravel CSRF zaštita --}}

        {{-- Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Produktname</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name des Produkts" required>
        </div>

        {{-- Beschreibung --}}
        <div class="mb-3">
            <label for="description" class="form-label">Beschreibung</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Kurze Produktbeschreibung" required></textarea>
        </div>

        {{-- Menge (amount) --}}
        <div class="mb-3">
            <label for="amount" class="form-label">Menge</label>
            <input type="number" class="form-control" id="amount" name="amount" min="1" required>
        </div>

        {{-- Preis --}}
        <div class="mb-3">
            <label for="price" class="form-label">Preis (€)</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="z. B. 199.99" required>
        </div>

         {{-- Bild (Text input) --}}
        <div class="mb-3">
            <label for="image" class="form-label">Produktbild (Dateiname)</label>
            <input type="text" class="form-control" id="image" name="image" placeholder="z. B. image10.jpg" required>
        </div>

        <button type="submit" class="btn btn-primary">Speichern</button>
    </form>
</div>
@endsection
