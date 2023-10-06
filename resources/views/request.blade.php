@extends('layouts.app')

@section('content')
<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8 h-screen bg-gray-100">
    <div
        class="w-full text-center max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div>
            <img class="mx-auto h-12 w-auto" src="https://flowbite.com/docs/images/logo.svg" alt="Your Company">
            <h2 class="mt-3 mb-1 text-3xl font-bold tracking-tight text-gray-900 text-center">{{ $title }}</h2>
        </div>
        <div>
            <p class="text-gray-500 mb-6">{{ $message }}</p>

            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                <p>If you have any questions or concerns, please email us at <a href="#"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">nrcp.outreachprogram@gmail.com</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
