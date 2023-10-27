@extends('layouts.user')
@section('title', 'Home')

@section('content')
    <div class="content-header m-4">
        <div class="container-fluid">
            <div id="controls-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-[552px]">
                    <!-- Item 1 -->
                    <h1></h1>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/img/makanan1.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" loading="lazy"
                            alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                        <img src="{{ asset('assets/img/makanan2.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" loading="lazy"
                            alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/img/makanan3.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" loading="lazy"
                            alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/img/makanan4.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" loading="lazy"
                            alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/img/makanan5.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" loading="lazy"
                            alt="...">
                    </div>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

            <div
                class="text-center text-black text-[22px] md:text-[34px] lg:text-[60px] font-black font-inter pt-8 dark:text-white">
                Selamat Datang Di <br> RM. Wong Solo</div>
            <div class="flex justify-center pt-8" id="menu">
                <div class="inline-flex rounded-md shadow-sm">
                    <a href="{{ url('/') }}" aria-current="page"
                        class="px-4 py-2 text-sm font-medium  @if (request()->is('/')) text-blue-700 bg-gray-200 dark:bg-gray-700 @endif  hover:text-blue-700 focus:ring-blue-700 focus:text-blue-700  border border-gray-200 rounded-l-lg hover:bg-gray-200 focus:z-10 focus:ring-2   dark:border-gray-600 dark:text-white dark:hover:text-white dark:focus:ring-blue-500 dark:hover:bg-gray-600  dark:focus:text-white">
                        Semua
                    </a>
                    @foreach ($kategori as $k)
                        <a href="{{ url('kategori/' . $k->id) }}"
                            class="px-4 py-2 text-sm font-medium  @if (request()->is('kategori/' . $k->id)) bg-gray-200  text-blue-700 dark:bg-gray-700 @endif border border-gray-200  @if ($loop->last) rounded-r-md @endif hover:bg-gray-200 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700   dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            {{ $k->name }}
                        </a>
                    @endforeach

                    {{-- <a href="#"
                        class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Makanan
                    </a>
                    <a href="#"
                        class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700  dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Minuman
                    </a> --}}
                </div>
            </div>
            <!-- wrapper menu -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 items-center justify-center gap-3 p-8">
                <!-- Menu  -->
                @foreach ($menu as $m)
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <img class="object-cover h-[18rem] w-full rounded-t-lg" loading="lazy"
                            src="{{ asset('storage/' . $m->gambar) }}" alt="" />
                        <div class="flex-grow p-5">
                            <a href="#">
                                <h5
                                    class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center dark:text-white ">
                                    {{ $m->Menu }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{ $m->kategori->name }}</p>

                            <div class="flex justify-between">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Rp
                                    {{ $m->harga }}
                                </h5>
                                <a href="{{ url('cart/store/' . $m->id) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-300 rounded-full hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-blue-300 2-">
                                    <img src="{{ asset('assets/img/plus.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>


    </div>
@endsection
