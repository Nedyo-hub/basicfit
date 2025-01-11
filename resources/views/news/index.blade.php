@extends('layouts.main')



@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-3xl font-bold mb-4">Laatste Nieuwtjes</h1>

    <div class="mb-4">
        <a href="{{ route('dashboard') }}" class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Terug naar Dashboard
        </a>
    </div>

    @if(auth()->check() && auth()->user()->role === 'admin')
    <div class="mb-6">
        <a href="{{ route('news.create') }}" class="inline-block bg-green-500 text-black px-4 py-2 rounded hover:bg-green-600">
            Nieuw item toevoegen
        </a>
    </div>
@endif

    @if($news->isEmpty())
        <p class="text-gray-500">Er zijn nog geen nieuwsitems beschikbaar.</p>
    @else
        <ul class="space-y-4">
            @foreach($news as $item)
                <li class="p-4 bg-gray-100 rounded shadow hover:shadow-md">
                    <h2 class="text-xl font-semibold">{{ $item->title }}</h2>
                    @if($item->image_path)
                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" class="w-full h-auto mt-2 rounded">
                    @endif
                    <p class="mt-2 text-gray-700">{{ Str::limit($item->content, 100) }}</p>
                    <small class="block mt-2 text-sm text-gray-500">Gepubliceerd op: {{ $item->publication_date }}</small>
                    <a href="{{ route('news.show', $item) }}" class="inline-block mt-2 text-blue-500 hover:underline">Lees meer</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
