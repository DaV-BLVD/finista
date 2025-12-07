@extends('admin.layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-primary mb-4">
        {{ isset($solution) ? 'Edit Solution' : 'Add New Solution' }}
    </h1>

    <form action="{{ isset($solution) ? route('solutions.update', $solution->id) : route('solutions.store') }}" 
          method="POST">
        @csrf
        @if(isset($solution))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label class="block mb-1 font-medium">Title</label>
            <input type="text" name="title" value="{{ old('title', $solution->title ?? '') }}" 
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Icon (FontAwesome Class)</label>
            <input type="text" name="icon" value="{{ old('icon', $solution->icon ?? '') }}" 
                   class="w-full border rounded px-3 py-2" placeholder="e.g. fa-solid fa-piggy-bank">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description', $solution->description ?? '') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Icon Color</label>
            <select name="color" class="w-full border rounded px-3 py-2">
                <option value="primary" {{ old('color', $solution->color ?? '') == 'primary' ? 'selected' : '' }}>Blue</option>
                <option value="secondary" {{ old('color', $solution->color ?? '') == 'secondary' ? 'selected' : '' }}>Golden</option>
            </select>
        </div>

        <button type="submit"
            class="px-4 py-2 bg-secondary text-primary rounded-lg font-semibold hover:bg-yellow-400 shadow">
            {{ isset($solution) ? 'Update' : 'Create' }}
        </button>

        <a href="{{ route('solutions.index') }}" 
           class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
           Cancel
        </a>
    </form>
</div>
@endsection
