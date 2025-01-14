<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-white mb-6">Forum</h1>

            {{-- Displaying Replies --}}
            @foreach ($replies as $reply)
                <div class="mb-4 p-4 bg-gray-800 rounded-lg shadow-md">
                    <p class="text-sm text-gray-500 mb-2">
                        Geplaatst door: 
                        <a href="{{ route('profile.show', $reply->user->username) }}" class="text-blue-500 hover:underline">
                            {{ $reply->user->name }}
                        </a>
                    </p>
                    <p class="text-gray-300">{{ $reply->content }}</p>
                </div>
            @endforeach

            {{-- Reply Form --}}
            <form action="{{ route('forum.reply', $topic->id) }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow-md mt-6">
                @csrf
                <div class="mb-4">
                    <label for="content" class="block text-white font-semibold">Reactie</label>
                    <textarea name="content" id="content" rows="5" 
                        class="w-full p-3 rounded bg-gray-900 text-black focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="Schrijf hier je reactie..." required></textarea>
                </div>
                <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition duration-300">
                    Verstuur
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
