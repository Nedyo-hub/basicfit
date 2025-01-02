<x-app-layout>
    <h1>{{ $news->title }}</h1>
    <p>{{ $news->content }}</p>
    @if ($news->image)
        <img src="{{ asset('storage/' . $news->image) }}" alt="Afbeelding">
    @endif
    <small>Gepubliceerd op: {{ $news->published_at->format('d-m-Y') }}</small>
</x-app-layout>
