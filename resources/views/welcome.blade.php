@extends("layout")

@section ("title")
    Startseite
@endsection

@section('content')
    <!-- Hero sekcija -->
    <div class="p-5 mb-4 bg-light rounded-3" 
         style="background: url('https://images.unsplash.com/photo-1519744346365-9f2f0e69fdd1') center/cover no-repeat; min-height: 70vh; display: flex; align-items: center; justify-content: center; color: white; text-shadow: 2px 2px 6px rgba(0,0,0,0.7);">
        <div class="text-center">
           <h1 class="shop-title">Willkommen in unserem Online Uhren Shop</h1>
            <p class="shop-subtitle">Exklusive Uhren für jeden Anlass – Stil, Eleganz und Qualität an einem Ort.</p>
            <p class="shop-subtitle">aktuelle Uhrzeit {{$trenutnoVreme}}</p>
            @if ($trenutniSat <= 12)
                <p class="shop-subtitle">Guten Morgen!</p>
            @elseif ($trenutniSat < 18)
                <p class="shop-subtitle">Guten Tag!</p>
            @else
                <p class="shop-subtitle">Guten Abend!</p>
            @endif
        </div>
    </div>

    <!-- Sekcija ispod hero -->
    <div class="container text-center my-5">
        <h2>Warum bei uns kaufen?</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <h4>✔ Qualität</h4>
                <p>Alle unsere Uhren sind sorgfältig ausgewählt und stammen von renommierten Marken.</p>
            </div>
            <div class="col-md-4">
                <h4>✔ Schnelle Lieferung</h4>
                <p>Ihre Bestellung wird schnell und sicher direkt zu Ihnen nach Hause geliefert.</p>
            </div>
            <div class="col-md-4">
                <h4>✔ Kundenservice</h4>
                <p>Unser Team ist jederzeit für Sie da und hilft bei allen Fragen rund um die Uhr.</p>
            </div>
        </div>
    </div>
@endsection


