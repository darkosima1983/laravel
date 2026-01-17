@extends('admin.layout')

@section('title', 'Kontaktliste')

@section('content')
<h1>Liste aller Kontakte</h1>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>E-Mail</th>
            <th>Betreff</th>
            <th>Nachricht</th>
            <th>Erstellt am</th>
            <th>Aktualisiert am</th>
            <th>Aktionen</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at }}</td>
                <td>{{ $contact->updated_at }}</td>
                <td>
                    <a href="{{ route('contact.edit', ['contact'=>$contact->id]) }}" class="btn btn-sm btn-primary">Bearbeiten</a>
                    <a href="{{ route('contact.delete', ['contact'=>$contact->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Sind Sie sicher, dass Sie dieses Contact löschen möchten?')">Löschen</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection



