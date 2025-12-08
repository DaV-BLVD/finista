@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto bg-white rounded-xl shadow-lg border border-gray-100">

        {{-- Header --}}
        <h1 class="text-2xl font-bold text-gray-900 mb-6 border-b pb-4">
            <i class="fas fa-file-alt mr-2 text-primary"></i> Edit Header — <span class="text-secondary">{{ $header->page }}</span>
        </h1>

        {{-- Display Errors --}}
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg shadow-sm border border-red-200">
                <ul class="list-disc pl-5 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" enctype="multipart/form-data" action="{{ route('headers.update', $header->id) }}" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Badge Text (Optional) --}}
            <div>
                <label for="badge_text" class="block mb-1 font-semibold text-gray-700">Badge Text (Optional)</label>
                <input type="text" id="badge_text" name="badge_text" 
                    class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                    value="{{ old('badge_text', $header->badge_text) }}">
            </div>

            {{-- Title --}}
            <div>
                <label for="title" class="block mb-1 font-semibold text-gray-700">Title <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" 
                    class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                    value="{{ old('title', $header->title) }}" required>
            </div>

            {{-- Subtitle --}}
            <div>
                <label for="subtitle" class="block mb-1 font-semibold text-gray-700">Subtitle (Optional)</label>
                <input type="text" id="subtitle" name="subtitle" 
                    class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                    value="{{ old('subtitle', $header->subtitle) }}">
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block mb-1 font-semibold text-gray-700">Description (Optional)</label>
                <textarea id="description" name="description" rows="3"
                    class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800 resize-y">{{ old('description', $header->description) }}</textarea>
            </div>

            <hr class="my-6 border-gray-200">
            <h2 class="text-xl font-bold text-primary mb-4">Call-to-Action Buttons</h2>

            {{-- Button 1 --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Button 1 Text</label>
                    <input type="text" name="button1_text" 
                        class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                        value="{{ old('button1_text', $header->button1_text) }}">
                </div>

                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Button 1 Link (URL)</label>
                    <input type="text" name="button1_link" 
                        class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                        value="{{ old('button1_link', $header->button1_link) }}">
                </div>
            </div>

            {{-- Button 2 --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Button 2 Text</label>
                    <input type="text" name="button2_text" 
                        class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                        value="{{ old('button2_text', $header->button2_text) }}">
                </div>

                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Button 2 Link (URL)</label>
                    <input type="text" name="button2_link" 
                        class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                        value="{{ old('button2_link', $header->button2_link) }}">
                </div>
            </div>

            <hr class="my-6 border-gray-200">

            {{-- Image Upload --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Header Image (Optional)</label>
                
                <input type="file" name="image" 
                    class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-secondary/20 file:text-primary hover:file:bg-secondary/40">

                @if ($header->image)
                    <p class="text-sm text-gray-500 mt-2">Current Image:</p>
                    <img src="{{ asset('storage/' . $header->image) }}" 
                         class="h-24 w-auto mt-2 rounded-lg shadow object-cover border border-gray-200" alt="Current Header Image">
                @endif
            </div>
            
            {{-- Action Buttons --}}
            <div class="flex space-x-3 pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-secondary text-primary rounded-lg font-bold shadow hover:bg-secondary/90 transition duration-150 focus:ring-2 focus:ring-secondary focus:ring-offset-2 flex items-center space-x-2">
                    <i class="fas fa-save"></i> <span>Save Changes</span>
                </button>
                <a href="{{ route('headers.index') }}"
                    class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition duration-150 flex items-center space-x-2">
                    <i class="fas fa-times-circle"></i> <span>Cancel</span>
                </a>
            </div>

        </form>
    </div>
@endsection