<template>

    <div class="p-4 sm:ml-64 mt-14 bg-gray-100">

        <nav class="flex mb-5 px-5 py-3 text-gray-700 shadow border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a :href="baseUrl + '/home'"
                        class="inline-flex text-sm items-center font-medium text-gray-700 hover:text-blue-800 dark:text-gray-400 dark:hover:text-white">
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
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">My
                            Applications</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 mb-4">
            <!-- Replace with your content -->
            <div class="rounded-lg border border-dark-800 shadow-lg border-gray-200 bg-white">
                <div class="border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 hover:border-blue-700 font-bold text-md"
                                id="dashboard-tab" data-tabs-target="#applist" type="button" role="tab"
                                aria-controls="applist" aria-selected="false" @click="getApplications()">My
                                Applications</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 hover:border-blue-700 font-bold text-md"
                                id="application-tab" data-tabs-target="#application" type="button" role="tab"
                                aria-controls="application" aria-selected="false" ref="appForm"
                                @click="checkIfSubmitted()">S&T Promotion and Services Form</button>
                        </li>
                    </ul>
                </div>

                <div id="myTabContent">

                    <div class="hidden w-full bg-white border rounded-b-lg shadow dark:bg-gray-800 dark:border-gray-700"
                        id="application" role="tabpanel" aria-labelledby="application-tab">

                        <div id="application-alert"
                            class="flex p-4 border-t-4 border-yellow-300 bg-yellow-50 dark:bg-yellow-800 dark:border-yellow-600"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4 text-yellow-800 dark:text-yellow-300" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div class="ml-1 text-xs font-medium text-gray-800 dark:text-gray-300">
                                Please enter all required data from <span class="font-bold text-blue-700">Step 1 to Step
                                    6</span>.
                                Click <span class="font-bold text-blue-700">Save</span> to be able to apply changes, if
                                any, before proceeding to the next step.
                                Click <span class="font-bold text-blue-700">Next</span> to submit and proceed to the
                                next step, thus cannot apply any changes.
                            </div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-gray-500 rounded-lg focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white"
                                data-dismiss-target="#application-alert" aria-label="Close">
                                <span class="sr-only">Dismiss</span>
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>

                        <ul class="hidden text-sm font-medium text-center text-gray-500 rounded-lg divide-x divide-gray-200 shadow sm:flex dark:divide-gray-700 dark:text-gray-400"
                            data-tabs-toggle="#myTabContent2" role="tablist">

                            <li class="w-full">
                                <button
                                    class="inline-block p-4 w-full text-gray-900 bg-white rounded-l-lg focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-gray-700 font-bold"
                                    data-tabs-target="#step1" type="button" role="tab" aria-controls="step1"
                                    aria-selected="false" ref="step1Btn" :disabled="step1_submitted == 0">
                                    <span class="text-xs inline-flex items-center">
                                        STEP 1
                                        <svg v-show="step1_submitted == 1"
                                            class="w-5 h-5 ml-1 text-green-500 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span class="block">Contact Information</span></button>
                            </li>

                            <li class="w-full">
                                <button class="inline-block p-4 w-full font-bold" data-tabs-target="#step2"
                                    type="button" role="tab" aria-controls="step2" aria-selected="false" ref="step2Btn"
                                    :disabled="step1_submitted == 0"
                                    :class="[ step1_submitted == 0 ? 'text-gray-100 bg-gray-200' : 'text-gray-900 bg-white focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-gray-700']"
                                    @click="getStep2()">
                                    <span class="text-xs inline-flex items-center">
                                        STEP 2
                                        <svg v-show="step2_submitted == 1"
                                            class="w-5 h-5 ml-1 text-green-500 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span class="block">Type of Activity</span>
                                </button>
                            </li>

                            <li class="w-full">
                                <button class="inline-block p-4 w-full font-bold" data-tabs-target="#step3"
                                    type="button" role="tab" aria-controls="step3" aria-selected="false" ref="step3Btn"
                                    :disabled="step2_submitted == 0"
                                    :class="[ step2_submitted == 0 ? 'text-gray-100 bg-gray-200' : 'text-gray-900 bg-white focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-gray-700']"
                                    @click="getStep3()">
                                    <span class="text-xs inline-flex items-center">
                                        STEP 3
                                        <svg v-show="step3_submitted == 1"
                                            class="w-5 h-5 ml-1 text-green-500 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span class="block">Objectives</span>
                                </button>
                            </li>

                            <li class="w-full">
                                <button class="inline-block p-4 w-full font-bold" data-tabs-target="#step4"
                                    type="button" role="tab" aria-controls="step4" aria-selected="false" ref="step4Btn"
                                    :disabled="step3_submitted == 0"
                                    :class="[ step3_submitted == 0 ? 'text-gray-100 bg-gray-200' : 'text-gray-900 bg-white focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-gray-700']"
                                    @click="getStep4()">
                                    <span class="text-xs inline-flex items-center">
                                        STEP 4
                                        <svg v-show="step4_submitted == 1"
                                            class="w-5 h-5 ml-1 text-green-500 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span class="block">Venue Specifications</span>
                                </button>
                            </li>

                            <li class="w-full">
                                <button class="inline-block p-4 w-full font-bold" data-tabs-target="#step5"
                                    type="button" role="tab" aria-controls="step5" aria-selected="false" ref="step5Btn"
                                    :disabled="step4_submitted == 0"
                                    :class="[ step4_submitted == 0 ? 'text-gray-100 bg-gray-200' : 'text-gray-900 bg-white focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-gray-700']"
                                    @click="getStep5()">
                                    <span class="text-xs inline-flex items-center">
                                        STEP 5
                                        <svg v-show="step5_submitted == 1"
                                            class="w-5 h-5 ml-1 text-green-500 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span class="block">Participants</span>
                                </button>
                            </li>

                            <li class="w-full">
                                <button class="inline-block p-4 w-full font-bold" data-tabs-target="#step6"
                                    type="button" role="tab" aria-controls="step6" aria-selected="false" ref="step6Btn"
                                    :disabled="step5_save_at != '' && step5_submitted == 0"
                                    :class="[ step5_save_at != '' &&  step5_submitted == 0 ? 'text-gray-100 bg-gray-200' : 'text-gray-900 bg-white focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-gray-700']"
                                    @click="getStep6()">
                                    <span class="text-xs inline-flex items-center">
                                        STEP 6
                                        <svg v-show="step6_submitted == 1"
                                            class="w-5 h-5 ml-1 text-green-500 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span class="block">Budget Required</span>
                                </button>
                            </li>

                        </ul>


                        <div id="myTabContent2">

                            <!-- Form 1 Step 1 -->
                            <ValidationObserver v-slot="{ handleSubmit }">
                                <form @submit.prevent="handleSubmit(onSubmitStep1)">
                                    <input type="hidden" v-model="form.form_token">
                                    <div class="hidden p-4 mt-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="step1"
                                        role="tabpanel" aria-labelledby="step1-tab">
                                        <div class="mb-6">
                                            <label for="con_ins"
                                                class="block mb-2 font-semibold text-gray-900 dark:text-white ">Requesting
                                                Institution</label>
                                            <ValidationProvider rules="required" v-slot="{ errors }">
                                                <input type="text" id="con_ins" v-model="form.con_ins" name="con_ins"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                <span class="block text-red-600">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>

                                        <h3 class="mt-1 max-w-2xl mb-3 text-gray-400">Requesting Institution Address
                                        </h3>

                                        <div class="flex mb-3">
                                            <div class="flex items-center h-5">
                                                <input id="con_current" name="con_current" type="checkbox"
                                                    :checked="form.current_checked"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                    @change="setAddress($event)">
                                            </div>
                                            <div class="ml-2 text-sm">
                                                <label for="helper-checkbox"
                                                    class="font-medium text-gray-900 dark:text-gray-300">Set current
                                                    address</label>
                                                <p class="text-xs font-normal text-gray-500 dark:text-gray-300">Address
                                                    details entered in sign up form will be use</p>
                                            </div>
                                        </div>



                                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                                            <div>
                                                <label for="con_reg"
                                                    class="block mb-2 font-semibold text-gray-900 dark:text-white">Region</label>
                                                <ValidationProvider rules="required" v-slot="{ errors }">
                                                    <select id="con_reg" name="con_reg" v-model="form.con_reg"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        @change="getProvinces()">
                                                        <option value="" disabled>Select Region</option>
                                                        <option v-for="row in regions" v-bind:value="row.region_id">
                                                            {{ row.region_name }}</option>
                                                    </select>
                                                    <span class="block text-red-600">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                            </div>
                                            <div>
                                                <label for="con_prov"
                                                    class="block mb-2 font-semibold text-gray-900 dark:text-white">Province</label>
                                                <ValidationProvider rules="required" v-slot="{ errors }">
                                                    <select id="con_prov" name="con_prov" v-model="form.con_prov"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        @change="getCities()">
                                                        <option value="" disabled>Select Province</option>
                                                        <option v-for="row in provinces" v-bind:value="row.province_id">
                                                            {{ row.province_name }}</option>
                                                    </select>
                                                    <span class="block text-red-600">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                            </div>
                                            <div>
                                                <label for="con_city"
                                                    class="block mb-2 font-semibold text-gray-900 dark:text-white">Town/City</label>
                                                <ValidationProvider rules="required" v-slot="{ errors }">
                                                    <select id="con_city" name="con_city" v-model="form.con_city"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option value="" disabled>Select City</option>
                                                        <option v-for="row in cities" v-bind:value="row.city_id">
                                                            {{ row.city_name }}</option>
                                                    </select>
                                                    <span class="block text-red-600">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                            </div>
                                            <div>
                                                <label for="con_brgy"
                                                    class="block mb-2 font-semibold text-gray-900 dark:text-white">Barangay</label>
                                                <ValidationProvider rules="required" v-slot="{ errors }">
                                                    <input type="text" id="con_brgy" v-model="form.con_brgy"
                                                        name="con_brgy"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="">
                                                    <span class="block text-red-600">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                            </div>
                                        </div>

                                        <div class="mb-6">
                                            <label for="con_address"
                                                class="block mb-2 font-semibold text-gray-900 dark:text-white text-sm">Address</label>
                                            <ValidationProvider rules="required" v-slot="{ errors }">
                                                <input type="text" id="con_address" v-model="form.con_address"
                                                    name="con_address"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Unit/Room No./Floor, Building Name, Lot/Block/Phase/House Number, Street Name, Subdivision">
                                                <span class="block text-red-600">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>

                                        <div class="mb-6">
                                            <label for="con_head_ins"
                                                class="block mb-2 font-semibold text-gray-900 dark:text-white ">Head of
                                                Requesting Institution</label>
                                            <ValidationProvider rules="required" v-slot="{ errors }">
                                                <input type="text" id="con_head_ins" v-model="form.con_head_ins"
                                                    name="con_head_ins"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <span class="block text-red-600">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>

                                        <h3 class="mt-1 max-w-2xl mb-3 text-gray-400">Focal Person's Details</h3>

                                        <div class="mb-6">
                                            <label for="con_focal_p"
                                                class="block mb-2 font-semibold text-gray-900 dark:text-white ">Focal
                                                Person</label>
                                            <ValidationProvider rules="required" v-slot="{ errors }">
                                                <input type="text" id="con_focal_p" v-model="form.con_focal_p"
                                                    name="con_focal_p"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <span class="block text-red-600">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>

                                        <div class="mb-6">
                                            <label for="con_contact_num"
                                                class="block mb-2 font-semibold text-gray-900 dark:text-white ">Contact
                                                Number</label>
                                            <ValidationProvider rules="required" v-slot="{ errors }">
                                                <input type="text" id="con_contact_num" v-model="form.con_contact_num"
                                                    name="con_contact_num"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="09xxxxxxxx">
                                                <span class="block text-red-600">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>

                                        <div class="mb-6">
                                            <label for="con_contact_add"
                                                class="block mb-2 font-semibold text-gray-900 dark:text-white ">Contact
                                                Address</label>
                                            <ValidationProvider rules="required" v-slot="{ errors }">
                                                <input type="text" id="con_contact_add" v-model="form.con_contact_add"
                                                    name="con_contact_add"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Unit/Room No./Floor, Building Name, Lot/Block/Phase/House Number, Street Name, Subdivision">
                                                <span class="block text-red-600">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>

                                        <button v-if="step1_submitted == 0" type="button"
                                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 mr-1"
                                            @click="saveStep1()">
                                            Save
                                            <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                                </path>
                                            </svg>
                                        </button>

                                        <button v-if="step1_submitted == 0" type="submit"
                                            class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Next
                                            <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>

                                        <button v-if="step1_submitted == 1"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            type="button" @click="nextStep2()">
                                            Next
                                            <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>

                                        <div v-if="step1_save_at != ''" class="text-gray-500 text-sm pt-5 mt-5">
                                            Last saved at {{ step1_save_at }}
                                        </div>

                                    </div>
                                </form>
                            </ValidationObserver>

                            <!-- Form 2 Step 2 -->
                            <ValidationObserver v-slot="{ handleSubmit }">
                                <form @submit.prevent="handleSubmit(onSubmitStep2)">
                                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="step2"
                                        role="tabpanel" aria-labelledby="step2-tab">

                                        <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Please check box
                                            and select specific activity</h3>

                                        <ul
                                            class="text-sm w-full font-medium text-gray-900 bg-white rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                            <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600"
                                                v-for="(act, index) in activities">

                                                <div class="flex items-center p-3 w-1/2">

                                                    <input type="checkbox" v-model="form2.act_req_id" true-value="[]"
                                                        false-value="false" v-bind:value="act.act_id"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    <!-- @change="setRequiredActivity($event)" -->
                                                    <label v-bind:for="act.act_id"
                                                        class="py-3 ml-2 w-1/2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ act.act_name }}</label>



                                                    <select v-bind:refs="'specAct' + act.act_id" v-if="act.act_id < 5"
                                                        v-model="form2.act_spec_act[index]"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option value='' selected>Select specific activity</option>
                                                        <option v-for="row in sub_activities"
                                                            v-if="row.act_id == act.act_id"
                                                            v-bind:value="row.sub_act_id">{{ row.sub_act_name }}
                                                        </option>
                                                    </select>

                                                    <input v-if="act.act_id == 5" v-model="form2.act_req_oth"
                                                        type="text" id="act_req_oth" name="act_req_oth"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Please specify">

                                                    <!-- <span v-bind:id="'requiredact' + act.act_id" class="w-1/2 ml-3 text-red-600" >
                                          Please specify activity
                                        </span> -->
                                                </div>
                                            </li>
                                        </ul>
                                        <span v-if="check_act_error != ''"
                                            class="block text-red-600 mt-3">{{ check_act_error }}</span>

                                        <h3 class="mb-4 mt-4 font-semibold text-gray-900 dark:text-white">Please specify
                                            preferred date of implementation and duration</h3>



                                        <!-- <div date-rangepicker class="flex items-center mb-5"> -->
                                        <div class="flex items-center mb-5">
                                            <span class="mx-4 text-gray-500">From</span>
                                            <div class="relative">
                                                <ValidationProvider rules="required" v-slot="{ errors }">
                                                    <input v-model="form2.act_start" type="date" :min="min"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Select date start">
                                                    <span class="block text-red-600">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                            </div>
                                            <span class="mx-4 text-gray-500">To</span>
                                            <div class="relative">
                                                <ValidationProvider rules="required" v-slot="{ errors }">
                                                    <input v-model="form2.act_end" type="date" :min="min"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Select date end">
                                                    <span class="block text-red-600">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                            </div>
                                        </div>



                                        <div class="inline-flex items-center">

                                            <button type="button"
                                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 mr-1"
                                                @click="nextStep1()">
                                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                                                </svg>
                                                Back
                                            </button>

                                            <button v-if="step2_submitted == 0" type="button"
                                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 mr-1"
                                                @click="saveStep2()">
                                                Save
                                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                                    </path>
                                                </svg>
                                            </button>

                                            <button v-if="step2_submitted == 0" type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Next
                                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>

                                            <button v-if="step2_submitted == 1"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button" @click="nextStep3()">
                                                Next
                                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>

                                        </div>

                                        <div v-if="step2_save_at != ''" class="text-gray-500 text-sm pt-5 mt-5">
                                            Last saved at {{ step2_save_at }}
                                        </div>

                                    </div>
                                </form>
                            </ValidationObserver>

                            <!-- Form 3 Step 3 -->
                            <ValidationObserver v-slot="{ handleSubmit }">
                                <form @submit.prevent="handleSubmit(onSubmitStep3)">
                                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="step3"
                                        role="tabpanel" aria-labelledby="step3-tab">

                                        <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Please indicate
                                            three to five (3-5) objectives</h3>

                                        <div class="mb-5" v-for="(n, index) in 5">
                                            <ValidationProvider v-if="n < 4" rules="required" v-slot="{ errors }">
                                                <label for="base-input"
                                                    class="block mb-2 font-semibold text-gray-900 dark:text-white">Objective
                                                    #{{n}}</label>
                                                <input type="text" v-model="form3.obj[index]"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <span class="block text-red-600">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                            <span v-if="n > 3 && n < 6">
                                                <label for="base-input"
                                                    class="block mb-2 font-semibold text-gray-900 dark:text-white">Objective
                                                    #{{n}}</label>
                                                <input type="text" v-model="form3.obj[index]"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </span>
                                        </div>

                                        <div class="mb-5">
                                            <label for="message"
                                                class="block mb-2 font-medium text-gray-900 dark:text-white">Indicate
                                                how gender is integrated in the requested Outreach Activity</label>

                                            <ValidationProvider rules="required" v-slot="{ errors }">
                                                <textarea v-model="form3.obj_gender" rows="4"
                                                    class="block p-2.5 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Write your thoughts here..."></textarea>
                                                <span class="block text-red-600">{{ errors[0] }}</span>
                                            </ValidationProvider>

                                        </div>

                                        <div class="mb-5">
                                            <label for="message"
                                                class="block mb-2 font-medium text-gray-900 dark:text-white">Indicate
                                                what Sustainable Development Goalg/s (SDG/s) is addressed bt the
                                                requested Outreach Activity</label>
                                            <ValidationProvider rules="required" v-slot="{ errors }">
                                                <textarea v-model="form3.obj_sdg" rows="4"
                                                    class="block p-2.5 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Write your thoughts here..."></textarea>
                                                <span class="block text-red-600">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>

                                        <div class="inline-flex items-center">

                                            <button type="button"
                                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 mr-1"
                                                @click="nextStep2()">
                                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                                                </svg>
                                                Back
                                            </button>

                                            <button v-if="step3_submitted == 0" type="button"
                                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 mr-1"
                                                @click="saveStep3()">
                                                Save
                                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                                    </path>
                                                </svg>
                                            </button>

                                            <button v-if="step3_submitted == 0" type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Next
                                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>

                                            <button v-if="step3_submitted == 1"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button" @click="nextStep4()">
                                                Next
                                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>

                                        </div>

                                        <div v-if="step3_save_at != ''" class="text-gray-500 text-sm pt-5 mt-5">
                                            Last saved at {{ step3_save_at }}
                                        </div>

                                    </div>
                                </form>
                            </ValidationObserver>

                            <!-- Form 4 Step 4 -->
                            <ValidationObserver v-slot="{ handleSubmit }">
                                <form @submit.prevent="handleSubmit(onSubmitStep4)">
                                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="step4"
                                        role="tabpanel" aria-labelledby="step4-tab">

                                        <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Please check those
                                            that are applicable</h3>

                                        <!-- <span class="bg-blue-100 text-blue-800 text-md font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Environment</span>
                            <ul class="text-sm w-full font-medium text-gray-900 bg-white rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white mb-4">
                                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="vue-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="vue-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vue JS</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="react-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="react-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">React</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="angular-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="angular-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Angular</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="laravel-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="laravel-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laravel</label>
                                    </div>
                                </li>
                            </ul> -->

                                        <ul
                                            class="text-sm w-full font-medium text-gray-900 bg-white rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white mb-4">
                                            <li class="w-full rounded-t-lg" v-for="(row, index) in venues">
                                                <div class="flex items-center pl-3 pt-3 w-1/2">
                                                    <input v-model="form4.ven_spec" v-bind:value="row.ven_id"
                                                        type="checkbox" true-value="[]" false-value="false"
                                                        :disabled="form4.checkDisabled[index]"
                                                        :checked="form4.checkedSpec[index]"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2"
                                                        @change="checkVenue($event)">
                                                    <label v-bind:for="row.ven_name"
                                                        class="py-3 ml-2 pr-3 text-sm font-medium dark:text-gray-300"
                                                        :class="form4.checkDisabledClass[index]">{{ row.ven_name }}</label>
                                                    <input v-if="row.ven_name == 'Others'" v-model="form4.ven_spec_oth"
                                                        type="text" id="ven_spec_oth" name="ven_spec_oth"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Please specify">
                                                </div>
                                            </li>
                                        </ul>



                                        <span v-if="check_ven_error != ''"
                                            class="block text-red-600 mt-3">{{ check_ven_error }}</span>

                                        <div class="mb-6 mt-4">
                                            <label for="ven_address"
                                                class="block mb-2 font-semibold text-gray-900 dark:text-white text-sm">Venue
                                                Complete Address</label>
                                            <ValidationProvider rules="required" v-slot="{ errors }">
                                                <input type="text" id="ven_address" v-model="form4.ven_address"
                                                    name="ven_address"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Unit/Room No./Floor, Building Name, Lot/Block/Phase/House Number, Street Name, Subdivision">
                                                <span class="block text-red-600">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                        <div class="inline-flex items-center mt-3">

                                            <button type="button"
                                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 mr-1"
                                                @click="nextStep3()">
                                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                                                </svg>
                                                Back
                                            </button>

                                            <button v-if="step4_submitted == 0" type="button"
                                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 mr-1"
                                                @click="saveStep4()">
                                                Save
                                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                                    </path>
                                                </svg>
                                            </button>

                                            <button v-if="step4_submitted == 0" type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Next
                                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>

                                            <button v-if="step4_submitted == 1"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button" @click="nextStep5()">
                                                Next
                                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>

                                        </div>

                                        <div v-if="step4_save_at != ''" class="text-gray-500 text-sm pt-5 mt-5">
                                            Last saved at {{ step4_save_at }}
                                        </div>

                                    </div>
                                </form>
                            </ValidationObserver>

                            <!-- Form 5 Step 5 -->
                            <ValidationObserver v-slot="{ handleSubmit }">
                                <form @submit.prevent="handleSubmit(onSubmitStep5)">
                                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="step5"
                                        role="tabpanel" aria-labelledby="step5-tab">

                                        <div class="overflow-x-auto relative mb-5">
                                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                <thead
                                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="py-4 px-6">
                                                            Name
                                                        </th>
                                                        <th scope="col" class="py-4 px-6">
                                                            Age
                                                        </th>
                                                        <th scope="col" class="py-4 px-6">
                                                            Sex
                                                        </th>
                                                        <th scope="col" class="py-4 px-6">
                                                            Position/Occupation
                                                        </th>
                                                        <th scope="col" class="py-4 px-6">
                                                            Field/s of interest
                                                        </th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-if="step5_submitted == 0"
                                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                                        v-for="(parts, index) in form5" :key="index">
                                                        <th scope="row"
                                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                                            <ValidationProvider rules="required" v-slot="{ errors }">
                                                                <input type="text" id="prt_name"
                                                                    v-model="parts.prt_name"
                                                                    class="w-full py-3 px-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <span class="block text-red-600">{{ errors[0] }}</span>
                                                            </ValidationProvider>

                                                        </th>
                                                        <td class="py-4 px-6">

                                                            <ValidationProvider rules="required|between:18,100"
                                                                v-slot="{ errors }">
                                                                <input type="number" id="prt_age" name="prt_age"
                                                                    v-model="parts.prt_age"
                                                                    class="w-20 py-3 px-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <span class="block text-red-600">{{ errors[0] }}</span>
                                                            </ValidationProvider>

                                                        </td>
                                                        <td class="py-4 px-6">

                                                            <ValidationProvider rules="required" v-slot="{ errors }">
                                                                <select id="prt_sex" v-model="parts.prt_sex"
                                                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    <option value="" selected disabled>Sex</option>
                                                                    <option value="1">Male</option>
                                                                    <option value="2">Female</option>
                                                                </select>
                                                                <span class="block text-red-600">{{ errors[0] }}</span>
                                                            </ValidationProvider>

                                                        </td>
                                                        <td class="py-4 px-6">

                                                            <ValidationProvider rules="required" v-slot="{ errors }">
                                                                <input type="text" id="prt_pos" v-model="parts.prt_pos"
                                                                    class="w-full py-3 px-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                                <span class="block text-red-600">{{ errors[0] }}</span>
                                                            </ValidationProvider>

                                                        </td>
                                                        <td class="py-4 px-6">

                                                            <ValidationProvider rules="required" v-slot="{ errors }">
                                                                <input type="text" id="prt_int" v-model="parts.prt_int"
                                                                    class="w-full py-3 px-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                                <span class="block text-red-600">{{ errors[0] }}</span>
                                                            </ValidationProvider>

                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                class="py-2 px-3 text-xs focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                                                @click="removeParticipant(index, parts.prt_stps_id, parts.prt_id, parts.prt_usr_id)">
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                                    viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr v-if="step5_submitted == 0">
                                                        <td colspan="6">
                                                            <button type="button"
                                                                class="w-full inline-flex items-center justify-center p-4 font-semibold text-gray-900 focus:outline-none bg-white rounded-lg  hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                                                @click="addParticipants()">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" fill="currentColor"
                                                                    class="w-5 h-5 mr-2">
                                                                    <path
                                                                        d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                                                </svg>
                                                                Add Particpant
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr v-if="step5_submitted == 1"
                                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                                        v-for="(parts, index) in form5">
                                                        <th scope="row"
                                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ parts.prt_name }}</th>
                                                        <td class="py-4 px-6">{{ parts.prt_age }}</td>
                                                        <td class="py-4 px-6">{{ parts.prt_sex }}</td>
                                                        <td class="py-4 px-6">{{ parts.prt_pos }}</td>
                                                        <td class="py-4 px-6">{{ parts.prt_int }}</td>
                                                        <td class="py-4 px-6"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <span v-if="check_prt_error != ''"
                                            class="block text-red-600 mt-3">{{ check_prt_error }}</span>

                                        <div class="inline-flex items-center mt-3">

                                            <button type="button"
                                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 mr-1"
                                                @click="nextStep4()">
                                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                                                </svg>
                                                Back
                                            </button>

                                            <button v-if="step5_submitted == 0" type="button"
                                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 mr-1"
                                                @click="saveStep5()">
                                                Save
                                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                                    </path>
                                                </svg>
                                            </button>

                                            <button v-if="step5_submitted == 0" type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-1">
                                                Next
                                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>

                                            <button v-if="step5_submitted == 1"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button" @click="nextStep6()">
                                                Next
                                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>


                                            <button v-if="step5_submitted == 0 && step5_save_at == ''" type="submit"
                                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 mr-1"
                                                @click="nextStep6()">
                                                Skip
                                            </button>

                                            <button v-if="step5_save_at != '' && step5_submitted == 0" type="button"
                                                class=" text-center inline-flex items-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 mr-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                                @click="removeAllParticipants()">
                                                Remove all
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-5 h-5 ml-1">
                                                    <path fill-rule="evenodd"
                                                        d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>

                                        </div>

                                        <div v-if="step5_save_at != ''" class="text-gray-500 text-sm pt-5 mt-5">
                                            Last saved at {{ step5_save_at }}
                                        </div>

                                    </div>
                                </form>
                            </ValidationObserver>

                            <!-- Form 6 Step 6 -->
                            <ValidationObserver v-slot="{ handleSubmit }">
                                <form @submit.prevent="handleSubmit(onSubmitStep6)">
                                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="step6"
                                        role="tabpanel" aria-labelledby="step6-tab">

                                        <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Please enter
                                            Line-Item-Budget (LIB)</h3>
                                        <div class="relative overflow-x-auto">
                                            <table
                                                class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border ">
                                                <thead
                                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3">
                                                            Particulars
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            NRCP
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Counterpart Funds
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Other Counterpart (If Any)
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(row, index) in particulars" :key="index"
                                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{  row.prt_name }}
                                                        </th>
                                                        <td><input v-model="form6.nrcp_budget[index]"
                                                                @keydown="handleInput($event)"
                                                                @focus="$event.target.select()"
                                                                @change="totalNrcpBudget()" type="number" min="0"
                                                                value="0" step=".01"
                                                                class="text-right w-1/2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        </td>
                                                        <td><input v-model="form6.counter_budget[index]"
                                                                @keydown="handleInput($event)"
                                                                @focus="$event.target.select()"
                                                                @change="totalCounterBudget()" type="number" min="0"
                                                                value="0" step=".01"
                                                                class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        </td>
                                                        <td><input v-model="form6.other_budget[index]"
                                                                @keydown="handleInput($event)"
                                                                @focus="$event.target.select()"
                                                                @change="totalOtherBudget()" type="number" min="0"
                                                                value="0" step=".01"
                                                                class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            Total</th>
                                                        <td><input type="number" v-model="form6.total_nrcp" min="0"
                                                                value="0" step=".01"
                                                                class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                disabled></td>
                                                        <td><input type="number" v-model="form6.total_counter" min="0"
                                                                value="0" step=".01"
                                                                class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                disabled></td>
                                                        <td><input type="number" v-model="form6.total_other" min="0"
                                                                value="0" step=".01"
                                                                class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                disabled></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                        <div v-if="form6.total_nrcp <= 0 || form6.total_nrcp == 'NaN'"
                                            class="flex p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                            role="alert">
                                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <span class="font-medium">Please enter NRCP
                                                    budget/Counterparts/Others.</span>
                                            </div>
                                        </div>

                                        <div class="flex p-4 mb-1 mt- text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                                            role="alert">
                                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <span class="font-medium">Note:</span> NRCP recommended fund support is
                                                350,000.00 and below. For requested budget beyond the recommended
                                                requires a detailed justification letter.
                                            </div>
                                        </div>

                                        <h3 class="mb-4 mt-4 font-semibold text-gray-900 dark:text-white">Copy of
                                            Line-Item-Budget (LIB)</h3>


                                        <input refs="att_lib"
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            aria-describedby="file_input_help" type="file"
                                            @change="validateLibAttachment($event)"
                                            accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">DOC, DOCx (MAX. 25MB)
                                        </p>

                                        <span v-if="check_att1_error != ''"
                                            class="block text-red-600">{{  check_att1_error }}</span>

                                        <div v-if="step6_attached_lib != ''" id="alert-additional-content-5"
                                            class="p-4 mt-3 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-600 dark:bg-gray-800"
                                            role="alert">
                                            <div class="flex items-center">
                                                <svg aria-hidden="true"
                                                    class="w-5 h-5 mr-2 text-gray-800 dark:text-gray-300"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Info</span>
                                                <h3 class="text-lg font-medium text-gray-800 dark:text-gray-300">
                                                    Uploaded file</h3>
                                            </div>
                                            <div class="mt-2 mb-4 text-sm text-gray-800 dark:text-gray-300">
                                                {{ step6_attached_lib }}
                                            </div>
                                        </div>

                                        <div v-if="form6.total_nrcp > 350000 || step6_attached_justification != ''">
                                            <h3 class="mb-4 mt-4 font-semibold text-gray-900 dark:text-white">Upload
                                                Justification Letter</h3>

                                            <input refs="att_justification"
                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                aria-describedby="file_input_help" type="file"
                                                @change="validateJustificationAttachment($event)"
                                                accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">DOC, DOCx (MAX.
                                                25MB)</p>

                                            <span v-if="check_att2_error != ''"
                                                class="block text-red-600">{{  check_att2_error }}</span>

                                            <div v-if="step6_attached_justification != ''"
                                                id="alert-additional-content-5"
                                                class="p-4 mt-3 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-600 dark:bg-gray-800"
                                                role="alert">
                                                <div class="flex items-center">
                                                    <svg aria-hidden="true"
                                                        class="w-5 h-5 mr-2 text-gray-800 dark:text-gray-300"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Info</span>
                                                    <h3 class="text-lg font-medium text-gray-800 dark:text-gray-300">
                                                        Uploaded file</h3>
                                                </div>
                                                <div class="mt-2 mb-4 text-sm text-gray-800 dark:text-gray-300">
                                                    {{ step6_attached_justification }}
                                                </div>
                                            </div>

                                        </div>

                                        <h3 class="mb-4 mt-4 font-semibold text-gray-900 dark:text-white">Upload
                                            Official letter of request for NRCP Outreach Program (NOP)</h3>

                                        <input refs="att_req_letter"
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            aria-describedby="file_input_help" type="file"
                                            @change="validateReqAttachment($event)"
                                            accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">DOC, DOCx (MAX. 25MB)
                                        </p>

                                        <span v-if="check_att3_error != ''"
                                            class="block text-red-600">{{  check_att3_error }}</span>

                                        <div v-if="step6_attached_req_letter != ''" id="alert-additional-content-5"
                                            class="p-4 mt-3 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-600 dark:bg-gray-800"
                                            role="alert">
                                            <div class="flex items-center">
                                                <svg aria-hidden="true"
                                                    class="w-5 h-5 mr-2 text-gray-800 dark:text-gray-300"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Info</span>
                                                <h3 class="text-lg font-medium text-gray-800 dark:text-gray-300">
                                                    Uploaded file</h3>
                                            </div>
                                            <div class="mt-2 mb-4 text-sm text-gray-800 dark:text-gray-300">
                                                {{ step6_attached_req_letter }}
                                            </div>
                                        </div>

                                        <div class="inline-flex items-center mt-3">

                                            <button v-if="step6_submitted == 0" type="button"
                                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 mr-1"
                                                @click="nextStep5()">
                                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                                                </svg>
                                                Back
                                            </button>

                                            <button v-if="step6_submitted == 0" type="button"
                                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 mr-1"
                                                @click="saveStep6()">
                                                Save
                                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                                    </path>
                                                </svg>
                                            </button>

                                            <button v-if="step6_submitted == 0" type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Submit Application
                                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>


                                        </div>

                                        <div v-if="step6_save_at != ''" class="text-gray-500 text-sm pt-5 mt-5">
                                            Last saved at {{ step6_save_at }}
                                        </div>

                                    </div>
                                </form>
                            </ValidationObserver>
                        </div>
                    </div>

                    <div class="hidden rounded-b-lg dark:bg-gray-800 border" id="applist" role="tabpanel"
                        aria-labelledby="applist-tab">

                        <div id="my-application-alert"
                            class="flex p-4 border-t-4 border-yellow-300 bg-yellow-50 dark:bg-yellow-800 dark:border-yellow-600"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4 text-yellow-800 dark:text-yellow-300" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div class="ml-1 text-xs font-medium text-gray-800 dark:text-gray-300">
                                List of saved or submitted applications.
                                Click <span class="font-bold text-blue-700">Edit</span> to go back to last saved data.
                                Click <span class="font-bold text-blue-700">View</span> to view all entered data.
                                Click <span class="font-bold text-blue-700">Status</span> to view latest progress.
                            </div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-gray-500 rounded-lg focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white"
                                data-dismiss-target="#my-application-alert" aria-label="Close">
                                <span class="sr-only">Dismiss</span>
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>

                        <div class="relative shadow sm:rounded-lg p-5">
                            <table id="app_table" class="w-full text-left text-gray-500 dark:text-gray-400 display">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            #
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Requesting Institution
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Activity
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Duration
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(row, index) in applications"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">
                                            {{ index + 1 }}
                                        </td>
                                        <td scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ row.con_ins }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ formatActivity(row.act_req_id) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ formatDate(row.act_start) }} - {{ formatDate(row.act_end) }}
                                        </td>
                                        <td class="px-6 py-4">
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
                                        <td class="px-6 py-4">
                                            {{  formatDate(row.tracked_time) }}
                                        </td>
                                        <td class="px-6 py-4 ">
                                            <button v-if="row.status == 0" type="button"
                                                class="w-full  justify-center inline-flex items-center px-3 py-2 text-xs text-blue-700 bg-gray-50 hover:text-white  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2  mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-8000"
                                                @click="editAppForm()">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-4 h-4 mr-1">
                                                    <path
                                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                    <path
                                                        d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                                </svg>
                                                Edit
                                            </button>

                                            <a v-else v-bind:href="'/app_data/' + row.con_form_token" type="button"
                                                class="w-full  justify-center inline-flex items-center px-3 py-2 text-xs text-blue-700 bg-gray-50 hover:text-white  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2  mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-8000">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-4 h-4 mr-1 font-semibold">
                                                    <path fill-rule="evenodd"
                                                        d="M15.75 2.25H21a.75.75 0 01.75.75v5.25a.75.75 0 01-1.5 0V4.81L8.03 17.03a.75.75 0 01-1.06-1.06L19.19 3.75h-3.44a.75.75 0 010-1.5zm-10.5 4.5a1.5 1.5 0 00-1.5 1.5v10.5a1.5 1.5 0 001.5 1.5h10.5a1.5 1.5 0 001.5-1.5V10.5a.75.75 0 011.5 0v8.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V8.25a3 3 0 013-3h8.25a.75.75 0 010 1.5H5.25z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /End replace -->
        </div>

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

    </div>
</template>

<script>
    import {
        ValidationProvider,
        ValidationObserver,
        extend
    } from 'vee-validate'
    import {
        required,
        email,
        between
    } from 'vee-validate/dist/rules'
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
            'particularsData',
            'applicationsData',
        ],
        components: {
            ValidationProvider,
            ValidationObserver,
        },
        data() {

            return {
                //baseUrl: window.location.origin + '/nrcpoutreach', // test server
                baseUrl: '', // local
                //baseUrl: window.location.origin, // production server
                
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                // step 1
                regions: [],
                provinces: [],
                cities: [],
                step1_save_at: '',
                step1_submitted: '',

                // step 2
                activities: [],
                sub_activities: [],
                venues: [],
                step2_save_at: '',
                step2_submitted: '',
                step2_checked: [],
                step2_selected: [],
                check_act_error: '',



                // step 3
                step3_save_at: '',
                step3_submitted: '',

                // step 4
                step4_save_at: '',
                step4_submitted: '',
                check_ven_error: '',
                step4_checked: [],

                // step 5
                step5_save_at: '0',
                step5_submitted: '',
                check_prt_error: '',
                participants: [],
                step5_usr_id: '',
                step5_stps_id: '',

                // step 6
                step6_save_at: '',
                step6_submitted: '',
                check_att1_error: '',
                check_att2_error: '',
                check_att3_error: '',
                step6_attached_lib: '',
                step6_attached_justification: '',
                step6_attached_req_letter: '',
                check_total_nrcp: '',

                // form 1
                form: {
                    con_ins: '',
                    con_reg: '',
                    con_prov: '',
                    con_city: '',
                    con_brgy: '',
                    con_current: 0,
                    con_address: '',
                    con_head_ins: '',
                    con_focal_p: '',
                    con_contact_num: '',
                    con_contact_add: '',
                    form_token: '',
                    current_checked: false
                },

                // form 2
                form2: {
                    act_spec_act: ['', '', '', ''],
                    act_req_id: [],
                    act_start: '',
                    act_end: '',
                    act_req_oth: ''
                },

                // form 3
                form3: {
                    obj: [],
                    obj_gender: '',
                    obj_sdg: '',
                },

                // form 4
                form4: {
                    ven_spec: [],
                    ven_spec_oth: '',
                    ven_address: '',
                    checkDisabled: [false, false, false, false, false, false, false],
                    checkedSpec: [false, false, false, false, false, false, false],
                    checkDisabledClass: ['text-gray-900', 'text-gray-900', 'text-gray-900', 'text-gray-900',
                        'text-gray-900', 'text-gray-900', 'text-gray-900'
                    ],
                },

                // form 5
                form5: [{
                    prt_name: '',
                    prt_age: '',
                    prt_sex: '',
                    prt_pos: '',
                    prt_int: '',
                    prt_id: '',
                    prt_usr_id: '',
                    prt_stps_id: ''
                }, ],

                form6: {

                    nrcp_budget: ["0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"],
                    counter_budget: ["0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"],
                    other_budget: ["0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"],
                    total_nrcp: '0.00',
                    total_counter: '0.00',
                    total_other: '0.00',
                    att_lib: '',
                    att_justification: '',
                    att_req_letter: '',

                },

                // applications
                applications: [],

                // dates
                min: new Date().toISOString().slice(0, 10),

                //popover content
                popoverContent: [],

                // library
                particulars: [],
            }
        },
        methods: {
            checkVenue: function (event) {
                if (event.target.value == 1) {

                    if (event.target.checked) {
                        this.form4.checkDisabled[1] = 'disabled'
                        this.form4.checkDisabledClass[1] = 'text-gray-400'
                        this.form4.checkedSpec[1] = 'false'
                    } else {
                        this.form4.checkDisabled[1] = false
                        this.form4.checkDisabledClass[1] = 'text-gray-900'
                        this.form4.checkedSpec[1] = false
                    }
                } else if (event.target.value == 3) {

                    if (event.target.checked) {
                        this.form4.checkDisabled[3] = 'disabled'
                        this.form4.checkDisabledClass[3] = 'text-gray-400'
                        this.form4.checkedSpec[3] = false
                    } else {
                        this.form4.checkDisabled[3] = false
                        this.form4.checkDisabledClass[3] = 'text-gray-900'
                        this.form4.checkedSpec[3] = false
                    }
                } else
                if (event.target.value == 2) {

                    if (event.target.checked) {
                        this.form4.checkDisabled[0] = 'disabled'
                        this.form4.checkDisabledClass[0] = 'text-gray-400'
                        this.form4.checkedSpec[0] = 'false'
                    } else {
                        this.form4.checkDisabled[0] = false
                        this.form4.checkDisabledClass[0] = 'text-gray-900'
                        this.form4.checkedSpec[0] = false
                    }
                } else if (event.target.value == 4) {

                    if (event.target.checked) {
                        this.form4.checkDisabled[2] = 'disabled'
                        this.form4.checkDisabledClass[2] = 'text-gray-400'
                        this.form4.checkedSpec[2] = false //todo
                    } else {
                        this.form4.checkDisabled[2] = false
                        this.form4.checkDisabledClass[2] = 'text-gray-900'
                        this.form4.checkedSpec[2] = false
                    }
                }
            },
            setAddress: function (event) {

                if (event.target.checked) {

                    this.form.con_current = 1

                    axios.get(APP_URL + '/get_current_address')
                        .then(function (response) {
                            response.data.forEach((value, index) => {
                                this.form.con_reg = value.pp_region
                                this.form.con_brgy = value.pp_brgy

                                axios.get(APP_URL + '/get_provinces', {
                                        params: {
                                            id: value.pp_region
                                        }
                                    })
                                    .then(function (response) {
                                        this.provinces = response.data
                                    }.bind(this))

                                this.form.con_prov = value.pp_prov

                                axios.get(APP_URL + '/get_cities', {
                                        params: {
                                            id: value.pp_prov
                                        }
                                    })
                                    .then(function (response) {
                                        this.cities = response.data
                                    }.bind(this))


                                this.form.con_city = value.pp_city
                            })
                        }.bind(this))




                } else {
                    this.form.con_current = 0
                    this.form.con_reg = ''
                    this.form.con_prov = ''
                    this.form.con_city = ''
                    this.form.con_brgy = ''
                    this.provinces = []
                    this.cities = []
                }

            },
            handleInput: function (e) {
                if (e.key === "Backspace" || e.key === "Delete") {
                    return e.preventDefault(); // Don't do anything to the input value
                }
            },
            totalNrcpBudget: function (event) {


                var total = 0
                this.form6.nrcp_budget.forEach((value, index) => {

                    total += parseFloat(value)

                })

                this.form6.total_nrcp = total.toFixed(2)

            },
            totalCounterBudget: function (event) {


                var total = 0
                this.form6.counter_budget.forEach((value, index) => {

                    total += parseFloat(value)

                })

                this.form6.total_counter = total.toFixed(2)

            },
            totalOtherBudget: function (event) {


                var total = 0
                this.form6.other_budget.forEach((value, index) => {

                    total += parseFloat(value)

                })

                this.form6.total_other = total.toFixed(2)

            },
            // form 6
            validateLibAttachment: function (event) {
                this.form6.att_lib = event.target.files || event.dataTransfer.files;
            },
            validateJustificationAttachment: function (event) {
                this.form6.att_justification = event.target.files || event.dataTransfer.files;
            },
            validateReqAttachment: function (event) {
                this.form6.att_req_letter = event.target.files || event.dataTransfer.files;
            },
            onSubmitStep6: function (event) {


                if (this.step6_attached_lib == '') {
                    if (this.form6.att_lib == '') {
                        this.check_att1_error = 'Required'
                    } else {
                        this.check_att1_error = (this.form6.att_lib[0].size > 25000000) ?
                            'File size exceeds limit' : (this.form6.att_lib[0].type != 'application/msword' && this
                                .form6.att_lib[0].type !=
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document') ?
                            'File type invalid' : ''
                    }
                }

                if (this.step6_attached_justification == '') {
                    if (this.form6.total_nrcp > 350000) {
                        if (this.form6.att_justification == '') {
                            this.check_att2_error = 'Required'
                        } else {
                            this.check_att2_error = (this.form6.att_justification[0].size > 25000000) ?
                                'File size exceeds limit' : (this.form6.att_justification[0].type !=
                                    'application/msword' && this.form6.att_justification[0].type !=
                                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document') ?
                                'File type invalid' : ''
                        }
                    }
                }

                if (this.step6_attached_req_letter == '') {
                    if (this.form6.att_req_letter == '') {
                        this.check_att3_error = 'Required'
                    } else {
                        this.check_att3_error = (this.form6.att_req_letter[0].size > 25000000) ?
                            'File size exceeds limit' : (this.form6.att_req_letter[0].type !=
                                'application/msword' && this.form6.att_req_letter[0].type !=
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document') ?
                            'File type invalid' : ''
                    }
                }

                if (this.form6.total_nrcp > 0 && this.check_att1_error == '' && this.check_att2_error == '' && this
                    .check_att3_error == '') {


                    Swal.fire({
                        title: 'Submit Application?',
                        text: "You won't be able to make changes after proceeding.",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#1E429F',
                        cancelButtonColor: '#9CA3AF',
                        confirmButtonText: 'Proceed',
                        cancelButtonText: 'Cancel',
                        reverseButtons: true,
                        focusCancel: true,
                        showLoaderOnConfirm: true,
                    }).then((result) => {
                        if (result.isConfirmed == true) {

                            this.step6_submitted = 1

                            const formData = new FormData();
                            formData.append('att_lib', this.form6.att_lib[0]);
                            formData.append('att_req_letter', this.form6.att_req_letter[0]);

                            formData.append('lib_nrcp', this.form6.nrcp_budget);
                            formData.append('total_nrcp', this.form6.total_nrcp);
                            formData.append('lib_counter', this.form6.counter_budget);
                            formData.append('total_counter', this.form6.total_counter);
                            formData.append('lib_other', this.form6.other_budget);
                            formData.append('total_other', this.form6.total_other);

                            if (this.form6.total_nrcp > 35000) {
                                formData.append('att_justification', this.form6.att_justification[0]);
                            }

                            axios.post(APP_URL + '/submit_step6', formData)
                                .then(response => {

                                    this.step6_submitted = value.att_submit
                                    this.step6_attached_lib = value.att_lib
                                    this.step6_attached_justification = value.att_justification
                                    this.step6_attached_req_letter = value.att_req_letter
                                    this.step6_save_at = moment(String(value.updated_at)).format(
                                        'MMMM DD, YYYY, h:mm:ss a')
                                })
                                .catch(function () {});

                            let timerInterval
                            Swal.fire({
                                title: 'Application submitted!',
                                html: 'Page will be reloaded',
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
                                    // this.getApplications()
                                    location.reload()
                                }
                            }).then((result) => {
                                location.reload()
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    console.log('I was closed by the timer')
                                }
                            })

                        }
                    })

                }

                // if(this.step6_attached_file_1 != ''){
                //   // console.log('file saved')
                //   if(this.step6_file != ''){
                //     // console.log('file selected')
                //     Swal.fire({
                //       title: 'Submit Application?',
                //       text: "You won't be able to make changes after proceeding.",
                //       icon: 'question',
                //       showCancelButton: true,
                //       confirmButtonColor: '#1E429F',
                //       cancelButtonColor: '#9CA3AF',
                //       confirmButtonText: 'Proceed',
                //       cancelButtonText: 'Cancel',
                //       reverseButtons: true,
                //       focusCancel: true,
                //       showLoaderOnConfirm: true,
                //       }).then((result) => {  
                //               if (result.isConfirmed==true) {

                //                 this.step6_submitted = 1
                //                 const formData = new FormData();
                //                 formData.append('file', this.step6_file[0]);

                //                 axios.post(APP_URL + '/submit_step6', formData)
                //                 .then(response => {

                //                   this.step6_submitted = 1
                //                   this.step6_attached_file_1 = this.step6_file[0].name
                //                   this.step6_save_at = moment().format('MMMM DD, YYYY, h:mm:ss a')
                //                 })
                //                 .catch(function(){
                //                 });

                //                 let timerInterval
                //                 Swal.fire({
                //                 title: 'Application submitted!',
                //                 html: 'Page will be reloaded',
                //                 icon: 'success',
                //                 timer: 3000,
                //                 timerProgressBar: true,
                //                 allowOutsideClick: false,
                //                 allowEscapeKey: false,
                //                 didOpen: () => {
                //                     Swal.showLoading()
                //                     const b = Swal.getHtmlContainer().querySelector('b')
                //                     timerInterval = setInterval(() => {
                //                     b.textContent = Swal.getTimerLeft()
                //                     }, 100)
                //                 },
                //                 willClose: () => {
                //                     clearInterval(timerInterval)
                //                     this.getApplications()
                //                     location.reload()
                //                 }
                //                 }).then((result) => {
                //                     location.reload()
                //                 /* Read more about handling dismissals below */
                //                 if (result.dismiss === Swal.DismissReason.timer) {
                //                     console.log('I was closed by the timer')
                //                 }
                //                 })

                //           }    
                //       })

                //   }else{

                //     Swal.fire({
                //       title: 'Submit Application?',
                //       text: "You won't be able to make changes after proceeding.",
                //       icon: 'question',
                //       showCancelButton: true,
                //       confirmButtonColor: '#1E429F',
                //       cancelButtonColor: '#9CA3AF',
                //       confirmButtonText: 'Proceed',
                //       cancelButtonText: 'Cancel',
                //       reverseButtons: true,
                //       focusCancel: true,
                //       showLoaderOnConfirm: true,
                //       }).then((result) => {  
                //               if (result.isConfirmed==true) {

                //                 this.step6_submitted = 1
                //                 const formData = new FormData();
                //                 formData.append('file', this.step6_file[0]);

                //                 axios.post(APP_URL + '/submit_step6', formData)
                //                 .then(response => {
                //                   this.step6_submitted = 1
                //                   this.step6_attached_file_1 = this.step6_file[0].name
                //                   this.step6_save_at = moment().format('MMMM DD, YYYY, h:mm:ss a')
                //                 })
                //                 .catch(function(){
                //                 });



                //                 let timerInterval
                //                 Swal.fire({
                //                 title: 'Application submitted!',
                //                 html: 'Page will be reloaded',
                //                 icon: 'success',
                //                 timer: 3000,
                //                 timerProgressBar: true,
                //                 allowOutsideClick: false,
                //                 allowEscapeKey: false,
                //                 didOpen: () => {
                //                     Swal.showLoading()
                //                     const b = Swal.getHtmlContainer().querySelector('b')
                //                     timerInterval = setInterval(() => {
                //                     b.textContent = Swal.getTimerLeft()
                //                     }, 100)
                //                 },
                //                 willClose: () => {
                //                     clearInterval(timerInterval)
                //                     this.getApplications()
                //                     location.reload()
                //                 }
                //                 }).then((result) => {
                //                     location.reload()
                //                 /* Read more about handling dismissals below */
                //                 if (result.dismiss === Swal.DismissReason.timer) {
                //                     console.log('I was closed by the timer')
                //                 }
                //                 })
                //               }    
                //       })

                //   }


                // }else{
                //   if(this.step6_file != ''){       
                //     if(this.step6_file[0].size > 25000000){
                //       this.check_att_error = 'File size exceeds limit'
                //     }else if(this.step6_file[0].type != 'application/msword' && this.step6_file[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
                //       this.check_att_error = 'File type invalid'
                //     }else{
                //       this.check_att_error = ''

                //       Swal.fire({
                //       title: 'Submit Application?',
                //       text: "You won't be able to make changes after proceeding.",
                //       icon: 'question',
                //       showCancelButton: true,
                //       confirmButtonColor: '#1E429F',
                //       cancelButtonColor: '#9CA3AF',
                //       confirmButtonText: 'Proceed',
                //       cancelButtonText: 'Cancel',
                //       reverseButtons: true,
                //       focusCancel: true,
                //       showLoaderOnConfirm: true,
                //       }).then((result) => {  
                //               if (result.isConfirmed==true) {

                //                 this.step6_submitted = 1
                //                 const formData = new FormData();
                //                 formData.append('file', this.step6_file[0]);

                //                 axios.post(APP_URL + '/submit_step6', formData)
                //                 .then(response => {
                //                   // console.log(response.data)
                //                   this.step6_submitted = 1
                //                   this.step6_attached_file_1 = this.step6_file[0].name
                //                   this.step6_save_at = moment().format('MMMM DD, YYYY, h:mm:ss a')
                //                 })
                //                 .catch(function(){
                //                 });


                //                 let timerInterval
                //                 Swal.fire({
                //                 title: 'Application submitted!',
                //                 html: 'Page wil be reloaded',
                //                 icon: 'success',
                //                 timer: 3000,
                //                 timerProgressBar: true,
                //                 allowOutsideClick: false,
                //                 allowEscapeKey: false,
                //                 didOpen: () => {
                //                     Swal.showLoading()
                //                     const b = Swal.getHtmlContainer().querySelector('b')
                //                     timerInterval = setInterval(() => {
                //                     b.textContent = Swal.getTimerLeft()
                //                     }, 100)
                //                 },
                //                 willClose: () => {
                //                     clearInterval(timerInterval)
                //                     this.getApplications()
                //                     location.reload()
                //                 }
                //                 }).then((result) => {
                //                     location.reload()
                //                 /* Read more about handling dismissals below */
                //                 if (result.dismiss === Swal.DismissReason.timer) {
                //                     console.log('I was closed by the timer')
                //                 }
                //                 })
                //               }    
                //       })
                //     }
                //   }else{
                //     this.check_att_error = 'No selected file'
                //   } 
                // }
            },
            saveStep6: function () {

                if (this.step6_attached_lib == '') {
                    if (this.form6.att_lib == '') {
                        this.check_att1_error = 'Required'
                    } else {
                        this.check_att1_error = (this.form6.att_lib[0].size > 25000000) ?
                            'File size exceeds limit' : (this.form6.att_lib[0].type != 'application/msword' && this
                                .form6.att_lib[0].type !=
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document') ?
                            'File type invalid' : ''
                    }
                }

                if (this.step6_attached_justification == '') {
                    if (this.form6.total_nrcp > 350000) {
                        if (this.form6.att_justification == '') {
                            this.check_att2_error = 'Required'
                        } else {
                            this.check_att2_error = (this.form6.att_justification[0].size > 25000000) ?
                                'File size exceeds limit' : (this.form6.att_justification[0].type !=
                                    'application/msword' && this.form6.att_justification[0].type !=
                                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document') ?
                                'File type invalid' : ''
                        }
                    }
                }

                if (this.step6_attached_req_letter == '') {
                    if (this.form6.att_req_letter == '') {
                        this.check_att3_error = 'Required'
                    } else {
                        this.check_att3_error = (this.form6.att_req_letter[0].size > 25000000) ?
                            'File size exceeds limit' : (this.form6.att_req_letter[0].type !=
                                'application/msword' && this.form6.att_req_letter[0].type !=
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document') ?
                            'File type invalid' : ''
                    }
                }

                if (this.form6.total_nrcp > 0 && this.check_att1_error == '' && this.check_att2_error == '' && this
                    .check_att3_error == '') {
                    const formData = new FormData();
                    formData.append('att_lib', this.form6.att_lib[0]);
                    formData.append('att_req_letter', this.form6.att_req_letter[0]);

                    formData.append('lib_nrcp', this.form6.nrcp_budget);
                    formData.append('total_nrcp', this.form6.total_nrcp);
                    formData.append('lib_counter', this.form6.counter_budget);
                    formData.append('total_counter', this.form6.total_counter);
                    formData.append('lib_other', this.form6.other_budget);
                    formData.append('total_other', this.form6.total_other);


                    if (this.form6.total_nrcp > 35000) {
                        formData.append('att_justification', this.form6.att_justification[0]);
                    }

                    axios.post(APP_URL + '/save_step6', formData)
                        .then(response => {
                            console.log(response.data)
                            this.step6_attached_lib = this.form6.att_lib[0].name
                            this.step6_attached_req_letter = this.form6.att_req_letter[0].name

                            if (this.form6.total_nrcp > 35000) {
                                this.step6_attached_justification = this.form6.att_justification[0].name
                            }
                            this.step6_save_at = moment().format('MMMM DD, YYYY, h:mm:ss a')
                        })
                        .catch(function () {});

                }
            },
            getStep6: function () {
                axios.get(APP_URL + '/get_step6_data')
                    .then(response => {
                        if (response.data.length > 0) {
                            response.data.forEach((value, index) => {
                                this.step6_submitted = value.att_submit
                                this.step6_attached_lib = value.att_lib
                                this.step6_attached_justification = value.att_justification
                                this.step6_attached_req_letter = value.att_req_letter
                                this.step6_save_at = moment(String(value.updated_at)).format(
                                    'MMMM DD, YYYY, h:mm:ss a')
                            });
                        } else {
                            this.step6_submitted = 0
                        }
                    })
                axios.get(APP_URL + '/get_step6_nrcp')
                    .then(response => {
                        if (response.data.length > 0) {
                            this.form6.nrcp_budget = []
                            let total = 0
                            response.data.forEach((value, index) => {
                                this.form6.nrcp_budget.push(value.lib_amount)
                                total += parseFloat(value.lib_amount)
                            })
                            this.form6.total_nrcp = total.toFixed(2)
                        } else {
                            this.form6.nrcp_budget = ["0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"]
                        }
                    })

                axios.get(APP_URL + '/get_step6_counter')
                    .then(response => {
                        if (response.data.length > 0) {
                            this.form6.counter_budget = []
                            let total = 0
                            response.data.forEach((value, index) => {
                                this.form6.counter_budget.push(value.cp_amount)
                                total += parseFloat(value.cp_amount)
                            })
                            this.form6.total_counter = total.toFixed(2)
                        } else {
                            this.form6.counter_budget = ["0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"]
                        }
                    })


                axios.get(APP_URL + '/get_step6_other')
                    .then(response => {
                        if (response.data.length > 0) {
                            this.form6.other_budget = []
                            let total = 0
                            response.data.forEach((value, index) => {
                                this.form6.other_budget.push(value.liboth_amount)
                                total += parseFloat(value.liboth_amount)
                            })
                            this.form6.total_other = total.toFixed(2)
                        } else {
                            this.form6.other_budget = ["0.00", "0.00", "0.00", "0.00", "0.00", "0.00", "0.00"]
                        }
                    })
            },
            // form 5
            onSubmitStep5: function (event) {

                Swal.fire({
                    title: 'Proceed to Last Step: Attachment/s?',
                    text: "You won't be able to make changes after proceeding.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#1E429F',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Proceed',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                }).then((result) => {
                    if (result.isConfirmed == true) {
                        axios.post(APP_URL + '/submit_step5', this.form5)
                            .then(response => {
                                // console.log(response.data)
                                this.step5_submitted = 1
                                this.step5_save_at = moment().format('MMMM DD, YYYY, h:mm:ss a')
                            })
                            .catch((error) => {
                                // error.response.status Check status code
                            }).finally(() => {
                                //Perform action in always
                                this.nextStep6()
                            });
                    }
                })
            },
            saveStep5: function () {
                const check_prt = this.form5[0].prt_name
                // console.log(this.form5)
                if (check_prt == '') {
                    this.check_prt_error = 'Please enter atleast one participant'
                } else {
                    this.check_prt_error = ''
                    this.step5_save_at = moment().format('MMMM DD, YYYY, h:mm:ss a')
                    axios.post(APP_URL + '/save_step5', this.form5)
                        .then(response => {
                            this.getStep5()
                            // console.log(response.data)
                        })
                        .catch((error) => {
                            // error.response.status Check status code
                        }).finally(() => {
                            //Perform action in always
                        });
                }
            },
            getStep5: function () {
                axios.get(APP_URL + '/get_step5_data')
                    .then(response => {
                        if (response.data.length > 0) {
                            this.form5 = JSON.parse(JSON.stringify(response.data))
                            response.data.forEach((value, index) => {
                                this.step5_submitted = value.prt_submit
                                this.step5_usr_id = value.prt_usr_id
                                this.step5_stps_id = value.prt_stps_id
                                this.step5_save_at = moment(String(value.updated_at)).format(
                                    'MMMM DD, YYYY, h:mm:ss a')
                            });
                        } else {
                            // this.step5_submitted = 0
                            this.step5_save_at = ''
                        }
                    })
            },
            addParticipants() {
                this.form5.push({
                    prt_name: '',
                    prt_age: '',
                    prt_sex: '',
                    prt_pos: '',
                    prt_int: '',
                });
            },
            removeParticipant(index, stps_id, prt_id, usr_id) {
                axios.post(APP_URL + '/delete_participant/' + stps_id + '/' + prt_id + '/' + usr_id)
                    .then(response => {})

                this.form5.splice(index, 1)
                this.getStep5()

                if (this.form5.length == 0) {
                    this.addParticipants()
                }
            },
            removeAllParticipants() {

                axios.post(APP_URL + '/delete_all_participants/' + this.step5_stps_id + '/' + this.step5_usr_id)
                    .then(response => {})

                this.form5.splice(0, this.form5.length)
                this.addParticipants()
                this.step5_save_at = ''
            },
            // form 4
            onSubmitStep4: function (event) {

                const check_ven = this.form4.ven_spec.length

                if (check_ven == 0) {
                    this.check_ven_error = 'Please select atleast one venue specification'
                } else {
                    this.check_ven_error = ''
                    Swal.fire({
                        title: 'Proceed to Step 4: Participants?',
                        text: "You won't be able to make changes after proceeding.",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#1E429F',
                        cancelButtonColor: '#9CA3AF',
                        confirmButtonText: 'Proceed',
                        cancelButtonText: 'Cancel',
                        reverseButtons: true,
                        focusCancel: true,
                        showLoaderOnConfirm: true,
                    }).then((result) => {
                        if (result.isConfirmed == true) {

                            axios.post(APP_URL + '/submit_step4', this.form4)
                                .then(response => {
                                    // console.log(response.data)
                                    this.step4_submitted = 1
                                    this.step4_save_at = moment().format('MMMM DD, YYYY, h:mm:ss a')
                                })
                                .catch((error) => {
                                    // error.response.status Check status code
                                }).finally(() => {
                                    //Perform action in always
                                    this.nextStep5()
                                });
                        }
                    })
                }
            },
            saveStep4: function () {

                const check_ven = this.form4.ven_spec.length

                if (check_ven == 0) {
                    this.check_ven_error = 'Please select atleast one venue specification'
                } else {
                    this.check_ven_error = ''
                    this.step4_save_at = moment().format('MMMM DD, YYYY, h:mm:ss a')
                    axios.post(APP_URL + '/save_step4', this.form4)
                        .then(response => {
                            // console.log(response.data)
                        })
                        .catch((error) => {
                            // error.response.status Check status code
                        }).finally(() => {
                            //Perform action in always
                        });
                }
            },
            getStep4: function () {

                axios.get(APP_URL + '/get_step4_data')
                    .then(response => {
                        // console.log(response.data)
                        response.data.forEach((value, index) => {
                            this.step4_checked = value.ven_spec.split(", ")
                            this.form4.ven_spec_oth = value.ven_spec_oth
                            this.step4_submitted = value.ven_submit
                            this.step4_save_at = moment(String(value.updated_at)).format(
                                'MMMM DD, YYYY, h:mm:ss a')
                        });

                        this.step4_checked.forEach((value, index) => {
                            this.form4.ven_spec[index] = value
                            if (value == 1) {
                                this.form4.checkDisabled[1] = 'disabled'
                                this.form4.checkDisabledClass[1] = 'text-gray-400'
                                this.form4.checkedSpec[1] = 'false'
                            } else if (value == 3) {
                                this.form4.checkDisabled[3] = 'disabled'
                                this.form4.checkDisabledClass[3] = 'text-gray-400'
                                this.form4.checkedSpec[3] = false
                            } else
                            if (value == 2) {
                                this.form4.checkDisabled[0] = 'disabled'
                                this.form4.checkDisabledClass[0] = 'text-gray-400'
                                this.form4.checkedSpec[0] = 'false'
                            } else if (value == 4) {
                                this.form4.checkDisabled[2] = 'disabled'
                                this.form4.checkDisabledClass[2] = 'text-gray-400'
                                this.form4.checkedSpec[2] = false
                            }
                        });
                    })
            },

            // form 3
            onSubmitStep3: function (event) {

                Swal.fire({
                    title: 'Proceed to Step 4: Venue Specifications?',
                    text: "You won't be able to make changes after proceeding.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#1E429F',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Proceed',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                }).then((result) => {
                    if (result.isConfirmed == true) {

                        axios.post(APP_URL + '/submit_step3', this.form3)
                            .then(response => {
                                // console.log(response.data)
                                this.step3_submitted = 1
                                this.step3_save_at = moment().format('MMMM DD, YYYY, h:mm:ss a')
                            })
                            .catch((error) => {
                                // error.response.status Check status code
                            }).finally(() => {
                                //Perform action in always
                                this.nextStep4()
                            });
                    }
                })
            },
            saveStep3: function () {
                const check_obj = this.form3.obj.length

                if (check_obj > 0) {
                    this.step3_save_at = moment().format('MMMM DD, YYYY, h:mm:ss a')
                    axios.post(APP_URL + '/save_step3', this.form3)
                        .then(response => {
                            // console.log(response.data)
                        })
                        .catch((error) => {
                            // error.response.status Check status code
                        }).finally(() => {
                            //Perform action in always
                        });
                }



            },
            getStep3: function () {

                axios.get(APP_URL + '/get_step3_data')
                    .then(response => {
                        console.log(response.data)
                        response.data.forEach((value, index) => {
                            this.form3.obj[0] = value.obj_1
                            this.form3.obj[1] = value.obj_2
                            this.form3.obj[2] = value.obj_3
                            this.form3.obj[3] = value.obj_4
                            this.form3.obj[4] = value.obj_5
                            this.form3.obj_gender = value.obj_gender
                            this.form3.obj_sdg = value.obj_sdg
                            this.step3_submitted = value.obj_submit
                            this.step3_save_at = moment(String(value.updated_at)).format(
                                'MMMM DD, YYYY, h:mm:ss a')
                        });

                    })
            },

            // form 2
            setRequiredActivity: function (e) {
                const check_val = e.target.value;
                const check_status = e.target.checked;
                var dom = 'specAct' + check_val;
                if (check_status == true) {




                } else {

                }



            },
            onSubmitStep2: function (event) {

                const check_act = this.form2.act_req_id.length
                // console.log(this.form2.act_spec_act[0])
                if (check_act == 0) {
                    this.check_act_error = 'Please select atleast one activity.'
                } else {


                    this.form2.act_spec_act.forEach((value, index) => {
                        console.log(value + ' - ' + index)
                    })

                    this.check_act_error = ''

                    if (this.form2.act_req_id.length)

                        Swal.fire({
                            title: 'Proceed to Step 3: Objectives?',
                            text: "You won't be able to make changes after proceeding.",
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#1E429F',
                            cancelButtonColor: '#9CA3AF',
                            confirmButtonText: 'Proceed',
                            cancelButtonText: 'Cancel',
                            reverseButtons: true,
                            focusCancel: true,
                            showLoaderOnConfirm: true,
                        }).then((result) => {
                            if (result.isConfirmed == true) {

                                axios.post(APP_URL + '/submit_step2', this.form2)
                                    .then(response => {
                                        this.step2_submitted = 1
                                        this.step2_save_at = moment().format('MMMM DD, YYYY, h:mm:ss a')
                                    })
                                    .catch((error) => {
                                        // error.response.status Check status code
                                    }).finally(() => {
                                        //Perform action in always
                                        this.nextStep3()
                                    });


                                this.nextStep3()

                            }
                        })
                }
            },
            saveStep2: function () {
                const check_act = this.form2.act_req_id.length

                if (check_act == 0) {
                    this.check_act_error = 'Please select atleast one activity.'
                } else {
                    this.step2_save_at = moment().format('MMMM DD, YYYY, h:mm:ss a')
                    axios.post(APP_URL + '/save_step2', this.form2)
                        .then(response => {
                            // console.log(response.data)
                        })
                        .catch((error) => {
                            // error.response.status Check status code
                        }).finally(() => {
                            //Perform action in always
                        });
                }
            },
            getStep2: function () {

                axios.get(APP_URL + '/get_step2_data')
                    .then(response => {
                        // console.log(response.data)
                        response.data.forEach((value, index) => {
                            this.form2.act_start = value.act_start
                            this.form2.act_end = value.act_end
                            this.form2.act_req_oth = value.act_req_oth
                            this.step2_checked = value.act_req_id.split(", ")
                            this.step2_selected = value.act_spec_act.split(", ")
                            this.step2_submitted = value.act_submit
                            this.step2_save_at = moment(String(value.updated_at)).format(
                                'MMMM DD, YYYY, h:mm:ss a')
                        });

                        this.step2_checked.forEach((value, index) => {
                            this.form2.act_req_id[index] = value
                        });

                        this.step2_selected.forEach((value, index) => {
                            this.form2.act_spec_act[index] = value
                        });
                    })
            },

            // form 1
            onSubmitStep1: function (event) {

                Swal.fire({
                    title: 'Proceed to Step 2: Type of Activity?',
                    text: "You won't be able to make changes after proceeding.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#1E429F',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Proceed',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                }).then((result) => {
                    if (result.isConfirmed == true) {
                        axios.post(APP_URL + '/submit_step1', this.form)
                            .then(response => {
                                this.step1_submitted = 1
                                this.step1_save_at = moment().format('MMMM DD, YYYY, h:mm:ss a')
                                this.nextStep2()
                            })
                            .catch((error) => {
                                // error.response.status Check status code
                            }).finally(() => {
                                //Perform action in always
                                this.nextStep2()
                            });
                    }
                })
            },
            saveStep1: function () {

                if (this.form.con_ins != '') {
                    this.step1_save_at = moment().format('MMMM DD, YYYY, h:mm:ss a')
                    axios.post(APP_URL + '/save_step1', this.form)
                        .then(response => {
                            // console.log(response.data)
                            //Perform Success Action
                            // this.get_step1_data()
                        })
                        .catch((error) => {
                            // error.response.status Check status code
                        }).finally(() => {
                            //Perform action in always
                        });
                }
            },

            // form nav
            nextStep1: function () {
                const elem = this.$refs.step1Btn
                elem.click()
            },
            nextStep2: function () {
                const elem = this.$refs.step2Btn
                elem.click()
            },
            nextStep3: function () {
                const elem = this.$refs.step3Btn
                elem.click()
            },
            nextStep4: function () {
                const elem = this.$refs.step4Btn
                elem.click()
            },
            nextStep5: function () {
                const elem = this.$refs.step5Btn
                elem.click()
            },
            nextStep6: function () {
                const elem = this.$refs.step6Btn
                elem.click()
            },

            // form libraries
            getProvinces: function () {
                axios.get(APP_URL + '/get_provinces', {
                        params: {
                            id: this.form.con_reg
                        }
                    })
                    .then(function (response) {
                        this.provinces = response.data
                    }.bind(this))

                this.form.province = ''
                this.form.city = ''
                this.cities = []
            },
            getCities: function () {
                axios.get(APP_URL + '/get_cities', {
                        params: {
                            id: this.form.con_prov
                        }
                    })
                    .then(function (response) {
                        this.cities = response.data
                    }.bind(this))
            },
            checkIfSubmitted: function () {
                console.log('checking if submitted.....')

                axios.get(APP_URL + '/get_step6_data')
                    .then(response => {

                        // console.log(response.data)
                        if (response.data.length > 0) {

                            console.log('last entry has data')
                            response.data.forEach((value, index) => {
                                if (value.att_submit == 1) {
                                    this.form.form_token = value.att_form_token

                                    console.log('last entry submitted')
                                } else {
                                    console.log('last entry saved')
                                    this.nextStep6()

                                    axios.get(APP_URL + '/get_step1_data')
                                        .then(response => {
                                            response.data.forEach((value, index) => {
                                                this.form.con_ins = value.con_ins
                                                this.form.con_reg = value.con_reg ? value
                                                    .con_reg : ''
                                                this.form.con_prov = value.con_prov ? value
                                                    .con_prov : ''
                                                this.form.con_city = value.con_city ? value
                                                    .con_city : ''
                                                this.form.con_brgy = value.con_brgy
                                                this.form.con_address = value.con_address
                                                this.form.con_head_ins = value.con_head_ins
                                                this.form.con_focal_p = value.con_focal_p
                                                this.form.con_contact_num = value
                                                    .con_contact_num
                                                this.form.con_contact_add = value
                                                    .con_contact_add
                                                this.step1_submitted = value.con_submit
                                                if (value.con_current == 1) {
                                                    this.form.current_checked = 'checked'
                                                } else {
                                                    this.form.current_checked = false
                                                }
                                                this.step1_save_at = moment(String(value
                                                    .updated_at)).format(
                                                    'MMMM DD, YYYY, h:mm:ss a')
                                                this.getProvinces()
                                                this.getCities()
                                            });
                                        })

                                    axios.get(APP_URL + '/get_step2_data')
                                        .then(response => {
                                            response.data.forEach((value, index) => {
                                                this.step2_submitted = value.act_submit
                                                if (value.act_submit == 0) {
                                                    this.nextStep2()
                                                }
                                            });
                                        })

                                    axios.get(APP_URL + '/get_step3_data')
                                        .then(response => {
                                            response.data.forEach((value, index) => {
                                                this.step3_submitted = value.obj_submit
                                                if (value.obj_submit == 0) {
                                                    this.nextStep3()
                                                }
                                            });
                                        })

                                    axios.get(APP_URL + '/get_step4_data')
                                        .then(response => {
                                            response.data.forEach((value, index) => {
                                                this.step4_submitted = value.ven_submit
                                                if (value.ven_submit == 0) {
                                                    this.nextStep4()
                                                }
                                            });
                                        })

                                    axios.get(APP_URL + '/get_step5_data')
                                        .then(response => {
                                            response.data.forEach((value, index) => {
                                                this.step5_submitted = value.prt_submit

                                                if (value.prt_submit == 0) {
                                                    this.nextStep5()
                                                }

                                            });
                                        })
                                }
                            })

                        } else {
                            console.log('last entry not submitted.....')

                            axios.get(APP_URL + '/get_step1_data')
                                .then(response => {
                                    console.log(response.data)
                                    response.data.forEach((value, index) => {
                                        this.form.con_ins = value.con_ins
                                        this.form.con_reg = value.con_reg ? value.con_reg : ''
                                        this.form.con_prov = value.con_prov ? value.con_prov : ''
                                        this.form.con_city = value.con_city ? value.con_city : ''
                                        this.form.con_brgy = value.con_brgy
                                        this.form.con_address = value.con_address
                                        this.form.con_head_ins = value.con_head_ins
                                        this.form.con_focal_p = value.con_focal_p
                                        this.form.con_contact_num = value.con_contact_num
                                        this.form.con_contact_add = value.con_contact_add
                                        this.step1_submitted = value.con_submit
                                        if (value.con_current == 1) {
                                            this.form.current_checked = 'checked'
                                        } else {
                                            this.form.current_checked = false
                                        }
                                        this.step1_save_at = moment(String(value.updated_at))
                                            .format('MMMM DD, YYYY, h:mm:ss a')
                                        this.getProvinces()
                                        this.getCities()

                                        if (value.con_submit == 1) {
                                            this.nextStep2()
                                        }
                                    });
                                })

                            axios.get(APP_URL + '/get_step2_data')
                                .then(response => {
                                    response.data.forEach((value, index) => {
                                        this.step2_submitted = value.act_submit
                                        if (value.act_submit == 1) {
                                            this.nextStep3()
                                        }
                                    });
                                })

                            axios.get(APP_URL + '/get_step3_data')
                                .then(response => {
                                    response.data.forEach((value, index) => {
                                        this.step3_submitted = value.obj_submit
                                        if (value.obj_submit == 1) {
                                            this.nextStep4()
                                        }
                                    });
                                })

                            axios.get(APP_URL + '/get_step4_data')
                                .then(response => {
                                    response.data.forEach((value, index) => {
                                        this.step4_submitted = value.ven_submit
                                        if (value.ven_submit == 1) {
                                            this.nextStep5()
                                        }
                                    });
                                })

                            axios.get(APP_URL + '/get_step5_data')
                                .then(response => {
                                    response.data.forEach((value, index) => {
                                        this.step5_submitted = value.prt_submit
                                        if (value.prt_submit == 1) {
                                            this.nextStep6()
                                        }
                                    });
                                })
                        }
                    })
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
            getApplications: function () {
                axios.get(APP_URL + '/get_applications')
                    .then(response => {
                        this.applications = JSON.parse(JSON.stringify(response.data))
                    })
            },
            editAppForm: function () {
                this.$refs.appForm.click()
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
            axios.get(APP_URL + '/get_regions')
                .then(response => {
                    this.regions = response.data
                })

            axios.get(APP_URL + '/get_act_type')
                .then(response => {
                    this.activities = response.data
                    console.log(this.activities)
                })

            axios.get(APP_URL + '/get_sub_act')
                .then(response => {
                    this.sub_activities = response.data
                })

            axios.get(APP_URL + '/get_ven_spec')
                .then(response => {
                    this.venues = response.data
                })

            this.getApplications()
            this.checkIfSubmitted()

            this.particulars = JSON.parse(JSON.stringify(this.particularsData))
            this.applications = JSON.parse(JSON.stringify(this.applicationsData))
        },
    }
</script>