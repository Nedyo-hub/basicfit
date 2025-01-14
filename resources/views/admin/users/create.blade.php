<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Nieuwe Gebruiker Aanmaken</h1>

    @if($errors->any())
        <div class="bg-red-500 text-white p-4 mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.user.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Naam</label>
            <input type="text" name="name" id="name" class="w-full border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">Wachtwoord</label>
            <input type="password" name="password" id="password" class="w-full border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="is_admin" class="block text-gray-700">Adminrechten</label>
            <select name="is_admin" id="is_admin" class="w-full border-gray-300 rounded">
                <option value="0">Gebruiker</option>
                <option value="1">Admin</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Gebruiker Aanmaken
        </button>
    </form>
</x-app-layout>
