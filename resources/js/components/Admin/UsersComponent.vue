<template>


    <div class="p-4 sm:ml-64 mt-14">
        
        
        <nav class="flex mb-5 px-5 py-1 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2">
                    <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                    </svg>
                Users
            </a>
            </li>
            <li aria-current="page">
            <div class="flex items-center">
                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Administrators</span>
            </div>
            </li>
        </ol>

        <div class="ml-auto mt-3 flex justify-end">
            <button type="button" class=" w-full inline-flex items-center justify-center text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800"   data-modal-target="addUserModal" 
                                data-modal-toggle="addUserModal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                </svg>
                                    Add Administrator Account
            </button>
        </div>

        </nav>

        <div class="grid grid-cols-1 mb-4">
            <div class="relative overflow-x-auto shadow sm:rounded-lg border border-gray-200">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Privilege
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date Created
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(row, index) in users" :key="row.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                {{ index + 1 }}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ row.user_name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ row.email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ row.usr_grp_role }}
                            </td>
                            <td class="px-6 py-4">
                                {{ row.user_privilege ?? '-' }}
                            </td>
                            <td class="px-6 py-4 ">
                                {{ row.user_status ? 'Activated' : 'Deactivated'}}
                            </td>
                            <td class="px-6 py-4 ">
                                {{ formatDate(row.created_at) ?? '-' }}
                            </td>
                            <td class="px-6 py-4 ">
                                <button id="dropdownLeftButton" v-bind:id="'account-settings' + row.id" data-dropdown-toggle="dropdownLeft" data-dropdown-placement="left" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button" 
                                @click="accountSetting('account-settings'+row.id, row.id, row.user_status)"> <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg></button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7" class="text-center">
                                <button type="button" 
                                data-modal-target="addUserModal" 
                                data-modal-toggle="addUserModal"
                                class="w-full inline-flex items-center justify-center p-4 text-base font-semibold text-gray-900 focus:outline-none bg-white rounded-lg  hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                </svg>
                                    Add Administrator Account
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
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

        <!-- Add User Modal -->
        <div id="addUserModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-2xl md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Create New Administrator Account
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="addUserModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="flex p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Important:</span> Enter valid emall address for email notification.
                            </div>
                        </div>
                        <ValidationObserver v-slot="{ handleSubmit }" >
                            <form @submit.prevent="handleSubmit(createNewUser)"  >
                                <div class="mb-6">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                                    <ValidationProvider rules="required"  v-slot="{ errors }">
                                        <input @blur="checkEmail()" type="email" v-model="create_user_form.email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" >
                                        <span class="block text-red-600">{{ errors[0] ?? emailExist }}</span>
                                    </ValidationProvider>
                                </div>
                                <div class="mb-6">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <ValidationProvider rules="required|min:8"  v-slot="{ errors }">
                                        <input type="password" v-model="create_user_form.password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="••••••••" >
                                        <span class="block text-red-600">{{ errors[0] }}</span>
                                    </ValidationProvider>
                                </div>
                                <div class="mb-6">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <ValidationProvider rules="required"  v-slot="{ errors }">
                                        <input type="text" v-model="create_user_form.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name Last Name" >
                                        <span class="block text-red-600">{{ errors[0] }}</span>
                                    </ValidationProvider>
                                </div>
                                <div class="mb-6">
                                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                     <ValidationProvider  rules="required"  v-slot="{ errors }">
                                        <select v-model="create_user_form.role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="" selected disabled>Select Role</option>
                                            <option v-for="row in roles" v-bind:value="row.usr_grp_id" v-if="row.usr_grp_id
                                            != 0">{{  row.usr_grp_role }}</option>
                                        </select>
                                        <span class="block text-red-600">{{ errors[0] }}</span>
                                    </ValidationProvider>
                                </div>

                                <div class="text-right">
                                    <button data-modal-hide="addUserModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Account</button>
                                </div>
                                
                            </form>
                        </ValidationObserver>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add User Modal -->

        <!-- Dropdown menu -->
        <div id="dropdownLeft" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLeftButton">
                <li>
                    <a v-bind:href="userSettings" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Account Settings</a>
                </li>
                <li>
                    <a @click="deleteAccount(userID)" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete Account</a>
                </li>
                <li>
                    <a @click="setStatus(userID, userStatus)" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ statusAction }}</a>
                </li>
            </ul>
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
                    'usersData',

                    // library
                    'activitiesData',
                    'rolesData',
                   ],
        data(){
            return {
                // list of users
                users : [],

                // library
                roles: [],
                
                // popover content
                popoverContent: [],

                // create new user
                create_user_form: {
                    email: '',
                    passowrd: '',
                    name: '',
                    role: '',
                },

                emailExist: '',
                statusAction: '',
                userSettings: '',
                userStatus: '',
                userID: '',

            }
        },
        methods:{
            checkEmail: function(){
                const email = this.create_user_form.email
                axios.get(APP_URL + '/admin/check_admin_email', { params: { email: email} })
                        .then(function (response) {
                            if(response.data.length > 0){
                                 this.emailExist = 'Email already in use. Please use another email address.'
                            }else{  
                                this.emailExist = ''
                            }
                        }.bind(this))
            },
              createNewUser: function (event) {
                
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
                    
                                axios.post(APP_URL + '/admin/create_user', this.create_user_form)
                                .then(response => {
                                    //Perform Success Action
                                })
                                .catch((error) => {
                                    // error.response.status Check status code
                                }).finally(() => {
                                    //Perform action in always
                                })
                                
                                const $targetEl = document.getElementById('addUserModal')
                                const options = {}
                                const modal = new Modal($targetEl, options)
                                modal.hide()
                                            
                                let timerInterval
                                Swal.fire({
                                title: 'Create New Account Successfull.',
                                html: 'Reloading page.',
                                icon: 'success',
                                timer: 3000,
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
                    }
                },
              formatDate: function(value){
                if (value) {
                  return moment(String(value)).format('MMM. DD, YYYY')
                  }
              },
              accountSetting: function(accountSetting, id, status){
                console.log(accountSetting + ' ' + id + ' ' + status)
    
                const $targetEl = document.getElementById('dropdownLeft')
                const $triggerEl = document.getElementById(accountSetting)
                const options = {
                  placement: 'left',
                  triggerType: 'click',
                  offsetSkidding: 0,
                  offsetDistance: 10,
                  delay: 300,
                }
                const dropdown  = new Dropdown($targetEl, $triggerEl,options)
    
                this.statusAction = (status == 1) ? 'Deactivate' : 'Activate'
                this.userSettings = APP_URL + '/admin/user/settings/' + id
                this.userStatus = status
                this.userID = id
                dropdown .show()
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
            this.users = JSON.parse(JSON.stringify(this.usersData))
            }
        }
</script>