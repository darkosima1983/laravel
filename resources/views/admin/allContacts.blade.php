<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Kontaktliste</title>
</head>
<body>
    <h1>Liste aller Kontakte</h1>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>E-Mail</th>
                <th>Betreff</th>
                <th>Nachricht</th>
                <th>Erstellt am</th>
                <th>Aktualisiert am</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>


