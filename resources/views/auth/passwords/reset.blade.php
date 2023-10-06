@extends('layouts.app')

@section('content')
<div class="flex max-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8 h-screen bg-blue-200">


    <div
        class="w-full max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" method="POST" action="{{ url('/confirm') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div>
                <img class="mx-auto h-16 w-16" src="{{ asset(config('app.logo')) }}" alt="NES Logo">
                <h2 class="mt-3 mb-1 text-3xl font-bold tracking-tight text-gray-900 text-center">Enter New Password
                </h2>
            </div>
            <div>
                <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400 mb-3">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-blue-800 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        At least 8 characters
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-blue-800 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        At least one lowercase character
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-blue-800 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        At least one special character, e.g., ! @ # ?
                    </li>
                </ul>

                <div class="mb-6">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('password') is-invalid @enderror"
                            required>
                        <a role="button" id="toggle_password"
                            class="password-toggle text-xs text-white text-gray-600 absolute right-2.5 bottom-2.5 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            SHOW
                        </a>
                    </div>

                    @error('password')
                    <span class="mt-1 inline-flex invalid-feedback text-sm text-red-500 font-semibold" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="confirm-password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••"
                            class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('confirm-password') is-invalid @enderror"
                            required>
                        <a role="button" id="toggle_confirm_password"
                            class="password-toggle text-xs text-white text-gray-600 absolute right-2.5 bottom-2.5 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            SHOW
                        </a>
                    </div>

                    @error('confirm-password')
                    <span class="mt-1 inline-flex invalid-feedback text-sm text-red-500 font-semibold" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full mb-6 text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 p-4">Reset
                    Password
                </button>

                <a href="{{ url('/login') }}" class="text-blue-900 hover:text-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-6 h-6 mx-auto">
                        <path
                            d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                        <path
                            d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                    </svg>
                </a>
        </form>
    </div>



    @endsection
