@extends('layouts.user')
@section('title', 'My Cart')

@section('content')
    <div class="content-header m-4">
        <div class="container-fluid">
            <div class="container mx-auto mt-8">
                <div class="bg-white dark:bg-gray-900 p-8 rounded shadow">
                    <h2 class="text-2xl font-bold mb-4 text-black dark:text-white">Shopping Cart</h2>
                    <form action="{{ url('cart/update') }}" method="POST">
                        @csrf
                        @method('put')
                        <!-- Product 1 -->
                        @if (session('cart'))
                            @foreach (session('cart') as $session => $value)
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center">
                                        <input type="hidden" name="id" value="{{ $value['id'] }}">
                                        <img src="{{ asset('storage/' . $value['gambar']) }}" alt="Product Image"
                                            class="w-16 h-16 object-cover rounded">
                                        <div class="ml-4">
                                            <h3 class="text-lg font-bold text-black dark:text-white">{{ $value['nama'] }}
                                            </h3>
                                            <p class="text-gray-600 dark:text-white">Harga: {{ $value['harga'] }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <button type="button" data-modal-toggle="delete-cart-{{ $value['id'] }}"
                                            class="bg-red-900 text-black dark:text-white dark:bg-red-500 p-1 rounded-md font-bold">Remove</button>
                                        <input type="number" name="jumlah"
                                            class="w-14 border border-gray-300 rounded text-center ml-4"
                                            value="{{ $value['jumlah'] }}">
                                    </div>
                                </div>



                                <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full"
                                    id="delete-cart-{{ $value['id'] }}">
                                    <div class="relative w-full h-full max-w-md px-4 md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                                            <!-- Modal header -->
                                            <div class="flex justify-end p-2">
                                                @csrf
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                                                    data-modal-toggle="delete-cart-{{ $value['id'] }}">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>


                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 pt-0 text-center">
                                                <svg class="w-16 h-16 mx-auto text-red-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <h3 class="mt-5 mb-6 text-lg text-gray-500 dark:text-gray-400">Are you sure
                                                    you want to delete
                                                    this
                                                    user?</h3>
                                                <a href="{{ url('cart/delete/' . $value['id']) }}"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-800">
                                                    Yes, I'm sure
                                                </a>
                                                <button type="button"
                                                    class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                                                    data-modal-toggle="delete-cart-{{ $value['id'] }}">
                                                    No, cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        {{-- @php
                        $total = 0;
                    @endphp
                    @foreach (session('cart') as $session => $value)
                        @php
                            $total += $value['harga'] * $value['jumlah'];
                        @endphp
                    @endforeach --}}
                        @if (session('cart'))
                            @php
                                $total = array_reduce(
                                    session('cart'),
                                    function ($carry, $item) {
                                        return $carry + $item['harga'] * $item['jumlah'];
                                    },
                                    0,
                                );
                            @endphp
                        @endif

                        <!-- Total -->
                        <div class="flex justify-between">
                            <p class="text-xl font-bold text-black dark:text-white">Total:
                                {{ session('cart') ? $total : 0 }}
                            </p>
                            <div>
                                <button class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
                                <button class="bg-blue-500 text-white px-4 py-2 rounded">Checkout</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>








@endsection
