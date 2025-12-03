@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-primary">Partners / Features</h1>
            <a href="{{ route('partners.create') }}"
                class="bg-secondary text-primary px-4 py-2 rounded-lg font-semibold hover:bg-yellow-400 shadow">
                + Add Partner
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white rounded-lg shadow">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Icon</th>
                    <th class="px-4 py-3 text-left">Title</th>
                    <th class="px-4 py-3 text-left">Subtitle</th>
                    <th class="px-4 py-3 text-left">Type</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($partners as $partner)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-3">{{ $partner->icon }}</td>
                        <td class="px-4 py-3">{{ $partner->title }}</td>
                        <td class="px-4 py-3">{{ $partner->subtitle }}</td>
                        <td class="px-4 py-3">{{ ucfirst($partner->type) }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('partners.edit', $partner->id) }}"
                                    class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-primary/90">
                                    Edit
                                </a>
                                <form action="{{ route('partners.destroy', $partner->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 text-sm bg-red-600 text-white rounded-md hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">No partners found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection