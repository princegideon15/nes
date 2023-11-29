<template>
    <div class="p-4 sm:ml-64 mt-14 bg-gray-100">

        <nav class="flex mb-5 px-5 py-3 text-gray-700 shadow border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a :href="baseUrl + '/admin/dashboard'"
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
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Reports</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="relative overflow-x-auto sm:rounded-lg border border-gray-200 p-5 bg-white mb-5 shadow">

            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                    Reports</h5>
            </div>
            
            <div id="accordion-collapse" data-accordion="collapse">
                <h2 id="accordion-collapse-heading-1">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                    <span>List of Registered Clients</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                    <div class="p-5 border border-gray-200 dark:border-gray-700">
                        <div class="relative overflow-x-auto">
                            <table id="registered_report_table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 display">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            #
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Sex
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Institution
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Position
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Address
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Date Registered
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr v-for="(row, index) in clients" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ index + 1 }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ row.name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ row.email }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ row.pp_sex == 1 ? 'Male' : 'Female' }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ row.pp_pos }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ row.pp_ins }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ row.address }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ formatDate(row.date_registered) }}
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <h2 id="accordion-collapse-heading-2">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                    <span>List of Submitted Applications</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                        <div class="relative overflow-x-auto">
                            <table id="submitted_applications_report_table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 display">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            #
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Activity
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Duration
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Requested Institution
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Date Submitted
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr v-for="(row, index) in submitted" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ index + 1 }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ formatActivity(row.act_req_id) }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ formatDate(row.act_start) }} - {{ formatDate(row.act_end)}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ row.con_ins }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ formatDate(row.date_submitted) }}
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <h2 id="accordion-collapse-heading-3">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                    <span>List of Completed Applications</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                    <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                        <div class="relative overflow-x-auto">
                            <table id="completed_applications_report_table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 display">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            #
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Activity
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Duration
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Requested Institution
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Date Submitted
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr v-for="(row, index) in completed" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ index + 1 }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ formatActivity(row.act_req_id) }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ formatDate(row.act_start) }} - {{ formatDate(row.act_end)}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ row.con_ins }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ formatDate(row.date_submitted) }}
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <h2 id="accordion-collapse-heading-4">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-4" aria-expanded="false" aria-controls="accordion-collapse-body-4">
                    <span>List of Requesting Institutions</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-4">
                    <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                        <div class="relative overflow-x-auto">
                            <table id="institutions_report_table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            #
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Institution
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Institution Head
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Address
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Contact Person
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Contact No.
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(row, index) in institutions" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{  index + 1 }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{  row.con_ins }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{  row.con_head_ins }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{  row.con_address }}, 
                                            {{  row.con_brgy }}, 
                                            {{  row.con_city }}, 
                                            {{  row.con_prov }}, 
                                            {{  row.con_reg }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{  row.con_focal_p }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{  row.con_contact_num }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <h2 id="accordion-collapse-heading-5">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-5" aria-expanded="false" aria-controls="accordion-collapse-body-5">
                    <span>List of Feedbacks</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-5" class="hidden" aria-labelledby="accordion-collapse-heading-5">
                    <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                        <div class="relative overflow-x-auto">
                            <table id="feedbacks_report_table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                                    <tr v-for="(row, index) in feedbacks" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ index + 1 }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ row.pp_first_name }}, {{ row.pp_last_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ row.fdbk_remarks ?? 'No remarks' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="hidden">{{ row.fdbk_rate }}</span>

                                            <div class="flex items-center space-x-2">
                                                <span v-for="(item, index) in row.fdbk_rate">
                                                    <svg v-if="index < row.fdbk_rate" class="w-6 h-6 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                </span>

                                                <span v-for="(item, index) in (5 - row.fdbk_rate)">
                                                    <svg v-if="index < 5" class="w-6 h-6 text-gray-300 dark:text-gray-500" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ formatDate(row.fdbk_rate) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import 'flowbite'
    import moment from 'moment'

    export default {
        props: [
            // data
            'clientsData',
            'submittedData',
            'completedData',
            'institutionsData',
            'feedbacksData',

            // library
            'activitiesData',
        ],
        data() {
            return {
                //baseUrl: window.location.origin + '/nrcpoutreach', // test server
                baseUrl: '', // local
                //baseUrl: window.location.origin, // production server

                // data
                clients: [],
                submitted: [],
                completed: [],
                institutions: [],
                feedbacks: [],

                // library
                activities: [],

            }
        },
        methods: {
            formatDate: function (value) {
                if (value) {
                    return moment(String(value)).format('DD MMM YYYY')
                }
            },
            formatActivity: function (value) {

                if (value != null) {
                    const arr = value.split(', ')
                    const acts = []

                    arr.forEach((activity, act_index) => {
                        this.activities.forEach((value, index) => {
                            if (activity == value.act_id) {
                                acts.push(value.act_name)
                            }
                        })
                    })

                    return acts.join(', ');

                } else {
                    return '-'
                }
            }
        },
        mounted() {
            // library
            this.activities = JSON.parse(JSON.stringify(this.activitiesData))

            // data
            this.clients = JSON.parse(JSON.stringify(this.clientsData))
            this.submitted = JSON.parse(JSON.stringify(this.submittedData))
            this.completed = JSON.parse(JSON.stringify(this.completedData))
            this.institutions = JSON.parse(JSON.stringify(this.institutionsData))
            this.feedbacks = JSON.parse(JSON.stringify(this.feedbacksData))
            
        }
    }
</script>