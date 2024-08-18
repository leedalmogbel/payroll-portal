<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Product') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">Show Product</h2>
                    <a href="{{ route('products.index') }}"
                        class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Back</a>
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                    <p>{{ $product->name }}</p>
                </div>
                <div class="mb-4">
                    <label for="detail" class="block text-gray-700 font-bold mb-2">Details:</label>
                    <p>{{ $product->detail }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
