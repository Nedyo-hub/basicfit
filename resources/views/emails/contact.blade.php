<!DOCTYPE html>
<html>
<head>
    <title>Contactbericht</title>
</head>
<body>
    <h1>Nieuw bericht van {{ $data['name'] }}</h1>
    <p><strong>E-mail:</strong> {{ $data['email'] }}</p>
    <p><strong>Bericht:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
    