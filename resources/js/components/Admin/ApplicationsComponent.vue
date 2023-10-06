<template>

    <div class="p-4 sm:ml-64 mt-14 bg-gray-100">

        <nav class="flex mb-5 px-5 py-3 bg-white shadow text-gray-700 border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700"
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
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span
                            class="ml-1 font-medium text-sm text-gray-500 md:ml-2 dark:text-gray-400">Applications</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 mb-5 shadow sm:rounded-lg border border-gray-200 bg-white">
            <div class="relative overflow-x-auto p-5">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                        Applications</h5>
                </div>
                <table id="admin_app_table" class="w-full text-gray-500 dark:text-gray-400 display">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">#</th>
                            <th scope="col" class="px-6 py-3">
                                Requesting Institution
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Activity
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Duration
                            </th>
                            <!-- <th scope="col" class="px-6 py-3">
                            Participants
                        </th> -->
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <!-- <th scope="col" class="px-6 py-3">
                            Focal Person
                        </th> -->
                            <th scope="col" class="px-6 py-3">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(row,index) in applications"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                {{ index + 1 }}
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ row.con_ins }}
                            </th>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ formatActivity(row.act_req_id) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ formatDate(row.act_start) }} - {{ formatDate(row.act_end) }}
                            </td>
                            <!-- <td class="px-6 py-4">
                            {{  row.participants }}
                        </td> -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="javascript:void(0)" v-bind:id="'hover-tracker' + row.stps_id"
                                    class="hover:underline"
                                    @mouseover="hoverTracker('hover-tracker'+row.stps_id, row.con_usr_id , row.con_form_token)">

                                    <span v-if="row.status == 10"
                                        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                        {{  row.description }}
                                    </span>

                                    <span v-if="row.status == 0"
                                        class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                        {{  row.description }}
                                    </span>

                                    <span v-if="row.status != 0 && row.status != 10"
                                        class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                        {{  row.description }}
                                    </span>

                                </a>
                            </td>
                            <!-- <td class="px-6 py-4 whitespace-nowrap">
                            {{  row.con_focal_p ?? '-' }} ({{  row.con_contact_num ?? '-' }})
                        </td> -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{  formatDate(row.tracked_time) }}
                            </td>
                            <td class="px-6 py-4">

                                <button v-if="row.app_status != NULL" id="dropdownLeftButton"
                                    v-bind:id="'manage-app' + (index + 1)" data-dropdown-toggle="dropdownLeft"
                                    data-dropdown-placement="left"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    type="button"
                                    @click="manageApp('manage-app'+(index + 1), row.stps_id, row.con_form_token, row.con_usr_id)">
                                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                        </path>
                                    </svg></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>





        <!-- Traking Status -->
        <div data-popover id="popover-default" role="tooltip"
            class="absolute z-10 invisible inline-block w-64 text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                <h3 class="font-semibold text-gray-900 dark:text-white">Latest status</h3>
            </div>
            <div class="px-3 py-2 overflow-auto h-1/2">
                <ol class="relative border-l border-gray-200 dark:border-gray-700">
                    <li class="mb-10 ml-4" v-for="(row, index) in popoverContent">
                        <div v-if="index == 0"
                            class="absolute w-3 h-3 bg-blue-600 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                        </div>
                        <div v-else
                            class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                        </div>
                        <time
                            class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{  formatDate(row.updated_at) }}</time>
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white">
                                {{  row.description }}
                            </span>
                        </p>
                    </li>
                </ol>
            </div>
            <div data-popper-arrow></div>
        </div>

        <!-- Dropdown menu -->
        <div id="dropdownLeft"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLeftButton">
                <li>
                    <a v-if="role < 4" v-bind:href="viewData"
                        class="w-full text-center inline-flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd"
                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                clip-rule="evenodd" />
                        </svg>
                        View Data</a>
                </li>
                <li v-if="role > 2">
                    <a v-bind:href="viewData"
                        class="w-full text-center inline-flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M12 6.75a5.25 5.25 0 016.775-5.025.75.75 0 01.313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 011.248.313 5.25 5.25 0 01-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 112.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0112 6.75zM4.117 19.125a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008z"
                                clip-rule="evenodd" />
                            <path
                                d="M10.076 8.64l-2.201-2.2V4.874a.75.75 0 00-.364-.643l-3.75-2.25a.75.75 0 00-.916.113l-.75.75a.75.75 0 00-.113.916l2.25 3.75a.75.75 0 00.643.364h1.564l2.062 2.062 1.575-1.297z" />
                            <path fill-rule="evenodd"
                                d="M12.556 17.329l4.183 4.182a3.375 3.375 0 004.773-4.773l-3.306-3.305a6.803 6.803 0 01-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 00-.167.063l-3.086 3.748zm3.414-1.36a.75.75 0 011.06 0l1.875 1.876a.75.75 0 11-1.06 1.06L15.97 17.03a.75.75 0 010-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                        View & Process Application</a>
                </li>
            </ul>
        </div>

    </div>


</template>

<script>
    import 'flowbite'
    import moment from 'moment'

    export default {
        props: [
            // data
            'applicationsData',
            'roleData',

            // library
            'activitiesData',
        ],
        data() {
            return {
                //baseUrl: window.location.origin + '/nrcpoutreach', // test server
                baseUrl: '', // local
                //baseUrl: window.location.origin, // production server
                // list of applications
                applications: [],

                // library
                activities: [],

                //popover content
                popoverContent: [],
                role: '',
                viewData: '',
            }
        },
        methods: {
            manageApp: function (manageApp, stps, token, uid) {
                // console.log(manageApp + ' '+ stps + ' '+  token + ' '+  uid)
                const $targetEl = document.getElementById('dropdownLeft')
                const $triggerEl = document.getElementById(manageApp)
                const options = {
                    placement: 'bottom',
                    triggerType: 'click',
                    offsetSkidding: 0,
                    offsetDistance: 10,
                    delay: 300,
                }
                const dropdown = new Dropdown($targetEl, $triggerEl, options)

                // this.statusAction = (status == 1) ? 'Deactivate' : 'Activate'
                this.viewData = APP_URL + '/admin/app_data/' + stps + '/' + token + '/' + uid
                // this.userStatus = status
                // this.userID = id
                dropdown.show()
            },
            processApp: function (stat, token, uid) {
                // console.log(stat + ' ' + token + ' ' + uid)
            },
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
            },
            hoverTracker: function (hoverTracker, id, token) {

                const $targetEl = document.getElementById('popover-default');
                const $triggerEl = document.getElementById(hoverTracker);
                const options = {
                    placement: 'right',
                    triggerType: 'click',
                    offset: 10,
                };
                const popover = new Popover($targetEl, $triggerEl, options);

                axios.get(APP_URL + '/get_tracking/' + id + '/' + token)
                    .then(response => {
                        this.popoverContent = response.data
                    })

                popover.show();
            }

        },
        mounted() {
            // library
            this.activities = JSON.parse(JSON.stringify(this.activitiesData))

            // data
            this.applications = JSON.parse(JSON.stringify(this.applicationsData))
            this.role = this.roleData
        }
    }
</script>