@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold">📦 More Products</h1>
            <a href="{{ route('more_products.create') }}"
                class="bg-secondary text-primary px-4 py-2 rounded font-semibold hover:bg-secondary/90">
                <i class="fas fa-plus mr-1"></i> Add New
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-xl">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">Title</th>
                        <th class="px-4 py-3 text-left">Type</th>
                        <th class="px-4 py-3 text-left">Color</th>
                        <th class="px-4 py-3 text-left">Icon</th>
                        <th class="px-4 py-3 text-left">Order</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($moreProducts as $item)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $item->title }}</td>
                            <td class="px-4 py-3">{{ ucfirst($item->type) }}</td>
                            <td class="px-4 py-3">{{ ucfirst($item->color) }}</td>
                            <td class="px-4 py-3"><i class="{{ $item->icon }}"></i></td>
                            <td class="px-4 py-3">{{ $item->order_index }}</td>
                            <td class="px-4 py-3 text-center flex justify-center space-x-2">
                                <a href="{{ route('more_products.edit', $item) }}"
                                    class="bg-primary text-white px-3 py-1 rounded hover:bg-primary/90">
                                    <i class="fas fa-edit mr-1"></i>Edit
                                </a>
                                <form action="{{ route('more_products.destroy', $item) }}" method="POST"
                                    onsubmit="return confirm('Delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                        <i class="fas fa-trash-alt mr-1"></i>Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-500">No items found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection