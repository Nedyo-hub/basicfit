<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 >Welkom op het Admin Dashboard</h1>
                    <h2>Gebruikers beheren</h2>
                    <table class="min-w-full border-collapse border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border border-gray-300 px-4 py-2">ID</th>
            <th class="border border-gray-300 px-4 py-2">Naam</th>
            <th class="border border-gray-300 px-4 py-2">Email</th>
            <th class="border border-gray-300 px-4 py-2">Rol</th>
            <th class="border border-gray-300 px-4 py-2">Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr class="text-center">
                <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    {{ $user->is_admin ? 'Admin' : 'User' }}
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    @if(!$user->is_admin)
                        <form method="POST" action="{{ route('admin.user.promote', $user->id) }}" class="inline-block">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                Promoveer naar Admin
                            </button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('admin.user.demote', $user->id) }}" class="inline-block">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Demoteer naar User
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
