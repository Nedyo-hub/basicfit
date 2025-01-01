<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->username }}'s Profiel</title>
</head>
<body>
    <h1>{{ $user->username ?? 'Gebruiker' }}</h1>
    <p>Email: {{ $user->email }}</p>
    <p>Geboortedatum: {{ $user->birthday ? $user->birthday->format('d-m-Y') : 'Niet ingevuld' }}</p>
    <p>Over mij: {{ $user->about_me ?? 'Geen informatie beschikbaar.' }}</p>

    @if ($user->profile_picture)
        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profielfoto" style="max-width: 200px;">
    @else
        <p>Geen profielfoto beschikbaar.</p>
    @endif
</body>
</html>
