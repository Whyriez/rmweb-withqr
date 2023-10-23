<!DOCTYPE html>
<html class="dark" style="scroll-behavior: smooth;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <base href="{{ \URL::to('/') }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('faviconn.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    



</head>

<body class="bg-white dark:bg-gray-900">
    @include('components.Navbar')
    <main class="mx-auto lg:max-w-7xl md:px-8 flex flex-col min-h-screen bg-white dark:bg-gray-900">
        {{-- @include('components.header') --}}
        @yield('content')
        @include('components.footer')
    </main>

    <script src="{{ asset('assets/js/flowbite.min.js') }}"></script>
</body>

</html>
