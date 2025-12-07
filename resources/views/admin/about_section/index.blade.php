@extends('admin.layouts.app')

@section('content')
    <div class="p-6">

        <h1 class="text-3xl font-bold mb-6">About & Mission Sections</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- About Section Table --}}
        @php $about = $sections->where('type', 'about')->first(); @endphp
        <div class="mb-12">
            <h2 class="text-2xl font-semibold mb-4">About Section</h2>
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Title</th>
                        <th class="px-4 py-2 text-left">Description</th>
                        <th class="px-4 py-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $about->title ?? '' }}</td>
                        <td class="px-4 py-2">{{ Str::limit($about->description, 80) ?? '' }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('about_section.edit', $about->id) }}"
                                class="px-3 py-1 bg-primary text-white rounded hover:bg-primary/90">
                                Edit
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Mission Section Table --}}
        @php $mission = $sections->where('type', 'mission')->first(); @endphp
        <div>
            <h2 class="text-2xl font-semibold mb-4">Mission Section</h2>
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Title</th>
                        <th class="px-4 py-2 text-left">Description</th>
                        <th class="px-4 py-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $mission->title ?? '' }}</td>
                        <td class="px-4 py-2">{{ Str::limit($mission->description, 80) ?? '' }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('about_section.edit', $mission->id) }}"
                                class="px-3 py-1 bg-primary text-white rounded hover:bg-primary/90">
                                Edit
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection