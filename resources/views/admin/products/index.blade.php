@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">✨ Products Management</h1>

            <a href="{{ route('products.create') }}"
                class="flex items-center space-x-2 bg-secondary text-primary px-4 py-2 rounded-md font-semibold transition-colors hover:bg-secondary/90 shadow focus:ring-2 focus:ring-secondary focus:ring-opacity-50">
                <i class="fas fa-plus"></i>
                <span>Add New Product</span>
            </a>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table Section --}}
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-xl">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Title</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Subtitle</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Color</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Layout</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm w-40">Image</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm w-44">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($products as $product)
                        <tr class="border-b hover:bg-gray-100 transition-colors">
                            {{-- Title --}}
                            <td class="px-4 py-3 text-gray-900 font-medium">{{ $product->title }}</td>

                            {{-- Subtitle --}}
                            <td class="px-4 py-3 text-gray-900 font-medium">{{ $product->subtitle ?? '—' }}</td>

                            {{-- Color --}}
                            <td class="px-4 py-3">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $product->color === 'primary' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $product->color === 'primary' ? 'Primary (Blue)' : 'Secondary (Golden)' }}
                                </span>
                            </td>


                            {{-- Layout --}}
                            <td class="px-4 py-3 text-gray-700 font-medium">{{ $product->layout }}</td>

                            {{-- Image --}}
                            <td class="px-4 py-3 text-center">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                        class="h-12 w-12 rounded-md object-cover border shadow-sm mx-auto">
                                @else
                                    <span class="text-gray-400 text-sm">N/A</span>
                                @endif
                            </td>

                            {{-- Action Buttons --}}
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    {{-- Edit --}}
                                    <a href="{{ route('products.edit', $product) }}"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-primary/90 transition-colors duration-200 shadow focus:ring-2 focus:ring-primary focus:ring-opacity-50">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this product?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200 shadow focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                            <i class="fas fa-trash-alt mr-1"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-500 bg-gray-50">
                                <i class="fas fa-info-circle mr-2"></i>No products found.
                                Click <strong>Add New Product</strong> above to get started.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection