@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-dark tracking-tight">✨ Features Management</h1>

            <a href="{{ route('features.create') }}"
                class="flex items-center space-x-2 bg-secondary text-primary px-4 py-2 rounded-md font-semibold transition-colors hover:bg-secondary/90 shadow focus:ring-2 focus:ring-secondary focus:ring-opacity-50">
                <i class="fas fa-plus"></i>
                <span>Add New Feature</span>
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
                        <th class="px-4 py-3 text-left font-semibold text-sm">Title</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm"> Highlighted Title</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Category</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm">Image</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm w-40">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($features as $feature)
                        <tr class="border-b hover:bg-gray-100 transition-colors">

                            {{-- Title --}}
                            <td class="px-4 py-3 text-gray-900 font-medium">
                                {{ $feature->title }}
                            </td>

                            <td class="px-4 py-3 text-gray-900 font-medium">
                                {{ $feature->subtitle }}
                            </td>

                            {{-- Category --}}
                            <td class="px-4 py-3">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ $feature->category }}
                                </span>
                            </td>

                            {{-- Image --}}
                            <td class="px-4 py-3 text-center">
                                @if($feature->image)
                                    <img src="{{ asset('storage/' . $feature->image) }}"
                                        class="h-12 w-12 rounded-full object-cover border shadow-sm mx-auto">
                                @else
                                    <span class="text-gray-400 text-sm">N/A</span>
                                @endif
                            </td>

                            {{-- Action Buttons --}}
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">

                                    {{-- Edit --}}
                                    <a href="{{ route('features.edit', $feature) }}"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-primary/90 transition-colors duration-200 shadow focus:ring-2 focus:ring-primary focus:ring-opacity-50">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('features.destroy', $feature) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this feature?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200 shadow focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                            <i class="fas fa-trash-alt mr-1"></i>Delete
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500 bg-gray-50">
                                <i class="fas fa-info-circle mr-2"></i>No features found.
                                Click <strong>Add New Feature</strong> above to get started.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection