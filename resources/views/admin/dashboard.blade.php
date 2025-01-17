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
                                                @method('POST')
                                                <button type="submit" style="background-color: #00FF00; color: white; padding: 8px 16px; border-radius: 4px;"class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                                    Promoveer naar Admin
                                                </button>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ route('admin.user.demote', $user->id) }}" class="inline-block">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" style="background-color: #f56565; color: white; padding: 8px 16px; border-radius: 4px;"class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
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

        <!-- Formulier voor nieuwe gebruiker -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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

                        <button type="submit" style="background-color:rgb(0, 0, 0); color: white; padding: 8px 16px; border-radius: 4px;"class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Gebruiker Aanmaken
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
