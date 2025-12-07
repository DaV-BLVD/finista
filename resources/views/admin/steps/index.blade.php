@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            {{-- Updated Title Style --}}
            <h1 class="text-3xl font-bold text-primary">Banking Steps</h1>

            {{-- Updated Button Style to match the example (using a generic SVG icon) --}}
            <a href="{{ route('steps.create') }}"
                class="flex items-center space-x-2 bg-secondary text-primary px-4 py-2 rounded-md font-semibold transition-colors hover:bg-secondary/90 shadow">
                {{-- Icon for Add New Step --}}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Add New Step</span>
            </a>
        </div>

        @if(session('success'))
            {{-- Added shadow-sm for a modern look --}}
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            {{-- Added rounded-lg and shadow-xl for better table appearance --}}
            <table class="min-w-full bg-white rounded-lg shadow-xl">
                <thead class="bg-primary text-white">
                    <tr>
                        {{-- Updated Header Styles --}}
                        <th class="px-4 py-3 text-left font-semibold text-sm">Order</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Title</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Description</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Color</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($steps as $step)
                        @php
                            // Determine display name for color
                            $colorNames = [
                                'primary' => 'Blue',
                                'secondary' => 'Golden',
                            ];
                            $displayColor = $colorNames[$step->color] ?? ucfirst($step->color);
                            // Determine color class
                            $colorClass = $step->color == 'primary' ? 'bg-primary' : 'bg-secondary';
                        @endphp
                        {{-- Added transition-colors for smoother hover effect --}}
                        <tr class="border-b hover:bg-gray-100 transition-colors">
                            <td class="px-4 py-3">{{ $step->order }}</td>
                            <td class="px-4 py-3">{{ $step->title }}</td>
                            <td class="px-4 py-3">{{ Str::limit($step->description, 50) }}</td>
                            <td class="px-4 py-3">
                                {{-- Using dynamic Tailwind classes and display name --}}
                                <span class="inline-block w-4 h-4 rounded-full {{ $colorClass }}"></span>
                                <span class="ml-2">{{ $displayColor }}</span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    {{-- Updated Edit Button Style with Icon --}}
                                    <a href="{{ route('steps.edit', $step->id) }}"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-primary/90 transition">
                                        {{-- Icon for Edit --}}
                                        <svg class="w-4 h-4 inline-block mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        Edit
                                    </a>
                                    {{-- Updated Delete Button Style with Icon --}}
                                    <form action="{{ route('steps.destroy', $step->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this step?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                                            {{-- Icon for Delete --}}
                                            <svg class="w-4 h-4 inline-block mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        {{-- Updated No Steps Found Style --}}
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-500 bg-gray-50">
                                No steps found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection