@extends('admin.layouts.app')

@section('content')
    <div class="p-6"> {{-- Removed max-w-5xl mx-auto to use full admin content width, kept standard padding --}}

        <div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg p-8"> {{-- Added a container for form centralization and
            styling --}}

            <h1 class="text-3xl font-extrabold text-gray-900 mb-8 border-b pb-4">
                <i class="fas fa-map-pin mr-2 text-primary"></i>
                {{ isset($map_location) ? 'Edit Map Location' : 'Add New Map Location' }}
            </h1>

            {{-- Validation Errors --}}
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-300 text-red-700 rounded-lg shadow-sm">
                    <p class="font-semibold mb-2">Please correct the following errors:</p>
                    <ul class="list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ isset($map_location) ? route('map_locations.update', $map_location) : route('map_locations.store') }}"
                method="POST">
                @csrf
                @if(isset($map_location)) @method('PUT') @endif

                {{-- Title Field --}}
                <div class="mb-6">
                    <label for="title" class="block mb-2 font-semibold text-gray-700">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $map_location->title ?? '') }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary transition duration-150"
                        placeholder="e.g., Main Branch, Downtown Office">
                </div>

                {{-- Latitude Field --}}
                <div class="mb-6">
                    <label for="latitude" class="block mb-2 font-semibold text-gray-700">Latitude</label>
                    <input type="text" id="latitude" name="latitude"
                        value="{{ old('latitude', $map_location->latitude ?? '') }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary transition duration-150"
                        placeholder="e.g., 34.0522">
                </div>

                {{-- Longitude Field --}}
                <div class="mb-6">
                    <label for="longitude" class="block mb-2 font-semibold text-gray-700">Longitude</label>
                    <input type="text" id="longitude" name="longitude"
                        value="{{ old('longitude', $map_location->longitude ?? '') }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary transition duration-150"
                        placeholder="e.g., -118.2437">
                </div>

                {{-- Sort Order Field --}}
                <div class="mb-8">
                    <label for="sort_order" class="block mb-2 font-semibold text-gray-700">Sort Order</label>
                    <input type="number" id="sort_order" name="sort_order"
                        value="{{ old('sort_order', $map_location->sort_order ?? 0) }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary transition duration-150"
                        placeholder="0">
                </div>

                {{-- Action Buttons --}}
                <div class="flex justify-start space-x-3">
                    <button type="submit"
                        class="px-6 py-2.5 bg-secondary text-primary font-bold rounded-lg shadow-md hover:bg-secondary/90 transition duration-150">
                        <i class="fas fa-save mr-1"></i> {{ isset($map_location) ? 'Update Location' : 'Create Location' }}
                    </button>
                    <a href="{{ route('map_locations.index') }}"
                        class="px-5 py-2.5 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition duration-150 shadow-sm">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>
@endsection