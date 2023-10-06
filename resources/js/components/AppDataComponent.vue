<template>
    <div class="p-4 sm:ml-64 mt-14 bg-gray-100">


        <nav class="flex mb-5 px-5 py-3 text-gray-700 shadow border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a :href="baseUrl + '/home'"
                        class="inline-flex text-sm items-center font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
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
                    <a :href="baseUrl + '/applications'"
                        class="inline-flex items-center font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white text-sm">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        My Applications
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
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">View Data</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 mb-5 shadow sm:rounded-lg border border-gray-200 bg-white">
            <div class="relative overflow-x-auto p-3">
                <table class="w-full text-left border">
                    <thead class="bg-gray-500 text-white uppercase">
                        <tr>
                            <th scope="col" colspan="2" class="px-6 py-3">
                                Contact Information
                            </th>
                        </tr>
                    </thead>
                    <tbody v-for="row in contact">
                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-semibold text-right bg-gray-100">
                                Requesting Institution
                            </th>
                            <td class="px-6 py-4">
                                {{ row.con_ins }}
                            </td>
                        </tr>
                        <tr
                            class="text-gray-400 text-xs text-center uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <th scope="row" colspan="2" class="px-6 py-4 font-medium">
                                Requesting Institution Address
                            </th>
                        </tr>
                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-semibold text-right bg-gray-100">
                                Region / Province / City / Barangay
                            </th>
                            <td class="px-6 py-4">
                                {{ regions[row.con_reg - 1] }} , {{ provinces[row.con_prov - 1] }} ,
                                {{ cities[row.con_city - 1]}} , {{ row.con_brgy }}
                            </td>
                        </tr>
                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-semibold text-right bg-gray-100">
                                Address
                            </th>
                            <td class="px-6 py-4">
                                {{ row.con_address }}
                            </td>
                        </tr>
                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-semibold text-right bg-gray-100">
                                Head of Requesting Institution
                            </th>
                            <td class="px-6 py-4">
                                {{ row.con_head_ins }}
                            </td>
                        </tr>
                        <tr
                            class="text-gray-400 text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <th scope="row" colspan="2" class="px-6 py-4 font-medium dark:text-white">
                                Focal Person's Details
                            </th>
                        </tr>
                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-semibold text-right bg-gray-100">
                                Focal Person
                            </th>
                            <td class="px-6 py-4">
                                {{ row.con_focal_p }}
                            </td>
                        </tr>
                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-semibold text-right bg-gray-100">
                                Contact Number
                            </th>
                            <td class="px-6 py-4">
                                {{ row.con_contact_num }}
                            </td>
                        </tr>
                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-semibold text-right bg-gray-100">
                                Contact Address
                            </th>
                            <td class="px-6 py-4">
                                {{ row.con_contact_add }}
                            </td>
                        </tr>
                    </tbody>

                    <tbody v-for="row in activity">
                        <tr class="uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <th scope="col" colspan="4" class="px-6 py-3 text-white bg-gray-500 uppercase">
                                Type of Activity
                            </th>
                        </tr>
                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-semibold text-right bg-gray-100">
                                Activity
                            </th>
                            <td class="px-6 py-4">

                                {{ formatActivity(row.act_req_id) }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-semibold text-right bg-gray-100">
                                Date of implementation and duration
                            </th>
                            <td class="px-6 py-4">
                                {{  formatDate(row.act_start) }} - {{  formatDate(row.act_end) }}
                            </td>
                        </tr>
                    </tbody>

                    <tbody v-for="row in objective">
                        <tr class=" text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <th scope="col" colspan="4" class="px-6 py-3 bg-gray-500 text-white uppercase">
                                Objectives
                            </th>
                        </tr>
                        <tr class="bg-white border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-semibold text-right bg-gray-100">
                                Objectives
                            </th>
                            <td class="px-6 py-4">
                                <ul class="list-disc list-inside">
                                    <li>{{ row.obj_1 }}</li>
                                    <li>{{ row.obj_2 }}</li>
                                    <li>{{ row.obj_3 }}</li>
                                    <li v-if="row.obj_4 != null">{{ row.obj_4 }}</li>
                                    <li v-if="row.obj_5 != null">{{ row.obj_5 }}</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-semibold text-right bg-gray-100">
                                Indicate how gender is integrated in the requested Outreach Activity
                            </th>
                            <td class="px-6 py-4">
                                {{ row.obj_gender }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-semibold text-right bg-gray-100">
                                Indicate what Sustainable Development Goalg/s (SDG/s) is addressed bt the requested
                                Outreach Activity
                            </th>
                            <td class="px-6 py-4">
                                {{ row.obj_sdg }}
                            </td>
                        </tr>
                    </tbody>

                    <tbody v-for="row in venue">
                        <tr class=" text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <th scope="col" colspan="4" class="px-6 py-3 bg-gray-500 text-white uppercase">
                                Venue Specifications
                            </th>
                        </tr>
                        <tr class="bg-white border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-semibold text-right bg-gray-100">
                                Specifications
                            </th>
                            <td class="px-6 py-4">
                                {{  formatVenue(row.ven_spec) }}
                            </td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr class="uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <th scope="col" colspan="4" class="px-6 py-3 bg-gray-500 text-white uppercase">
                                Participants
                            </th>
                        </tr>
                        <tr class="bg-white border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-semibold text-right bg-gray-100">
                                No. of Participants
                            </th>
                            <td class="px-6 py-4">
                                {{  participant }}
                            </td>
                        </tr>
                    </tbody>

                    <tbody v-for="row in attachment">
                        <tr class="uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <th scope="col" colspan="4" class="px-6 py-3 bg-gray-500 text-white uppercase">
                                Budget Required
                            </th>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-semibold text-right bg-gray-100">
                                Copy of Line-Item-Budget (LIB)
                            </th>
                            <td class="px-6 py-4">
                                <a v-bind:href="'/storage/attachments/' + row.att_lib"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                    download>Download File</a>
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-semibold text-right bg-gray-100">
                                Justification Letter
                            </th>
                            <td class="px-6 py-4">
                                <a v-if="row.att_justification != null"
                                    v-bind:href="'/storage/attachments/' + row.att_justification"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                    download>Download file</a>
                                <span v-else class="font-medium text-gray-600 dark:text-gray-500" download>N/A</span>
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-semibold text-right bg-gray-100">
                                Official letter of request for NRCP Outreach Program (NOP)
                            </th>
                            <td class="px-6 py-4">
                                <a v-bind:href="'/storage/attachments/' + row.att_req_letter"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                    download>Download File</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div
                class="w-full px-4 py-6 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">List of Participants</h5>
                </div>
                <div>

                </div>
                <div class=" overflow-y-auto h-96 p-1 ">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Age
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Sex
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Insistution
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Position
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="participants.length === 0"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th colspan="6" scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                        No participants listed.
                                    </th>
                                </tr>
                                <tr v-else v-for="row in participants"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{  row.prt_name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{  row.prt_age }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{  (row.prt_sex == 1) ? 'Male' : 'Female' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{  row.prt_int }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{  row.prt_pos }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div
                class="w-full px-4 py-6 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Tracking Status</h5>
                </div>
                <div>

                </div>
                <div class=" overflow-y-auto h-96 p-1 ">
                    <ol class="relative border-l border-gray-200 dark:border-gray-700">
                        <li class="mb-8 ml-4" v-for="(row, index) in tracking">
                            <div v-if="index == 0"
                                class="absolute w-3 h-3 bg-blue-600 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                            </div>
                            <div v-else
                                class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                            </div>
                            <time
                                class="mb-1 font-normal leading-none text-gray-400 dark:text-gray-500">{{  row.updated_at }}</time>
                            <p class="font-medium text-gray-900 truncate dark:text-white">
                                <span class="flex items-center font-medium text-gray-900 dark:text-white">
                                    {{  row.description }}
                                </span>
                            </p>
                            <p class="text-gray-500 truncate dark:text-gray-400">
                                {{  row.pp_first_name }} {{  row.pp_last_name }}
                            </p>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import 'flowbite'
    import moment from 'moment'
    import {
        Tooltip
    } from "flowbite";

    export default {
        props: [
            'contactData',
            'activityData',
            'objectiveData',
            'venueData',
            'participantData',
            'attachmentData',
            'regionsData',
            'provincesData',
            'citiesData',
            'activitiesData',
            'venuesData',
            'trackingData',
            'participantsData',
        ],
        data() {

            const province = []
            return {
                //baseUrl: window.location.origin + '/nrcpoutreach', // test server
                baseUrl: '', // local
                //baseUrl: window.location.origin, // production server
                
                contact: [],
                activity: [],
                objective: [],
                venue: [],
                participant: '',
                attachment: [],
                regions: [],
                provinces: [],
                cities: [],
                activities: [],
                venues: [],
                tracking: [],
                participants: [],
                appTracking: ''
            };
        },
        methods: {
            formatDate: function (value) {
                if (value) {
                    return moment(String(value)).format('DD MMM. YYYY')
                }
            },
            formatActivity: function (value) {

                if (value != null) {
                    const arr = value.split(', ')
                    const acts = []

                    arr.forEach((activity, act_index) => {
                        this.activities.forEach((value, index) => {
                            if (activity == index) {
                                acts.push(value)
                            }
                        })
                    })

                    return acts.join(', ');

                } else {
                    return '-'
                }
            },
            formatVenue: function (value) {

                if (value != null) {
                    const arr = value.split(', ')
                    const vens = []

                    arr.forEach((venue, act_index) => {
                        this.venues.forEach((value, index) => {
                            if (venue == index) {
                                vens.push(value)
                            }
                        })
                    })

                    return vens.join(', ');

                } else {
                    return '-'
                }
            },
        },
        mounted() {
            this.contact = JSON.parse(JSON.stringify(this.contactData))
            this.activity = JSON.parse(JSON.stringify(this.activityData))
            this.objective = JSON.parse(JSON.stringify(this.objectiveData))
            this.venue = JSON.parse(JSON.stringify(this.venueData))
            this.participant = this.participantData
            this.attachment = JSON.parse(JSON.stringify(this.attachmentData))

            this.regionsData.forEach((value, index) => {
                this.regions.push(value.region_name)
            })
            this.provincesData.forEach((value, index) => {
                this.provinces.push(value.province_name)
            });
            this.citiesData.forEach((value, index) => {
                this.cities.push(value.city_name)
            });
            this.activitiesData.forEach((value, index) => {
                this.activities.push(value.act_name)
            });
            this.venuesData.forEach((value, index) => {
                this.venues.push(value.ven_name)
            });

            this.tracking = JSON.parse(JSON.stringify(this.trackingData))
            this.participants = JSON.parse(JSON.stringify(this.participantsData))

        }
    }
</script>