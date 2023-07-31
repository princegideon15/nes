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
            <li aria-current="page">
            <div class="flex items-center">
                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Registered Clients</span>
            </div>
            </li>
        </ol>
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
                        <tr v-for="(row, index) in clients" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                {{ index + 1 }}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
        data(){
            return {
                clients : [],
                subCat : '',
            }
        },
        methods:{
              formatDate: function(value){
                if (value) {
                  return moment(String(value)).format('MMM. DD, YYYY')
                  }
              },
              regCategory: function(value){
                return (value == 1) ? 'Division Chair' : (value == 2) ? 'Stakeholder' : 'Management'
              },
              async subCategory(reg, sub) {
                var x = '';
                let result = await axios.get(APP_URL + '/get_sub_category/' + reg + '/' + sub)
                    .catch((err) => {console.log(err)})
                    
                    // x = result.data
                    // console.log(x)
                    // return x
this.subCat = result.data
                    // return result

    },
              subCategory: function(reg, sub){
                var x = ''
                axios.get(APP_URL + '/get_sub_category/' + reg + '/' + sub)
                .then(response => {
                    // this.popoverContent = response.data
                    // console.log(response.data)
                this.subCat = response.data
                    
                })
                // return x
                console.log(x)
              }
    
        },
        mounted() {
            this.clients = JSON.parse(JSON.stringify(this.clientsData))
            }
        }
    </script>