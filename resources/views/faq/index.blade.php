<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-white text-4xl font-bold mb-6 text-center">FAQ</h1>

            @foreach ($categories as $category)
                <div class="bg-gray-800 p-6 mb-4 rounded-lg shadow-lg">
                    <h2 class="text-xl text-white font-semibold mb-4">{{ $category->name }}</h2>
                    <ul>
                        @foreach ($category->faqs as $faq)
                            <li class="mb-2">
                                <strong class="text-white">{{ $faq->question }}</strong>
                                <p class="text-gray-400">{{ $faq->answer }}</p>
                                @if (auth()->check() && auth()->user()->is_admin)
                                    <div class="mt-2">
                                        <a href="{{ route('faqs.edit', $faq->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Wijzig</a>
                                        <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" onclick="return confirm('Weet je zeker dat je deze vraag wilt verwijderen?')">
                                                Verwijder
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                    @if (auth()->check() && auth()->user()->is_admin)
                        <div class="flex justify-end mt-4 space-x-2">
                            <a href="{{ route('categories.edit', $category->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                Wijzigen
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze categorie wilt verwijderen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Verwijderen
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach

            @if (auth()->check() && auth()->user()->is_admin)
                <div class="mt-6 flex space-x-4">
                    <a href="{{ route('faqs.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Nieuwe FAQ toevoegen</a>

                    <a href="{{ route('categories.create') }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Nieuwe Categorie toevoegen</a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
