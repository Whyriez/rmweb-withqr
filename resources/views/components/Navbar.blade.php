<nav class="bg-neutral-200 w-full border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center">
            <span class="self-center text-2xl font-black whitespace-nowrap font-inter">WONGSOLO</span>
        </a>
        <button data-collapse-toggle="navbar-dropdown" type="button"
        class="inline-flex items-center  order-8 p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        aria-controls="navbar-dropdown" id="hamburgerNav" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M1 1h15M1 7h15M1 13h15" />
    </svg>
</button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-neutral-200 rounded-lg bg-neutral-200 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-neutral-200 ">
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 font-black font-inter text-xl bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0"
                            aria-current="page">Menu</a>
                    </li>
                    <li>
                        <a href="#"
                        class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 font-inter text-xl font-black">Catatan Transaksi</a>
                    </li>
                    <li>
                        <a href="#"
                        class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 font-inter text-xl font-black">Logout</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="md:order-8 order-1"><div class="w-8 h-8 hover:bg-stone-300 bg-stone-200 rounded-lg shadow-inner flex justify-center items-center">
                            <img src="{{ asset('assets/img/bag-frame.svg') }}" alt="" /></div></a>
        </div>    
    </div>
</nav>
