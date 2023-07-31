<template>


    <div class="p-4 sm:ml-64 mt-14">
        <nav class="flex mb-5 px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2">
                    <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                    </svg>
                Users
            </a>
            </li>
            <li>
            <div class="flex items-center">
                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                <a :href="baseUrl + '/admin/users'" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Administrators</a>
            </div>
            </li>
            <li aria-current="page">
            <div class="flex items-center">
                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">User Settings</span>
            </div>
            </li>
        </ol>

        </nav>

        <div class="max-w-lg p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow bg-gray-50 dark:bg-gray-800">
            
            <ValidationObserver v-slot="{ handleSubmit }" >
                            <form @submit.prevent="handleSubmit(updateUser)">
                                <input type="hidden" v-model="update_user_form.user_id">
                                <div class="mb-6">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                                    <ValidationProvider rules="required"  v-slot="{ errors }">
                                        <input @blur="checkEmail()" type="email" v-model="update_user_form.email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" >
                                        <span class="block text-red-600">{{ errors[0] ?? emailExist }}</span>
                                    </ValidationProvider>
                                </div>
                                <div class="mb-6">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <ValidationProvider rules="min:8"  v-slot="{ errors }">
                                        <input type="password" v-model="update_user_form.password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="••••••••" >
                                        <span class="block text-red-600">{{ errors[0] }}</span>
                                    </ValidationProvider>
                                </div>
                                <div class="mb-6">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <ValidationProvider rules="required"  v-slot="{ errors }">
                                        <input type="text" v-model="update_user_form.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name Last Name" >
                                        <span class="block text-red-600">{{ errors[0] }}</span>
                                    </ValidationProvider>
                                </div>
                                <div class="mb-6">
                                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                     <ValidationProvider  rules="required"  v-slot="{ errors }">
                                        <select v-model="update_user_form.role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="" selected disabled>Select Role</option>
                                            <option v-for="row in roles" v-bind:value="row.usr_grp_id" v-if="row.usr_grp_id
                                            != 0">{{  row.usr_grp_role }}</option>
                                        </select>
                                        <span class="block text-red-600">{{ errors[0] }}</span>
                                    </ValidationProvider>
                                </div>

                                <div class="flex items-center justify-center">
                                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Apply Changes</button>
                                        <a @click="deleteAccount(userID)" type="button" class="w-full text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Remove Account</a>
                                        <a @click="setStatus(userID, userStatus)" type="button" v-bind:class="statusButton">{{ statusAction }}</a>
                                </div>
                                
                            </form>
                        </ValidationObserver>
            
        </div>
        <div class="grid grid-cols-1 mb-4 border border-gray-200 rounded-lg shadow bg-gray-50 dark:bg-gray-800">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr colspan="5"><th scope="col" class="px-6 py-3">
                            Activity Logs
                            </th></tr>
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Activity
                            </th>
                            <th scope="col" class="px-6 py-3">
                                IP Address
                            </th>
                            <th scope="col" class="px-6 py-3">
                                User Agent
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
                    </tbody>
                </table>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
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
    
</template>
    
<script>
    import 'flowbite'
    import moment from 'moment'
    import { ValidationProvider, ValidationObserver, extend } from 'vee-validate'
    import { required, email, between, min  } from 'vee-validate/dist/rules'
    import Swal from 'sweetalert2/dist/sweetalert2.js'
    import 'sweetalert2/src/sweetalert2.scss'
    

    extend('email', { ...email,message: 'Not valid email address' })
    extend('required', { ...required,message: 'Required' })
    extend('min', { ...min, message: 'Password must be atleast 8 characters' })

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
                   ],
        data(){
            return {
                //baseUrl: window.location.origin + '/nrcpoutreach', // for server only
                baseUrl: '',
                // user info
                user : [],

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
        methods:{
            checkEmail: function(){
                
                const email = this.update_user_form.email

                if(email != this.originalEmail){
                axios.get(APP_URL + '/admin/check_admin_email', { params: { email: email} })
                        .then(function (response) {
                            if(response.data.length > 0){
                                 this.emailExist = 'Email already in use. Please use another email address.'
                            }else{  
                                this.emailExist = ''
                            }
                        }.bind(this))
                }
            },
            updateUser: function (event) {
                
                if(this.emailExist == ''){
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
                        if (result.isConfirmed==true) {
                
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
                                window.location.href = APP_URL + '/admin/user/settings/'+ this.userID
                            }
                            })
                              
                            
                        }    
                    })
                }
            },
            formatDate: function(value){
            if (value) {
                return moment(String(value)).format('MMM. DD, YYYY')
                }
            },
            formatActivity: function(value){
            
            if(value != null){
            console.log(value + ' <- ')
                const arr = value.split(', ')
                const acts = []
                
                arr.forEach((activity, act_index) =>{
                    this.activities.forEach((value, index) => {
                    if(activity == value.act_id){
                        acts.push(value.act_name)
                    }
                    })
                })

                return acts.join(', ')
            
            }else{
            console.log(value + ' <- ')
                return '-'
            }
            },
            deleteAccount: function(uid){
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
                        if (result.isConfirmed==true) {
                
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
            setStatus: function(uid, status){
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
                        if (result.isConfirmed==true) {
                
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

            this.user.forEach((value, index) => {

                  this.originalEmail = value.email
                  this.update_user_form.user_id = value.user_id
                  this.update_user_form.email = value.email
                  this.update_user_form.name = value.user_name
                  this.update_user_form.role = parseInt(value.usr_grp_id)
                  this.userStatus = parseInt(value.user_status)
                  this.userID = value.user_id
                  this.statusAction = (value.user_status == 1) ? 'Deactivate' : 'Activate'
                  this.statusButton = (value.user_status == 1) ? 'text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900' : 'text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800'

                  console.log(this.userStatus)
                  console.log(this.statusAction)
                });
            }
        }
</script>