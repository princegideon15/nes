@extends('layouts.app')

@section('content')
<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8 h-screen bg-blue-200">
    <div
        class="w-full max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div>
            <img class="mx-auto h-16 w-16" src="{{ asset(config('app.logo')) }}" alt="NES Logo">
            <h2 class="mt-3 mb-1 text-3xl font-bold tracking-tight text-gray-900 text-center">Reset Password Link Sent!
            </h2>
        </div>
        <div>
            <p class="text-gray-500 mb-6">A reset password link has been sent to your email address.</p>

            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                Did not receive an email? <a href="{{ url('/resend') }}/{{ $tokenData }}"
                    class="text-blue-700 hover:underline dark:text-blue-500">Resend Reset Password Link</a>
            </div>
        </div>
        <div class="text-sm pt-5 font-medium text-gray-500 dark:text-gray-300 text-center">
            <a href="{{ url('/login') }}" class="text-blue-900 hover:text-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mx-auto">
                    <path
                        d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                    <path
                        d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection
