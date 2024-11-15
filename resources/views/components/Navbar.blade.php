<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center">
            <span class="self-center text-2xl whitespace-nowrap dark:text-white font-inter font-black">WONGSOLO</span>
        </a>
        <div class="flex justify-end align-items-center gap-4 md:order-last">
            <button id="toggleDarkMode" type="button"
                class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <i class="fa-solid fa-circle-half-stroke"></i>
            </button>
            <a href="{{ url('cart') }}">
                <div
                    class="max-w-sm p-2 h-10 hover:bg-stone-300 bg-stone-200 rounded-lg shadow-inner flex justify-center items-center dark:bg-slate-800 dark:hover:bg-blue-900">
                    <img src="{{ asset('assets/img/bag-frame.svg') }}" alt="" class="dark:hidden" /><img
                        src="{{ asset('assets/img/bag.svg') }}" alt="" class="hidden dark:block" />
                    <h1 class="dark:text-white text-black text-sm ml-1">
                        {{ session('cart') ? count(session('cart')) : '' }}</h1>
                </div>
            </a>

        </div>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center  p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col gap-1 p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-neutral-200 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ url('/') }}"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded font-inter font-black text-md hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                        aria-current="page">Menu</a>
                </li>
                <li>
                    <a href="{{ url('about') }}"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded font-inter font-black text-md hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                        aria-current="page">Tentang Kami</a>
                </li>
                @if (Auth::user())
                    <li>
                        <a href="{{ route('admin') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded font-inter font-black text-md hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Dashboard</a>
                    </li>
                @endif
                @if (!Auth::user())
                    <li>
                        <a href="{{ route('login') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded font-inter font-black text-md hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const isDarkMode = localStorage.getItem('darkMode') === 'enabled';
        if (isDarkMode) {
            document.documentElement.classList.add(
                'dark');
        }
    });

    document.getElementById('toggleDarkMode').addEventListener('click', function() {
        document.documentElement.classList.toggle(
            'dark');
        const isDarkMode = document.documentElement.classList.contains('dark');
        localStorage.setItem('darkMode', isDarkMode ? 'enabled' : 'disabled');
    });
</script>
