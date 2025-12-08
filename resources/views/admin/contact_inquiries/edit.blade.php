@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto bg-white rounded-lg shadow">

        <h1 class="text-2xl font-bold text-primary mb-6">Edit Inquiry</h1>

        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded shadow">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contact_inquiries.update', $contactInquiry) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium">Full Name</label>
                <input type="text" name="name" value="{{ old('name', $contactInquiry->name) }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email', $contactInquiry->email) }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Service Inquiry</label>
                <input type="text" name="service" value="{{ old('service', $contactInquiry->service) }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Message</label>
                <textarea name="message" rows="5"
                    class="w-full border rounded px-3 py-2">{{ old('message', $contactInquiry->message) }}</textarea>
            </div>

            <div class="flex space-x-3">
                <button type="submit"
                    class="px-4 py-2 bg-secondary text-primary rounded font-semibold shadow hover:bg-secondary/90">
                    Update
                </button>

                <a href="{{ route('contact_inquiries.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection