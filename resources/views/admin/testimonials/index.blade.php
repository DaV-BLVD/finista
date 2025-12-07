@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-dark tracking-tight">💬 Testimonials</h1>

            <a href="{{ route('testimonials.create') }}"
                class="flex items-center space-x-2 bg-secondary text-primary px-4 py-2 rounded-md font-semibold transition-colors hover:bg-secondary/90 shadow focus:ring-2 focus:ring-secondary focus:ring-opacity-50">
                <i class="fas fa-plus"></i>
                <span>Add Testimonial</span>
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
                        <th class="px-4 py-3 text-left font-semibold text-sm">Name</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Designation</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Message</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                        <tr class="border-b hover:bg-gray-100 transition-colors">
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $testimonial->name }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $testimonial->designation }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ \Illuminate\Support\Str::limit($testimonial->message, 80) }}
                            </td>

                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('testimonials.edit', $testimonial->id) }}"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-primary/90 transition-colors duration-200 focus:ring-2 focus:ring-primary focus:ring-opacity-50">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </a>

                                    <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this testimonial?');"
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
                            <td colspan="5" class="p-8 text-center text-gray-500 bg-gray-50">
                                No testimonials found. Click **Add Testimonial** above to get started.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection