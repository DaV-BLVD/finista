@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-xl mx-auto bg-white rounded-xl shadow-lg border border-gray-100">

        {{-- Header --}}
        <h1 class="text-2xl font-bold text-gray-900 mb-6 border-b pb-4">
            <i class="fas fa-user-plus mr-2 text-primary"></i> Add New Admin
        </h1>

        {{-- Display Errors --}}
        @if($errors->any())
            <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-lg shadow-sm border border-red-200">
                <ul class="list-disc pl-5 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Name --}}
            <div>
                <label for="name" class="block mb-1 font-semibold text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                    required>
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block mb-1 font-semibold text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                    required>
            </div>

            {{-- Role --}}
            <div>
                <label for="role" class="block mb-1 font-semibold text-gray-700">Role</label>
                <select id="role" name="role"
                    class="w-full p-3 border border-gray-300 rounded-lg bg-white focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800 appearance-none cursor-pointer">
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="super_admin" {{ old('role') == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                </select>
            </div>

            <hr class="my-6 border-gray-200">

            {{-- Password --}}
            <div>
                <label for="password" class="block mb-1 font-semibold text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                    required>
            </div>

            {{-- Confirm Password --}}
            <div>
                <label for="password_confirmation" class="block mb-1 font-semibold text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:border-secondary focus:ring-1 focus:ring-secondary/50 outline-none transition duration-150 text-gray-800"
                    required>
            </div>

            {{-- Action Buttons --}}
            <div class="flex space-x-3 pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-secondary text-primary rounded-lg font-bold shadow hover:bg-secondary/90 transition duration-150 focus:ring-2 focus:ring-secondary focus:ring-offset-2 flex items-center space-x-2">
                    <i class="fas fa-user-plus"></i> <span>Create Admin</span>
                </button>
                <a href="{{ route('users.index') }}"
                    class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition duration-150 flex items-center space-x-2">
                    <i class="fas fa-times-circle"></i> <span>Cancel</span>
                </a>
            </div>
        </form>
    </div>
@endsection