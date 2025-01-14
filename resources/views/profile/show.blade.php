@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profiel van {{ $user->username }}</h1>

    <p>Email: {{ $user->email }}</p>
    <p>Verjaardag: {{ $user->birthday ?? 'Niet ingevuld' }}</p>
    <p>Over mij: {{ $user->about_me ?? 'Geen informatie beschikbaar' }}</p>

    @if ($user->profile_picture)
        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profielfoto" style="width: 150px; height: 150px; border-radius: 50%;">
    @else
        <p>Geen profielfoto beschikbaar</p>
    @endif
</div>
@endsection
