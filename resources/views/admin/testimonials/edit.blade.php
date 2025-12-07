@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold text-primary mb-6">Edit Testimonial</h1>

        <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Name</label>
                <input type="text" name="name" value="{{ old('name', $testimonial->name) }}"
                    class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Designation</label>
                <input type="text" name="designation" value="{{ old('designation', $testimonial->designation) }}"
                    class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Initials</label>
                <input type="text" name="initials" value="{{ old('initials', $testimonial->initials) }}"
                    class="w-full p-2 border rounded" maxlength="5">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Message</label>
                <textarea name="message" class="w-full p-2 border rounded"
                    required>{{ old('message', $testimonial->message) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Avatar Color</label>
                <select name="image_color" class="w-full p-2 border rounded">
                    <option value="primary" {{ $testimonial->image_color == 'primary' ? 'selected' : '' }}>Primary</option>
                    <option value="secondary" {{ $testimonial->image_color == 'secondary' ? 'selected' : '' }}>Secondary
                    </option>
                    <option value="gray-500" {{ $testimonial->image_color == 'gray-500' ? 'selected' : '' }}>Gray</option>
                </select>
            </div>

            <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary/90">Update
                Testimonial</button>
            <a href="{{ route('testimonials.index') }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Cancel</a>
        </form>
    </div>
@endsection