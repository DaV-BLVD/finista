@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold text-primary mb-6">
            {{ isset($feature) ? 'Edit Feature' : 'Add Feature' }}
        </h1>

        <form action="{{ isset($feature) ? route('why_finista.update', $feature->id) : route('why_finista.store') }}"
            method="POST">
            @csrf
            @if(isset($feature))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Icon (FontAwesome class)</label>
                <input type="text" name="icon" value="{{ old('icon', $feature->icon ?? '') }}"
                    class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Title</label>
                <input type="text" name="title" value="{{ old('title', $feature->title ?? '') }}"
                    class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Subtitle</label>
                <textarea name="subtitle" class="w-full p-2 border rounded"
                    required>{{ old('subtitle', $feature->subtitle ?? '') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Border Color (primary/secondary)</label>
                <input type="text" name="border_color"
                    value="{{ old('border_color', $feature->border_color ?? 'secondary') }}"
                    class="w-full p-2 border rounded">
            </div>

            <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90">
                {{ isset($feature) ? 'Update Feature' : 'Add Feature' }}
            </button>
            <a href="{{ route('partners.index') }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Cancel</a>
        </form>
    </div>
@endsection