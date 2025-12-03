@extends('admin.layouts.app')

@section('content')
    <div class="p-6">

        <h1 class="text-2xl font-bold text-primary mb-6">Edit Footer Contact</h1>

        <form action="{{ route('footer_contacts.update', $footerContacts->id) }}" method="POST"
            class="bg-white p-6 rounded-lg shadow max-w-xl">

            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="font-semibold">Gmail</label>
                <input type="email" name="gmail" value="{{ old('gmail', $footerContacts->gmail) }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="font-semibold">Phone Number</label>
                <input type="text" name="phone_no" value="{{ old('phone_no', $footerContacts->phone_no) }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="font-semibold">Address</label>
                <input type="text" name="address" value="{{ old('address', $footerContacts->address) }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="flex gap-4 mt-6">
                <button class="bg-primary text-white px-5 py-2 rounded-lg hover:bg-blue-900">
                    Update
                </button>

                <a href="{{ route('footer_contacts.index') }}" class="px-5 py-2 rounded-lg bg-gray-300 hover:bg-gray-400">
                    Cancel
                </a>
            </div>

        </form>

    </div>
@endsection