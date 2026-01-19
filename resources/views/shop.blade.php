@extends("layout")

@section("title")
   Shop
@endsection

@section("content")
    

    <div class="container my-5">
        <h2 class="text-center mb-4">Produktliste</h2>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        @if($product->image)
                            <img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        @else
                            <img src="https://via.placeholder.com/400x300?text=Kein+Bild" class="card-img-top" alt="Kein Bild">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 80) }}</p>
                            <p><strong>Preis:</strong> {{ $product->price }} €</p>
                            <p><strong>Menge:</strong> {{ $product->amount }}</p>
                            <a href="{{ route('product.show', $product) }}" class="btn btn-primary">
                                Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


