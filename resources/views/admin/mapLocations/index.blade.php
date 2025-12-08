@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">

        {{-- Header and Add New Button --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-primary">📍 Map Locations</h1>
            
            <a href="{{ route('map_locations.create') }}"
                class="bg-secondary text-primary px-4 py-2 rounded-lg font-semibold hover:bg-secondary/80 shadow transition duration-150">
                <i class="fas fa-plus mr-1"></i> Add New Location
            </a>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4 shadow-md border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table Container --}}
        <div class="overflow-x-auto shadow-xl rounded-lg border border-gray-200">
            <table class="min-w-full bg-white divide-y divide-gray-200">
                
                {{-- Table Header --}}
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider">Title</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider">Latitude</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider">Longitude</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider">Sort Order</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm uppercase tracking-wider w-44">Actions</th>
                    </tr>
                </thead>

                {{-- Table Body --}}
                <tbody class="divide-y divide-gray-200">
                    @forelse($locations as $location)
                        <tr class="hover:bg-gray-50 transition duration-100">
                            <td class="px-4 py-3 font-medium text-gray-800">{{ $location->title }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $location->latitude }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $location->longitude }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $location->sort_order }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    {{-- Edit Button --}}
                                    <a href="{{ route('map_locations.edit', $location) }}"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-primary/90 shadow transition duration-150">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>

                                    {{-- Delete Form/Button --}}
                                    <form action="{{ route('map_locations.destroy', $location) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete the location: {{ $location->title }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm bg-red-600 text-white rounded-md hover:bg-red-700 shadow transition duration-150">
                                            <i class="fas fa-trash-alt mr-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500 bg-gray-50 rounded-b-lg">
                                <i class="fas fa-info-circle mr-2"></i> No locations found. Please add a new location using the button above.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection