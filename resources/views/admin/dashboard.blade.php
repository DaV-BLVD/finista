@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg p-5 shadow border-l-4 border-primary flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium uppercase">Total Revenue</p>
                <h3 class="text-2xl font-bold text-gray-800">$45,231</h3>
            </div>
            <div class="bg-primary bg-opacity-10 p-3 rounded-full text-primary">
                <i class="fas fa-dollar-sign text-xl"></i>
            </div>
        </div>
        <div class="bg-white rounded-lg p-5 shadow border-l-4 border-secondary flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium uppercase">New Users</p>
                <h3 class="text-2xl font-bold text-gray-800">2,345</h3>
            </div>
            <div class="bg-secondary bg-opacity-30 p-3 rounded-full text-secondary">
                <i class="fas fa-user-plus text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Recent Activity</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th
                            class="py-2 px-3 bg-gray-100 font-bold uppercase text-xs text-gray-600 border-b border-gray-200">
                            User</th>
                        <th
                            class="py-2 px-3 bg-gray-100 font-bold uppercase text-xs text-gray-600 border-b border-gray-200">
                            Role</th>
                        <th
                            class="py-2 px-3 bg-gray-100 font-bold uppercase text-xs text-gray-600 border-b border-gray-200">
                            Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-3 border-b border-gray-200">{{ Auth::user()->name }}</td>
                        <td class="py-3 px-3 border-b border-gray-200">Admin</td>
                        <td class="py-3 px-3 border-b border-gray-200"><span
                                class="bg-green-100 text-green-700 py-1 px-2 rounded-full text-xs">Active</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection