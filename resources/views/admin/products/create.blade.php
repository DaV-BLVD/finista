@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto bg-white rounded-lg shadow">
        <h1 class="text-2xl font-bold text-primary mb-6">{{ isset($product) ? 'Edit Product' : 'Add Product' }}</h1>

        {{-- Display Errors --}}
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded shadow">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if(isset($product)) @method('PUT') @endif

            {{-- Title --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Title</label>
                <input type="text" name="title" value="{{ old('title', $product->title ?? '') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            {{-- Subtitle --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Subtitle</label>
                <input type="text" name="subtitle" value="{{ old('subtitle', $product->subtitle ?? '') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Description</label>
                <textarea name="description"
                    class="w-full border rounded px-3 py-2">{{ old('description', $product->description ?? '') }}</textarea>
            </div>

            {{-- Color --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Color</label>
                <select name="color" class="w-full border rounded px-3 py-2">
                    <option value="primary" class="text-blue-600" {{ (old('color', $product->color ?? '') == 'primary') ? 'selected' : '' }}>
                        Blue
                    </option>
                    <option value="secondary" class="text-yellow-600" {{ (old('color', $product->color ?? '') == 'secondary') ? 'selected' : '' }}>
                        Golden
                    </option>
                </select>
            </div>


            {{-- Layout --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Layout</label>
                <select name="layout" class="w-full border rounded px-3 py-2">
                    <option value="image-left" {{ (old('layout', $product->layout ?? '') == 'image-left') ? 'selected' : '' }}>Image Left</option>
                    <option value="text-left" {{ (old('layout', $product->layout ?? '') == 'text-left') ? 'selected' : '' }}>
                        Text Left</option>
                </select>
            </div>

            {{-- Image --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Image</label>
                <input type="file" name="image" class="w-full border rounded px-3 py-2">
                @if(isset($product) && $product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="h-24 mt-2 rounded shadow">
                @endif
            </div>

            <hr class="my-6 border-gray-300">

            {{-- Features --}}
            <h2 class="text-xl font-bold mb-4">Features</h2>
            <div id="featuresContainer">
                @if(isset($product))
                    @foreach($product->features as $index => $feature)
                        <div class="flex items-center mb-2 space-x-2">
                            <input type="text" name="features[]" value="{{ $feature->feature }}"
                                class="flex-1 border rounded px-3 py-2">
                            <button type="button" onclick="this.parentElement.remove()"
                                class="px-3 py-1 bg-red-500 text-white rounded shadow hover:bg-red-600 transition">
                                ✕
                            </button>
                        </div>
                    @endforeach
                @endif
            </div>
            <button type="button" onclick="addFeature()"
                class="mb-6 px-4 py-2 bg-primary text-white rounded shadow hover:bg-green-600 transition">
                Add Feature
            </button>

            <div class="flex space-x-3">
                <button type="submit"
                    class="px-4 py-2 bg-secondary text-primary rounded font-semibold shadow hover:bg-secondary/90 transition">
                    {{ isset($product) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('products.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>

    <script>
        function addFeature() {
            const container = document.getElementById('featuresContainer');
            const html = `<div class="flex items-center mb-2 space-x-2">
                                        <input type="text" name="features[]" class="flex-1 border rounded px-3 py-2">
                                        <button type="button" onclick="this.parentElement.remove()" class="px-3 py-1 bg-red-500 text-white rounded shadow hover:bg-red-600 transition">✕</button>
                                      </div>`;
            container.insertAdjacentHTML('beforeend', html);
        }
    </script>
@endsection