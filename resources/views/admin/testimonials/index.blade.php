@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-primary">Testimonials</h1>
            <a href="{{ route('testimonials.create') }}"
                class="bg-primary text-white px-4 py-2 rounded hover:bg-primary/90">
                + Add Testimonial
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
        @endif

        <table class="w-full table-auto border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">#</th>
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Designation</th>
                    <th class="border p-2">Message</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $testimonial)
                    <tr>
                        <td class="border p-2">{{ $loop->iteration }}</td>
                        <td class="border p-2">{{ $testimonial->name }}</td>
                        <td class="border p-2">{{ $testimonial->designation }}</td>
                        <td class="border p-2">{{ \Illuminate\Support\Str::limit($testimonial->message, 50) }}</td>
                        <td class="border p-2 flex gap-2">
                            <a href="{{ route('testimonials.edit', $testimonial->id) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST"
                                onsubmit="return confirm('Delete this testimonial?');">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-4">No testimonials found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection