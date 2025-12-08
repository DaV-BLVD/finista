@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">

        {{-- Header Section and Add New Button --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">📰 News & Updates</h1>

            <a href="{{ route('news.create') }}"
                class="flex items-center space-x-2 bg-secondary text-primary px-4 py-2 rounded-lg font-semibold transition-colors hover:bg-secondary/90 shadow focus:ring-2 focus:ring-secondary focus:ring-opacity-50">
                <i class="fas fa-plus"></i>
                <span>Add New Article</span>
            </a>
        </div>

        {{-- Success Message (Placeholder) --}}
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
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider w-24">Image</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider">Title</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider">Subtitle</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm uppercase tracking-wider w-40">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse($items as $item)
                        <tr class="hover:bg-gray-50 transition-colors">
                            {{-- Image --}}
                            <td class="px-4 py-3">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" class="w-16 h-16 rounded-md object-cover shadow-sm border border-gray-100 mx-auto" alt="News Image">
                                @else
                                    <div class="w-16 h-16 bg-gray-100 rounded-md flex items-center justify-center text-gray-400 text-xs">N/A</div>
                                @endif
                            </td>

                            {{-- Title --}}
                            <td class="px-4 py-3 text-gray-900 font-medium">{{ $item->title }}</td>

                            {{-- Subtitle --}}
                            <td class="px-4 py-3 text-gray-700">{{ Str::limit($item->subtitle, 70) }}</td>

                            {{-- Actions --}}
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    {{-- Edit (assuming the create route usage was a typo and should be edit) --}}
                                    <a href="{{ route('news.edit', $item) }}"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-primary/90 transition-colors duration-200 shadow focus:ring-2 focus:ring-primary focus:ring-opacity-50">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('news.destroy', $item) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this news article?');"
                                        class="inline-block">
                                        @csrf @method('DELETE')
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
                            <td colspan="4" class="p-8 text-center text-gray-500 bg-gray-50">
                                <i class="fas fa-info-circle mr-2"></i> No news articles found. Click <strong>Add New Article</strong> above to get started.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection