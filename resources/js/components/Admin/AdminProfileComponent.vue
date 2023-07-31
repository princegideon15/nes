<template>

    <div class="p-4 sm:ml-64 mt-14">
        
        <nav class="flex mb-5 px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2">
                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                </svg>
                    Your Profile
                </a>
                </li>
            </ol>
        </nav>

        <div class="max-w-lg p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow bg-gray-50 dark:bg-gray-800">
            <ValidationObserver v-slot="{ handleSubmit }" >
                <form @submit.prevent="handleSubmit(updateAccount)">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr class="dark:bg-gray-800 py-5">
                                <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                    Email address
                                </th>
                                <td class="py-3">
                                    <input type="email" v-bind:value="accountForm.email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" readonly>
                                </td>
                            </tr>
                                <tr class="dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        New password
                                    </th>
                                    <td class="py-3">
                                        <ValidationProvider name="confirm" rules="min:8" v-slot="{ errors }">
                                        <input type="password"  v-model="accountForm.password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••">
                                        <span class="block text-red-600">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </td>
                                </tr>
                                <tr class="dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        Repeat password
                                    </th>
                                    <td class="py-3">
                                        <ValidationProvider  rules="password:@confirm|min:8"  v-slot="{ errors }">
                                        <input type="password" v-model="accountForm.password_confirm" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••">
                                        <span class="block text-red-600">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </td>
                                </tr>
                                <tr class="dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        Name
                                    </th>
                                    <td class="py-3">
                                        <ValidationProvider rules="required"  v-slot="{ errors }">
                                            <input type="text" v-model="accountForm.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name Last Name" >
                                            <span class="block text-red-600">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </td>
                                </tr>
                                <tr class="dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        Role
                                    </th>
                                    <td class="py-3">
                                        <select v-model="accountForm.role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="" selected disabled>Select Role</option>
                                            <option v-for="row in roles" v-bind:value="row.usr_grp_id" v-if="row.usr_grp_id
                                            != 0">{{  row.usr_grp_role }}</option>
                                        </select>
                                    </td>
                                </tr>
                        </tbody>
                    </table>

                    <!-- <div class="flex items-center justify-center">
                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Apply Changes</button>
                            <a @click="deleteAccount(userID)" type="button" class="w-full text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Remove Account</a>
                            <a @click="setStatus(userID, userStatus)" type="button" v-bind:class="statusButton">{{ statusAction }}</a>
                    </div> -->

                    
                    <div class="text-right mt-6">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Apply changes</button>
                    </div>
                </form>
            </ValidationObserver>
            
        </div>
    </div>
    
</template>

<script>

import { ValidationProvider, ValidationObserver, extend } from 'vee-validate'
import { required, email, between } from 'vee-validate/dist/rules'
import 'sweetalert2/src/sweetalert2.scss'
import 'flowbite'
import moment from 'moment'
import Swal from 'sweetalert2/dist/sweetalert2.js'



extend('required', {
  ...required,
  message: 'Required'
}); 

extend('between', {
  ...between,
  message: 'Age must be between 18 to 100'
});

export default {
        props: [
                'userData', 
                'adminData', 
                'rolesData',
               ],
      components: {
        ValidationProvider,
        ValidationObserver,
      },
      data(){
            return {
                // user info
                user : [],

                // library
                roles: [],
                
                // popover content
                popoverContent: [],

                // create new user
                accountForm: {
                    email: '',
                    password: '',
                    password_confirm: '',
                    name: '',
                    role: '',
                },
            }
      },
        methods:{
            updateAccount: function (event) {
                
                Swal.fire({
                title: 'Are you sure you want to submit?',
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#9CA3AF',
                confirmButtonText: 'Submit',
                cancelButtonText: 'Cancel',
                reverseButtons: true,
                focusCancel: true,
                showLoaderOnConfirm: true,
                }).then((result) => {  
                        if (result.isConfirmed==true) {
                
                            axios.post(APP_URL + '/admin/update_account', this.accountForm)
                            .then(response => {
                                location.reload()
                                // console.log(response.data)
                            })
                            .catch((error) => {
                                // error.response.status Check status code
                            }).finally(() => {
                                //Perform action in always
                            });
                                         
                            let timerInterval
                            Swal.fire({
                            title: 'Update successful!',
                            html: 'Page will reload',
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
                            }
                            })
                              
                            
                        }    
                    })
            },
        },
        mounted(){
            
            // library
            this.roles = JSON.parse(JSON.stringify(this.rolesData))
  
            this.accountForm.name = this.adminData

            this.userData.forEach((value, index) => { 
                this.accountForm.email = value.email
                this.accountForm.role = value.user_grp_id
            })
        }
}
</script>