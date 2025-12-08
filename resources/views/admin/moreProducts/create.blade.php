@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto bg-white rounded-lg shadow">

        <h1 class="text-2xl font-bold mb-6">{{ isset($item) ? 'Edit Product Item' : 'Add New Product Item' }}</h1>

        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($item) ? route('more_products.update', $item) : route('more_products.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($item)) @method('PUT') @endif

            <div class="mb-4">
                <label class="block mb-1 font-medium">Type</label>
                <select name="type" class="w-full border rounded px-3 py-2">
                    <option value="large" {{ old('type', $item->type ?? '') == 'large' ? 'selected' : '' }}>Large</option>
                    <option value="regular" {{ old('type', $item->type ?? '') == 'regular' ? 'selected' : '' }}>Regular
                    </option>
                    <option value="cta" {{ old('type', $item->type ?? '') == 'cta' ? 'selected' : '' }}>CTA</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Title</label>
                <input type="text" name="title" value="{{ old('title', $item->title ?? '') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Description</label>
                <textarea name="description" rows="3"
                    class="w-full border rounded px-3 py-2">{{ old('description', $item->description ?? '') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Icon (FontAwesome)</label>
                <input type="text" name="icon" placeholder="fa-solid fa-video" value="{{ old('icon', $item->icon ?? '') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            {{-- <div class="mb-4">
                <label class="block mb-1 font-medium">Image</label>
                <input type="file" name="image" class="w-full border rounded px-3 py-2">
                @if(isset($item) && $item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" class="h-24 mt-2 rounded shadow">
                @endif
            </div> --}}

            <div class="mb-4">
                <label class="block mb-1 font-medium">Color</label>
                <select name="color" class="w-full border rounded px-3 py-2">
                    <option value="primary" {{ old('color', $item->color ?? '') == 'primary' ? 'selected' : '' }}>Primary
                        (Blue)</option>
                    <option value="secondary" {{ old('color', $item->color ?? '') == 'secondary' ? 'selected' : '' }}>
                        Secondary (Golden)</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Column Span (Large only)</label>
                <input type="number" name="column_span" value="{{ old('column_span', $item->column_span ?? 1) }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Button Text (CTA only)</label>
                <input type="text" name="button_text" value="{{ old('button_text', $item->button_text ?? '') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Button URL (CTA only)</label>
                <input type="text" name="button_url" value="{{ old('button_url', $item->button_url ?? '') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Order Index</label>
                <input type="number" name="order_index" value="{{ old('order_index', $item->order_index ?? 0) }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="flex space-x-3">
                <button type="submit"
                    class="px-4 py-2 bg-secondary text-primary rounded font-semibold hover:bg-secondary/90">
                    {{ isset($item) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('more_products.index') }}"
                    class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</a>
            </div>
        </form>
    </div>
@endsection