<template>


    <div class="p-4 sm:ml-64 mt-14 bg-gray-100">
        <nav class="flex mb-5 shadow px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="#"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path
                                d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                        </svg>
                        Users
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <a :href="baseUrl + '/admin/users'"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Administrators</a>
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
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Account
                            Settings</span>
                    </div>
                </li>
            </ol>

        </nav>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="w-full px-4 py-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                        User Account</h5>
                </div>
                <ValidationObserver v-slot="{ handleSubmit }">
                    <form @submit.prevent="handleSubmit(updateUser)">
                        <input type="hidden" v-model="update_user_form.user_id">
                        <div class="mb-6">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                address</label>
                            <ValidationProvider rules="required" v-slot="{ errors }">
                                <input @blur="checkEmail()" type="email" v-model="update_user_form.email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@flowbite.com">
                                <span class="block text-red-600">{{ errors[0] ?? emailExist }}</span>
                            </ValidationProvider>
                        </div>
                        <div class="mb-6">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <ValidationProvider rules="min:8" v-slot="{ errors }">
                                <div class="relative">
                                    <input type="password" name="password" id="password" v-model="update_user_form.password"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="••••••••" required>
                                    <a role="button" id="toggle_password"
                                        class="password-toggle text-xs text-white text-gray-600 absolute right-2.5 bottom-2.5 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        SHOW
                                    </a>
                                </div>
                                <span class="block text-red-600">{{ errors[0] }}</span>
                            </ValidationProvider>
                        </div>
                        <div class="mb-6">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <ValidationProvider rules="required" v-slot="{ errors }">
                                <input type="text" v-model="update_user_form.name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="First Name Last Name">
                                <span class="block text-red-600">{{ errors[0] }}</span>
                            </ValidationProvider>
                        </div>
                        <div class="mb-6">
                            <label for="role"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                            <ValidationProvider rules="required" v-slot="{ errors }">
                                <select v-model="update_user_form.role"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" selected disabled>Select Role</option>
                                    <option v-for="row in roles" v-bind:value="row.usr_grp_id" v-if="row.usr_grp_id
                                    != 0">{{  row.usr_grp_role }}</option>
                                </select>
                                <span class="block text-red-600">{{ errors[0] }}</span>
                            </ValidationProvider>
                        </div>

                        <div class="flex items-center justify-center">
                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Apply
                                Changes</button>
                            <a @click="deleteAccount(userID)" type="button"
                                class="w-full text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Remove
                                Account</a>
                            <a @click="setStatus(userID, userStatus)" type="button"
                                v-bind:class="statusButton">{{ statusAction }}</a>
                        </div>

                    </form>
                </ValidationObserver>
            </div>

            <div
                class="w-full px-4 py-6 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Feedbacks</h5>
                </div>
                <div v-if="feedbacks != ''" class="overflow-y-auto h-96 p-1 ">
                    <article v-for="row in feedbacks">
                        <div class="flex items-center mb-4 space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <div class="space-y-1 font-medium dark:text-white">
                                <p>
                                    <span class="block text-sm text-gray-500 dark:text-gray-400">
                                        {{  formatDate(row.created_at) }}
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center mb-1">
                            <div class="flex items-center space-x-2">

                                <span v-for="(n, index) in row.fdbk_rate">
                                    <svg class="w-6 h-6 text-yellow-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />

                                    </svg>
                                </span>

                                <span v-for="(n, index) in (5 - row.fdbk_rate)">
                                    <svg class="w-6 h-6 text-gray-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />

                                    </svg>
                                </span>




                            </div>
                            <!-- <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">Thinking to buy another one!</h3> -->
                        </div>
                        <p class="mt-2 mb-2 text-gray-500 dark:text-gray-400">
                            {{ row.fdbk_remarks }}
                        </p>
                        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                    </article>
                </div>
                <div v-else>
                    <div class="w-full p-6 bg-white dark:bg-gray-800 dark:border-gray-700">
                        <img class="w-35 h-35" :src="baseUrl + '/images/feedback.svg'" />
                        <h5 class="mb-2 font-semibold tracking-tight text-gray-900 dark:text-white">No feedbacks yet.
                        </h5>
                    </div>

                </div>
            </div>
        </div>



        <div class="w-full p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                    Activity Logs</h5>
            </div>

            <div class="relative overflow-x-auto">
                <table id="user_logs_table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 display">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Activity
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
                        <tr v-for="(row, index) in logs"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                {{  index + 1 }}
                            </td>
                            <td class="px-6 py-4">{{  row.log_description }}</td>
                            <td class="px-6 py-4">{{  row.log_ip_address }}</td>
                            <td class="px-6 py-4">{{  row.log_user_agent }}</td>
                            <td class="px-6 py-4">{{  row.log_browser }}</td>
                            <td class="px-6 py-4"> {{ formatDate(row.created_at) }}</td>
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
    import {
        ValidationProvider,
        ValidationObserver,
        extend
    } from 'vee-validate'
    import {
        required,
        email,
        between,
        min
    } from 'vee-validate/dist/rules'
    import Swal from 'sweetalert2/dist/sweetalert2.js'
    import 'sweetalert2/src/sweetalert2.scss'


    extend('email', {
        ...email,
        message: 'Not valid email address'
    })
    extend('required', {
        ...required,
        message: 'Required'
    })
    extend('min', {
        ...min,
        message: 'Password must be atleast 8 characters'
    })

    export default {
        components: {
            ValidationProvider,
            ValidationObserver
        },
        props: [
            // data
            'userData',

            // library
            'activitiesData',
            'rolesData',
            'logsData',
            'feedbacksData',
        ],
        data() {
            return {
                //baseUrl: window.location.origin + '/nrcpoutreach', // test server
                baseUrl: '', // local
                //baseUrl: window.location.origin, // production server
                
                // user info
                user: [],
                logs: [],
                feedbacks: [],

                // library
                roles: [],

                // popover content
                popoverContent: [],

                // create new user
                update_user_form: {
                    email: '',
                    password: '',
                    name: '',
                    role: '',
                    user_id: '',
                },

                emailExist: '',
                statusAction: '',
                statusButton: '',
                originalEmail: ''
            }
        },
        methods: {
            checkEmail: function () {

                const email = this.update_user_form.email

                if (email != this.originalEmail) {
                    axios.get(APP_URL + '/admin/check_admin_email', {
                            params: {
                                email: email
                            }
                        })
                        .then(function (response) {
                            if (response.data.length > 0) {
                                this.emailExist = 'Email already in use. Please use another email address.'
                            } else {
                                this.emailExist = ''
                            }
                        }.bind(this))
                }
            },
            updateUser: function (event) {

                if (this.emailExist == '') {
                    Swal.fire({
                        title: 'Are you sure you want to submit?',
                        text: "You won't be able to revert this!",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#1A56DB',
                        cancelButtonColor: '#9CA3AF',
                        confirmButtonText: 'Submit',
                        cancelButtonText: 'Cancel',
                        reverseButtons: true,
                        focusCancel: true,
                        showLoaderOnConfirm: true,
                    }).then((result) => {
                        if (result.isConfirmed == true) {

                            axios.post(APP_URL + '/admin/update_user', this.update_user_form)
                                .then(response => {
                                    //Perform Success Action
                                })
                                .catch((error) => {
                                    // error.response.status Check status code
                                }).finally(() => {
                                    //Perform action in always
                                })

                            let timerInterval
                            Swal.fire({
                                title: 'Account Updated!',
                                html: 'Reloading page.',
                                icon: 'success',
                                timer: 1000,
                                timerProgressBar: true,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                didOpen: () => {
                                    Swal.showLoading()
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {
                                        b.textContent = Swal.getTimerLeft()
                                    }, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    console.log('I was closed by the timer')
                                    window.location.href = APP_URL + '/admin/user/settings/' + this
                                        .userID
                                }
                            })


                        }
                    })
                }
            },
            formatDate: function (value) {
                if (value) {
                    return moment(String(value)).format('MMM. DD, YYYY')
                }
            },
            formatActivity: function (value) {

                if (value != null) {
                    console.log(value + ' <- ')
                    const arr = value.split(', ')
                    const acts = []

                    arr.forEach((activity, act_index) => {
                        this.activities.forEach((value, index) => {
                            if (activity == value.act_id) {
                                acts.push(value.act_name)
                            }
                        })
                    })

                    return acts.join(', ')

                } else {
                    console.log(value + ' <- ')
                    return '-'
                }
            },
            deleteAccount: function (uid) {
                Swal.fire({
                    title: 'Remove Account?',
                    text: "You won't be able to revert this!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#E02424',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Remove Account',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                }).then((result) => {
                    if (result.isConfirmed == true) {

                        axios.get(APP_URL + '/admin/user/remove/' + this.userID)
                            .then(response => {
                                //Perform Success Action
                            })
                            .catch((error) => {
                                // error.response.status Check status code
                            }).finally(() => {
                                //Perform action in always
                            })


                        let timerInterval
                        Swal.fire({
                            title: 'Account Removed!',
                            html: 'Reloading page.',
                            icon: 'success',
                            timer: 1000,
                            timerProgressBar: true,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                                window.location.href = APP_URL + '/admin/users'
                            }
                        })


                    }
                })
            },
            setStatus: function (uid, status) {
                console.log(uid + ' ' + status)

                let confirmButtonColor = (status == 1) ? '#E02424' : '#1A56DB'

                Swal.fire({
                    title: this.statusAction + ' Account?',
                    text: "You won't be able to revert this!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: confirmButtonColor,
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: this.statusAction + ' Account',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                }).then((result) => {
                    if (result.isConfirmed == true) {

                        axios.get(APP_URL + '/admin/user/set_status/' + this.userID + '/' + this.userStatus)
                            .then(response => {
                                //Perform Success Action
                            })
                            .catch((error) => {
                                // error.response.status Check status code
                            }).finally(() => {
                                //Perform action in always
                            })


                        let timerInterval
                        Swal.fire({
                            title: 'Account ' + this.statusAction + 'd!',
                            html: 'Reloading page.',
                            icon: 'success',
                            timer: 1000,
                            timerProgressBar: true,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                                window.location.href = APP_URL + '/admin/users'
                            }
                        })


                    }
                })
            },

        },
        mounted() {
            // library
            this.roles = JSON.parse(JSON.stringify(this.rolesData))


            // data
            this.user = JSON.parse(JSON.stringify(this.userData))
            this.logs = JSON.parse(JSON.stringify(this.logsData))
            this.feedbacks = JSON.parse(JSON.stringify(this.feedbacksData))

            this.user.forEach((value, index) => {

                this.originalEmail = value.email
                this.update_user_form.user_id = value.user_id
                this.update_user_form.email = value.email
                this.update_user_form.name = value.user_name
                this.update_user_form.role = parseInt(value.usr_grp_id)
                this.userStatus = parseInt(value.user_status)
                this.userID = value.user_id
                this.statusAction = (value.user_status == 1) ? 'Deactivate' : 'Activate'
                this.statusButton = (value.user_status == 1) ?
                    'text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900' :
                    'text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800'

                //   console.log(this.userStatus)
                //   console.log(this.statusAction)
            });
        }
    }
</script>