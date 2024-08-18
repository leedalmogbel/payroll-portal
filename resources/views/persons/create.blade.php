<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Profile') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <!-- Link to go back to profile index -->
                        <a href="{{ route('profile.index') }}"
                            class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Back</a>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                        <input type="text" name="name" id="name"
                            class="form-input rounded-md shadow-sm w-full" placeholder="Name">
                    </div>
                    {{-- <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-bold mb-2">Image:</label>
                        <input type="file" name="image" id="image"
                            class="form-input rounded-md shadow-sm w-full">
                    </div> --}}
                    <div class="mb-4">
                        <label for="city_address" class="block text-gray-700 font-bold mb-2">City Address:</label>
                        <input type="text" name="name" id="city_address"
                            class="form-input rounded-md shadow-sm w-full" placeholder="City Addr..">
                    </div>
                    <div class="mb-4">
                        <label for="provincial_address" class="block text-gray-700 font-bold mb-2">Provincial
                            Address:</label>
                        <input type="text" name="name" id="provincial_address"
                            class="form-input rounded-md shadow-sm w-full" placeholder="City Addr..">
                    </div>
                    <div class="mb-4">
                        <label for="dob" class="block text-gray-700 font-bold mb-2">Date of Birth:</label>
                        <input type="text" name="name" id="dob"
                            class="form-input rounded-md shadow-sm w-full" placeholder="City Addr..">
                    </div>
                    <div class="mb-4">
                        <label for="pob" class="block text-gray-700 font-bold mb-2">Place of Birth:</label>
                        <input type="text" name="name" id="pob"
                            class="form-input rounded-md shadow-sm w-full" placeholder="City Addr..">
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
