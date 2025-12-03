@extends('admin.layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-primary mb-6">Add Testimonial</h1>

    <form action="{{ route('testimonials.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Position and Company/ Designation</label>
            <input type="text" name="designation" value="{{ old('designation') }}" class="w-full p-2 border rounded" placeholder="Eg. CEO, Nvidia">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Name Initials</label>
            <input type="text" name="initials" value="{{ old('initials') }}" class="w-full p-2 border rounded" maxlength="5" placeholder="Eg. JD for John Doe">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Message</label>
            <textarea name="message" class="w-full p-2 border rounded" required>{{ old('message') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Avatar Color</label>
            <select name="image_color" class="w-full p-2 border rounded">
                <option value="primary">Primary</option>
                <option value="secondary">Secondary</option>
                <option value="gray-500">Gray</option>
            </select>
        </div>

        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary/90">Add Testimonial</button>
    </form>
</div>
@endsection
