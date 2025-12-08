@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        <div class="max-w-5xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-100">

            {{-- Header --}}
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8 border-b pb-4">
                <i class="fas fa-gem mr-2 text-primary"></i>
                {{ isset($product) ? 'Edit Highlighted Product' : 'Add New Highlighted Product' }}
            </h1>

            {{-- Display Errors --}}
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-lg border border-red-200 shadow-sm">
                    <p class="font-bold mb-2"><i class="fas fa-exclamation-triangle mr-2"></i> Please correct the following
                        errors:</p>
                    <ul class="list-disc pl-5 text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Structure --}}
            <form
                action="{{ isset($product) ? route('highlighted_products.update', $product) : route('highlighted_products.store') }}"
                method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @if(isset($product))
                    @method('PUT')
                @endif

                {{-- General Details Group --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block font-semibold mb-2 text-gray-700">Title <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="title" name="title" value="{{ $product->title ?? old('title') }}" required
                            class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                            placeholder="e.g., Premium Savings Account">
                    </div>

                    <div>
                        <label for="subtitle" class="block font-semibold mb-2 text-gray-700">Subtitle <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="subtitle" name="subtitle" value="{{ $product->subtitle ?? old('subtitle') }}"
                            required
                            class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                            placeholder="e.g., Earn High Interest">
                    </div>
                </div>

                <div>
                    <label for="description" class="block font-semibold mb-2 text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="5"
                        class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800 resize-y"
                        placeholder="A detailed overview of the product's benefits.">{{ $product->description ?? old('description') }}</textarea>
                </div>

                {{-- Order & Image Group --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="image" class="block font-semibold mb-2 text-gray-700">Product Image</label>
                        <input type="file" id="image" name="image"
                            class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">

                        @if(isset($product) && $product->image)
                            <p class="text-sm text-gray-500 mt-2">Current Image:</p>
                            <img src="{{ asset('storage/' . $product->image) }}"
                                class="w-24 h-16 object-cover mt-1 rounded-lg shadow border border-gray-200"
                                alt="Current Product Image">
                        @endif
                    </div>

                    {{-- <div>
                        <label for="order_index" class="block font-semibold mb-2 text-gray-700">Order Index</label>
                        <input type="number" id="order_index" name="order_index"
                            value="{{ $product->order_index ?? old('order_index', 0) }}"
                            class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                            placeholder="0">
                    </div> --}}
                </div>


                <hr class="my-6 border-gray-200">

                {{-- Features (Dynamic) --}}
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-list-ul mr-2 text-primary"></i> Key Features
                </h2>

                <div id="features-container" class="space-y-3 p-4 border border-gray-200 rounded-lg bg-gray-50">
                    @if(isset($product) && is_array($product->features))
                        @foreach($product->features as $feature)
                            <div class="flex gap-2 items-center">
                                <input type="text" name="features[]" value="{{ $feature }}" required
                                    class="flex-1 p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none text-gray-800"
                                    placeholder="Enter feature detail">
                                <button type="button" onclick="this.parentElement.remove()"
                                    class="px-3 py-3 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition duration-150">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>

                <button type="button" onclick="addFeature()"
                    class="mt-4 px-4 py-2 bg-primary text-white rounded-lg shadow hover:bg-primary/90 transition duration-150 font-semibold flex items-center space-x-2">
                    <i class="fas fa-plus mr-1"></i> Add Feature
                </button>


                <div class="flex space-x-3 pt-6">
                    <button type="submit"
                        class="px-6 py-3 bg-secondary text-primary rounded-lg font-bold shadow hover:bg-secondary/90 transition duration-150 focus:ring-2 focus:ring-secondary focus:ring-offset-2">
                        <i class="fas fa-save mr-1"></i> {{ isset($product) ? 'Update Product' : 'Add Product' }}
                    </button>

                    <a href="{{ route('highlighted_products.index') }}"
                        class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition duration-150">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    {{-- Script for dynamic feature addition --}}
    <script>
        function addFeature() {
            const container = document.getElementById('features-container');
            const div = document.createElement('div');
            div.className = 'flex gap-2 items-center';
            div.innerHTML = `
                            <input type="text" name="features[]" required 
                                class="flex-1 p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none text-gray-800" 
                                placeholder="Enter feature detail">
                            <button type="button" onclick="this.parentElement.remove()" class="px-3 py-3 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition duration-150">
                                <i class="fas fa-times"></i>
                            </button>
                        `;
            container.appendChild(div);
        }
    </script>
@endsection