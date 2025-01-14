<html>
<head>
    <title>Contactbericht</title>
</head>
<body>
    <h1>Nieuw bericht van {{ $data['name'] ?? 'Onbekend' }}</h1>
    <p><strong>E-mail:</strong> {{ $data['email'] ?? 'Onbekend' }}</p>
    <p><strong>Bericht:</strong></p>
    <p>{{ $data['message'] ?? 'Geen bericht meegeleverd' }}</p>
</body>
</html>
