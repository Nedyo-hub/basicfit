<x-app-layout>
    <h1>Profiel Bewerken</h1>
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div>
            <label for="username">Gebruikersnaam</label>
            <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}">
        </div>

        <div>
            <label for="birthday">Verjaardag</label>
            <input type="date" name="birthday" id="birthday" value="{{ old('birthday', $user->birthday) }}">
        </div>

        <div>
            <label for="profile_picture">Profielfoto</label>
            <input type="file" name="profile_picture" id="profile_picture">
        </div>

        <div>
            <label for="about_me">Over mij</label>
            <textarea name="about_me" id="about_me">{{ old('about_me', $user->about_me) }}</textarea>
        </div>

        <button type="submit">Opslaan</button>
    </form>
</x-app-layout>
