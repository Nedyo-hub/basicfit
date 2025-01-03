<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col space-y-4">
                        <!-- Knoppen -->
                        <div class="flex flex-row space-x-4">
                            <a href="{{ route('news.index') }}" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded">
                                Bekijk laatste nieuws
                            </a>
                            @if (auth()->user()->role === 'admin')
                                <a href="{{ route('news.create') }}" class="text-white bg-green-500 hover:bg-green-600 px-4 py-2 rounded">
                                    Nieuw nieuwsbericht toevoegen
                                </a>
                            @endif
                        </div>
                        <a href="{{ route('faq.index') }}" class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded">
        Bekijk FAQ
    </a>
    @if (auth()->user()->role === 'admin')
        <a href="{{ route('faq.create') }}" class="text-white bg-green-500 hover:bg-green-700 px-4 py-2 rounded">
            Voeg FAQ toe
        </a>
    @endif
                        <!-- Dashboard info -->
                        <div class="mt-10">
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded shadow">
                                {{ __("You're logged in!") }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
