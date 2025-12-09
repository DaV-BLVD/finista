<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Finista') }} - @yield('title', 'Dashboard')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />


    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


    @vite(['resources/css/admin/app.css', 'resources/js/admin/app.js'])


</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="flex h-screen overflow-hidden">

        @include('admin.components.sidebar')

        <div class="flex-1 flex flex-col relative overflow-hidden">

            @include('admin.components.topbar')

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>