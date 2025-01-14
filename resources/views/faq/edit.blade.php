<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h1 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-6">Bewerk FAQ</h1>
                    
                    <form action="{{ route('faqs.update', $faq->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        
                        <div>
                            <label for="question" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Vraag</label>
                            <input type="text" name="question" id="question" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-900 dark:text-gray-300" value="{{ $faq->question }}" required>
                        </div>

                        
                        <div>
                            <label for="answer" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Antwoord</label>
                            <textarea id="answer" name="answer" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-900 dark:text-gray-300" required>{{ $faq->answer }}</textarea>
                        </div>

                        
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categorie</label>
                            <select id="category_id" name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-900 dark:text-gray-300" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if($category->id == $faq->category_id) selected @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Opslaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
