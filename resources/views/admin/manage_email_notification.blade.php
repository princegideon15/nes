@extends('admin.layouts.app')

@section('content')
@extends('admin.layouts.nav')

<!-- <manage-email-notification-component 
        :notification-data="{{ json_encode($notification) }}"
        :user-groups-data="{{ json_encode($roles) }}"
    ></manage-email-notification-component>  -->

<div class="p-4 sm:ml-64 mt-14">

    <nav class="flex mb-5 px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ url('/admin/email_notifications') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <path
                            d="M19.5 22.5a3 3 0 003-3v-8.174l-6.879 4.022 3.485 1.876a.75.75 0 01-.712 1.321l-5.683-3.06a1.5 1.5 0 00-1.422 0l-5.683 3.06a.75.75 0 01-.712-1.32l3.485-1.877L1.5 11.326V19.5a3 3 0 003 3h15z">
                        </path>
                        <path
                            d="M1.5 9.589v-.745a3 3 0 011.578-2.641l7.5-4.039a3 3 0 012.844 0l7.5 4.039A3 3 0 0122.5 8.844v.745l-8.426 4.926-.652-.35a3 3 0 00-2.844 0l-.652.35L1.5 9.59z">
                        </path>
                    </svg>
                    Email Notifications
                </a>
            </li>
            <li aria-current="page" class="inline-flex items-center">
                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Edit Email
                    Notification</span>
            </li>
        </ol>

    </nav>

    <div class="flex p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
        role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            Do not change or remove words with square brackets. <span class="font-medium">[EXAMPLE]</span>
        </div>
    </div>


    <div
        class="p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow bg-gray-50 dark:bg-gray-800 grid gap-4 grid-cols-2">
        @foreach ($notification as $row )
        <div>
            <form id="email_notif_form" name="email_notif_form">
                <div class="mb-6">
                    <label for="enc_subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                        subject</label>

                    <input type="text" name="enc_subject"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php echo $row->enc_subject;?>">


                </div>
                <div class="mb-6">
                    <label for="enc_description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notification trigger</label>

                    <input type="text" name="enc_description"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php echo $row->enc_description;?>">


                </div>
                <div class="mb-6">
                    <label for="enc_cc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CC
                        <span class="text-xs text-gray-500 dark:text-white">(optional)</span></label>
                    <input type="text" name="enc_cc"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="email#1,#email2,email#3" value="<?php echo $row->enc_cc;?>">
                    <p class="text-sm text-gray-900 dark:text-white">Please separate emails by comma (,)</p>
                </div>
                <div class="mb-6">
                    <label for="enc_bcc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BCC
                        <span class="text-xs text-gray-500 dark:text-white">(optional)</span>
                    </label>
                    <input type="text" name="enc_bcc"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="email#1,#email2,email#3" value="<?php echo $row->enc_bcc;?>">
                    <p class="text-sm text-gray-900 dark:text-white">Please separate emails by comma (,)</p>
                </div>
                <div class="mb-6">
                    <label for="enc_bcc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User
                        group</label>
                    <p class="text-sm mb-2 text-gray-900 dark:text-white">Following user groups will also receive this email
                        notification</p>
                    <ul
                        class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                        @php $checked_arr = preg_split("/\,/", $row->enc_user_group); @endphp
                        @foreach ($roles as $r)
                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input id="enc_user_group<?php echo $r->usr_grp_id;?>" name="enc_user_group[]"
                                    value="<?php echo $r->usr_grp_id;?>" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                    value="<?php echo $r->usr_grp_id;?>"
                                    <?php echo (in_array($r->usr_grp_id, $checked_arr)) ? 'checked' : ''?>>
                                <label for="enc_user_group<?php echo $r->usr_grp_id;?>"
                                    class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $r->usr_grp_role;?></label>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                </div>
                <button type="button" onclick="updateEmailNotif(<?php echo $row->enc_process_id; ?>)"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Apply
                    Changes</button>
            </form>
        </div>

        <div>
            <label for="enc_content" class="text-sm font-medium text-gray-900 dark:text-white">Email content</label>
            <textarea id="enc_content" name="enc_content"><?php echo $row->enc_content;?></textarea>
        </div>
        @endforeach
    </div>
    <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
        <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
    </div>
    <div class="grid grid-cols-2 gap-4">
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
    </div>

</div>

@endsection
