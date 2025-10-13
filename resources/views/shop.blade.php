@extends("layout")

@section ("title")
    Shop
@endsection

@section ("content")
    @foreach ($products as $product)
        <p>{{$product}}
         @if (in_array($product, [
                "Casio G-Shock Classic",
                "Casio Vintage Edgy"
            ]))
                <strong> - Aktion!</strong>
            @endif
        </p>
    @endforeach

@endsection

