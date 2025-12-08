@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        <h1 class="text-3xl font-extrabold mb-6">📬 Contact Inquiries</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-xl">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-sm">SN</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Name</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Email</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Service</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Message</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Date</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm">Status</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm w-40">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($inquiries as $inquiry)
                        <tr class="border-b hover:bg-gray-100 transition">
                            <td class="px-4 py-3 font-medium">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 font-medium">{{ $inquiry->name }}</td>
                            <td class="px-4 py-3">{{ $inquiry->email }}</td>
                            <td class="px-4 py-3">{{ $inquiry->service }}</td>
                            <td class="px-4 py-3">
                                {{ \Illuminate\Support\Str::limit($inquiry->message, 20, '...') }}
                            </td>

                            <td class="px-4 py-3">{{ $inquiry->created_at->format('Y-m-d') }}</td>
                            <td class="px-4 py-3">
                                @if($inquiry->is_resolved)
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Resolved
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Pending
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    {{-- View Modal --}}
                                    <button type="button" onclick="openModal({{ $inquiry->id }})"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-primary/90 shadow">
                                        <i class="fas fa-eye mr-1"></i>View
                                    </button>

                                    {{-- Delete --}}
                                    <form action="{{ route('contact_inquiries.destroy', $inquiry) }}" method="POST"
                                        onsubmit="return confirm('Delete this inquiry?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm bg-red-600 text-white rounded-md hover:bg-red-700 shadow">
                                            <i class="fas fa-trash-alt mr-1"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal --}}
                        <div id="modal-{{ $inquiry->id }}"
                            class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
                            <div class="bg-white rounded-lg max-w-lg w-full p-6 relative">
                                <h2 class="text-xl font-bold mb-4">{{ $inquiry->name }} - Inquiry</h2>
                                <p><strong>Email:</strong> {{ $inquiry->email }}</p>
                                <p><strong>Service:</strong> {{ $inquiry->service ?? '—' }}</p>
                                <p class="mt-4">{{ $inquiry->message }}</p>

                                <div class="mt-6 flex justify-end space-x-3">
                                    @if(!$inquiry->is_resolved)
                                        {{-- Mark as Resolved --}}
                                        <form action="{{ route('contact_inquiries.markResolved', $inquiry) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                                                Mark as Resolved
                                            </button>
                                        </form>
                                    @else
                                        {{-- Undo Resolved --}}
                                        <form action="{{ route('contact_inquiries.undoResolved', $inquiry) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                                Undo
                                            </button>
                                        </form>
                                    @endif

                                    <button onclick="closeModal({{ $inquiry->id }})"
                                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                                        Close
                                    </button>
                                </div>

                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-500 bg-gray-50">
                                No inquiries found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $inquiries->links() }}
            </div>
        </div>
    </div>

    {{-- Modal JS --}}
    <script>
        function openModal(id) {
            document.getElementById('modal-' + id).classList.remove('hidden');
            document.getElementById('modal-' + id).classList.add('flex');
        }
        function closeModal(id) {
            document.getElementById('modal-' + id).classList.add('hidden');
            document.getElementById('modal-' + id).classList.remove('flex');
        }
    </script>
@endsection