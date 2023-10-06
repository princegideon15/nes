@extends('admin.layouts.app')

@section('content')
@extends('admin.layouts.nav')

<div class="p-4 sm:ml-64 mt-14 bg-gray-100">

    <nav class="flex mb-5 px-5 py-3 text-gray-700 shadow border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
        aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ url('/admin/dashboard') }}"
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
            <li class="inline-flex items-center">
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Feedbacks</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="grid grid-cols-2">
        <div class="relative overflow-x-auto w-full shadow sm:rounded-lg border border-gray-200 p-5 mb-5 bg-white">
            <div class="flex items-center mb-2">
                @for ($i=0;$i<$or;$i++) <svg class="w-6 h-6 text-yellow-300" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path
                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                    @endfor

                    @for ($i=0;$i<(5 - $or);$i++) <svg class="w-6 h-6 text-gray-300 dark:text-gray-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path
                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        @endfor
                        <p class="ml-2 text-sm font-medium text-gray-900 dark:text-white">{{ $or }} out of 5</p>
            </div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Overall ratings</p>
            <div class="flex items-center mt-4 w-full">
                <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">5 star</a>
                <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                    <div class="h-5 bg-yellow-300 rounded" style="width: <?php echo $p5;?>%"></div>
                </div>
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $p5 }}%</span>
            </div>
            <div class="flex items-center mt-4">
                <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">4 star</a>
                <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                    <div class="h-5 bg-yellow-300 rounded" style="width: <?php echo $p4;?>%"></div>
                </div>
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $p4 }}%</span>
            </div>
            <div class="flex items-center mt-4">
                <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">3 star</a>
                <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                    <div class="h-5 bg-yellow-300 rounded" style="width: <?php echo $p3;?>%"></div>
                </div>
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $p3 }}%</span>
            </div>
            <div class="flex items-center mt-4">
                <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">2 star</a>
                <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                    <div class="h-5 bg-yellow-300 rounded" style="width: <?php echo $p2;?>%"></div>
                </div>
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $p2 }}%</span>
            </div>
            <div class="flex items-center mt-4">
                <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">1 star</a>
                <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                    <div class="h-5 bg-yellow-300 rounded" style="width: <?php echo $p1;?>%"></div>
                </div>
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $p1 }}%</span>
            </div>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow sm:rounded-lg border border-gray-200 p-5 bg-white mb-5">

        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="client-tab" data-tabs-target="#client"
                        type="button" role="tab" aria-controls="client" aria-selected="false">Clients</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="admin-tab" data-tabs-target="#admin" type="button" role="tab" aria-controls="admin"
                        aria-selected="false">Administrators</button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="client" role="tabpanel"
                aria-labelledby="client-tab">
                <table id="client_feedback_table" class="w-full text-left text-gray-500 dark:text-gray-400 display">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                User
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Remarks
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Rating
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($client_feedbacks as $row)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $row->pp_first_name . ' ' . $row->pp_last_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $row->fdbk_remarks ?? '-'  }}
                            </td>
                            <th scope="row" class="">

                                <span class="hidden">{{ $row->fdbk_rate }}</span>

                                <div class="flex items-center space-x-2">
                                    @for ($i=0;$i<$row->fdbk_rate;$i++)
                                        <svg class="w-6 h-6 text-yellow-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                        @endfor

                                        @for ($i=0;$i<(5 - $row->fdbk_rate);$i++)
                                            <svg class="w-6 h-6 text-gray-300 dark:text-gray-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            @endfor
                                </div>

                            </th>
                            <td class="px-6 py-4">
                                {{ date('d M Y', strtotime($row->created_at)) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="admin" role="tabpanel"
                aria-labelledby="admin-tab">
                <table id="admin_feedback_table" class="w-full text-left text-gray-500 dark:text-gray-400 display">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                User
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Remarks
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Rating
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admin_feedbacks as $row)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $row->user_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $row->fdbk_remarks ?? '-'  }}
                            </td>
                            <th scope="row" class="">

                                <span class="hidden">{{ $row->fdbk_rate }}</span>

                                <div class="flex items-center space-x-2">
                                    @for ($i=0;$i<$row->fdbk_rate;$i++)
                                        <svg class="w-6 h-6 text-yellow-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                        @endfor

                                        @for ($i=0;$i<(5 - $row->fdbk_rate);$i++)
                                            <svg class="w-6 h-6 text-gray-300 dark:text-gray-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            @endfor
                                </div>

                            </th>
                            <td class="px-6 py-4">
                                {{ $row->usr_grp_role }}
                            </td>
                            <td class="px-6 py-4">
                                {{ date('d M Y', strtotime($row->created_at)) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>

@endsection
