<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User: {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="max-w-md">
                    @csrf
                    @method('PUT') 
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Profile Photo:</label>
                        <div class="mb-3">
                            @if($user->profile_image)
                                <p class="text-xs text-gray-500 mb-1">Current Photo:</p>
                                <img src="{{ asset('images/' . $user->profile_image) }}" class="w-20 h-20 rounded shadow-md border mb-2 object-cover">
                            @endif
                        </div>
                        <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                            Update User
                        </button>
                        <a href="{{ route('users.index') }}" class="text-gray-600 hover:underline">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>