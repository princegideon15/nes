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
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Logs</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="relative overflow-x-auto sm:rounded-lg border border-gray-200 p-5 bg-white mb-5 shadow">

        <div class="flex items-center justify-between mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                Logs</h5>
        </div>
        <table id="logs_table" class="w-full text-left text-gray-500 dark:text-gray-400 display">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        URL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Controller
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Model
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Query
                    </th>
                    <th scope="col" class="px-6 py-3">
                        IP Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Operating System
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Browser
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $row)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 text-center">
                        {{ $loop->iteration }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $row->log_email }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $row->log_description }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->log_url ?? '-' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->log_controller ?? '-' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->log_model ?? '-' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->log_query ?? '-' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->log_ip_address ?? '-' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->log_user_agent ?? '-' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $row->log_browser ?? '-' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ date('d M Y h:m a', strtotime($row->created_at)) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
