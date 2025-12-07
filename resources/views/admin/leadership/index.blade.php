@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-dark tracking-tight">👤 Leadership Team</h1>

            <a href="{{ route('leadership.create') }}"
                class="flex items-center space-x-2 bg-secondary text-primary px-4 py-2 rounded-md font-semibold transition-colors hover:bg-secondary/90 shadow focus:ring-2 focus:ring-secondary focus:ring-opacity-50">
                <i class="fas fa-plus"></i>
                <span>Add Leader</span>
            </a>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table Section --}}
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-xl">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-sm w-16">Image</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Name</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Position</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Description</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm w-40">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leaders as $leader)
                        <tr class="border-b hover:bg-gray-100 transition-colors">
                            <td class="px-4 py-3">
                                @if($leader->image)
                                    <img src="{{ asset('storage/' . $leader->image) }}"
                                         alt="{{ $leader->name }}"
                                         class="w-12 h-12 rounded-full object-cover shadow-md border-2 border-gray-200">
                                @else
                                    <i class="fa-solid fa-user-circle text-3xl text-gray-400"></i>
                                @endif
                            </td>
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $leader->name }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $leader->position }}</td>
                            <td class="px-4 py-3 text-gray-700">
                                {{ Str::limit($leader->description, 50) }}
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    {{-- Edit Button --}}
                                    <a href="{{ route('leadership.edit', $leader->id) }}"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-primary/90 transition-colors duration-200 focus:ring-2 focus:ring-primary focus:ring-opacity-50">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </a>

                                    {{-- Delete Form/Button --}}
                                    <form action="{{ route('leadership.destroy', $leader->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this leader?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200 focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                            <i class="fas fa-trash-alt mr-1"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500 bg-gray-50">
                                No leaders found. Click **Add Leader** above to get started.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection