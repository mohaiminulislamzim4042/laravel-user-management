<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="max-w-md">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="text" name="name" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none" placeholder="Enter Name" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" name="email" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none" placeholder="Enter Email" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Profile Photo:</label>
                        <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
                            Create User
                        </button>
                        <a href="{{ route('users.index') }}" class="text-blue-500 hover:text-blue-800 text-sm font-semibold">Back to List</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>