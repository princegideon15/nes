<template>


    <div class="p-4 sm:ml-64 mt-14 bg-gray-100">

        <nav class="flex mb-5 px-5 py-3 shadow text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a :href="baseUrl + '/admin/dashboard'"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
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
                <li aria-current="page" class="inline-flex items-center">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Email
                            Notifications</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="relative overflow-x-auto shadow sm:rounded-lg border border-gray-200 p-5 mb-5 bg-white">

            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                    Email Notifications</h5>
            </div>
            <table id="email_table" class="w-full text-left text-gray-500 dark:text-gray-400 display">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email Subject
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CC
                        </th>
                        <th scope="col" class="px-6 py-3">
                            BCC
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Last updated
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(row, index) in notifications"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{ index + 1 }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ row.enc_subject }}
                        </th>
                        <td class="px-6 py-4">
                            {{ row.enc_description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ row.enc_cc }}
                        </td>
                        <td class="px-6 py-4">
                            {{ row.enc_bcc }}
                        </td>
                        <td class="px-6 py-4">
                            {{  formatDate(row.updated_at) ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            <a v-bind:href="baseUrl + '/admin/email_notification/manage/'+ row.id" type="button"
                                class="inline-flex items-center justify-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                >
                                <!-- @click="editNotification( row.id )" -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-4 h-4 mr-1">
                                    <path
                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                    <path
                                        d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                </svg>
                                Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>


</template>

<script>
    import 'flowbite'
    import moment from 'moment'
    import tinymce from 'vue-tinymce-editor'

    export default {
        components: {
            'tinymce': tinymce
        },
        props: [
            // library
            'notificationsData',
        ],
        data() {
            return {
                //baseUrl: window.location.origin + '/nrcpoutreach', // test server
                baseUrl: '', // local
                //baseUrl: window.location.origin, // production server
                
                // library
                notifications: [],

                editorContent: 'asdasd',
                tinyOptions: {
                    'height': 100,
                },
            }
        },
        methods: {
            formatDate: function (value) {
                if (value) {
                    return moment(String(value)).format('MMM. DD, YYYY')
                }
            },
            editNotification: function (id) {
                // console.log(id)
            }

        },
        mounted() {
            // library
            this.notifications = JSON.parse(JSON.stringify(this.notificationsData))
            // console.log(this.notifications)
        }
    }
</script>