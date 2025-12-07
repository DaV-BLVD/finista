@extends('admin.layouts.app')

@section('content')
    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-primary mb-6">Journey Timeline</h1>

            <a href="{{ route('journeys.create') }}"
                class="flex items-center space-x-2 bg-secondary text-primary px-4 py-2 rounded-md font-semibold transition-colors hover:bg-secondary/90 shadow mb-6">
                <i class="fas fa-plus"></i>
                <span>Add New Step</span>
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-xl">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Step</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Title</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Description</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Color</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($journeys as $journey)
                        @php
                            $colorNames = [
                                'primary' => 'Blue',
                                'secondary' => 'Golden',
                            ];
                            $displayColor = $colorNames[$journey->color] ?? ucfirst($journey->color);
                        @endphp
                        <tr class="border-b hover:bg-gray-100 transition-colors">
                            <td class="px-4 py-3">{{ $journey->step }}</td>
                            <td class="px-4 py-3">{{ $journey->title }}</td>
                            <td class="px-4 py-3">{{ Str::limit($journey->description, 50) }}</td>
                            <td class="px-4 py-3">
                                <span
                                    class="inline-block w-4 h-4 rounded-full {{ $journey->color == 'primary' ? 'bg-primary' : 'bg-secondary' }}"></span>
                                <span class="ml-2">{{ $displayColor }}</span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">

                                    <a href="{{ route('journeys.edit', $journey->id) }}"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-primary/90 transition">
                                        <i class="fas fa-edit mr-1"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('journeys.destroy', $journey->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this step?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-500 bg-gray-50">
                                No journey steps found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection