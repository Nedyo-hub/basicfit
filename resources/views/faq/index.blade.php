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
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
