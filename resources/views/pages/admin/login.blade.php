@extends('layouts.loginadmin')
@section('title', 'Login')


@section('content')

    <div class="flex flex-col items-center justify-center px-6  pt-8 mx-auto md:h-screen pt:mt-0 dark:bg-gray-900 ">
        {{-- <a href="" class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white">
        <img src="/images/logo.svg" class="mr-4 h-11" alt="FlowBite Logo">
        <span>Flowbite</span>  
    </a> --}}
        <!-- Card -->
        <div class="w-full max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow dark:bg-gray-800">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex justify-center">
                Login
            </h2>
            <form class="mt-8 space-y-6" action="{{ url ('proses_login') }}" method="POST">
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" value="{{ Session::get('email') }}"
                        class="@error('email') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Massukan email anda">
                </div>
                @error('email')
                    <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white invalid-feedback">
                        {{ $massage }}
                    </div>
                @enderror
                <div>

                    @csrf

                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        password</label>
                    <input type="password" name="password"   id="password" placeholder="••••••••"
                        class="bg-gray-50 border @error('password') is-invalid @enderror border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    @error('password')
                            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white invalid-feedback">
                                {{ $massage }}
                            </div>
                        @enderror
                </div>
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember" aria-describedby="remember" name="remember" type="checkbox"
                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="remember" class="font-medium text-gray-900 dark:text-white">Remember me</label>
                    </div>
                </div>
                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <button type="submit"
                        class="inline-flex items-center justify-center w-1/2 px-5 py-2 mt-4 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-primary-800">
                        Login
                    </button>

                </div>
            </form>
        </div>
    </div>
@endsection
