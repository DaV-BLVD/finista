@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold text-primary mb-4">{{ isset($partner) ? 'Edit' : 'Add' }} Partner</h1>

        <form action="{{ isset($partner) ? route('partners.update', $partner->id) : route('partners.store') }}"
            method="POST">
            @csrf
            @if(isset($partner)) @method('PUT') @endif

            <div class="mb-4">
                <label class="block mb-1 font-medium">Icon (FontAwesome class)</label>
                <input type="text" name="icon" value="{{ old('icon', $partner->icon ?? '') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Title</label>
                <input type="text" name="title" value="{{ old('title', $partner->title ?? '') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Subtitle</label>
                <input type="text" name="subtitle" value="{{ old('subtitle', $partner->subtitle ?? '') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Type</label>
                <select name="type" class="w-full border rounded px-3 py-2">
                    <option value="brand" {{ old('type', $partner->type ?? '') === 'brand' ? 'selected' : '' }}>Brand</option>
                    <option value="feature" {{ old('type', $partner->type ?? '') === 'feature' ? 'selected' : '' }}>Feature
                    </option>
                </select>
            </div>

            <button type="submit"
                class="px-4 py-2 bg-secondary text-primary rounded-lg font-semibold hover:bg-yellow-400 shadow">
                {{ isset($partner) ? 'Update' : 'Add' }}

            </button>
            <a href="{{ route('partners.index') }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Cancel</a>
        </form>
    </div>
@endsection