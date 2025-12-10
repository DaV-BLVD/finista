<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="images/logo.png"/>

    <title>@yield('title', 'Finista | Automation Services')</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Vite compiled CSS/JS -->
    @vite(['resources/css/app.css', 'public/css/style.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">

    {{-- Navbar --}}
    <header class="pb-[80px]">
        @include('frontend.layouts.navbar')
    </header>

    {{-- Page content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        @include('frontend.layouts.footer')
    </footer>

</body>
</html>
