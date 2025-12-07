@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold text-primary mb-4">
            {{ isset($step) ? 'Edit Step' : 'Add New Step' }}
        </h1>

        <form action="{{ isset($step) ? route('steps.update', $step->id) : route('steps.store') }}" method="POST">
            @csrf
            @if(isset($step))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label class="block mb-1 font-medium">Title</label>
                <input type="text" name="title" value="{{ old('title', $step->title ?? '') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Description</label>
                <textarea name="description"
                    class="w-full border rounded px-3 py-2">{{ old('description', $step->description ?? '') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Order</label>
                <input type="number" name="order" value="{{ old('order', $step->order ?? '') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Color</label>
                <select name="color" class="w-full border rounded px-3 py-2">
                    <option value="primary" {{ old('color', $step->color ?? '') == 'primary' ? 'selected' : '' }}>Blue
                    </option>
                    <option value="secondary" {{ old('color', $step->color ?? '') == 'secondary' ? 'selected' : '' }}>Golden
                    </option>
                </select>
            </div>

            <button type="submit"
                class="px-4 py-2 bg-secondary text-primary rounded-lg font-semibold hover:bg-yellow-400 shadow">
                {{ isset($step) ? 'Update' : 'Create' }}
            </button>

            <a href="{{ route('steps.index') }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Cancel</a>
        </form>
    </div>
@endsection