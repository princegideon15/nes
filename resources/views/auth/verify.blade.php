
@extends('layouts.app')

@section('content')
  <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8 h-screen bg-gray-100">
    <div class="w-full max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div>
            <img class="mx-auto h-12 w-auto" src="https://flowbite.com/docs/images/logo.svg" alt="Your Company">
            <h2 class="mt-3 mb-1 text-3xl font-bold tracking-tight text-gray-900 text-center">Reset Password Link Sent!</h2>
        </div>
        <div>
            <p class="text-gray-500 mb-6">A reset password link has been sent to your email address.</p>

            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                Did not receive an email? <a href="{{ url('/resend') }}/{{ $tokenData }}" class="text-blue-700 hover:underline dark:text-blue-500">Resend Reset Password Link</a>
            </div>
        </div>
        <div class="text-sm pt-5 font-medium text-gray-500 dark:text-gray-300 text-center">
            <a href="{{ url('/login') }}" class="text-blue-700 hover:underline dark:text-blue-500">Back to Login</a>
        </div>
    </div>
  </div>
@endsection

