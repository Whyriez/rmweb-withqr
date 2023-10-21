@extends('layouts.index')
@section('title', 'Home')

@section('content')
    <div class="content-header m-4">
        <div class="container-fluid">

            <div id="controls-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-[552px]">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/img/makanan1.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                        <img src="{{ asset('assets/img/makanan2.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/img/makanan3.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/img/makanan4.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/img/makanan5.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
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

            <div class="text-center text-black text-[32px] md:text-[100px] font-black font-inter pt-8">Selamat Datang Di Wong Solo</div>
            <div class="flex justify-center pt-8">
                <div class="inline-flex rounded-md shadow-sm">
                <a href="#" aria-current="page" class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 ">
                    Semua
                </a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 ">
                    Makanan
                </a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 ">
                    Minuman
                </a>
                </div>
            </div>
            <!-- wrapper menu -->
            <div class="flex flex-col lg:flex-row gap-3 pt-8 items-center lg:flex-wrap">
                <!-- Menu  -->
                <div>
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <img class="rounded-t-lg" src="{{ asset('assets/img/makanan3.jpg') }}" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center ">French Fries</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia sequi nisi recusandae doloremque quisquam debitis quae alias obcaecati cumque nihil.</p>
                            <div class="flex justify-between">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900  ">Rp 100.000</h5>
                                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-300 rounded-full hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-blue-300 2-">
                                    <img src="{{ asset('assets/img/plus.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <img class="rounded-t-lg" src="{{ asset('assets/img/makanan3.jpg') }}" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center ">French Fries</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia sequi nisi recusandae doloremque quisquam debitis quae alias obcaecati cumque nihil.</p>
                            <div class="flex justify-between">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900  ">Rp 100.000</h5>
                                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-300 rounded-full hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-blue-300 2-">
                                    <img src="{{ asset('assets/img/plus.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <img class="rounded-t-lg" src="{{ asset('assets/img/makanan3.jpg') }}" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center ">French Fries</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia sequi nisi recusandae doloremque quisquam debitis quae alias obcaecati cumque nihil.</p>
                            <div class="flex justify-between">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900  ">Rp 100.000</h5>
                                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-300 rounded-full hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-blue-300 2-">
                                    <img src="{{ asset('assets/img/plus.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <img class="rounded-t-lg" src="{{ asset('assets/img/jus.jpg') }}" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center ">Jus Mangga</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia sequi nisi recusandae doloremque quisquam debitis quae alias obcaecati cumque nihil.</p>
                            <div class="flex justify-between">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900  ">Rp 100.000</h5>
                                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-300 rounded-full hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-blue-300 2-">
                                    <img src="{{ asset('assets/img/plus.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <img class="rounded-t-lg" src="{{ asset('assets/img/jus.jpg') }}" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center ">Jus Mangga</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia sequi nisi recusandae doloremque quisquam debitis quae alias obcaecati cumque nihil.</p>
                            <div class="flex justify-between">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900  ">Rp 100.000</h5>
                                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-300 rounded-full hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-blue-300 2-">
                                    <img src="{{ asset('assets/img/plus.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <img class="rounded-t-lg" src="{{ asset('assets/img/jus.jpg') }}" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center ">Jus Mangga</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia sequi nisi recusandae doloremque quisquam debitis quae alias obcaecati cumque nihil.</p>
                            <div class="flex justify-between">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900  ">Rp 100.000</h5>
                                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-300 rounded-full hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-blue-300 2-">
                                    <img src="{{ asset('assets/img/plus.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
