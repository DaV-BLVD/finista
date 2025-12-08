@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">

        {{-- Header Section and Add New Button --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">✨ Highlighted Product Management</h1>

            {{-- Only show Add button if no product exists (or check for $canAdd) --}}
            @if(isset($canAdd) && $canAdd)
                <a href="{{ route('highlighted_products.create') }}"
                    class="flex items-center space-x-2 bg-secondary text-primary px-4 py-2 rounded-lg font-semibold transition-colors hover:bg-secondary/90 shadow focus:ring-2 focus:ring-secondary focus:ring-opacity-50">
                    <i class="fas fa-plus"></i>
                    <span>Add New Product</span>
                </a>
            @endif
        </div>

        {{-- Success Message (Placeholder) --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-6 shadow-sm border border-green-200">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        {{-- Table Section --}}
        <div class="overflow-x-auto shadow-xl rounded-lg border border-gray-200">
            <table class="min-w-full bg-white divide-y divide-gray-200">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider">Title</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider">Subtitle</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider">Description</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm uppercase tracking-wider w-24">Image</th>
                        {{-- <th class="px-4 py-3 text-center font-semibold text-sm uppercase tracking-wider w-20">Order</th> --}}
                        <th class="px-4 py-3 text-center font-semibold text-sm uppercase tracking-wider w-40">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($products as $product)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 text-gray-900 font-medium">{{ $product->title }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $product->subtitle }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ Str::limit($product->description, 50) }}</td>
                            <td class="px-4 py-3 text-center">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image"
                                    class="h-12 w-16 object-cover rounded-md shadow-sm mx-auto border border-gray-100">
                            </td>
                            {{-- <td class="px-4 py-3 text-center text-gray-700 font-medium">{{ $product->order_index }}</td> --}}
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    {{-- Edit Button (assuming create route is wrong, and should point to edit) --}}
                                    <a href="{{ route('highlighted_products.edit', $product) }}"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-primary/90 transition-colors duration-200 shadow focus:ring-2 focus:ring-primary focus:ring-opacity-50">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>

                                    {{-- Delete Button (assuming soft delete is not used) --}}
                                    <form action="{{ route('highlighted_products.destroy', $product) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this highlighted product?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200 shadow focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                            <i class="fas fa-trash-alt mr-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-500 bg-gray-50">
                                <i class="fas fa-info-circle mr-2"></i> No highlighted product found.
                                @if(isset($canAdd) && $canAdd)
                                    Click <strong>Add New Product</strong> above to get started.
                                @else
                                    The highlighted product area is empty.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection