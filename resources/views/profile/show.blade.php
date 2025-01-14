<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                    <p>Email: {{ $user->email }}</p>
                    <p>Geregistreerd op: {{ $user->created_at->format('d-m-Y') }}</p>
                    @if ($user->about_me)
                        <p>Over mij: {{ $user->about_me }}</p>
                    @endif
                    @if ($user->profile_picture)
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profielfoto" class="rounded-full w-24 h-24">
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
