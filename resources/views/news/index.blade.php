<x-app-layout>
    <h1>Laatste nieuws</h1>
    @foreach ($news as $item)
        <div>
            <h2><a href="{{ route('news.show', $item) }}">{{ $item->title }}</a></h2>
            <p>{{ Str::limit($item->content, 100) }}</p>
            <small>Gepubliceerd op: {{ $item->published_at->format('d-m-Y') }}</small>
        </div>
    @endforeach
</x-app-layout>
