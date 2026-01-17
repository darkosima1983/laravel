@extends('admin.layout')

@section('title', 'Produkt bearbeiten')

@section('content')

<div class="container">
    <h1 class="mb-4 text-center">Kontakte Bearbeiten</h1>

    <!-- Kontakt Forma -->
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ route('contact.update', $singleContact->id) }}">
              {{ csrf_field() }}
                 @if ($errors->any())
                    @foreach ($errors->all() as $error)
                <p class="text-danger">Fehler: {{ $error }}</p>
                    @endforeach
                @endif
                <div class="mb-3">
                    <label for="email" class="form-label">E-Mail Adresse</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $singleContact->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="subject" class="form-label">Betreff</label>
                    <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject', $singleContact->subject) }}"  required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Nachricht</label>
                    <textarea class="form-control" id="message" name="message" rows="5"  required>"{{ old('message', $singleContact->message) }}"</textarea>
                </div>

                <button type="submit" class="btn btn-success">Änderungen speichern</button>
                <a href="{{ route('contact.all') }}" class="btn btn-secondary">Abbrechen</a>
            </form>
        </div>
@endsection