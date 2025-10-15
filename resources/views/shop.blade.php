@extends("layout")

@section("title")
   Shop
@endsection

@section("content")
    <h1>Produktliste</h1>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Beschreibung</th>
                <th>Menge</th>
                <th>Preis</th>
                <th>Bild</th>
                <th>Erstellt am</th>
                <th>Aktualisiert am</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->price }} €</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                        @else
                            Kein Bild
                        @endif
                    </td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


