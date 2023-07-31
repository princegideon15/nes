<template>
     <div class="flex justify-center w-full py-10 pt-20">
     <!-- <div class="flex items-center  w-full bg-teal-lighter"> -->
        <div class="overflow-hidden bg-white shadow-md sm:rounded-lg border-1 w-2/4">
            <div class="p-6 sm:px-6 bg-blue-600">
                <h3 class="text-lg font-bold leading-6 text-white">Registration</h3>
                <p class="mt-1 max-w-2xl text-sm text-white">Sign in details, personal details and application.</p>
            </div>
  <ValidationObserver v-slot="{ handleSubmit }" >
            <form @submit.prevent="handleSubmit(onSubmit)"  >
            <div class="border-t border-gray-200">
                <div class="px-6 sm:px-6">
                    <p class="mt-3 max-w-2xl text-sm text-gray-400">Membership</p>
                </div>
                <dl class="bg-white">
                    <div class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-900">Are you an NRCP Member?</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                            <select v-model="form.pp_member" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" @change="nrcpMember()">
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                            </select>
                        </dd>
                    </div>
                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>
                    <div class="px-6 pb-2 sm:px-6">
                        <p class="mt-1 max-w-2xl text-sm text-gray-400">Sign in details</p>
                    </div>
                    <div class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-900">Email address</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                            
                        <ValidationProvider rules="required"  v-slot="{ errors }">
                            <input @blur="checkEmail()" type="email" v-model="form.email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="example@email.com" />
                        <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider>
                            
                        <div v-if="(activated == false && form.email != '')" class="" v-bind:class="verifiedMemberClass" role="alert">
                            <span v-html="verifiedMemberText"></span>
                        </div>
                        </dd>
                    </div>
                        <ValidationProvider v-if="hide" name="confirm" rules="required|min:8"  v-slot="{ errors }">
                            <div  class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-md font-medium text-gray-900">Password</dt>
                                <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                                    <input type="password" name="password" v-model="form.password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="******" />
                            <span class="block text-red-600">{{ errors[0] }}</span></dd>
                            </div>
                        </ValidationProvider>
                        <ValidationProvider v-if="hide"  rules="required|password:@confirm|min:8"  v-slot="{ errors }">
                            <div v-if="hide" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-md font-medium text-gray-900">Repeast Password</dt>
                                <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                                    <input type="password" v-model="form.password_confirm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="******" />
                            <span class="block text-red-600">{{ errors[0] }}</span></dd>
                            </div>
                        </ValidationProvider>
                    <div v-if="hide" class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>
                    <div v-if="hide" class="px-6 pb-2 sm:px-6">
                        <p class="mt-1 max-w-2xl text-sm text-gray-400">Personal details</p>
                    </div>
                    <div v-if="hide" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-900">Title</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                        <ValidationProvider v-if="hide"  rules="required"  v-slot="{ errors }">
                            <select v-model="form.pp_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" selected disabled>Select</option>
                                <option v-for="row in titles" v-bind:value="row.title_id">{{ row.title_name }}</option>
                            </select>
                            <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider>
                        </dd>
                    </div>
                    <div v-if="hide" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-900">Last name</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                        <ValidationProvider v-if="hide"  rules="required"  v-slot="{ errors }">
                            <input type="text" v-model="form.pp_last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""/>
                            <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider>
                        </dd>
                    </div>
                    <div v-if="hide" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-900">Middle name<span class="text-xs font-normal text-gray-900"><br>(optional)</span></dt>
                        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                            <input type="text" v-model="form.pp_middle_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""/>
                           
                        </dd>
                    </div>
                    <div v-if="hide" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-900">First name</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                        <ValidationProvider v-if="hide"  rules="required"  v-slot="{ errors }">
                            <input type="text" v-model="form.pp_first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""/>
                            <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider></dd>
                    </div>
                    <div v-if="hide" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-900">Suffix name<span class="text-xs font-normal text-gray-900"><br>(optional)</span></dt>
                        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                            <input type="text" v-model="form.pp_suffix_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ex. Jr., Sr."/>
                        </dd>
                    </div>
                    <div v-if="hide" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-900">Extension<span class="text-xs font-normal text-gray-900"><br>(optional)</span></dt>
                        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                            <input type="text" v-model="form.pp_extension" name="extension" id="extension" autocomplete="extension" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ex. MS, PHD"/>
                        </dd>
                    </div>
                    <div v-if="hide" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-900">Age</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                        <ValidationProvider v-if="hide"  rules="required|between:18,100"  v-slot="{ errors }">
                            <input type="number" v-model="form.pp_age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""/>
                            <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider></dd>
                    </div>
                    <div v-if="hide" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-900">Sex</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                        <ValidationProvider v-if="hide"  rules="required"  v-slot="{ errors }">
                            <select id="sex" v-model="form.pp_sex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected disabled>Select</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            </select>
                            <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider></dd>
                    </div>
                    <div v-if="hide" class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>
                    <div v-if="hide" class="px-6 pb-2 sm:px-6">
                        <p class="mt-1 max-w-2xl text-sm text-gray-400">Address details</p>
                    </div>
                    <div v-if="hide" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-900">Region</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                        <ValidationProvider v-if="hide"  rules="required"  v-slot="{ errors }">
                            <select id="region" v-model="form.pp_region" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" @change="getProvinces()">
                            <option value="">Select here</option>
                            <option v-for="row in regions" v-bind:value="row.region_id">{{ row.region_name }}</option>
                            </select>
                            <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider></dd>
                    </div>
                    <div v-if="hide" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-900">Province</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                        <ValidationProvider v-if="hide"  rules="required"  v-slot="{ errors }">
                            <select id="province" v-model="form.pp_prov" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" @change="getCities()" >
                            <option value="">Select here</option>
                            <option v-for="row in provinces" v-bind:value="row.province_id">{{ row.province_name }}</option>
                            </select>
                            <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider></dd>
                    </div>
                    <div v-if="hide" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-900">City</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                        <ValidationProvider v-if="hide"  rules="required"  v-slot="{ errors }">
                            <select id="city" v-model="form.pp_city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            <option value="">Select here</option>
                            <option v-for="row in cities" v-bind:value="row.city_id">{{ row.city_name }}</option>
                            </select>
                            <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider></dd>
                    </div>
                    <div v-if="hide" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-900">Barangay</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                        <ValidationProvider v-if="hide"  rules="required"  v-slot="{ errors }">
                            <input type="text" v-model="form.pp_brgy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
                            <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider></dd>
                    </div>
                    <div v-if="hide" class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>
                    <div v-if="hide" class="px-6 pb-2 sm:px-6">
                        <p class="mt-1 max-w-2xl text-sm text-gray-400">Employment details</p>
                    </div>
                    <div v-if="hide" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-900">Institution</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                        <ValidationProvider v-if="hide"  rules="required"  v-slot="{ errors }">
                            <input type="text" v-model="form.pp_ins" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
                            <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider></dd>
                    </div>
                    <div v-if="hide" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-900">Position</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                        <ValidationProvider v-if="hide"  rules="required"  v-slot="{ errors }">
                            <input type="text" v-model="form.pp_pos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
                            <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider></dd>
                    </div>
                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>
                    <div class="px-6 pb-2 sm:px-6">
                        <p class="mt-1 max-w-2xl text-sm text-gray-400">Registration details</p>
                    </div>
                    <div class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-900">Register as</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                        <ValidationProvider  rules="required"  v-slot="{ errors }">
                            <select v-model="form.reg_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" @change='getSubCategories()' >
                            <option value="" selected disabled>Select</option>
                            <option value="1">Division Chair</option>
                            <option value="2">Stakeholder</option>
                            <option value="3">NRCP Management</option>
                            </select>
                            <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider></dd>
                    </div>

                    <div v-if="form.reg_category == 1" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-md font-medium text-gray-900">Division</dt>
                            <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                        <ValidationProvider  rules="required"  v-slot="{ errors }">
                                <select v-model="form.sub_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    <option value=""  selected disabled>Select Division</option>
                                    <option v-for="row in results" v-bind:value="row.divchr_id">Division {{ row.divchr_name }}</option>
                                </select>
                            <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider></dd>
                    </div>
                    <div v-else-if="form.reg_category == 2" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-md font-medium text-gray-900">Stakeholder</dt>
                            <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                        <ValidationProvider  rules="required"  v-slot="{ errors }">
                                <select v-model="form.sub_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  @change='getStakeholderSubCategories($event)'>
                                    <option value="" selected disabled>Select Stakeholder</option>
                                    <option v-for="row in results" v-bind:value="row.stk_id">{{ row.stk_name }}</option>
                                </select>
                            <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider></dd>
                    </div>
                    <div v-else-if="form.reg_category == 3" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-md font-medium text-gray-900">Management</dt>
                            <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                        <ValidationProvider  rules="required"  v-slot="{ errors }">
                                <select v-model="form.sub_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  @change='getManagementSubCategories($event)'>
                                    <option value="" selected disabled>Select Management</option>
                                    <option v-for="row in results" v-bind:value="row.mgt_id">{{ row.mgt_name }}</option>
                                </select>
                            <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider></dd>
                    </div>

                    <div v-if="show_res_sub_stake == true" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-md font-medium text-gray-900">{{ sub_stake_label }}</dt>
                            <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                        <ValidationProvider  rules="required"  v-slot="{ errors }">
                                <select v-model="form.sub2_category" class="mt-1 block rounded-md border-gray-300 bg-white py-2 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm  md:text-md lg:text-lg border-0 border-b-2 w-1/2" >
                                    <option value="" selected disabled>Select here</option>
                                    <option v-for="row in results_sub_stake" v-bind:value="row.sub_stake_id">{{ row.sub_stake_name }}</option>
                                </select>
                            <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider></dd>
                    </div>
                    <div v-if="show_res_sub_manage == true" class="px-6 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-md font-medium text-gray-900">{{ sub_manage_label }}</dt>
                            <dd class="mt-1 text-md text-gray-900 sm:col-span-2 sm:mt-0">
                        <ValidationProvider  rules="required"  v-slot="{ errors }">
                                <select v-model="form.sub2_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    <option value="">Select here</option>
                                    <option v-for="row in results_sub_manage" v-bind:value="row.sub_mgt_id">{{ row.sub_mgt_name }}</option>
                                </select>
                            <span class="block text-red-600">{{ errors[0] }}</span>
                        </ValidationProvider></dd>
                    </div>
                    
                </dl>
            </div>
            <div class="bg-gray-50 px-4 py-3 text-center sm:px-6">
                <button type="submit" class="" v-bind:class="disableRegisterButtonClass" :disabled="disableRegisterButton == 1">Submit Registration</button>
            </div>
            </form>
  </ValidationObserver>
        </div>
    </div>
    
</template>
  

<script>
import { ValidationProvider, ValidationObserver, extend } from 'vee-validate'
import { required, email, between, min  } from 'vee-validate/dist/rules'
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
import 'flowbite'

extend('email', email);
extend('between', {
  ...between,
  message: 'Age must be between 18 to 100'
});
extend('min', {
  ...min,
  message: 'Password must be atleast 8 characters'
});
extend('password', {
  params: ['target'],
  validate(value, { target }) {
    return value === target;
  },
  message: 'Passwords does not match'
});
extend('required', {
  ...required,
  message: 'Required'
});

export default {
    components: {
    ValidationProvider,
    ValidationObserver
  },
        data(){
            return {
                // all subcategories
                results: [],

                // stakeholder categories
                results_sub_stake: [],
                show_res_sub_stake: false,
                sub_stake_label: '',

                // management categories
                results_sub_manage: [],
                show_res_sub_manage: false,
                sub_manage_label: '',
                
                // libraries
                titles: [],
                regions: [],
                provinces: [],
                cities: [],
                hide: true,
                
                    form : { 
                        pp_member: 2,

                        email: '', 
                        password: '',
                        password_confirm: '',

                        pp_title: '',
                        pp_first_name: '',
                        pp_middle_name: '',
                        pp_last_name: '',
                        pp_suffix_name: '',
                        pp_extension: '',
                        pp_age: '',
                        pp_sex: '',
                        pp_region: '',
                        pp_prov: '',
                        pp_city: '',
                        pp_brgy: '',
                        
                        pp_ins: '',
                        pp_pos: '',

                        reg_category: '',
                        sub_category: '',
                        sub2_category: '',
                    },

                activated: true,
                verifiedMemberClass: '',
                verifiedMemberText: '',
                disableRegisterButtonClass: 'text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center',
                disableRegisterButton: 1
                    
            }
        },
        methods:{
            nrcpMember: function(){
                if(this.form.pp_member == 2){
                    this.hide = true
                }else{
                    this.hide = false
                }

                this.checkEmail()
                this.activated = true
                this.disableRegisterButtonClass = 'text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center'
                disableRegisterButton: 'disabled'

            },
            getProvinces: function(){
                axios.get(APP_URL + '/get_provinces', { params: { id: this.form.pp_region } })
                .then(function (response) {
                    this.provinces = response.data
                }.bind(this))
                
                this.form.province = ''
                this.form.city = ''
                this.cities = []
            },
            getCities: function(){
                axios.get(APP_URL + '/get_cities', { params: { id: this.form.pp_prov } })
                .then(function (response) {
                    this.cities = response.data
                }.bind(this))
            },
            checkEmail: function(){
                const member = this.form.pp_member
                const email = this.form.email
                
                if(member == 1){

                    if(email != '' && email != null || email != 0){
                        axios.get(APP_URL + '/get_nrcp_member', { params: { email: email} })
                        .then(function (response) {

                            this.activated = false

                            if(response.data.length > 0){

                                const type = response.data[0]['usr_grp_id']
                                const status = response.data[0]['usr_status_id']
                                
                                if(type != 3){
                                    this.verifiedMemberClass = 'bg-red-100 rounded-lg py-5 px-6 mb-3 mt-3 text-center text-base text-red-700'
                                    this.verifiedMemberText = '<span class="font-bold text-red-800">Non-member account!</span> <br> Please email us here <span class="underline">nrcp1933@gmail.com'
                                    this.disableRegisterButtonClass = 'text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center'
                                    this.disableRegisterButton = 1
                                }else if(status != 1){
                                    this.verifiedMemberClass = 'bg-red-100 rounded-lg py-5 px-6 mb-3 mt-3 text-center text-base text-red-700'
                                    this.verifiedMemberText = '<span class="font-bold text-red-800">Account not activated!</span> <br> Please email us here <span class="underline">nrcp1933@gmail.com'
                                    this.disableRegisterButtonClass = 'text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center'
                                    this.disableRegisterButton = 1
                                }else{

                                    axios.get(APP_URL + '/get_registered_users', { params: { email: email } })
                                    .then(function (response) {
                                        if(response.data.length > 0){
                                        
                                            // this.activated = false
                                            this.hide = false
                                            this.verifiedMemberClass = 'bg-red-100 rounded-lg py-5 px-6 mb-3 mt-3 text-center text-base text-red-700'
                                            this.verifiedMemberText = '<span class="font-bold text-red-800">Account is already registered!</span> <br> Please use your password in SKMS to login.'
                                            this.disableRegisterButtonClass = 'text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center'
                                            this.disableRegisterButton = 1
                                    
                                        }else{
                                            // enable register button
                                            this.verifiedMemberClass = 'bg-green-100 rounded-lg py-5 px-6 mb-3 mt-3 text-center text-base text-green-700'
                                            this.verifiedMemberText = '<span class="font-bold text-green-800">Verified account!</span> <br> Please use your password in SKMS to login after registration.'
                                            this.disableRegisterButtonClass = 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800'
                                            this.disableRegisterButton = 0
                                        }

                                    }.bind(this))
                                }

                            }else{  
                                this.verifiedMemberClass = 'bg-red-100 rounded-lg py-5 px-6 mb-3 mt-3 text-center text-base text-red-700'
                                this.verifiedMemberText = '<span class="font-bold text-red-800">Email not existing!</span> <br> Please email us here <span class="underline">nrcp1933@gmail.com</a>'
                                this.disableRegisterButtonClass = 'text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center'
                                this.disableRegisterButton = 0
                            }
                        }.bind(this))
                    }else{
                        this.disableRegisterButtonClass = 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800'
                        this.disableRegisterButton = 1
                    }
                } else{

                    if(email != '' && email != null || email != 0){
                        axios.get(APP_URL + '/get_nrcp_member', { params: { email: email } })
                        .then(function (response) {

                            if(response.data.length > 0){
                                const type = response.data[0]['usr_grp_id']
                                const status = response.data[0]['usr_status_id']

                                if(status != 1){
                                    this.activated = false
                                    this.hide = true
                                    this.verifiedMemberClass = 'bg-red-100 rounded-lg py-5 px-6 mb-3 mt-3 text-center text-base text-red-700'
                                    this.verifiedMemberText = '<span class="font-bold text-red-800">Inactive NRCP member account</span> <br> Please email us here <span class="underline">nrcp1933@gmail.com'
                                    this.disableRegisterButtonClass = 'text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center'
                                    this.disableRegisterButton = 1
                                }else if(type == 3 && status == 1){

                                    

                                    axios.get(APP_URL + '/get_registered_users', { params: { email: email } })
                                    .then(function (response) {
                                        if(response.data.length > 0){
                                        
                                            this.activated = false
                                            this.hide = true
                                            this.verifiedMemberClass = 'bg-red-100 rounded-lg py-5 px-6 mb-3 mt-3 text-center text-base text-red-700'
                                            this.verifiedMemberText = '<span class="font-bold text-red-800">Account is already registered!</span> <br> Please use your password in SKMS to login.'
                                            this.disableRegisterButtonClass = 'text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center'
                                            this.disableRegisterButton = 1
                                    
                                        }else{
                                            
                                            this.activated = false
                                            this.hide = true

                                            // enable register button
                                            this.verifiedMemberClass = 'bg-green-100 rounded-lg py-5 px-6 mb-3 mt-3 text-center text-base text-green-700'
                                            this.verifiedMemberText = '<span class="font-bold text-green-800">Verified account!</span> <br> Please select <span class="font-bold">YES</span> in Membership question.'
                                            this.disableRegisterButtonClass = 'text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center'
                                            this.disableRegisterButton = 1
                                        }

                                    }.bind(this))

                                }else{
                                    this.activated = true
                                    this.hide = true
                                    this.disableRegisterButtonClass = 'text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center' 
                                    this.disableRegisterButton = 1
                                }
                            }else{

                            axios.get(APP_URL + '/get_registered_users', { params: { email: email } })
                                    .then(function (response) {
                                        if(response.data.length > 0){
                                        
                                            this.activated = false
                                            this.hide = true
                                            // this.verifiedMemberClass = 'bg-red-100 rounded-lg py-5 px-6 mb-3 mt-3 text-center text-base text-red-700'
                                            this.verifiedMemberClass = 'flex p-4 mt-3 text-base text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800'
                                            this.verifiedMemberText = '<svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg><span class="sr-only">Info</span><span class="font-medium">Email is already in use!</span>'
                                            this.disableRegisterButtonClass = 'text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center'
                                            this.disableRegisterButton = 1
                                    
                                        }else{

                                            this.activated = true
                                            this.hide = true
                                            this.disableRegisterButtonClass = 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800'
                                            this.disableRegisterButton = 0
                                        }

                                    }.bind(this))
                            }
                        }.bind(this))
                    }
                    else{
                        this.activated = true
                        this.hide = true
                        this.disableRegisterButtonClass = 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800'
                        this.disableRegisterButton = 0
                    }
                   
                }
            },
            getSubCategories: function(){
                var cat = this.form.reg_category

                this.form.sub_category = ''
                this.form.sub2_category = ''

                axios.get(APP_URL + '/get_register_sub_library', { params: { id: cat } })
                .then(function (response) {
                    this.results = response.data
                    this.show_res_sub_stake = false
                    this.show_res_sub_manage = false
                }.bind(this))

            },
            getStakeholderSubCategories: function(e){

                this.sub_stake_label = e.target.options[e.target.options.selectedIndex].text;
                
                this.form.sub2_category = ''

                axios.get(APP_URL + '/get_sub_stake', { params: { id: this.form.sub_category } })
                .then(function (response) {
                    this.results_sub_stake = response.data
                    // console.log(response.data)
                    if(response.data.length > 0){

                        this.show_res_sub_stake = true
                    }else{  
                        this.show_res_sub_stake = false
                    }
                }.bind(this))
            },
            getManagementSubCategories: function(e){

                this.sub_manage_label = e.target.options[e.target.options.selectedIndex].text;
                
                this.form.sub2_category = ''

                axios.get(APP_URL + '/get_sub_manage', { params: { id: this.form.sub_category } })
                .then(function (response) {
                    this.results_sub_manage = response.data
                    // console.log(response.data)
                    if(response.data.length > 0){
                        this.show_res_sub_manage = true
                    }else{  
                        this.show_res_sub_manage = false
                    }
                }.bind(this))
            },
            onSubmit: function (event) {
                
                Swal.fire({
                title: 'Are you sure you want to submit?',
                text: "You won't be able to revert this!",
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
                
                            axios.post(APP_URL + '/submit_registration', this.form)
                            .then(response => {
                                //Perform Success Action
                            })
                            .catch((error) => {
                                // error.response.status Check status code
                            }).finally(() => {
                                //Perform action in always
                            });
                                         
                            let timerInterval
                            Swal.fire({
                            title: 'Registration successful!',
                            html: 'You will be redirected to login page',
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
                                window.location.href = APP_URL + '/login';
                            }
                            })
                              
                            
                        }    
                    })
                },
        },
        mounted(){
            

            axios.get(APP_URL + '/get_titles')
            .then(response => {
                this.titles = response.data
            })

            axios.get(APP_URL + '/get_regions')
            .then(response => {
                this.regions = response.data
            })
        }
    }

    
</script>

