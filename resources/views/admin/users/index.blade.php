<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Gebruikersbeheer</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(auth()->user()->is_admin)
        <div class="text-right mb-4">
            <a href="{{ route('admin.user.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Nieuwe gebruiker aanmaken
            </a>
        </div>
    @endif

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Naam</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Admin Status</th>
                <th class="border px-4 py-2">Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->id }}</td>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->is_admin ? 'Admin' : 'Gebruiker' }}</td>
                    <td class="border px-4 py-2">
                        @if($user->is_admin)
                            <form method="POST" action="{{ route('admin.users.demote', $user) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Demote</button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('admin.users.promote', $user) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Promote</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
