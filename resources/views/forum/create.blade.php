<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-white mb-6">Nieuw Topic</h1>

           
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-500 text-white rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('forum.store') }}" method="POST" class="bg-gray-800 p-6 rounded-lg">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-white">Titel</label>
                    <input type="text" name="title" id="title" 
                           class="w-full p-2 rounded bg-gray-900 text-black" 
                           value="{{ old('title') }}" required>
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-white">Inhoud</label>
                    <textarea name="content" id="content" rows="5" 
                              class="w-full p-2 rounded bg-gray-900 text-black" 
                              required>{{ old('content') }}</textarea>
                </div>

                <div class="flex space-x-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Opslaan</button>
                    <a href="{{ route('forum.index') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Terug
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
