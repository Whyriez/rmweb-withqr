<!DOCTYPE html>
<html class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <base href="{{ \URL::to('/') }}">

    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdn.fontawesome.com/6.0.0-beta3/cs s/all.min.css">


    <link rel="icon" type="image/x-icon" href="{{ asset('faviconnsss.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="bg-white dark:bg-gray-900">

    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <main>
                <div class="px-4 pt-6">
                    @yield('content')
                    <div class="flex justify-center">
                    </div>
                </div>
            </main>
        </div>
    </div>

    {{-- <div class="flex">
        @include('components.admin.navbar')

        <div class="flex">
            @include('components.admin.sidebar')

            <main class="flex-grow p-4">
                @yield('content')
            </main>
        </div>

        @include('components.admin.footer')
    </div> --}}


    <script src="{{ asset('assets/js/flowbite.min.js') }}"></script>
    <script>
        const sidebarBackdrop = document.getElementById('sidebarBackdrop');
        const navbarDropdown = document.getElementById('navbar-dropdown');
        document.getElementById('toggle-nav').addEventListener('click', function() {
            navbarDropdown.classList.toggle('hidden');
            sidebarBackdrop.classList.toggle('hidden');
        });
        document.getElementById('toggleSidebarMobileSearch').addEventListener('click', function() {
            navbarDropdown.classList.toggle('hidden');
            sidebarBackdrop.classList.toggle('hidden');
        });
        document.getElementById('sidebarBackdrop').addEventListener('click', function() {
            navbarDropdown.classList.toggle('hidden');
            sidebarBackdrop.classList.toggle('hidden');
        });
    </script>

</body>

</html>
