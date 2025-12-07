@extends('admin.layouts.app')

@section('content')
    <div class="p-6">

        <h1 class="text-2xl font-bold text-primary mb-4">Add New Journey Step</h1>

        <form action="{{ route('journeys.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium">Step Number</label>
                <input type="number" name="step" value="{{ old('step') }}" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Description</label>
                <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Circle Color</label>
                <select name="color" class="w-full border rounded px-3 py-2">
                    <option value="primary" {{ old('color') == 'primary' ? 'selected' : '' }}>Blue</option>
                    <option value="secondary" {{ old('color') == 'secondary' ? 'selected' : '' }}>Golden</option>
                </select>
            </div>

            <button type="submit"
                class="px-4 py-2 bg-secondary text-primary rounded-lg font-semibold hover:bg-yellow-400 shadow">
                Create
            </button>

            <a href="{{ route('journeys.index') }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                Cancel
            </a>
        </form>
    </div>
@endsection