@extends('admin.layouts.app')

@section('content')
@extends('admin.layouts.nav')


<div class="p-4 sm:ml-64 mt-14 bg-gray-100 h-full">


    <nav class="flex mb-5 px-5 py-3 shadow bg-white text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="javascript:void(0)"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
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
    </nav>

    <div class="grid grid-cols-4 gap-4 mb-4">
        @if($role == 1)
        <div class="w-full bg-yellow-50 shadow-lg rounded-lg border-t-4 border-yellow-300">

            <h5 class="mb-2 text-6xl text-yellow-400 font-extrabold tracking-tight px-4 pt-3 pb-1">
                {{ $reg_count }}
            </h5>

            <div class="bg-gray-800 text-white rounded-b p-4">
                <div class="flex justify-item-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-6 h-6 mr-1 text-yellow-300">
                        <path fill-rule="evenodd"
                            d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z"
                            clip-rule="evenodd" />
                        <path
                            d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                    </svg>
                    <p class="mb-10 font-semibold text-yellow-300">Registered Applicants</p>
                </div>
                <div class="text-right">
                    <a role="button" href="{{ url('/admin/clients') }}"
                        class="text-gray-400 hover:text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-blue-300 dark:text-gray-800 dark:hover:bg-blue-400 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                clip-rule="evenodd" />
                        </svg>
                        More details
                    </a>
                </div>
            </div>
        </div>
        @else
        <div class="w-full bg-yellow-50 shadow-lg rounded-lg border-t-4 border-yellow-300">
            <h5 class="mb-2 text-6xl text-yellow-400 font-extrabold tracking-tight px-4 pt-3 pb-1">
                {{ $pro_count }}
            </h5>

            <div class="bg-gray-800 text-white rounded-b p-4 text-yellow-400">
                <div class="flex justif-item-center text-yellow-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-6 h-6 mr-1">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="mb-1 font-semibold">Applications For Action</p>
                </div>
                <p class="mb-5 font-semibold text-xs text-gray-400">Pending applications for your processing.</p>
                <div class="text-right">
                    <a role="button" href="{{ url('/admin/applications') }}"
                        class="text-gray-400 hover:text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-blue-300 dark:text-gray-800 dark:hover:bg-blue-400 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                clip-rule="evenodd" />
                        </svg>
                        More details
                    </a>
                </div>
            </div>
        </div>
        @endif

        <div class="w-full bg-red-50 shadow-lg rounded-lg border-t-4 border-red-500">
            <h5 class="mb-2 text-6xl font-extrabold tracking-tight px-4 pt-3 pb-1 text-red-500">
                {{ $app_count }}
            </h5>

            <div class="bg-gray-800 text-white rounded-b p-4">
                <div class="flex justify-item-center text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-6 h-6 mr-1">
                        <path fill-rule="evenodd"
                            d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="mb-1 font-semibold ">STPS Applications</p>
                </div>
                <p class="mb-5 font-semibold text-xs text-gray-400">Application entries but not yet submitted.</p>
                <div class="text-right">
                    <a role="button" href="{{ url('/admin/applications') }}"
                        class="text-gray-400 hover:text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-blue-300 dark:text-gray-800 dark:hover:bg-blue-400 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                clip-rule="evenodd" />
                        </svg>
                        More details
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full bg-blue-50 shadow-lg rounded-lg border-t-4 border-blue-800">
            <h5 class="mb-2 text-6xl font-extrabold tracking-tight px-4 pt-3 pb-1 text-blue-800">
                {{ $sub_count }}
            </h5>

            <div class="bg-gray-800 text-white rounded-b p-4">
                <div class="flex justify-item-center text-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-6 h-6 mr-1">
                        <path fill-rule="evenodd"
                            d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zm9.586 4.594a.75.75 0 00-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 00-1.06 1.06l1.5 1.5a.75.75 0 001.116-.062l3-3.75z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="mb-10 font-semibold">Submitted Applications</p>
                </div>

                <div class="text-right">
                    <a role="button" href="{{ url('/admin/applications') }}"
                        class="text-gray-400 hover:text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-blue-300 dark:text-gray-800 dark:hover:bg-blue-400 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                clip-rule="evenodd" />
                        </svg>
                        More details
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full bg-green-50 shadow-lg rounded-lg  border-t-4 border-green-500">
            <h5 class="mb-2 text-6xl font-extrabold tracking-tight px-4 pt-3 pb-1 text-green-500">
                {{ $com_count }}
            </h5>

            <div class="bg-gray-800 text-white rounded-b p-4">
                <div class="flex justify-item-center text-green-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-6 h-6 mr-1">
                        <path fill-rule="evenodd"
                            d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                            clip-rule="evenodd" />
                    </svg>


                    <p class="mb-1 font-semibold">Completed Applications</p>
                </div>
                <p class="mb-5 font-semibold text-xs text-gray-400">Post Activity Report Submitted.</p>
                <div class="text-right">
                    <a role="button" href="{{ url('/admin/applications') }}"
                        class="text-gray-400 hover:text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-blue-300 dark:text-gray-800 dark:hover:bg-blue-400 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor" class="w-6 h-6">
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

</div>


@endsection
