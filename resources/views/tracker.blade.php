@extends('layouts.app')

@section('content')
    <div class="flex max-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8 h-screen bg-gray-100">
        <div class="w-full max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            
        <div class="mt-1">
                <form method="POST" action="{{ url('/tracker') }}" > 
                @csrf
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" value="{{ $track_num }}" name="track_app" id="track_app"  class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Tracking Number" >
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">TRACK</button>
                    </div>
                </form>
            </div>
            
            @if(count($tracking) > 0)
                <div>
                    <h2 class="mt-3 mb-1 text-3xl font-bold tracking-tight text-gray-900 text-center">Tracking Status</h2>
                    <!-- <p class="text-center text-gray-500 mb-6">{{ $track_num }}</p> -->
                </div>

                <div class="flow-root overflow-y-auto h-96 p-1">
                    <ol class="relative border-l border-gray-200 dark:border-gray-700 mt-5"> 
                        @foreach($tracking as $row)    
                        <li class="mb-5 ml-4">
                            @if($loop->iteration == 1)<div class="absolute w-3 h-3 bg-blue-600 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                            @else<div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                            @endif
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{  $row->updated_at }}</time>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white">
                                    {{  $row->description }}
                                </span>
                            </p>
                        </li>      
                        @endforeach       
                    </ol>
                </div>
            @else
                <div class="mt-4 w-full text-center px-4 py-6 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-center">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                        There are no search results for "{{ $track_num }}"
                        </h5>
                    </div>
                <div>
            @endif

            <div class="text-sm mt-10 font-medium text-gray-500 dark:text-gray-300 text-center">
                <a href="{{ url('/login') }}" class="text-blue-700 hover:underline dark:text-blue-500">Back to Login</a>
            </div>
        </div>
    </div>
@endsection
