@extends('admin.layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-md">

        <h2 class="text-2xl font-bold mb-6 text-primary">Edit Profile</h2>

        @if(session('success'))
            <div class="p-3 mb-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PATCH')

            {{-- Name --}}
            <div>
                <label class="block font-semibold mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary">
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary">
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- Password --}}
            <div>
                <label class="block font-semibold mb-1">New Password (optional)</label>
                <input type="password" name="password"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary">
                @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label class="block font-semibold mb-1">Confirm New Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary">
            </div>

            <button type="submit"
                class="bg-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-primary/90 transition">
                Save Changes
            </button>
        </form>

    </div>
@endsection