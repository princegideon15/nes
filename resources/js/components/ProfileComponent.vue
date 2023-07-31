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

      <div class="grid grid-cols-2 mb-4">
        <div class="rounded-lg border border-dark-800 shadow-lg border-gray-200 bg-white">
          <div class="border-b border-gray-200 dark:border-gray-700">
              <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                  <li class="mr-2" role="presentation">
                      <button 
                      class="inline-block p-4 rounded-t-lg border-b-2 hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 font-semibold" id="account-tab" 
                      data-tabs-target="#account" 
                      type="button" 
                      role="tab" 
                      aria-controls="account" aria-selected="false">Account</button>
                  </li>
                  <li class="mr-2" role="presentation">
                      <button 
                      class="inline-block p-4 rounded-t-lg border-b-2 hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 font-semibold" id="personal-tab" 
                      data-tabs-target="#personal" 
                      type="button" 
                      role="tab" 
                      aria-controls="personal" aria-selected="false">Personal Profile</button>
                  </li>
                  <li class="mr-2" role="presentation">
                      <button 
                      class="inline-block p-4 rounded-t-lg border-b-2 hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 font-semibold" 
                      id="registration-tab" 
                      data-tabs-target="#registration" 
                      type="button" 
                      role="tab" 
                      aria-controls="registration"
                      aria-selected="false">Registration Profile</button>
                  </li>
              </ul>
          </div>

          <div id="myTabContent">
              <div class="hidden p-3 rounded-lg bg-white dark:bg-gray-800" id="account" role="tabpanel" aria-labelledby="account-tab">
                <ValidationObserver v-slot="{ handleSubmit }" >
                    <form class="p-4" @submit.prevent="handleSubmit(updateAccount)" v-for="row in user">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <tbody>
                                <tr class="bg-white dark:bg-gray-800 py-5">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        Email address
                                    </th>
                                    <td class="py-3">
                                        <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" v-bind:value="row.email" readonly>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        New password
                                    </th>
                                    <td class="py-3">
                                        <ValidationProvider name="confirm" rules="required|min:8" v-slot="{ errors }">
                                        <input type="password"  v-model="accountForm.password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••">
                                        <span class="block text-red-600">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        Repeat password
                                    </th>
                                    <td class="py-3">
                                        <ValidationProvider  rules="required|password:@confirm|min:8"  v-slot="{ errors }">
                                        <input type="password" v-model="accountForm.password_confirm" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••">
                                        <span class="block text-red-600">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-right mt-6">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Apply changes</button>
                        </div>
                    </form>
                </ValidationObserver>
              </div>

              <div class="hidden p-3 rounded-lg bg-white dark:bg-gray-800" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                  
                <ValidationObserver v-slot="{ handleSubmit }" >
                    <form class="p-4" @submit.prevent="handleSubmit(updatePersonal)">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <tbody>
                                <tr><td colspan="2">Personal details</td></tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        Title
                                    </th>
                                    <td class="py-3">
                                        <ValidationProvider   rules="required"  v-slot="{ errors }">
                                            <select v-model="personalForm.pp_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="" selected disabled>Select</option>
                                                <option v-for="row in titles" v-bind:value="row.title_id">{{ row.title_name }}</option>
                                            </select>
                                            <span class="block text-red-600">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        Last name
                                    </th>
                                    <td class="py-3">
                                        <ValidationProvider   rules="required"  v-slot="{ errors }">
                                            <input type="text" v-model="personalForm.pp_last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""/>
                                            <span class="block text-red-600">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        Middle name<span class="text-xs font-normal text-gray-900"><br>(optional)</span>
                                    </th>
                                    <td class="py-3">
                                        <input type="text" v-model="personalForm.pp_middle_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""/>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        First name
                                    </th>
                                    <td class="py-3">
                                        <ValidationProvider   rules="required"  v-slot="{ errors }">
                                            <input type="text" v-model="personalForm.pp_first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""/>
                                            <span class="block text-red-600">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        Suffix name<span class="text-xs font-normal text-gray-900"><br>(optional)</span>
                                    </th>
                                    <td class="py-3">
                                        <input type="text" v-model="personalForm.pp_suffix_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ex. Jr., Sr."/>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        Extension<span class="text-xs font-normal text-gray-900"><br>(optional)</span>
                                    </th>
                                    <td class="py-3">
                                        <input type="text" v-model="personalForm.pp_extension" name="extension" id="extension" autocomplete="extension" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ex. MS, PHD"/>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        Age
                                    </th>
                                    <td class="py-3">
                                        <ValidationProvider   rules="required|between:18,100"  v-slot="{ errors }">
                                            <input type="number" v-model="personalForm.pp_age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""/>
                                            <span class="block text-red-600">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        Sex
                                    </th>
                                    <td class="py-3">
                                        <ValidationProvider   rules="required"  v-slot="{ errors }">
                                            <select id="sex" v-model="personalForm.pp_sex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="" selected disabled>Select</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            </select>
                                            <span class="block text-red-600">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </td>
                                </tr>
                                <tr><td colspan="2" class="pt-5">Address details</td></tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        Region
                                    </th>
                                    <td class="py-3">
                                        <ValidationProvider   rules="required"  v-slot="{ errors }">
                                            <select id="region" v-model="personalForm.pp_region" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" @change="getProvinces()">
                                            <option value="">Select here</option>
                                            <option v-for="row in regions" v-bind:value="row.region_id">{{ row.region_name }}</option>
                                            </select>
                                            <span class="block text-red-600">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        Province
                                    </th>
                                    <td class="py-3">
                                        <ValidationProvider   rules="required"  v-slot="{ errors }">
                                            <select id="province" v-model="personalForm.pp_prov" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" @change="getCities()" >
                                            <option value="">Select here</option>
                                            <option v-for="row in provinces" v-bind:value="row.province_id">{{ row.province_name }}</option>
                                            </select>
                                            <span class="block text-red-600">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        City
                                    </th>
                                    <td class="py-3">
                                        <ValidationProvider   rules="required"  v-slot="{ errors }">
                                            <select id="city" v-model="personalForm.pp_city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                            <option value="">Select here</option>
                                            <option v-for="row in cities" v-bind:value="row.city_id">{{ row.city_name }}</option>
                                            </select>
                                            <span class="block text-red-600">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        Barangay
                                    </th>
                                    <td class="py-3">
                                        <ValidationProvider   rules="required"  v-slot="{ errors }">
                                            <input type="text" v-model="personalForm.pp_brgy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
                                            <span class="block text-red-600">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </td>
                                </tr>
                                <tr><td colspan="2"  class="pt-5">Employment details</td></tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        Institution
                                    </th>
                                    <td class="py-3">
                                        <ValidationProvider   rules="required"  v-slot="{ errors }">
                                            <input type="text" v-model="personalForm.pp_ins" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
                                            <span class="block text-red-600">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                        Position
                                    </th>
                                    <td class="py-3">
                                        <ValidationProvider   rules="required"  v-slot="{ errors }">
                                            <input type="text" v-model="personalForm.pp_pos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
                                            <span class="block text-red-600">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-right mt-6">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Apply changes</button>
                        </div>
                    </form>
                </ValidationObserver>
              </div>

              <div class="hidden p-3 rounded-lg bg-white dark:bg-gray-800" id="registration" role="tabpanel" aria-labelledby="registration-tab">
                <div class="p-4">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                    Registered as
                                </th>
                                <td class="py-3">
                                    <select v-model="registrationForm.reg_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" @change='getSubCategories()' disabled>
                                        <option value="" selected disabled>Select</option>
                                        <option value="1">Division Chair</option>
                                        <option value="2">Stakeholder</option>
                                        <option value="3">NRCP Management</option>
                                    </select>
                                </td>
                            </tr>
                            <tr v-if="registrationForm.reg_category == 1" class="bg-white dark:bg-gray-800">
                                <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                    Division
                                </th>
                                <td class="py-3">
                                    <select v-model="registrationForm.sub_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                        <option value=""  selected disabled>Select Division</option>
                                        <option v-for="row in results" v-bind:value="row.divchr_id">Division {{ row.divchr_name }}</option>
                                    </select>
                                </td>
                            </tr>
                            <tr v-if="registrationForm.reg_category == 2" class="bg-white dark:bg-gray-800">
                                <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                    Stakeholder
                                </th>
                                <td class="py-3">
                                     <select v-model="registrationForm.sub_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  @change='getStakeholderSubCategories($event)' disabled>
                                        <option value="" selected disabled>Select Stakeholder</option>
                                        <option v-for="row in results" v-bind:value="row.stk_id">{{ row.stk_name }}</option>
                                    </select>
                                </td>
                            </tr>
                            <tr v-if="registrationForm.reg_category == 3" class="bg-white dark:bg-gray-800">
                                <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                    Management
                                </th>
                                <td class="py-3">
                                    <select v-model="registrationForm.sub_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  @change='getManagementSubCategories($event)' disabled>
                                        <option value="" selected disabled>Select Management</option>
                                        <option v-for="row in results" v-bind:value="row.mgt_id">{{ row.mgt_name }}</option>
                                    </select>
                                </td>
                            </tr>
                            <tr v-if="show_res_sub_stake == true" class="bg-white dark:bg-gray-800">
                                <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                    {{ sub_stake_label }}
                                </th>
                                <td class="py-3">
                                    <select v-model="registrationForm.sub2_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                        <option value="" selected disabled>Select here</option>
                                        <option v-for="row in results_sub_stake" v-bind:value="row.sub_stake_id">{{ row.sub_stake_name }}</option>
                                    </select>
                                </td>
                            </tr>
                            <tr v-if="show_res_sub_manage == true" class="bg-white dark:bg-gray-800">
                                <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white py-3">
                                    {{ sub_manage_label }}
                                </th>
                                <td class="py-3">
                                    <select v-model="registrationForm.sub2_category" class="mt-1 block rounded-md border-gray-300 bg-white py-2 px-3 text-gray-900 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm  md:text-md lg:text-lg border-0 border-b-2 w-full" disabled>
                                        <option value="">Select here</option>
                                        <option v-for="row in results_sub_manage" v-bind:value="row.sub_mgt_id">{{ row.sub_mgt_name }}</option>
                                    </select>
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
                'personalData', 
                'registrationData', 
               ],
      components: {
        ValidationProvider,
        ValidationObserver,
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
                
                accountForm : { 
                    email: '', 
                    password: '',
                    password_confirm: '',
                },

                personalForm: {
                    pp_title: '',
                    pp_first_name: '',
                    pp_middle_name: '',
                    pp_last_name: '',
                    pp_suffix_name: '',
                    pp_extension: '',
                    pp_sex: '',
                    pp_age: '',
                    pp_region: '',
                    pp_prov: '',
                    pp_city: '',
                    pp_brgy: '',
                    pp_ins: '',
                    pp_pos: '',
                },

                registrationForm: {
                    reg_category: '',
                    sub_category: '',
                    sub2_category: '',
                },

                user: [],
                personal: [],
                registration: [],

                
            }
      },
        methods:{
            getProvinces: function(){
                axios.get(APP_URL + '/get_provinces', { params: { id: this.personalForm.pp_region } })
                .then(function (response) {
                    this.provinces = response.data
                }.bind(this))
                
                this.personalForm.province = ''
                this.personalForm.city = ''
                this.cities = []
            },
            getCities: function(){
                axios.get(APP_URL + '/get_cities', { params: { id: this.personalForm.pp_prov } })
                .then(function (response) {
                    this.cities = response.data
                }.bind(this))
            },
            getSubCategories: function(){
                var cat = this.registrationForm.reg_category

                this.registrationForm.sub_category = ''
                this.registrationForm.sub2_category = ''

                axios.get(APP_URL + '/get_register_sub_library', { params: { id: cat } })
                .then(function (response) {
                    this.results = response.data
                    this.show_res_sub_stake = false
                    this.show_res_sub_manage = false
                    console.log
                }.bind(this))

            },
            getStakeholderSubCategories: function(e){

                this.sub_stake_label = e.target.options[e.target.options.selectedIndex].text;
                
                this.registrationForm.sub2_category = ''

                axios.get(APP_URL + '/get_sub_stake', { params: { id: this.registrationForm.sub_category } })
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
                
                this.registrationForm.sub2_category = ''

                axios.get(APP_URL + '/get_sub_manage', { params: { id: this.registrationForm.sub_category } })
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
                
                            axios.post(APP_URL + '/update_account', this.accountForm)
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
            updatePersonal: function (event) {
                
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
                
                            axios.post(APP_URL + '/update_personal', this.personalForm)
                            .then(response => {
                                location.reload()
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
            
            axios.get(APP_URL + '/get_titles')
            .then(response => {
                this.titles = response.data
            })

            axios.get(APP_URL + '/get_regions')
            .then(response => {
                this.regions = response.data
            })
            
            this.user = JSON.parse(JSON.stringify(this.userData))


  
            this.personalData.forEach((value, index) => { 
                this.personalForm.pp_title = value.pp_title
                this.personalForm.pp_first_name = value.pp_first_name
                this.personalForm.pp_middle_name = value.pp_middle_name
                this.personalForm.pp_last_name = value.pp_last_name
                this.personalForm.pp_suffix_name = value.pp_suffix_name
                this.personalForm.pp_extension = value.pp_extension
                this.personalForm.pp_age = value.pp_age
                this.personalForm.pp_sex = value.pp_sex
                this.personalForm.pp_region = value.pp_region
                this.personalForm.pp_prov = value.pp_prov
                this.personalForm.pp_city = value.pp_city
                this.personalForm.pp_brgy = value.pp_brgy
                this.personalForm.pp_ins = value.pp_ins
                this.personalForm.pp_pos = value.pp_pos
                this.getProvinces()
                this.getCities()
            })



            this.registrationData.forEach((value, index) => { 
                this.registrationForm.reg_category = value.reg_category
                // this.registrationForm.reg_category = 2
                
                // if(value.reg_category == 1){
                if(this.registrationForm.reg_category == 1){

                    this.getSubCategories()
                    this.registrationForm.sub_category = value.sub_category
                // }else if(value.reg_category == 2){
                }else if(this.registrationForm.reg_category == 2){

                    
                    this.getSubCategories()
                    this.registrationForm.sub_category = value.sub_category
                    this.getStakeholderSubCategories()
                }else{
                    
                    this.getSubCategories()
                    this.registrationForm.sub_category = value.sub_category
                    this.getManagementSubCategories()
                }
            })
                
        }
}
</script>