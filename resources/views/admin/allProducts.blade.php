@extends('admin.layout')

@section('title', 'Alle Produkte')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Liste aller Produkte</h2>

    @if($products->count() > 0)
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Beschreibung</th>
                    <th>Preis (€)</th>
                    <th>Bild</th>
                    <th>Erstellt am</th>
                    <th>Aktionen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ Str::limit($product->description, 60) }}</td>
                    <td>{{ number_format($product->price, 2, ',', '.') }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/images/' . $product->image) }}" width="80" alt="Bild">
                        @else
                            <span class="text-muted">Kein Bild</span>
                        @endif
                    </td>
                    <td>{{ $product->created_at->format('d.m.Y') }}</td>
                    <td>
                        <a href="{{ url('admin/edit-product/' . $product->id) }}" class="btn btn-sm btn-primary">Bearbeiten</a>
                        <a href="{{ url('admin/delete-product/' . $product->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Sind Sie sicher, dass Sie dieses Produkt löschen möchten?')">Löschen</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">Keine Produkte vorhanden.</div>
    @endif
</div>
@endsection

