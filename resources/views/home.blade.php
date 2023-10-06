@extends('layouts.app')

@section('content')
@extends('layouts.nav')

<div class="p-4 sm:ml-64 mt-14 bg-gray-100 h-full">

    <nav class="flex mb-5 px-5 py-3 text-gray-700 shadow border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
        aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="javascript:void(0)"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-800 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z">
                        </path>
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z">
                        </path>
                    </svg>
                    Dashboard
                </a>
            </li>
        </ol>
        <div class="ml-auto flex justify-end">
            <a href="{{ url('/applications') }}" type="button"
                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-dark hover:text-white bg-blue-300 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2">
                    <path
                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                    <path
                        d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                </svg>

                Fill up STPS Form
            </a>
        </div>
    </nav>


    <div class="grid grid-cols-4 gap-4 mb-4">



        <div class="w-full border-t-4 border-blue-800 bg-blue-50 shadow-lg rounded-lg ">
            <form method="POST" action="{{ url('/tracker_dashboard') }}">
                @csrf
                <div class="py-4 relative w-full shadow">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" name="track_app" id="track_app"
                        class="block w-full bg-transparent p-4 pl-10 text-md font-bold text-blue-800 border-0   focus:outline-none focus:ring-0"
                        placeholder="Enter Tracking Number" required>
                </div>

                <div class="bg-blue-800 text-white rounded-b p-4">
                    <div class="flex justif-item-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6 mr-1">
                            <path d="M8.25 10.875a2.625 2.625 0 115.25 0 2.625 2.625 0 01-5.25 0z" />
                            <path fill-rule="evenodd"
                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.125 4.5a4.125 4.125 0 102.338 7.524l2.007 2.006a.75.75 0 101.06-1.06l-2.006-2.007a4.125 4.125 0 00-3.399-6.463z"
                                clip-rule="evenodd" />
                        </svg>
                        <p class="mb-1 font-semibold">Track Application</p>
                    </div>
                    <p class="mb-5 font-semibold text-xs text-gray-300">Type your tracking number.</p>


                    <div class="text-right">
                        @if($errors->any())
                        <span class="font-semibold text-xs text-red-500">{{$errors->first()}}</span>
                        @endif

                        <button type="submit"
                            class="flex jusitfy-item-center text-gray-300 hover:text-white hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-blue-300 dark:text-gray-800 dark:hover:bg-blue-400 dark:focus:ring-blue-800">
                            TRACK
                        </button>

            </form>
        </div>
    </div>
</div>

<div class="w-full bg-yellow-50 border-t-4 border-yellow-400 shadow-lg rounded-lg">
    <h5 class="mb-2 text-6xl font-extrabold tracking-tight px-4 pt-3 pb-1 text-yellow-400">
        {{ $app_count }}
    </h5>

    <div class="bg-yellow-400 text-white rounded-b p-5">
        <div class="flex justif-item-center text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-1">
                <path fill-rule="evenodd"
                    d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z"
                    clip-rule="evenodd" />
                <path fill-rule="evenodd"
                    d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z"
                    clip-rule="evenodd" />
            </svg>
            <p class="mb-1 font-semibold">My Applications</p>
        </div>
        <p class="mb-5 font-semibold text-xs">List of applications, STPS Form.</p>

        <div class="text-right">
            <a role="button" href="{{ url('/applications') }}"
                class="text-gray-300 hover:text-white hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-blue-300 dark:text-gray-800 dark:hover:bg-blue-400 dark:focus:ring-blue-800">
                <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                        clip-rule="evenodd" />
                </svg>
                More details
            </a>
        </div>
    </div>
</div>

<div class="w-full bg-red-50 border-t-4 border-red-600 shadow-lg rounded-lg">
    <h5 class="mb-2 text-6xl font-extrabold tracking-tight px-4 pt-3 pb-1 text-red-600">
        {{ $pro_count }}
    </h5>

    <div class="bg-red-600 text-white rounded-b p-5">
        <div class="flex justif-item-center text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-1">
                <path fill-rule="evenodd"
                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z"
                    clip-rule="evenodd" />
            </svg>
            <p class="mb-1 font-semibold">On-going Applications</p>
        </div>
        <p class="mb-5 font-semibold text-xs">On-going processing applications.</p>

        <div class="text-right">
            <a role="button" href="{{ url('/applications') }}"
                class="text-gray-300 hover:text-white hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-blue-300 dark:text-gray-800 dark:hover:bg-blue-400 dark:focus:ring-blue-800">
                <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                        clip-rule="evenodd" />
                </svg>
                More details
            </a>
        </div>
    </div>
</div>


<div class="w-full bg-green-50 border-t-4 border-green-500 shadow-lg rounded-lg">
    <h5 class="mb-2 text-6xl font-extrabold tracking-tight px-4 pt-3 pb-1 text-green-500">

        {{ $com_count }}
    </h5>

    <div class="bg-green-500 text-white rounded-b p-5 ">
        <div class="flex justify-item-center text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-1">
                <path fill-rule="evenodd"
                    d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                    clip-rule="evenodd" />
            </svg>
            <p class="mb-1 font-semibold">Completed Applications</p>
        </div>
        <p class="mb-5 font-semibold text-xs">Post Activity Report Submitted.</p>

        <div class="text-right">
            <a role="button" href="{{ url('/applications') }}"
                class="text-gray-300 hover:text-white hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-blue-300 dark:text-gray-800 dark:hover:bg-blue-400 dark:focus:ring-blue-800">
                <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                        clip-rule="evenodd" />
                </svg>
                More details
            </a>
        </div>
    </div>
</div>




</div>



<div class="grid grid-cols-3 gap-4 mb-4">



</div>

<!-- <div class="grid grid-cols-3 gap-4 mb-4">
      <div class="max-w-sm h-24 rounded bg-gray-50 dark:bg-gray-800">
      <button type="button" class="w-full h-full text-lg text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">S&T Promotion and Services Form</button>
      </div>
      <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
         <p class="text-2xl text-gray-400 dark:text-gray-500">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
         </p>
      </div>
      <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
         <p class="text-2xl text-gray-400 dark:text-gray-500">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
         </p>
      </div>
   </div> -->

</div>


@endsection
