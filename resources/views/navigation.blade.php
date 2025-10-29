
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">UhrenShop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Menü öffnen">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Startseite</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/shop') }}">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">Über uns</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Kontakt</a></li>
                </ul>
            </div>
        </div>
    </nav>