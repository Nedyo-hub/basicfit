<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-3xl font-bold mb-4">Categorie Bewerken</h1>

        <form method="POST" action="{{ route('categories.update', $category->id) }}" class="space-y-6">
            @csrf
            @method('PATCH')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Categorie Naam:</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>

            <div>
                <button type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent px-4 py-2 text-sm font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2"
                        style="background-color: black; color: white; opacity: 1;">
                    Opslaan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
