@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">📄 Header Sections Management</h1>

            {{-- Only show "Add Section" if there are no headers for a page --}}
            @if($headers->count() < 1)
                <a href="{{ route('headers.create') }}"
                    class="flex items-center space-x-2 bg-secondary text-primary px-4 py-2 rounded-lg font-semibold transition-colors hover:bg-secondary/90 shadow focus:ring-2 focus:ring-secondary focus:ring-opacity-50">
                    <i class="fas fa-plus"></i>
                    <span>Add New Section</span>
                </a>
            @endif
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
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider">Page</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider">Badge</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider">Title</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider">Description</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm uppercase tracking-wider w-20">Image</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm uppercase tracking-wider w-40">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($headers as $section)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 text-gray-900 font-medium">{{ $section->page }}</td>
                            <td class="px-4 py-3 text-gray-700">
                                <span
                                    class="px-2 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-secondary/20 text-secondary">
                                    {{ $section->badge_text ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-gray-700">{{ $section->title }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ Str::limit($section->description, 40) ?? 'N/A' }}</td>

                            {{-- Image --}}
                            <td class="px-4 py-3 text-center">
                                @if($section->image)
                                    <img src="{{ asset('storage/' . $section->image) }}" alt="Image"
                                        class="h-10 w-10 object-cover rounded-md shadow-sm mx-auto border border-gray-100">
                                @else
                                    <span class="text-gray-400 text-xs">N/A</span>
                                @endif
                            </td>

                            {{-- Actions --}}
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    {{-- Edit Button --}}
                                    <a href="{{ route('headers.edit', $section) }}"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-primary/90 transition-colors duration-200 shadow focus:ring-2 focus:ring-primary focus:ring-opacity-50">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>

                                    {{-- Delete Button --}}
                                    <form action="{{ route('headers.destroy', $section) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this page section?');"
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
                            <td colspan="7" class="p-8 text-center text-gray-500 bg-gray-50">
                                <i class="fas fa-info-circle mr-2"></i> No page sections found.
                                @if($headers->count() < 1)
                                    Click <strong>Add New Section</strong> above to get started.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection