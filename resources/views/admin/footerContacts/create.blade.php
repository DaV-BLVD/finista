@extends('admin.layouts.app')

@section('content')
    <div class="p-6">

        <h1 class="text-2xl font-bold text-primary mb-6">Add Footer Contact</h1>

        <form action="{{ route('footer_contacts.store') }}" method="POST"
            class="bg-white p-6 rounded-lg shadow max-w-xl">
            @csrf

            <div class="mb-4">
                <label class="font-semibold">Gmail</label>
                <input type="email" name="gmail" value="{{ old('gmail') }}" class="w-full border rounded px-3 py-2"
                    required>
            </div>

            <div class="mb-4">
                <label class="font-semibold">Phone Number</label>
                <input type="text" name="phone_no" value="{{ old('phone_no') }}" class="w-full border rounded px-3 py-2"
                    required>
            </div>

            <div class="mb-4">
                <label class="font-semibold">Address</label>
                <input type="text" name="address" value="{{ old('address') }}" class="w-full border rounded px-3 py-2"
                    required>
            </div>

            <div class="flex gap-4 mt-6">
                <button class="bg-primary text-white px-5 py-2 rounded-lg hover:bg-blue-900">
                    Save
                </button>

                <a href="{{ route('footer_contacts.index') }}"
                    class="px-5 py-2 rounded-lg bg-gray-300 hover:bg-gray-400">
                    Cancel
                </a>
            </div>

        </form>

    </div>
@endsection