<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-3xl font-bold mb-6">Nieuwsbericht bewerken</h1>
        
        <form method="POST" action="{{ route('news.update', $news) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Titel</label>
                <input type="text" name="title" id="title" value="{{ $news->title }}" 
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-medium mb-2">Inhoud</label>
                <textarea name="content" id="content" rows="5" 
                          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" required>{{ $news->content }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-medium mb-2">Afbeelding</label>
                <input type="file" name="image" id="image" 
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                @if($news->image_path)
                    <p class="text-gray-500 mt-2">Huidige afbeelding: {{ basename($news->image_path) }}</p>
                @endif
            </div>

            <button type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400" style="background-color: black; color: white; opacity: 1; padding: 10px 16px; border-radius: 4px;">
                Bijwerken
            </button>
        </form>
    </div>
</x-app-layout>
