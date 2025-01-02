<x-app-layout>
    <h1>Nieuwsbericht bewerken</h1>
    <form method="POST" action="{{ route('news.update', $news) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">Titel</label>
            <input type="text" name="title" id="title" value="{{ $news->title }}" required>
        </div>
        <div>
            <label for="content">Inhoud</label>
            <textarea name="content" id="content" required>{{ $news->content }}</textarea>
        </div>
        <div>
            <label for="image">Afbeelding</label>
            <input type="file" name="image" id="image">
        </div>
        <button type="submit">Bijwerken</button>
    </form>
</x-app-layout>
