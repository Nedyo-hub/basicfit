<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded mt-10">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Nieuw nieuwsbericht toevoegen</h1>

        <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Titel -->
            <div>
                <label for="title" class="block text-gray-700 font-medium mb-2">Titel</label>
                <input type="text" name="title" id="title" 
                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-200 focus:outline-none"
                       placeholder="Voer een titel in" required>
            </div>

            <!-- Inhoud -->
            <div>
                <label for="content" class="block text-gray-700 font-medium mb-2">Inhoud</label>
                <textarea name="content" id="content" rows="6"
                          class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-200 focus:outline-none"
                          placeholder="Voer de inhoud in" required></textarea>
            </div>

            <!-- Afbeelding -->
            <div>
                <label for="image" class="block text-gray-700 font-medium mb-2">Afbeelding</label>
                <input type="file" name="image" id="image"
                       class="block w-full text-gray-600 bg-white border border-gray-300 rounded-lg cursor-pointer focus:ring focus:ring-blue-200 focus:outline-none">
            </div>

            <!-- Opslaan knop -->
            <div>
                <button type="submit" style="background-color: black; color: white; opacity: 1; padding: 10px 16px; border-radius: 4px;"
                        class="w-full bg-green-500 text-white font-medium py-2 px-4 rounded-lg hover:bg-green-600 focus:ring focus:ring-green-200 focus:outline-none">
                    Opslaan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
