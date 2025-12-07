@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        @php
            // Determine if this is Create or Edit
            $isEdit = isset($leadership);
            $title = $isEdit ? 'Edit Leader: ' . $leadership->name : 'Add New Leader';
            $buttonText = $isEdit ? 'Update Leader' : 'Create Leader';
            $formAction = $isEdit ? route('leadership.update', $leadership->id) : route('leadership.store');
        @endphp

        {{-- Header and Back Button --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-dark tracking-tight">
                {{ $isEdit ? '✏️ ' : '✨ ' }} {{ $title }}
            </h1>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @if($isEdit)
                    @method('PUT')
                @endif

                {{-- Name --}}
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $leadership->name ?? '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                        placeholder="Enter full name" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Position --}}
                <div class="mb-4">
                    <label for="position" class="block text-sm font-medium text-gray-700 mb-1">Position / Title</label>
                    <input type="text" name="position" id="position"
                        value="{{ old('position', $leadership->position ?? '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                        placeholder="e.g., Chief Executive Officer" required>
                    @error('position')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description / Bio</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                        placeholder="A brief bio or description of the leader's role and expertise."
                        required>{{ old('description', $leadership->description ?? '') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Image Upload and Preview --}}
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Leader Image</label>

                    @if($isEdit && ($leadership->image ?? false))
                        <div class="flex items-center mb-3 space-x-4">
                            <span class="text-sm font-medium text-gray-500">Current Image:</span>
                            <img src="{{ asset('storage/' . $leadership->image) }}" alt="Current Leader Image"
                                class="w-16 h-16 object-cover rounded-full border-2 border-primary">
                        </div>
                    @endif

                    {{-- FILE INPUT WITH HOVER EFFECT --}}
                    <input type="file" name="image" id="image" class="w-full text-sm text-gray-500
                                            file:mr-4 file:py-2 file:px-4
                                            file:rounded-md file:border-0
                                            file:text-sm file:font-semibold
                                            file:bg-secondary file:text-primary
                                            file:transition-colors file:duration-200
                                            hover:file:bg-yellow-600">
                    {{-- End of FILE INPUT WITH HOVER EFFECT --}}

                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submission and Cancel Buttons Side-by-Side --}}
                <div class="flex justify-start space-x-4 mt-8 pt-4 border-t border-gray-200">
                    {{-- Submit Button --}}
                    <button type="submit"
                        class="px-6 py-3 bg-secondary text-primary font-semibold rounded-md shadow-md hover:bg-secondary/90 transition-colors duration-200 focus:ring-4 focus:ring-secondary focus:ring-opacity-50">
                        <i class="fas fa-save mr-2"></i>
                        {{ $buttonText }}
                    </button>

                    {{-- Back/Cancel Button --}}
                    <a href="{{ route('leadership.index') }}"
                        class="px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-md shadow-md hover:bg-gray-300 transition-colors duration-200 focus:ring-4 focus:ring-gray-400 focus:ring-opacity-50 flex items-center">
                        <i class="fas fa-times mr-2"></i>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection