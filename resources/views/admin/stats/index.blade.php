@extends('admin.layouts.app')

@section('content')
    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-primary">Stats</h1>
            <a href="{{ route('stats.create') }}"
                class="bg-secondary text-primary px-4 py-2 rounded-lg font-semibold hover:bg-yellow-400 shadow">
                + Add Stat
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">Value</th>
                        <th class="px-4 py-3 text-left">Label</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stats as $stat)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $stat->value }}</td>
                            <td class="px-4 py-3">{{ $stat->label }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('stats.edit', $stat->id) }}"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-primary/90">
                                        <i class="fas fa-edit mr-1"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('stats.destroy', $stat->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm bg-red-600 text-white rounded-md hover:bg-red-700">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-4 text-center text-gray-500">No stats found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection