@extends('admin.layouts.app')

@section('content')
    <div class="p-6">

        <h1 class="text-2xl font-bold text-primary mb-6">Add New Stat</h1>

        <form action="{{ route('stats.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-semibold text-gray-700">Value</label>
                <input type="text" name="value" value="{{ old('value') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                @error('value')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold text-gray-700">Label</label>
                <input type="text" name="label" value="{{ old('label') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                @error('label')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex space-x-2">
                <button type="submit"
                    class="px-4 py-2 bg-secondary text-primary rounded-lg font-semibold hover:bg-yellow-400">Add
                    Stat</button>
                <a href="{{ route('stats.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Cancel</a>
            </div>
        </form>

    </div>
@endsection