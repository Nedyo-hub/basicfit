<x-app-layout>
    <h1>Nieuw nieuwsbericht toevoegen</h1>
    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Titel</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="content">Inhoud</label>
            <textarea name="content" id="content" required></textarea>
        </div>
        <div>
            <label for="image">Afbeelding</label>
            <input type="file" name="image" id="image">
        </div>
        <button type="submit">Opslaan</button>
    </form>
</x-app-layout>
