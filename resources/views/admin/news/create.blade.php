@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-100">

            {{-- Header --}}
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8 border-b pb-4">
                <i class="fas fa-newspaper mr-2 text-primary"></i>
                {{ isset($news) ? 'Edit News Item' : 'Add New News Item' }}
            </h1>

            {{-- Display Errors (Optional, but good practice) --}}
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-lg border border-red-200 shadow-sm">
                    <p class="font-bold mb-2"><i class="fas fa-exclamation-triangle mr-2"></i> Please correct the following
                        errors:</p>
                    <ul class="list-disc pl-5 text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Structure --}}
            <form action="{{ isset($news) ? route('news.update', $news->id) : route('news.store') }}" method="POST"
                enctype="multipart/form-data" class="space-y-6">

                @csrf
                @if(isset($news))
                    @method('PUT')
                @endif

                {{-- Title --}}
                <div>
                    <label for="title" class="block font-semibold mb-2 text-gray-700">Title <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title', $news->title ?? '') }}" required
                        class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                        placeholder="e.g., Bank Announces New Interest Rates">
                </div>

                {{-- Subtitle --}}
                <div>
                    <label for="subtitle" class="block font-semibold mb-2 text-gray-700">Subtitle/Summary <span
                            class="text-red-500">*</span></label>
                    <textarea id="subtitle" name="subtitle" rows="4" required
                        class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800 resize-y"
                        placeholder="A short summary of the news item.">{{ old('subtitle', $news->subtitle ?? '') }}</textarea>
                </div>

                {{-- Order Index --}}
                <div>
                    <label for="order_index" class="block font-semibold mb-2 text-gray-700">Order Index <span
                            class="text-red-500">*</span></label>
                    <input type="number" id="order_index" name="order_index"
                        value="{{ old('order_index', $news->order_index ?? 0) }}" required
                        class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                        placeholder="0">
                </div>

                {{-- Image --}}
                <div>
                    <label for="image" class="block font-semibold mb-2 text-gray-700">News Image @if(!isset($news))<span
                    class="text-red-500">*</span>@endif</label>

                    @if(isset($news) && $news->image)
                        <p class="text-sm text-gray-500 mb-2">Current Image:</p>
                        <img src="{{ asset('storage/' . $news->image) }}"
                            class="h-20 mb-3 rounded-lg shadow object-cover border border-gray-200" alt="Current News Image">
                    @endif

                    <input type="file" id="image" name="image"
                        class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-secondary/20 file:text-primary hover:file:bg-secondary/40"
                        {{ isset($news) ? '' : 'required' }}>
                </div>

                {{-- Action Buttons --}}
                <div class="flex space-x-3 pt-4">
                    <button type="submit"
                        class="px-6 py-3 bg-secondary text-primary rounded-lg font-bold shadow hover:bg-secondary/90 transition duration-150 focus:ring-2 focus:ring-secondary focus:ring-offset-2 flex items-center space-x-2">
                        <i class="fas fa-save"></i> <span>{{ isset($news) ? 'Update News' : 'Create News' }}</span>
                    </button>

                    <a href="{{ route('news.index') }}"
                        class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition duration-150 flex items-center space-x-2">
                        <i class="fas fa-times-circle"></i> <span>Cancel</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection