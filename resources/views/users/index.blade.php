<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Management
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-4">
                <form action="{{ route('users.index') }}" method="GET" class="flex gap-2">
                    <input type="text" name="search" placeholder="Search users..." value="{{ request('search') }}" class="border rounded px-4 py-2 focus:ring-blue-500">
                    <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-black">Search</button>
                </form>
                <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow">Add New User</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 border-b text-left">Photo</th> <th class="px-6 py-3 border-b text-left">Name</th>
                            <th class="px-6 py-3 border-b text-left">Email</th>
                            <th class="px-6 py-3 border-b text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 border-b">
                                @if($user->profile_image)
                                    <img src="{{ asset('images/' . $user->profile_image) }}" class="w-12 h-12 rounded-full object-cover border">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" class="w-12 h-12 rounded-full border">
                                @endif
                            </td>
                            <td class="px-6 py-4 border-b">{{ $user->name }}</td>
                            <td class="px-6 py-4 border-b">{{ $user->email }}</td>
                            <td class="px-6 py-4 border-b text-center">
                                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600 hover:underline mr-3">Edit</a>
                                <form action="{{ route('users.delete', $user->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('নিশ্চিত তো?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">No users found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>