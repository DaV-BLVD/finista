@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">

        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">👑 Manage Admins</h1>

            <a href="{{ route('users.create') }}"
                class="flex items-center space-x-2 bg-secondary text-primary px-4 py-2 rounded-lg font-semibold transition-colors hover:bg-secondary/90 shadow focus:ring-2 focus:ring-secondary focus:ring-opacity-50">
                <i class="fas fa-user-plus"></i>
                <span>Add New Admin</span>
            </a>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-6 shadow-sm border border-green-200">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        {{-- Table Section --}}
        <div class="overflow-x-auto shadow-xl rounded-lg border border-gray-200">
            <table class="min-w-full bg-white divide-y divide-gray-200">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider w-16">SN</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider">Name</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider">Email</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider w-32">Role</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm uppercase tracking-wider w-40">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50 transition-colors">
                            {{-- ID --}}
                            <td class="px-4 py-3 text-gray-500 font-mono text-xs">{{ $loop->iteration }}</td>

                            {{-- Name --}}
                            <td class="px-4 py-3 text-gray-900 font-medium flex items-center space-x-3">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0D8ABC&color=fff"
                                    alt="Avatar" class="h-8 w-8 rounded-full object-cover">
                                <span>{{ $user->name }}</span>
                            </td>

                            {{-- Email --}}
                            <td class="px-4 py-3 text-gray-700">{{ $user->email }}</td>

                            {{-- Role --}}
                            <td class="px-4 py-3">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-secondary/20 text-secondary capitalize">
                                    {{ $user->role }}
                                </span>
                            </td>

                            {{-- Actions --}}
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    {{-- Edit Button --}}
                                    <a href="{{ route('users.edit', $user) }}"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-primary/90 transition-colors duration-200 shadow focus:ring-2 focus:ring-primary focus:ring-opacity-50">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>

                                    {{-- Delete Button --}}
                                    <form action="{{ route('users.destroy', $user) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete admin {{ $user->name }}?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200 shadow focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                            <i class="fas fa-trash-alt mr-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500 bg-gray-50">
                                <i class="fas fa-info-circle mr-2"></i> No admins found. Click **Add New Admin** to get started.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection