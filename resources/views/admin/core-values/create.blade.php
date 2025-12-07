@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold text-primary mb-4">Add Core Value</h1>

        <form action="{{ route('core_values.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium">Icon (FontAwesome Class)</label>
                <input type="text" name="icon" value="{{ old('icon') }}" placeholder="fa-solid fa-users-line"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Description</label>
                <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
            </div>

            <!-- Border Color Dropdown -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Border Color</label>
                <select name="border_color" class="w-full border rounded px-3 py-2">
                    <option value="border-primary/70" {{ old('border_color') == 'border-primary/70' ? 'selected' : '' }}>Blue
                    </option>
                    <option value="border-golden/70" {{ old('border_color') == 'border-golden/70' ? 'selected' : '' }}>Golden
                    </option>
                </select>
            </div>

            <!-- Icon Color Dropdown -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Icon Color</label>
                <select name="icon_color" class="w-full border rounded px-3 py-2">
                    <option value="text-primary" {{ old('icon_color') == 'text-primary' ? 'selected' : '' }}>Blue</option>
                    <option value="text-secondary" {{ old('icon_color') == 'text-secondary' ? 'selected' : '' }}>Golden
                    </option>
                </select>
            </div>

            <button type="submit"
                class="px-4 py-2 bg-primary text-white rounded-lg font-semibold hover:bg-yellow-400 shadow">
                Save
            </button>

            <a href="{{ route('core_values.index') }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                Cancel
            </a>
        </form>
    </div>
@endsection