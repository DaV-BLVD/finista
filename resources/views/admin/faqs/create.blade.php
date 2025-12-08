@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-100">

            {{-- Header --}}
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8 border-b pb-4">
                <i class="fas fa-question-circle mr-2 text-primary"></i> {{ isset($faq) ? 'Edit FAQ' : 'Add New FAQ' }}
            </h1>

            {{-- Form Structure --}}
            <form action="{{ isset($faq) ? route('faqs.update', $faq) : route('faqs.store') }}" method="POST"
                class="space-y-6">
                @csrf
                @if(isset($faq))
                    @method('PUT')
                @endif

                {{-- Question Field --}}
                <div>
                    <label for="question" class="block font-semibold mb-2 text-gray-700">Question</label>
                    <input type="text" id="question" name="question" value="{{ $faq->question ?? old('question') }}"
                        required
                        class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                        placeholder="e.g., What are your operating hours?">
                </div>

                {{-- Answer Field --}}
                <div>
                    <label for="answer" class="block font-semibold mb-2 text-gray-700">Answer</label>
                    <textarea id="answer" name="answer" rows="6" required
                        class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800 resize-y"
                        placeholder="Provide a detailed answer to the question.">{{ $faq->answer ?? old('answer') }}</textarea>
                </div>

                {{-- Sort Order Field --}}
                <div>
                    <label for="sort_order" class="block font-semibold mb-2 text-gray-700">Sort Order</label>
                    <input type="number" id="sort_order" name="sort_order"
                        value="{{ $faq->sort_order ?? old('sort_order', 0) }}"
                        class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                        placeholder="0">
                </div>

                {{-- Action Buttons --}}
                <div class="flex space-x-3 pt-4">
                    <button type="submit"
                        class="px-6 py-2.5 bg-secondary text-primary rounded-lg font-bold shadow hover:bg-secondary/90 transition duration-150 focus:ring-2 focus:ring-secondary focus:ring-offset-2">
                        <i class="fas fa-save mr-1"></i> {{ isset($faq) ? 'Update FAQ' : 'Create FAQ' }}
                    </button>

                    <a href="{{ route('faqs.index') }}"
                        class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition duration-150">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection