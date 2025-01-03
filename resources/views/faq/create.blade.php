<x-app-layout>
    <h1 class="text-white text-4xl font-bold mb-6 text-center">FAQ Toevoegen</h1>
    <form method="POST" action="{{ route('faq.store') }}">
        @csrf
        <div>
            <label for="question" class="text-white">Vraag:</label>
            <input type="text" name="question" id="question" required>
        </div>
        <div>
            <label for="answer" class="text-white">Antwoord:</label>
            <textarea name="answer" id="answer" required></textarea>
        </div>
        <div>
            <label for="category_id" class="text-white">Categorie:</label>
            <select name="category_id" id="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Opslaan</button>
    </form>
</x-app-layout>
