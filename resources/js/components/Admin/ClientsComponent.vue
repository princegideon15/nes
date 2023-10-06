<template>


    <div class="p-4 sm:ml-64 mt-14 bg-gray-100 h-full">

        <nav class="flex mb-5 px-5 py-3 shadow bg-white text-gray-700 border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700"
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
                <li class="inline-flex items-center">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Users</span>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Clients</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 mb-5 shadow sm:rounded-lg border border-gray-200 bg-white">
            <div class="relative overflow-x-auto p-5">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                        Registered Clients</h5>
                </div>
                <table id="clients_table" class="w-full text-left text-gray-500 dark:text-gray-400 display">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Username/Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Registered as
                            </th>
                            <th scope="col" class="px-6 py-3">
                                No. of Applications
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date Registered
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(row, index) in clients"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                {{ index + 1 }}
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ row.name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ row.email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ regCategory(row.reg_category) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ row.apps }}
                            </td>
                            <td class="px-6 py-4 ">
                                {{ formatDate(row.date_registered) }}
                            </td>
                            <td class="px-6 py-4 ">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</template>

<script>
    import 'flowbite'
    import moment from 'moment'

    export default {
        props: [
            'clientsData',
            'activitiesData',
        ],
        data() {
            return {
                //baseUrl: window.location.origin + '/nrcpoutreach', // test server
                baseUrl: '', // local
                //baseUrl: window.location.origin, // production server
                
                clients: [],
                subCat: '',
            }
        },
        methods: {
            formatDate: function (value) {
                if (value) {
                    return moment(String(value)).format('MMM. DD, YYYY')
                }
            },
            regCategory: function (value) {
                return (value == 1) ? 'Division Chair' : (value == 2) ? 'Stakeholder' : 'Management'
            },
            async subCategory(reg, sub) {
                var x = '';
                let result = await axios.get(APP_URL + '/get_sub_category/' + reg + '/' + sub)
                    .catch((err) => {
                        console.log(err)
                    })
                this.subCat = result.data

            },
            subCategory: function (reg, sub) {
                var x = ''
                axios.get(APP_URL + '/get_sub_category/' + reg + '/' + sub)
                    .then(response => {
                        this.subCat = response.data

                    })
            }

        },
        mounted() {
            this.clients = JSON.parse(JSON.stringify(this.clientsData))
        }
    }
</script>