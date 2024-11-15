@extends('layouts.loginadmin')
@section('title', 'Login')


@section('content')
    <div class="flex flex-col items-center bg-white justify-center px-6  pt-8 mx-auto md:h-screen pt:mt-0 dark:bg-gray-900 ">
        <div class="w-full max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow dark:bg-gray-800">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex justify-center">
                Login
            </h2>
            <form class="mt-8 space-y-6" action="{{ url('proses_login') }}" method="POST">
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
                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="bg-gray-50 border @error('password') is-invalid @enderror border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    @error('password')
                        <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white invalid-feedback">
                            {{ $massage }}
                        </div>
                    @enderror
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
