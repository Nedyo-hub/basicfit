<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded">

        <!-- Terug naar Laatste Nieuwtjes knop -->
        <div class="mb-4">
            <a href="{{ route('news.index') }}" class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Terug naar Laatste Nieuwtjes
            </a>
        </div>

        <!-- Nieuwsdetails -->
        <h1 class="text-3xl font-bold">{{ $news->title }}</h1>
        @if($news->image_path)
            <img src="{{ asset('storage/' . $news->image_path) }}" alt="{{ $news->title }}" class="w-full h-auto mt-4 rounded">
        @endif
        <p class="mt-4 text-gray-700">{{ $news->content }}</p>
        <small class="block mt-4 text-sm text-gray-500">Gepubliceerd op: {{ $news->publication_date }}</small>

        <!-- Alleen admins kunnen deze knoppen zien -->
        @if(auth()->check() && auth()->user()->role === 'admin')
        <div class="mt-6 flex space-x-4">
    <a href="{{ route('news.edit', $news) }}" 
       class="inline-block px-4 py-2 text-white bg-black rounded hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2" style="background-color: black; color: white; opacity: 1; padding: 10px 16px; border-radius: 4px;">
       Bewerken
    </a>
    <form action="{{ route('news.destroy', $news) }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" 
                class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                onclick="return confirm('Weet je zeker dat je dit item wilt verwijderen?')">
            Verwijderen
        </button>
    </form>
</div>


        @endif

        <!-- Reacties sectie -->
        <hr class="my-6">
        <h2 class="text-2xl font-bold mb-4">Reacties</h2>

        <!-- Reacties lijst -->
        @forelse($news->comments as $comment)
            <div class="mb-4 p-4 border border-gray-200 rounded">
                <p class="font-semibold">{{ $comment->user->name ?? 'Anonieme gebruiker' }}</p>
                <p class="text-gray-700">{{ $comment->content }}</p>
                <small class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>
            </div>
        @empty
            <p class="text-gray-500">Er zijn nog geen reacties.</p>
        @endforelse

        <!-- Reactieformulier -->
        @auth
        <form action="{{ route('comments.store', $news) }}" method="POST">
            @csrf
            <textarea name="content" class="border rounded w-full p-2" placeholder="Laat een reactie achter..."></textarea>
            <button type="submit" style="background-color: black; color: white; opacity: 1; padding: 10px 16px; border-radius: 4px;">
                Reactie Plaatsen
            </button>
        </form>
        @else
            <p class="text-gray-500 mt-4">Log in om een reactie achter te laten.</p>
        @endauth
    </div>
</x-app-layout>
