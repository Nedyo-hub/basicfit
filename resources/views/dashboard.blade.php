<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid min-h-screen grid-rows-[1fr_auto]">

    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-row justify-center space-x-4">
                        <a href="{{ route('news.index') }}" 
                           class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded transition duration-300">
                            Bekijk laatste nieuws
                        </a>
                        <a href="{{ route('faq.index') }}" 
                           class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded transition duration-300">
                            Bekijk FAQ
                        </a>
                        <a href="{{ route('contact') }}" 
                           class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded transition duration-300">
                            Contact
                        </a>
                        <a href="{{ route('forum.index') }}" 
                           class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded transition duration-300">
                            Forum
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-100 dark:bg-gray-700 text-center py-2 flex items-center justify-center">
        <span class="text-gray-900 dark:text-gray-100">
            {{ __("You're logged in!") }}
        </span>
    </footer>

    </div>
</x-app-layout>
