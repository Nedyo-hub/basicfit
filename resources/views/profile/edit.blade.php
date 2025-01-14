<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">Profiel Bewerken</h1>

                    <!-- Succesbericht -->
                    @if (session('success'))
                        <div class="mt-4 p-4 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Profielbewerking Formulier -->
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="mt-6">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gebruikersnaam</label>
                            <input type="text" name="username" id="username" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-900 dark:text-gray-300" value="{{ old('username', $user->username) }}">
                        </div>

                        <div class="mb-4">
                            <label for="birthday" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Verjaardag</label>
                            <input type="date" name="birthday" id="birthday" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-900 dark:text-gray-300" value="{{ old('birthday', $user->birthday) }}">
                        </div>

                        <div class="mb-4">
                            <label for="profile_picture" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Profielfoto</label>
                            <input type="file" name="profile_picture" id="profile_picture" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-900 dark:text-gray-300">
                            @if ($user->profile_picture)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profielfoto" class="w-24 h-24 rounded-full">
                                </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="about_me" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Over Mij</label>
                            <textarea name="about_me" id="about_me" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-900 dark:text-gray-300">{{ old('about_me', $user->about_me) }}</textarea>
                        </div>

                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Opslaan</button>
                    </form>

                    <form action="{{ route('profile.destroy') }}" method="POST" class="mt-6">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Profiel Verwijderen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
