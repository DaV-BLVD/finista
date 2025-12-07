@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-3xl mx-auto">

        <h1 class="text-3xl font-bold text-primary mb-6">Edit {{ ucfirst($about_section->type) }} Section</h1>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded shadow">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('about_section.update', $about_section->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Title</label>
                <input type="text" name="title" value="{{ old('title', $about_section->title) }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Description</label>
                <textarea name="description" rows="6" class="w-full border rounded px-3 py-2"
                    required>{{ old('description', $about_section->description) }}</textarea>
            </div>

            {{-- Buttons --}}
            <div class="flex items-center space-x-3">
                <button type="submit"
                    class="px-4 py-2 bg-secondary text-primary rounded-lg font-semibold hover:bg-yellow-400 shadow">
                    Update
                </button>

                <a href="{{ route('about_section.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection