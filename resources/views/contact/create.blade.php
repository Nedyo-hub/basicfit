<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Naam
                        </label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-700">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Email
                        </label>
                        <input type="email" name="email" id="email" required
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-700">
                    </div>

                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Bericht
                        </label>
                        <textarea name="message" id="message" rows="5" required
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-700"></textarea>
                    </div>

                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Verstuur
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
