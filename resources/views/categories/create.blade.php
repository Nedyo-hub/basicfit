<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-white mb-6">Nieuwe Categorie Toevoegen</h1>

            <form method="POST" action="{{ route('categories.store') }}" class="bg-gray-800 p-6 rounded-lg">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-300">Categorie Naam:</label>
                    <input type="text" name="name" id="name" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-900 text-white"style="color: black;">
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Opslaan</button>
            </form>
        </div>
    </div>
</x-app-layout>
