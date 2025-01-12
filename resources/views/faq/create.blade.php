<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded">

        <h1 class="text-3xl font-bold mb-4">FAQ Toevoegen</h1>

        <form method="POST" action="{{ route('faqs.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="question" class="block text-sm font-medium text-gray-700">Vraag:</label>
                <input type="text" name="question" id="question" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>

            <div>
                <label for="answer" class="block text-sm font-medium text-gray-700">Antwoord:</label>
                <textarea name="answer" id="answer" rows="4" required
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></textarea>
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Categorie:</label>
                <select name="category_id" id="category_id" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    <option value="">Selecteer een categorie</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
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
