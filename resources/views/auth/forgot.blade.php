@extends('layouts.app')

@section('content')
<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8 h-screen bg-blue-200 ">
    <div
        class="w-full max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow-lg sm:p-6 md:p-8 dark:bg-gray-800 dark:border-blue-700">
        <form class="space-y-6" method="POST" action="{{ url('/verify') }}">
            @csrf
            <div>
                <img class="mx-auto h-16 w-16" src="{{ asset(config('app.logo')) }}" alt="NES Logo">
                <h2 class="mt-3 mb-1 text-3xl font-bold tracking-tight text-gray-900 text-center">Forgot Your Password?
                </h2>
            </div>
            <div>
                <p class="text-gray-500 mb-6">To reset your password, enter the registered email address and we will
                    send you paasword reset instructions on your email.</p>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                    </div>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Email address" value="{{ old('email') }}" required>
                </div>
                @error('email')
                <span class="mt-1 inline-flex invalid-feedback text-sm text-red-500 font-semibold" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <button type="submit"
                class="w-full text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 p-4 ">Reset
                Password</button>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300 text-center">
                <a href="{{ url('/login') }}" class="text-blue-900 hover:text-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-6 h-6 mx-auto">
                        <path
                            d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                        <path
                            d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                    </svg>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
