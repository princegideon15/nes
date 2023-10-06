@extends('layouts.app')

@section('content')
@extends('layouts.nav')


<div class="p-4 sm:ml-64 mt-14 bg-gray-100 h-full">
    <nav class="flex mb-5 px-5 py-3 text-gray-700 shadow border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
        aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ url('/home') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Tracking
                        Status</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="grid grid-cols-2 gap-4 mb-2">
        <div>
            <form method="POST" action="{{ url('/tracker_page') }}">
                @csrf
                <div class="relative w-full shadow">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" value="{{ $track_num }}" name="track_app" id="track_app"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter Tracking Number">
                    <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">TRACK</button>
                </div>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-4">
        @if(count($tracking) > 0)
        <div
            class="w-full px-4 py-6 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Tracking Status</h5>
            </div>
            <div>

                <div class="flow-root overflow-y-auto h-96 p-1">
                    <ol class="relative border-l border-gray-200 dark:border-gray-700 mt-5">
                        @foreach($tracking as $row)
                        <li class="mb-5 ml-4">
                            @if($loop->iteration == 1)<div
                                class="absolute w-3 h-3 bg-blue-600 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                            </div>
                            @else<div
                                class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                            </div>
                            @endif
                            <time
                                class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{  $row->updated_at }}</time>
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
                <div
                    class="w-full text-center px-4 py-6 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-center">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                            There are no search results for "{{ $track_num }}"
                        </h5>
                    </div>
                    <div>
                        @endif
                    </div>
                </div>

                @endsection
