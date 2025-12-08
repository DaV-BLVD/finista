@extends('admin.layouts.app')

@section('content')
<div class="p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-primary">Contact</h1>
        <h2>(Gets Displayed in the <b>Footer</b> and <b>Contact Page</b>)</h2>

        @if(!$footerContacts)
            <a href="{{ route('footer_contacts.create') }}"
                class="bg-secondary text-primary px-4 py-2 rounded-lg font-semibold hover:bg-yellow-400 shadow-md transition duration-300">
                + Add Contact
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4 shadow">
            {{ session('success') }}
        </div>
    @endif

    @if(session('info'))
        <div class="bg-blue-100 text-blue-700 p-3 rounded mb-4 shadow">
            {{ session('info') }}
        </div>
    @endif

    @if($footerContacts)
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow border border-gray-200">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Phone</th>
                        <th class="px-4 py-3 text-left">Address</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-3">{{ $footerContacts->gmail }}</td>
                        <td class="px-4 py-3">{{ $footerContacts->phone_no }}</td>
                        <td class="px-4 py-3">{{ $footerContacts->address }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('footer_contacts.edit', $footerContacts->id) }}"
                                    class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-primary/90 shadow transition duration-300">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>

                                <form action="{{ route('footer_contacts.destroy', $footerContacts->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 text-sm bg-red-600 text-white rounded-md hover:bg-red-700 shadow transition duration-300">
                                        <i class="fas fa-trash-alt mr-1"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-500 mt-4">No contact exists. Click "+ Add Contact" to create one.</p>
    @endif

</div>
@endsection
