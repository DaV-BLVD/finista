@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-dark tracking-tight">🌟 Core Values</h1>

            <a href="{{ route('core_values.create') }}"
                class="flex items-center space-x-2 bg-secondary text-primary px-4 py-2 rounded-md font-semibold transition-colors hover:bg-secondary/90 shadow focus:ring-2 focus:ring-secondary focus:ring-opacity-50">
                <i class="fas fa-plus"></i>
                <span>Add New Value</span>
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
                        <th class="px-4 py-3 text-center font-semibold text-sm">Icon</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Title</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Description</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Border Color</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Icon Color</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($values as $value)
                        <tr class="border-b hover:bg-gray-100 transition-colors">
                            <td class="px-4 py-3 text-center">
                                <i class="{{ $value->icon }} text-2xl"
                                    style="color: {{ $value->icon_color ?? '#000000' }};"></i>
                            </td>
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $value->title }}</td>
                            <td class="px-4 py-3 text-gray-700">
                                {{ Str::limit($value->description, 40) }}
                            </td>
                            <td class="px-4 py-3 text-gray-700">
                                @php
                                    // Map border_color class to actual color and friendly name
                                    $borderColors = [
                                        'border-primary/70' => ['color' => '#003262', 'name' => 'Blue'],
                                        'border-secondary/70' => ['color' => '#F59E0B', 'name' => 'Golden'],
                                    ];
                                    $borderColorValue = $borderColors[$value->border_color]['color'] ?? 'transparent';
                                    $borderColorName = $borderColors[$value->border_color]['name'] ?? '';
                                @endphp
                                <span class="inline-block w-4 h-4 rounded-full border-2"
                                    style="background-color: {{ $borderColorValue }}; border-color: {{ $borderColorValue }};"></span>
                                <span class="ml-2">{{ $borderColorName }}</span>
                            </td>

                            <td class="px-4 py-3 text-gray-700">
                                @php
                                    // Map icon_color class to actual color and friendly name
                                    $iconColors = [
                                        'text-primary' => ['color' => '#003262', 'name' => 'Blue'],
                                        'text-secondary' => ['color' => '#F59E0B', 'name' => 'Golden'],
                                    ];
                                    $iconColorValue = $iconColors[$value->icon_color]['color'] ?? 'transparent';
                                    $iconColorName = $iconColors[$value->icon_color]['name'] ?? '';
                                @endphp
                                <span class="inline-block w-4 h-4 rounded-full"
                                    style="background-color: {{ $iconColorValue }}; border: 1px solid #ccc;"></span>
                                <span class="ml-2">{{ $iconColorName }}</span>
                            </td>


                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('core_values.edit', $value->id) }}"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-primary/90 transition-colors duration-200 focus:ring-2 focus:ring-primary focus:ring-opacity-50">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </a>

                                    <form action="{{ route('core_values.destroy', $value->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this core value?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200 focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                            <i class="fas fa-trash-alt mr-1"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-8 text-center text-gray-500 bg-gray-50">
                                No core values found. Click **Add New Value** above to get started.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection