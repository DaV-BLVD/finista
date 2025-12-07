@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-dark tracking-tight">💡 Solutions Management</h1>

            <a href="{{ route('solutions.create') }}"
                class="flex items-center space-x-2 bg-secondary text-primary px-4 py-2 rounded-md font-semibold transition-colors hover:bg-secondary/90 shadow focus:ring-2 focus:ring-secondary focus:ring-opacity-50">
                <i class="fas fa-plus"></i>
                <span>Add New Solution</span>
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
            @php
                // Map theme names to actual color codes
                $colorMap = [
                    'primary' => '#003262',   // Blue
                    'secondary' => '#FDB515', // Golden
                ];
            @endphp

            <table class="min-w-full bg-white rounded-lg shadow-xl">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Title</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm">Icon</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Color</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Description</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm w-40">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($solutions as $solution)
                        <tr class="border-b hover:bg-gray-100 transition-colors">
                            {{-- Title --}}
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $solution->title }}</td>

                            {{-- Icon --}}
                            <td class="px-4 py-3 text-center">
                                <i class="{{ $solution->icon }} text-2xl"
                                   style="color: {{ $colorMap[$solution->color] ?? '#000' }};"></i>
                            </td>

                            {{-- Color --}}
                            <td class="px-4 py-3 text-gray-700">
                                <span class="inline-block w-4 h-4 rounded-full mr-2"
                                    style="background-color: {{ $colorMap[$solution->color] ?? '#ccc' }}; border: 1px solid #ccc;"></span>
                                {{ ucfirst($solution->color) }}
                            </td>

                            {{-- Description --}}
                            <td class="px-4 py-3 text-gray-700">
                                {{ Str::limit($solution->description, 50) }}
                            </td>

                            {{-- Action --}}
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    {{-- Edit --}}
                                    <a href="{{ route('solutions.edit', $solution->id) }}"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-primary/90 transition-colors duration-200 focus:ring-2 focus:ring-primary focus:ring-opacity-50">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('solutions.destroy', $solution->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this solution?');"
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
                                No solutions found. Click <strong>Add New Solution</strong> above to get started.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
