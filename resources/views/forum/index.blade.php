<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-4xl font-bold text-white">Forum</h1>
                <a href="{{ route('forum.create') }}" 
                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Nieuwe Topic
                </a>
            </div>

            @foreach ($topics as $topic)
                <div class="bg-gray-800 p-6 mb-4 rounded-lg shadow-lg">
                    <h2 class="text-xl text-white font-semibold">{{ $topic->title }}</h2>
                    <p class="text-gray-400">{{ $topic->content }}</p>
                    <p class="text-sm text-gray-500">
                        Geplaatst door: 
                        <a href="{{ route('profile.show', $topic->user->username) }}" 
                           class="font-bold text-blue-500 hover:underline hover:text-blue-700">
                            {{ $topic->user->name }}
                        </a>
                    </p>

                    <a href="{{ route('forum.show', $topic->id) }}" 
                       class="text-blue-500 hover:underline">
                        Bekijk reacties
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
