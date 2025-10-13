@extends("layout")

@section ("title")
    Kontakt
@endsection

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Kontaktieren Sie uns</h1>

    <!-- Kontakt Forma -->
    <div class="row">
        <div class="col-md-6">
            <form action="#" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">E-Mail Adresse</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ihre E-Mail" required>
                </div>

                <div class="mb-3">
                    <label for="subject" class="form-label">Betreff</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Betreff eingeben" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Nachricht</label>
                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Ihre Nachricht..." required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Absenden</button>
            </form>
        </div>

        <!-- Google Maps -->
        <div class="col-md-6">
            <h5>Unsere Adresse</h5>
            <p>Kleberstraße 33a, 96047 Bamberg</p>
            <div class="ratio ratio-16x9">
                <iframe 
                    src="https://www.google.com/maps?q=Kleberstraße+33a,+96047+Bamberg&output=embed"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection
