<template>
    <div class="p-4 sm:ml-64 mt-14">
        <nav class="flex mb-5 px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                <a :href="baseUrl + '/admin/applications'" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg  class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M3 6a3 3 0 013-3h2.25a3 3 0 013 3v2.25a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm9.75 0a3 3 0 013-3H18a3 3 0 013 3v2.25a3 3 0 01-3 3h-2.25a3 3 0 01-3-3V6zM3 15.75a3 3 0 013-3h2.25a3 3 0 013 3V18a3 3 0 01-3 3H6a3 3 0 01-3-3v-2.25zm9.75 0a3 3 0 013-3H18a3 3 0 013 3V18a3 3 0 01-3 3h-2.25a3 3 0 01-3-3v-2.25z"></path>
                </svg>
                    Applications
                </a>
                </li>
                <li aria-current="page">
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">View Data</span>
                </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 mb-4 border border-gray-200 rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" colspan="2" class="px-6 py-3">
                                    STEP 1: Contact Information
                                </th>
                            </tr>
                        </thead>
                        <tbody v-for="row in contact">
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium-white">
                                    Requesting Institution
                                </th>
                                <td class="px-6 py-4">
                                {{ row.con_ins }}
                                </td>
                            </tr>
                            <tr class="text-xs text-gray-400 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <th scope="row" colspan="2" class="px-6 py-4 font-medium">
                                    Requesting Institution Address
                                </th>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium-white">
                                    Region / Province / City / Barangay
                                </th>
                                <td class="px-6 py-4">
                                {{ regions[row.con_reg - 1] }} , {{ provinces[row.con_prov - 1] }} , {{ cities[row.con_city - 1]}} , {{ row.con_brgy }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium-white">
                                    Address
                                </th>
                                <td class="px-6 py-4">
                                {{ row.con_address }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium-white">
                                    Head of Requesting Institution
                                </th>
                                <td class="px-6 py-4">
                                {{ row.con_head_ins }}
                                </td>
                            </tr>
                            <tr class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <th scope="row" colspan="2" class="px-6 py-4 font-medium dark:text-white">
                                    Focal Person's Details
                                </th>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium-white">
                                    Focal Person
                                </th>
                                <td class="px-6 py-4">
                                {{ row.con_focal_p }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium-white">
                                    Contact Number
                                </th>
                                <td class="px-6 py-4">
                                {{ row.con_contact_num }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium-white">
                                    Contact Address
                                </th>
                                <td class="px-6 py-4">
                                {{ row.con_contact_add }}
                                </td>
                            </tr>
                        </tbody>

                        <tbody v-for="row in activity">
                            <tr class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <th scope="col" colspan="4" class="px-6 py-3">
                                    STEP 2: Type of Activity
                                </th>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium-white">
                                    Activity
                                </th>
                                <td class="px-6 py-4">
                                    
                                    {{ formatActivity(row.act_req_id) }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium-white">
                                    Date of implementation and duration
                                </th>
                                <td class="px-6 py-4">
                                    {{  formatDate(row.act_start) }} - {{  formatDate(row.act_end) }}
                                </td>
                            </tr>
                        </tbody>

                        <tbody v-for="row in objective">
                            <tr class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <th scope="col" colspan="4" class="px-6 py-3">
                                    STEP 3: Objectives
                                </th>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium-white">
                                    Objectives
                                </th>
                                <td class="px-6 py-4">
                                    <ul>
                                        <li>{{ row.obj_1 }}</li>
                                        <li>{{ row.obj_2 }}</li>
                                        <li>{{ row.obj_3 }}</li>
                                        <li>{{ row.obj_4 }}</li>
                                        <li>{{ row.obj_5 }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium-white">
                                    Indicate how gender is integrated in the requested Outreach Activity
                                </th>
                                <td class="px-6 py-4">
                                    {{ row.obj_gender }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium-white">
                                    Indicate what Sustainable Development Goalg/s (SDG/s) is addressed bt the requested Outreach Activity
                                </th>
                                <td class="px-6 py-4">
                                    {{ row.obj_sdg }}
                                </td>
                            </tr>
                        </tbody>
                        
                        <tbody v-for="row in venue">
                            <tr class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <th scope="col" colspan="4" class="px-6 py-3">
                                    STEP 4: Venue Specifications
                                </th>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium-white">
                                    Specifications
                                </th>
                                <td class="px-6 py-4">
                                    {{  formatVenue(row.ven_spec) }}
                                </td>
                            </tr>
                        </tbody>
                        
                        <tbody>
                            <tr class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <th scope="col" colspan="4" class="px-6 py-3">
                                    STEP 5: Participants
                                </th>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium-white">
                                    # of Participants
                                </th>
                                <td class="px-6 py-4">
                                    {{  participant }}
                                </td>
                            </tr>
                        </tbody>
                        
                        <tbody v-for="row in attachment">
                                <tr class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <th scope="col" colspan="4" class="px-6 py-3">
                                        STEP 6: Budget Required
                                    </th>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium-white">
                                        Copy of Line-Item-Budget (LIB)
                                    </th>
                                    <td class="px-6 py-4">
                                        <a v-bind:href="'/storage/attachments/' + row.att_lib"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline" download>{{ row.att_lib }}</a>
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium-white">
                                        Justification Letter
                                    </th>
                                    <td class="px-6 py-4">
                                        <a v-bind:href="'/storage/attachments/' + row.att_justification"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline" download>{{ row.att_justification }}</a>
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium-white">
                                        Official letter of request for NRCP Outreach Program (NOP)
                                    </th>
                                    <td class="px-6 py-4">
                                        <a v-bind:href="'/storage/attachments/' + row.att_req_letter"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline" download>{{ row.att_req_letter }}</a>
                                    </td>
                                </tr>
                            </tbody>
            </table>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="w-full px-4 py-6 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Tracking Status</h5>
                    </div>
                    <div>
                        
                    </div>
                    <div class=" overflow-y-auto h-96 p-1 ">
                        <ol class="relative border-l border-gray-200 dark:border-gray-700">     
                            <li class="mb-8 ml-4" v-for="(row, index) in tracking" >
                                <div v-if="index == 0" class="absolute w-3 h-3 bg-blue-600 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                <div v-else class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{  row.updated_at }}</time>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white">
                                        {{  row.description }}
                                    </span>
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{  row.pp_first_name }} {{  row.pp_last_name }}
                                </p>
                            </li>             
                        </ol>
                    </div>
            </div>
            <div v-if="userRole > 3" class="w-full px-4 py-6 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    
                <div class="block mb-4">
                    <h5 v-if="appStatus == 0 && userRole == 4" class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-1">STEP 1 Process</h5>
                    <h5 v-if="appStatus == 1 && userRole == 10 && appCategory != 2" class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-1">STEP 2A Process</h5>
                    <h5 v-if="appStatus == 1 && userRole == 10 && appCategory == 2" class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-1">STEP 2B Process</h5>
                    <h5 v-if="appStatus == 2 && userRole == 4 && appCategory != 2" class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-1">STEP 3A Process</h5>
                    <h5 v-if="appStatus == 2 && userRole == 4 && appCategory == 2" class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-1">STEP 3B Process</h5>
                    <!-- if 350k+ budget -->
                    <h5 v-if="appStatus == 3 && userRole == 7" class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-1">STEP 5 Process</h5> 
                    <!-- if stakeholder -->
                    <h5 v-if="appStatus == '3B' && userRole == 10" class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-1">STEP 4B Process</h5>
                    <h5 v-if="appStatus == '4B' && userRole == 10" class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-1">STEP 4C Process</h5>
                     <!-- if 350k+ budget -->
                    <h5 v-if="appStatus == 4 && userRole == 8" class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-1">STEP 6 Process</h5>
                    <h5 v-if="appStatus == 5 && userRole == 9" class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-1">STEP 7 Process</h5>
                     <!-- if 350k below budget -->
                    <h5 v-if="appStatus == 6 && userRole == 10" class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-1">STEP 8 Process</h5>
                    <h5 v-if="appStatus == 7 && userRole == 4" class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-1">Finalization and Implementation</h5>
                    <h5 v-if="appStatus == 8 && userRole == 10" class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-1">Post Activity Report</h5>
                    <h5 v-if="appStatus == 9 && userRole == 10" class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-1">Post Activity Report</h5>

                    <p v-if="appStatus == 0 && userRole == 4" class="font-normal text-xs text-gray-900 dark:text-gray-900">For notice of request and additional instructions to STPS focal person within a day.</p>
                    <p v-if="appStatus == 1 && userRole == 10" class="font-normal text-xs text-gray-900 dark:text-gray-900">Process the request and/or proposal received within 2 - 5 days.</p>
                    <p v-if="appStatus == 2 && userRole == 4 && appCategory != 2" class="font-normal text-xs text-gray-900 dark:text-gray-900">For Approval. </p>
                    <p v-if="appStatus == 2 && userRole == 4 && appCategory == 2" class="font-normal text-xs text-gray-900 dark:text-gray-900">Asses appropriateness of the activity design and recommend expert/s who will be part of the activity/ies wihthin 2 days.</p>
                    <p v-if="appStatus == 3 && userRole == 7" class="font-normal text-xs text-gray-900 dark:text-gray-900">Deliberation for appropriate action within 5 - 8 days.</p>
                    <p v-if="appStatus == '3B' && userRole == 10" class="font-normal text-xs text-gray-900 dark:text-gray-900">Assess appropriateness of the activity design and recommend expert/s who will be part of the activities wihtin 2 days.</p>
                    <p v-if="appStatus == '4B' && userRole == 10" class="font-normal text-xs text-gray-900 dark:text-gray-900">Monitor recommend expert/s who will accept or decline the request.</p>
                    <p v-if="appStatus == 4 && userRole == 8" class="font-normal text-xs text-gray-900 dark:text-gray-900">Deliberation for appropriate action within 2 days.</p>
                    <p v-if="appStatus == 5 && userRole == 9" class="font-normal text-xs text-gray-900 dark:text-gray-900">Inclusion to the GB Agenda for deliberation and appropriate action within 2 days.</p>
                    <p v-if="appStatus == 6 && userRole == 10" class="font-normal text-xs text-gray-900 dark:text-gray-900">Process the Approved/Disapproved request within 2 - 5 days.</p>
                    <p v-if="appStatus == 7 && userRole == 4" class="font-normal text-xs text-gray-900 dark:text-gray-900">For Approval and Implementation.</p>
                    <p v-if="appStatus == 8 && userRole == 10" class="font-normal text-xs text-gray-900 dark:text-gray-900">Report including the results of CSF 2 - 3 days.</p>
                    
                </div>

                <!-- STEP 1 -->
                <ValidationObserver v-slot="{ handleSubmit }" >
                <form v-if="appStatus == 0 && userRole == 4" @submit.prevent="handleSubmit(processStep1)">
                    <div class="mb-6">
                        <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Remarks</label>
                        <textarea v-model="form.app_remarks" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Optional"></textarea>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Endorse to RIDD-IDS</button>
                </form>
                </ValidationObserver>

                <!-- STEP 2A -->
                <ValidationObserver v-slot="{ handleSubmit }" >
                    <form v-if="appStatus == 1 && userRole == 10  && appCategory != 2" @submit.prevent="handleSubmit(processStep2A)">
                        <h3 class="mb-3 font-semibold text-gray-900 dark:text-white">Evaluation Results</h3>
                           
                                <input refs="eva_evaluation_results" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment1Step2($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                                <span v-if="form2_check_att1_error != ''" class="block text-red-600">{{  form2_check_att1_error }}</span>  
                           
                            
                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">Activity Design</h3>
                            
                                <input refs="eva_activity_design" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment2Step2($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                                <span v-if="form2_check_att2_error != ''" class="block text-red-600">{{  form2_check_att2_error }}</span>  
                           

                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">Program</h3>
                            
                                <input refs="eva_program" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment3Step2($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                                <span v-if="form2_check_att3_error != ''" class="block text-red-600">{{  form2_check_att3_error }}</span>  
                           
                            
                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">Mechanics</h3>
                            
                                <input refs="eva_mechanics" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment4Step2($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                                <span v-if="form2_check_att4_error != ''" class="block text-red-600">{{  form2_check_att4_error }}</span>  
                           
                            
                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">LIB</h3>
                            
                                <input refs="eva_lib" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment5Step2($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                                <span v-if="form2_check_att5_error != ''" class="block text-red-600">{{  form2_check_att5_error }}</span>  
                           
                            
                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">Draft Endorsement Letter</h3>
                            
                                <input refs="eva_endo_letter" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment6Step2($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                                <span v-if="form2_check_att6_error != ''" class="block text-red-600">{{  form2_check_att6_error }}</span>  
                           
                        <div class="mb-6 mb-6 mt-4">
                            <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Remarks</label>
                            <textarea v-model="form2.eva_remarks" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Optional"></textarea>
                        </div>
                        
                        <button type="submit" class="mt-4 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Endorse to OED</button>
                    </form>
                </ValidationObserver>
            
                <!-- STEP 2B -->
                <ValidationObserver v-slot="{ handleSubmit }" >
                    <form v-if="appStatus == 1 && userRole == 10 && appCategory == 2" @submit.prevent="handleSubmit(processStep2B)">
                        <h3  class="mb-3 font-semibold text-gray-900 dark:text-white">Drasft Acknowledgement Letter</h3>
                            
                            <input refs="eva_draft" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment1Step2B($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                            <span v-if="form2_check_att1_error != ''" class="block text-red-600">{{  form2_check_att1_error }}</span>  
                       
                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">Evaluation Results</h3>
                            
                                <input refs="eva_evaluation_results" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment1Step2($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                                <span v-if="form2_check_att2_error != ''" class="block text-red-600">{{  form2_check_att2_error }}</span>  
                           
                            
                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">Activity Design</h3>
                            
                                <input refs="eva_activity_design" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment2Step2($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                                <span v-if="form2_check_att3_error != ''" class="block text-red-600">{{  form2_check_att3_error }}</span>  
                           

                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">Program</h3>
                            
                                <input refs="eva_program" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment3Step2($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                                <span v-if="form2_check_att4_error != ''" class="block text-red-600">{{  form2_check_att4_error }}</span>  
                           
                            
                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">Mechanics</h3>
                            
                                <input refs="eva_mechanics" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment4Step2($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                                <span v-if="form2_check_att5_error != ''" class="block text-red-600">{{  form2_check_att5_error }}</span>  
                                
                            
                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">LIB</h3>
                            
                            <input refs="eva_lib" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment5Step2($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                            <span v-if="form2_check_att6_error != ''" class="block text-red-600">{{  form2_check_att6_error }}</span>  
                   
                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">Draft Endorsement Letter</h3>
                            
                                <input refs="eva_endo_letter" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment6Step2($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                                <span v-if="form2_check_att7_error != ''" class="block text-red-600">{{  form2_check_att7_error }}</span>  
                           
                        <div class="mb-6 mb-6 mt-4">
                            <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Remarks</label>
                            <textarea v-model="form2.eva_remarks" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Optional"></textarea>
                        </div>
                        
                        <button type="submit" class="mt-4 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Endorse to OED</button>
                    </form>
                </ValidationObserver>

                <!-- STEP 3A -->
                <form v-if="appStatus == 2  && userRole == 4 && appCategory != 2">
                    <div v-for="row in eva_a_att">
                        <h4 class="mb-2 font-semibold text-gray-900 dark:text-white">Uploaded Attachments:</h4>
                         
                        <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/evaluation_a/' + row.eva_evaluation_results"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline" download>{{ row.eva_evaluation_results }}</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/evaluation_a/' +row.eva_activity_design" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.eva_activity_design }}</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/evaluation_a/' +row.eva_program" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.eva_program }}</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/evaluation_a/' +row.eva_mechanics" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.eva_mechanics }}</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/evaluation_a/' +row.eva_lib" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.eva_lib }}</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/evaluation_a/' +row.eva_endo_letter" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.eva_endo_letter }}</a>
                            </li>
                        </ul>

                        <button type="button" class="mt-3 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium text-xs px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 px-3 py-2" @click="downloadAllAttachments('A', _token, _uid)">Download all</button>
                    </div>
                    <div class="mb-6 mt-4">
                        <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Remarks</label>
                        <textarea v-model="form3.app_remarks" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Optional"></textarea>
                    </div>
                    
                    <div class="flex items-center justify-center">
                        <button @click="processStep3(0)" type="button" class="w-full text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Disapprove</button>
                        <button @click="processStep3(1)" type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Approve</button>
                    </div>
                </form>

                <!-- STEP 3B -->
                <form v-if="appStatus == 2  && userRole == 4 && appCategory == 2">
                    <div v-for="row in eva_b_att">
                        <h4 class="mb-2 font-semibold text-gray-900 dark:text-white">Uploaded Attachments:</h4>
                        <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/evaluation_b/' +row.eva_draft" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" >{{ row.eva_draft }}</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/evaluation_b/' +row.eva_evaluation_results" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" >{{ row.eva_evaluation_results }}</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/evaluation_b/' +row.eva_activity_design" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.eva_activity_design }}</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/evaluation_b/' +row.eva_program" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.eva_program }}</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/evaluation_b/' +row.eva_mechanics" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.eva_mechanics }}</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/evaluation_b/' +row.eva_lib" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.eva_lib }}</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/evaluation_b/' +row.eva_endo_letter" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.eva_endo_letter }}</a>
                            </li>
                        </ul>
                    </div>

                    <button type="button" class="mt-3 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium text-xs px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 px-3 py-2" @click="downloadAllAttachments('B', _token, _uid)">Download all</button>

                    <div class="mb-6 mt-4">
                        <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Remarks</label>
                        <textarea v-model="form3.app_remarks" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Optional"></textarea>
                    </div>
                    
                    <div class="flex items-center justify-center">
                        <button @click="processStep3(0)" type="button" class="w-full text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Disapprove</button>
                        <button @click="processStep3(1)" type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Approve</button>
                    </div>
                </form>

                <!-- STEP 4B -->
                <ValidationObserver v-slot="{ handleSubmit }" >
                    <form v-if="appStatus == '3B' && userRole == 10" @submit.prevent="handleSubmit(processStep4B)">

                                <div class="mb-6">
                                    <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Expert Name/Expertise</label>
                                    <ValidationProvider rules="required" v-slot="{ errors }">
                                        <multiselect placeholder="Search by Name/Expertise"
                                                v-model="form4b.value"
                                                :options="form4b.options"
                                                :options-limit="50"
                                                :limit="10"
                                                open-direction="bottom" 
                                                :close-on-select="false" 
                                                :clear-on-select="false"
                                                :multiple="true"
                                                :preserve-search="true"
                                                :showPointer="true"
                                                label="display" 
                                                track-by="display"
                                            ></multiselect>
                                        <span class="block text-red-600">{{ errors[0] }}</span>
                                    </ValidationProvider>    
                                </div>
                                <div class="mb-6 mt-4">
                                    <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Remarks</label>
                                    <textarea v-model="form4b.app_remarks" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Optional"></textarea>
                                </div>
                    
                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit Recommended Expert/s</button>
                            </form>
                    
                </ValidationObserver>

                <!-- STEP 4C -->
                <ValidationObserver v-slot="{ handleSubmit }" >
                    <form v-if="appStatus == '4B' && userRole == 10" @submit.prevent="handleSubmit(processStep4C)">
                        <div class="mb-6">
                                <div class=" overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <!-- <th scope="col" class="p-4">
                                                    #
                                                </th> -->
                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Expertise/s
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Status
                                                </th>
                                                <th scope="col" class="px-6 py-3 w-1/2">
                                                    Date
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(row, index) in recoExperts"  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <!-- <td class="text-dark">
                                                    {{  index + 1 }}
                                                </td> -->
                                                <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                    <div class="">
                                                        <div class="text-base font-semibold">{{ row.exp_name }}</div>
                                                        <div class="font-normal text-gray-500">{{  row.exp_email }}</div>
                                                    </div>  
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{  row.exp_expertise }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <span v-if="row.exp_status == 0" class="bg-gray-100 w-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-400 border border-gray-500">Pending</span>

                                                    <span v-else-if="row.exp_status == 1" class="bg-green-100 w-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Accepted</span>

                                                    <span v-else class="bg-red-100 w-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Declined</span>

                                                </td>
                                                <td class="px-6 py-4 w-1/2 whitespace-nowrap">
                                                    <span v-if="row.exp_status > 0">{{  formatDate(row.updated_at) }}</span> 
                                                    <span v-else="row.exp_status = 0">{{  formatDate(row.created_at) }} {{ daysAgo(row.created_at) }}</span> 
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                        
                        <div id="accordion-arrow-icon" data-accordion="open">
                            <h2 id="accordion-arrow-icon-heading-1">
                                <button type="button" class="inline-flex items-center w-full p-3 font-medium text-left text-gray-900 bg-gray-100 border border-gray-200 rounded focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-arrow-icon-body-1" aria-expanded="true" aria-controls="accordion-arrow-icon-body-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5zm8.25-3.75a.75.75 0 01.75.75v2.25h2.25a.75.75 0 010 1.5h-2.25v2.25a.75.75 0 01-1.5 0v-2.25H7.5a.75.75 0 010-1.5h2.25V7.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                                    </svg>
                                    Add more expert/s if needed
                                </button>
                            </h2>
                            <div id="accordion-arrow-icon-body-1" aria-labelledby="accordion-arrow-icon-heading-1">
                                <div class="p-5 border border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                    <form @submit.prevent="handleSubmit(addMoreExperts)">
                                        <div class="mb-6">
                                        <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Expert Name/Expertise</label>
                                                <multiselect placeholder="Search by Name/Expertise"
                                                        v-model="form4c.value"
                                                        :options="form4b.options"
                                                        :options-limit="50"
                                                        :limit="10"
                                                        open-direction="bottom" 
                                                        :close-on-select="false" 
                                                        :clear-on-select="false"
                                                        :multiple="true"
                                                        :preserve-search="true"
                                                        :showPointer="true"
                                                        label="display" 
                                                        track-by="display"
                                                    ></multiselect>
                                        </div>
                                        <button type="submit" class="w-full text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Send Request</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6 mt-4">
                            <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Remarks</label>
                            <textarea v-model="form4c.app_remarks" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Optional"></textarea>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                           <span v-if="appBudget > 35000">Endorse to NES Linakges and Outreach Program Committee</span>
                           <span v-else>Approve</span>
                        </button>
                    </form>
                </ValidationObserver>

                <!-- STEP 5 -->
                <form v-if="appStatus == 3 && userRole == 7">
                    <div class="mb-6">
                        <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Remarks</label>
                        <textarea v-model="form5.app_remarks" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Optional"></textarea>
                    </div>
                    
                    <div class="flex items-center justify-center">
                        <button @click="processStep5(0)" type="button" class="w-full text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Disapprove</button>
                        <button @click="processStep5(1)" type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Approve</button>
                    </div>
                </form>

                <div v-if="appStatus != 3 && userRole == 7">
                    <div class="flex items-center" >
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ml-2 text-md font-medium">
                        No actions available.
                        </div>
                    </div>
                </div>

                <!-- STEP 6 -->
                <form v-if="appStatus == 4 && userRole == 8">
                    <div class="mb-6">
                        <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Remarks</label>
                        <textarea v-model="form6.app_remarks" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Optional"></textarea>
                    </div>
                    
                    <div class="flex items-center justify-center">
                        <button @click="processStep6(0)" type="button" class="w-full text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Disapprove</button>
                        <button @click="processStep6(1)" type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Approve</button>
                    </div>
                </form>

                <div v-if="appStatus != 4 && userRole == 8">
                    <div class="flex items-center" >
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ml-2 text-md font-medium">
                        No actions available.
                        </div>
                    </div>
                </div>

                <!-- STEP 7 -->
                <form v-if="appStatus == 5 && userRole == 9">
                    <div class="mb-6">
                        <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Remarks</label>
                        <textarea v-model="form7.app_remarks" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Optional"></textarea>
                    </div>
                    
                    <div class="flex items-center justify-center">
                        <button @click="processStep7(0)" type="button" class="w-full text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Disapprove</button>
                        <button @click="processStep7(1)" type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Approve</button>
                    </div>
                </form>

                <div v-if="appStatus != 5 && userRole == 9">
                    <div class="flex items-center" >
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ml-2 text-md font-medium">
                        No actions available.
                        </div>
                    </div>
                </div>
              
                <!-- STEP 8 -->
                <ValidationObserver v-slot="{ handleSubmit }" >
                    <form v-if="appStatus == 6 && userRole == 10" @submit.prevent="handleSubmit(processStep8A)">
                    
                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">Draft Communication Letter</h3>
                            
                            <input refs="fin_draft" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment1Step8A($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                            
                            <span v-if="form8_check_att1_error != ''" class="block text-red-600">{{  form8_check_att1_error }}</span>  
                            
                            
                        <h3 class="mb-3 font-semibold text-gray-900 dark:text-white">Activity Design</h3>
                            
                            <input refs="fin_activity_design" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment2Step8A($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                            
                            <span v-if="form8_check_att2_error != ''" class="block text-red-600">{{  form8_check_att2_error }}</span>  
                            
                            
                            
                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">Program</h3>
                            
                            <input refs="fin_program" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment3Step8A($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                        
                            <span v-if="form8_check_att3_error != ''" class="block text-red-600">{{  form8_check_att3_error }}</span>  
                            
                            

                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">Mechanics</h3>
                            
                            <input refs="fin_mechanics" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment4Step8A($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                            
                            <span v-if="form8_check_att4_error != ''" class="block text-red-600">{{  form8_check_att4_error }}</span>  
                            
                            
                            
                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">Promotional Materials (Optional)</h3>
                            
                            <input refs="fin_promo_materials" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment5Step8A($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                            
                            <span v-if="form8_check_att5_error != ''" class="block text-red-600">{{  form8_check_att5_error }}</span>  
                            
                            
                            
                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">Invitation Letters</h3>
                            
                            <input refs="fin_invi_letter" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment6Step8A($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                            
                            <span v-if="form8_check_att6_error != ''" class="block text-red-600">{{  form8_check_att6_error }}</span>  
                            
           
                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">Other related collaterals (Optional)</h3>
                            
                            <input refs="fin_collaterals" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment9Step8A($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                            
                            <span v-if="form8_check_att7_error != ''" class="block text-red-600">{{  form8_check_att7_error }}</span>  
                            
                            
                            
                        <div class="mb-6 mt-4">
                            <label for="app_remarks" class="block mb-2 font-semibold text-gray-900 dark:text-white">Remarks</label>
                            <textarea v-model="form8.fin_remarks" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Optional"></textarea>
                        </div>
                        
                    
                    <button type="submit" class="mt-4 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Endorse to OED</button>
                    </form>
                </ValidationObserver>

                <!-- STEP 9 -->
                <form v-if="appStatus == 7  && userRole == 4">
                    <div v-for="row in fin_a_att">
                        <h4 class="mb-2 font-semibold text-gray-900 dark:text-white">Uploaded Attachments:</h4>
                        <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/finalization_a/' +row.fin_draft" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" >{{ row.fin_draft }}</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/finalization_a/' +row.fin_activity_design" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.fin_activity_design }}</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/finalization_a/' +row.fin_program" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.fin_program }}</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/finalization_a/' +row.fin_mechanics" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.fin_mechanics }}</a>
                            </li>
                            <li v-if="row.fin_promo_materials != ''" class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/finalization_a/' +row.fin_promo_materials" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.fin_promo_materials }}</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/finalization_a/' +row.fin_invi_letter" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.fin_invi_letter }}</a>
                            </li>
                            <!-- <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/finalization_a/' +row.fin_travel_doc" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.fin_travel_doc }}</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/finalization_a/' +row.fin_csf" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.fin_csf }}</a>
                            </li> -->
                            <li v-if="row.fin_promo_materials != ''" class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/finalization_a/' +row.fin_collaterals" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.fin_collaterals }}</a>
                            </li>
                        </ul>
                    </div>

                    <button type="button" class="mt-3 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium text-xs px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 px-3 py-2" @click="downloadAllAttachments('FA', _token, _uid)">Download all</button>

                    <div class="mb-6 mt-4">
                        <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Remarks</label>
                        <textarea v-model="form9.app_remarks" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Optional"></textarea>
                    </div>
                    
                    <div class="flex items-center justify-center">
                        <button @click="processStep9(0)" type="button" class="w-full text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Disapprove</button>
                        <button @click="processStep9(1)" type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Approve</button>
                    </div>
                </form>

                <div v-if="appStatus != 2 && appStatus != 0 && appStatus != 7 && userRole == 4">
                    <div class="flex items-center" >
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ml-2 text-md font-medium">
                        No actions available.
                        </div>
                    </div>
                </div>

                <!-- STEP 10 -->
                <form v-if="appStatus == 8  && userRole == 10">
                    
                    <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">Travel documents (Optional)</h3>
                            
                            <input refs="post_travel_docs" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment1Step10($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                            
                            <span v-if="form10_check_att1_error != ''" class="block text-red-600">{{  form10_check_att1_error }}</span>  
                            
                            
                            
                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">Customer Satisfcation Form (Optional)</h3>
                            
                            <input refs="post_csf" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment2Step10($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                            
                            <span v-if="form10_check_att2_error != ''" class="block text-red-600">{{  form10_check_att2_error }}</span>  
                            
                        <h3 class="mb-3 mt-4 font-semibold text-gray-900 dark:text-white">GB Resolution (Optional)</h3>
                        
                            <input refs="post_gb_res" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment3Step10($event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >DOC, DOCx (MAX. 25MB)</p>
                            
                            <span v-if="form10_check_att3_error != ''" class="block text-red-600">{{  form10_check_att3_error }}</span>  

                    <div class="mb-6 mt-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks</label>
                        <textarea v-model="form10.app_remarks" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Optional"></textarea>
                    </div>
                    
                   
                    <button @click="processStep10()" type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

                <div v-if="appStatus !='3B' && appStatus != '4B' && appStatus != 1 && appStatus != 6  && appStatus != 8 && appStatus != 9 && userRole == 10">
                    <div class="flex items-center" >
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ml-2 text-md font-medium">
                        No actions available.
                        </div>
                    </div>
                </div>

                 <!-- POST ACTIVITY REPORT -->
                <div v-if="appStatus == 9  && userRole == 10" v-for="row in post_rep_att">
                    <div v-if="row.post_travel_docs != null || row.post_csf != null || row.post_gb_res != null">
                        <h4 class="mb-2 font-semibold text-gray-900 dark:text-white">Uploaded Attachments:</h4>
                        <ul class="w-full space-y-1 text-gray-500 list-inside dark:text-gray-400">
                            <li v-if="row.post_travel_docs != null" class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/post_activity_report/' +row.post_travel_docs" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" >{{ row.post_travel_docs }}</a>
                            </li>
                            <li v-if="row.post_csf != null" class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/post_activity_report/' +row.post_csf" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.post_csf }}</a>
                            </li>
                            <li v-if="row.post_gb_res != null" class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <a v-bind:href="'/storage/post_activity_report/' +row.post_gb_res" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ row.post_gb_res }}</a>
                            </li>
                        </ul>

                        <button type="button" class="mt-3 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium text-xs px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 px-3 py-2" @click="downloadAllAttachments('PAR', _token, _uid)">Download all</button>
                    </div> 
                     <div v-else>
                        No uploaded attachments.
                    </div>

                    <!-- <div v-if="row.post_remarks != NULL || row.post_remarks != ''" class="mb-6 mt-4">
                        <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Remarks</label>
                        <span>{{ row.post_remarks }}</span>
                    </div> -->
                </div>


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



<!-- <ValidationObserver v-slot="{ handleSubmit }" >
                    <form v-if="appStatus == '3B' && userRole == 10" @submit.prevent="handleSubmit(processStep4B)">
                        <div class="mb-6">
                            <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Expert Needed</label>
                            <ValidationProvider rules="required" v-slot="{ errors }">
                                <input type="text" v-model="form4b.neep_req_needed" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type expertise here (separate by comma if multiple)">
                                <span class="block text-red-600">{{ errors[0] }}</span>
                            </ValidationProvider>
                        </div>
                        <div class="mb-6 mt-4">
                            <label class="block mb-2 font-semibold text-gray-900 dark:text-white">No. of Exepert Needed</label>
                            <ValidationProvider rules="required" v-slot="{ errors }">
                                <input type="number" min="1" v-model="form4b.neep_req_expert_needed" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type number here">
                                <span class="block text-red-600">{{ errors[0] }}</span>
                            </ValidationProvider>
                        </div>
                        <div class="mb-6 mt-4">
                            <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Purpose</label>
                            <ValidationProvider rules="required" v-slot="{ errors }">
                                <input type="text" v-model="form4b.neep_req_purpose" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type expertise here (separate by comma if multiple)">
                                <span class="block text-red-600">{{ errors[0] }}</span>
                            </ValidationProvider>
                        </div>
                        <div class="mb-6 mt-4">
                            <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Details of the Purpose</label>
                            <ValidationProvider rules="required" v-slot="{ errors }">
                                <textarea v-model="form4b.neep_req_msg" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Optional"></textarea>
                                <span class="block text-red-600">{{ errors[0] }}</span>
                            </ValidationProvider>
                        </div>
                        
                        <h3 class="mb-3 font-semibold text-gray-900 dark:text-white">Upload Request Letter</h3>
                                
                                <input refs="neep_req_letter" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" @change="validateFileAttachment1Step4b($event)" accept=".pdf,application/pdf">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" >PDF (MAX. 500KB)</p>
                                <span v-if="form4b_check_att1_error != ''" class="block text-red-600">{{  form4b_check_att1_error }}</span> 

                        <div class="mb-6 mt-4">
                            <label class="block mb-2 font-semibold text-gray-900 dark:text-white">Remarks</label>
                            <textarea v-model="form4b.app_remarks" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Optional"></textarea>
                        </div>
                        
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit to NEEP</button>
                    </form>
                </ValidationObserver> -->

</template>

<script>

import { ValidationProvider, ValidationObserver, extend } from 'vee-validate'
import { required, email, between } from 'vee-validate/dist/rules'
import 'sweetalert2/src/sweetalert2.scss'
import 'flowbite'
import moment from 'moment'
import Swal from 'sweetalert2/dist/sweetalert2.js'
  import Multiselect from 'vue-multiselect'



extend('required', {
  ...required,
  message: 'Required'
}); 

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
                'roleData',
                'statusData',
                'categoryData',
                'evaaData',
                'evabData',
                'finaData',
                'budgetData',
                'postactrepData',
                'membersData',
                'expertsData',
               ],
        components: {
            ValidationProvider,
            ValidationObserver,
            Multiselect 
            
        },
        data () {
            return {
                //baseUrl: window.location.origin + '/nrcpoutreach', // for server only
                baseUrl: '',
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                contact : [],
                activity : [],
                objective : [],
                venue : [],
                participant : '',
                attachment : [],
                regions: [],
                provinces: [],
                cities: [],
                activities: [],
                venues: [],
                tracking: [],
                userRole: '',
                appStatus: '',
                appCategory: '',
                appBudget: '',

                // global
                _href : '',
                _stps : '',
                _token : '',
                _uid : '',

                // process 1
                form: 
                {
                    app_remarks:'',
                },
                
                // process 2
                form2:
                {
                    eva_draft: '',
                    eva_evaluation_results: '',
                    eva_activity_design: '',
                    eva_program: '',
                    eva_mechanics: '',
                    eva_lib: '',
                    eva_endo_letter: '',
                    eva_remarks: '',
                },
                
                form2_check_att1_error: '',
                form2_check_att2_error: '',
                form2_check_att3_error: '',
                form2_check_att4_error: '',
                form2_check_att5_error: '',
                form2_check_att6_error: '',
                form2_check_att7_error: '',

                eva_a_att: [],
                eva_b_att: [],

                // process 3
                form3:
                {
                    app_remarks:''
                },
                
                // process 4
                // form4:
                // {
                //     app_remarks:''
                // },

                // process 4b
                form4b:
                {
                    // neep_req_needed:'',
                    // neep_req_expert_needed:'',
                    // neep_req_purpose: '',
                    // neep_req_msg: '',
                    // neep_req_letter:'',
                    value: [],
                    options: [],
                    experts: null,
                    app_remarks:'',
                },

                form4b_check_att1_error:'',

                // process 4c
                form4c:
                {
                    value: [],
                    app_remarks:'',
                },

                recoExperts: [],

                // process 5
                form5:
                {
                    app_remarks:''
                },

                // process 6
                form6:
                {
                    app_remarks:''
                },

                // process 7
                form7:
                {
                    app_remarks:''
                },
                
                // process 8
                form8:
                {
                    fin_draft: '',
                    fin_activity_design: '',
                    fin_program: '',
                    fin_mechanics: '',
                    fin_promo_materials: '',
                    fin_invi_letter: '',
                    fin_collaterals: '',
                    fin_remarks: '',
                },

                fin_a_att: [],

                form8_check_att1_error: '',
                form8_check_att2_error: '',
                form8_check_att3_error: '',
                form8_check_att4_error: '',
                form8_check_att5_error: '',
                form8_check_att6_error: '',
                form8_check_att7_error: '',

                // process 9
                form9:
                {
                    app_remarks:''
                },

                // process 10
                form10:
                {
                    post_travel_docs: '',
                    post_csf: '',
                    post_gb_res: '',
                    post_remarks:''
                },
                
                post_rep_att: [],

                form10_check_att1_error: '',
                form10_check_att2_error: '',
                form10_check_att3_error: '',

                // directories
                evaaDir: '',
            };
        },
        methods:{
            // process 10
            processStep10: function(value){
                
                if(this.form10.post_travel_docs != ''){
                    this.form10_check_att1_error = (this.form10.post_travel_docs[0].size > 25000000) ? 'File size exceeds limit' : (this.form10.post_travel_docs[0].type != 'application/msword'  && this.form10.post_travel_docs[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form10.post_csf != ''){
                    this.form10_check_att2_error = (this.form10.post_csf[0].size > 25000000) ? 'File size exceeds limit' : (this.form10.post_csf[0].type != 'application/msword'  && this.form10.post_csf[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form10.post_gb_res != ''){
                    this.form10_check_att3_error = (this.form10.post_gb_res[0].size > 25000000) ? 'File size exceeds limit' : (this.form10.post_gb_res[0].type != 'application/msword'  && this.form10.post_gb_res[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form10_check_att1_error == '' && this.form10_check_att2_error == '' && this.form10_check_att3_error == '' ){

                    Swal.fire({
                    title: 'Submit Post Activity Report',
                    text: "You won't be able to make changes after proceeding.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#4f46e5',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Proceed',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                    }).then((result) => {  
                            if (result.isConfirmed==true) {
                                

                                var formData = new FormData();
                                formData.append('post_remarks', this.form10.post_remarks)
                                formData.append('app_stps_id', this._stps)
                                formData.append('app_form_token', this._token)
                                formData.append('app_usr_id', this._uid)
                                formData.append('post_travel_docs', this.form10.post_travel_docs[0]);
                                formData.append('post_csf', this.form10.post_csf[0]);
                                formData.append('post_gb_res', this.form10.post_gb_res[0]);

                                axios.post(APP_URL + '/process_step10', formData)
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
                                title: 'Post Activity Report Submitted!',
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
                                }
                                }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    console.log('I was closed by the timer')
                                }
                                })
                        }    
                    })
                }

                

            },
            validateFileAttachment1Step10: function(event){
            this.form10.post_travel_docs = event.target.files || event.dataTransfer.files;
            },
            validateFileAttachment2Step10: function(event){
            this.form10.post_csf = event.target.files || event.dataTransfer.files;
            },
            validateFileAttachment3Step10: function(event){
            this.form10.post_gb_res = event.target.files || event.dataTransfer.files;
            },
            // process 9
            processStep9: function(value){
                

                var action = (value == 1) ? 'Approve?' : 'Disapprove?'
                var formData = new FormData();
                formData.append('app_remarks', this.form9.app_remarks)
                formData.append('app_stps_id', this._stps)
                formData.append('app_form_token', this._token)
                formData.append('app_usr_id', this._uid)
                formData.append('app_status', value)

                
                Swal.fire({
                    title: 'Finalization and Implementation: ' + action,
                    text: "You won't be able to make changes after proceeding.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#4f46e5',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Proceed',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                    }).then((result) => {  
                            if (result.isConfirmed==true) {
                                axios.post(APP_URL + '/process_step9', formData)
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
                                title: 'STEP 9 Process Submitted!',
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
            // process 8
            processStep8A: function(){

                if(this.form8.fin_draft == ''){
                    this.form8_check_att1_error = 'Required' 
                }else{
                    this.form8_check_att1_error = (this.form8.fin_draft[0].size > 25000000) ? 'File size exceeds limit' : (this.form8.fin_draft[0].type != 'application/msword'  && this.form8.fin_draft[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form8.fin_activity_design == ''){
                    this.form8_check_att2_error = 'Required' 
                }else{
                    this.form8_check_att2_error = (this.form8.fin_activity_design[0].size > 25000000) ? 'File size exceeds limit' : (this.form8.fin_activity_design[0].type != 'application/msword'  && this.form8.fin_activity_design[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form8.fin_program == ''){
                    this.form8_check_att3_error = 'Required' 
                }else{
                    this.form8_check_att3_error = (this.form8.fin_program[0].size > 25000000) ? 'File size exceeds limit' : (this.form8.fin_program[0].type != 'application/msword'  && this.form8.fin_program[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form8.fin_mechanics == ''){
                    this.form8_check_att4_error = 'Required' 
                }else{
                    this.form8_check_att4_error = (this.form8.fin_mechanics[0].size > 25000000) ? 'File size exceeds limit' : (this.form8.fin_mechanics[0].type != 'application/msword'  && this.form8.fin_mechanics[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form8.fin_promo_materials != ''){
                    this.form8_check_att5_error = (this.form8.fin_promo_materials[0].size > 25000000) ? 'File size exceeds limit' : (this.form8.fin_promo_materials[0].type != 'application/msword'  && this.form8.fin_promo_materials[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form8.fin_invi_letter == ''){
                    this.form8_check_att6_error = 'Required' 
                }else{
                    this.form8_check_att6_error = (this.form8.fin_invi_letter[0].size > 25000000) ? 'File size exceeds limit' : (this.form8.fin_invi_letter[0].type != 'application/msword'  && this.form8.fin_invi_letter[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form8.fin_collaterals != ''){
                    this.form8_check_att7_error = (this.form8.fin_collaterals[0].size > 25000000) ? 'File size exceeds limit' : (this.form8.fin_collaterals[0].type != 'application/msword'  && this.form8.fin_collaterals[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form8_check_att1_error == '' && this.form8_check_att2_error == '' && this.form8_check_att3_error == '' && this.form8_check_att4_error == '' && this.form8_check_att5_error == '' && this.form8_check_att6_error == '' && this.form8_check_att7_error == ''){
                    Swal.fire({
                    title: 'STEP 8 Process: Submit to OED for approval?',
                    text: "You won't be able to make changes after proceeding.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#4f46e5',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Proceed',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                    }).then((result) => {  
                            if (result.isConfirmed==true) {

                                const formData = new FormData();
                                formData.append('fin_draft', this.form8.fin_draft[0]);
                                formData.append('fin_activity_design', this.form8.fin_activity_design[0]);
                                formData.append('fin_program', this.form8.fin_program[0]);
                                formData.append('fin_mechanics', this.form8.fin_mechanics[0]);
                                formData.append('fin_promo_materials', this.form8.fin_promo_materials[0]);
                                formData.append('fin_invi_letter', this.form8.fin_invi_letter[0]);
                                formData.append('fin_collaterals', this.form8.fin_collaterals[0]);
                                formData.append('app_stps_id', this._stps);
                                formData.append('app_form_token', this._token);
                                formData.append('app_usr_id', this._uid);
                                formData.append('fin_remarks', this.form8.fin_remarks);

                                axios.post(APP_URL + '/process_step8A', formData)
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
                                title: 'STEP 8 Process Submitted!',
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
                                }
                                }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    console.log('I was closed by the timer')
                                }
                                })
                        }    
                    })

                }
            },
            validateFileAttachment1Step8A: function(event){
            this.form8.fin_draft = event.target.files || event.dataTransfer.files;
            },
            validateFileAttachment2Step8A: function(event){
            this.form8.fin_activity_design = event.target.files || event.dataTransfer.files;
            },
            validateFileAttachment3Step8A: function(event){
            this.form8.fin_program = event.target.files || event.dataTransfer.files;
            },
            validateFileAttachment4Step8A: function(event){
            this.form8.fin_mechanics = event.target.files || event.dataTransfer.files;
            },
            validateFileAttachment5Step8A: function(event){
            this.form8.fin_promo_materials = event.target.files || event.dataTransfer.files;
            },
            validateFileAttachment6Step8A: function(event){
            this.form8.fin_invi_letter = event.target.files || event.dataTransfer.files;
            },
            validateFileAttachment7Step8A: function(event){
            this.form8.fin_collaterals = event.target.files || event.dataTransfer.files;
            },
            // process 7
            processStep7: function(value){
                
                var action = (value == 1) ? 'Approve?' : 'Disapprove?'
                var formData = new FormData();
                formData.append('app_remarks', this.form7.app_remarks)
                formData.append('app_stps_id', this._stps)
                formData.append('app_form_token', this._token)
                formData.append('app_usr_id', this._uid)
                formData.append('app_status', value)

                
                Swal.fire({
                    title: 'STEP 7 Process: ' + action,
                    text: "You won't be able to make changes after proceeding.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#4f46e5',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Proceed',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                    }).then((result) => {  
                            if (result.isConfirmed==true) {
                                axios.post(APP_URL + '/process_step7', formData)
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
                                title: 'STEP 7 Process Submitted!',
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
            // process 6
            processStep6: function(value){
                

                var action = (value == 1) ? 'Approve?' : 'Disapprove?'
                var formData = new FormData();
                formData.append('app_remarks', this.form6.app_remarks)
                formData.append('app_stps_id', this._stps)
                formData.append('app_form_token', this._token)
                formData.append('app_usr_id', this._uid)
                formData.append('app_status', value)

                
                Swal.fire({
                    title: 'STEP 6 Process: ' + action,
                    text: "You won't be able to make changes after proceeding.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#4f46e5',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Proceed',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                    }).then((result) => {  
                            if (result.isConfirmed==true) {
                                axios.post(APP_URL + '/process_step6', formData)
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
                                title: 'STEP 6 Process Submitted!',
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
            // process 5
            processStep5: function(value){             

                var action = (value == 1) ? 'Approve?' : 'Disapprove?'
                var formData = new FormData();
                formData.append('app_remarks', this.form5.app_remarks)
                formData.append('app_stps_id', this._stps)
                formData.append('app_form_token', this._token)
                formData.append('app_usr_id', this._uid)
                formData.append('app_status', value)

                
                Swal.fire({
                    title: 'STEP 5 Process: ' + action,
                    text: "You won't be able to make changes after proceeding.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#4f46e5',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Proceed',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                    }).then((result) => {  
                            if (result.isConfirmed==true) {
                                axios.post(APP_URL + '/process_step5', formData)
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
                                title: 'STEP 5 Process Submitted!',
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
            // process 4B
            processStep4B: function(){

                // if(this.form4b.neep_req_letter == ''){
                //     this.form4b_check_att1_error = 'Required' 
                // }else{
                //     this.form4b_check_att1_error = (this.form4b.neep_req_letter[0].size > 500000) ? 'File size exceeds limit' :  (this.form4b.neep_req_letter[0].type != '.pdf'  && this.form4b.neep_req_letter[0].type != 'application/pdf' )  ? 'File type invalid' : ''
                // }

                // if(this.form4b_check_att1_error == ''){
                    var formData = new FormData();
                    formData.append('app_experts', JSON.stringify(this.form4b.value))
                    formData.append('app_remarks', this.form4b.app_remarks)
                    // formData.append('neep_req_expert_needed', this.form4b.neep_req_expert_needed)
                    // formData.append('neep_req_purpose', this.form4b.neep_req_purpose)
                    // formData.append('neep_req_msg', this.form4b.neep_req_msg)
                    // formData.append('neep_req_letter', this.form4b.neep_req_letter[0])
                    formData.append('app_stps_id', this._stps)
                    formData.append('app_form_token', this._token)
                    formData.append('app_usr_id', this._uid)
                    Swal.fire({
                        title: 'STEP 4B Process: Submit Recommended Expert/s?',
                        text: "You won't be able to make changes after proceeding.",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#4f46e5',
                        cancelButtonColor: '#9CA3AF',
                        confirmButtonText: 'Proceed',
                        cancelButtonText: 'Cancel',
                        reverseButtons: true,
                        focusCancel: true,
                        showLoaderOnConfirm: true,
                        }).then((result) => {  
                                if (result.isConfirmed==true) {
                                    axios.post(APP_URL + '/process_step4B', formData)
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
                                    title: 'STEP 4B Process Submitted!',
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
                                    }
                                    }).then((result) => {
                                    /* Read more about handling dismissals below */
                                    if (result.dismiss === Swal.DismissReason.timer) {
                                        console.log('I was closed by the timer')
                                    }
                                    })

                            }    
                        })
                // }

            },
            // process 4C
            processStep4C: function(){
                

                var action = 'Approve?'
                var formData = new FormData();
                formData.append('app_remarks', this.form4c.app_remarks)
                formData.append('app_stps_id', this._stps)
                formData.append('app_form_token', this._token)
                formData.append('app_usr_id', this._uid)

                
                Swal.fire({
                    title: 'STEP 4C Process: ' + action,
                    text: "You won't be able to make changes after proceeding.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#4f46e5',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Proceed',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                    }).then((result) => {  
                            if (result.isConfirmed==true) {
                                axios.post(APP_URL + '/process_step4C', formData)
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
                                title: 'STEP 4C Process Submitted!',
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
            addMoreExperts:function(){
                Swal.fire({
                    title: 'Send request to more expert/s?',
                    text: "You won't be able to make changes after proceeding.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#4f46e5',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Proceed',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                    }).then((result) => {  
                            if (result.isConfirmed==true) {

                                var formData = new FormData();
                                formData.append('app_experts', JSON.stringify(this.form4c.value))
                                formData.append('app_stps_id', this._stps)
                                formData.append('app_form_token', this._token)
                                formData.append('app_usr_id', this._uid)

                                axios.post(APP_URL + '/process_step4C_add_experts', formData)
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
                                    title: 'Reqeuest Sent!',
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
            validateFileAttachment1Step4b: function(event){
            this.form4b.neep_req_letter = event.target.files || event.dataTransfer.files;
            },
            // process 3
            processStep3: function(value){
                

                var action = (value == 1) ? 'Approve?' : 'Disapprove?'
                var formData = new FormData();
                formData.append('app_remarks', this.form3.app_remarks)
                formData.append('app_stps_id', this._stps)
                formData.append('app_form_token', this._token)
                formData.append('app_usr_id', this._uid)
                formData.append('app_status', value)
                formData.append('app_cat', this.appCategory)

                
                Swal.fire({
                    title: 'STEP 3 Process: ' + action,
                    text: "You won't be able to make changes after proceeding.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#4f46e5',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Proceed',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                    }).then((result) => {  
                            if (result.isConfirmed==true) {
                                axios.post(APP_URL + '/process_step3', formData)
                                .then(response => {
                                    location.reload()
                                })
                                .catch((error) => {
                                    // error.response.status Check status code
                                }).finally(() => {
                                    //Perform action in always
                                    // location.reload()
                                });

                                let timerInterval
                                Swal.fire({
                                title: 'STEP 3 Process Submitted!',
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
            // process 2
            processStep2A: function(){

                if(this.form2.eva_evaluation_results == ''){
                    this.form2_check_att1_error = 'Required' 
                }else{
                    this.form2_check_att1_error = (this.form2.eva_evaluation_results[0].size > 25000000) ? 'File size exceeds limit' : (this.form2.eva_evaluation_results[0].type != 'application/msword'  && this.form2.eva_evaluation_results[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form2.eva_activity_design == ''){
                    this.form2_check_att2_error = 'Required' 
                }else{
                    this.form2_check_att2_error = (this.form2.eva_activity_design[0].size > 25000000) ? 'File size exceeds limit' : (this.form2.eva_activity_design[0].type != 'application/msword'  && this.form2.eva_activity_design[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form2.eva_program == ''){
                    this.form2_check_att3_error = 'Required' 
                }else{
                    this.form2_check_att3_error = (this.form2.eva_program[0].size > 25000000) ? 'File size exceeds limit' : (this.form2.eva_program[0].type != 'application/msword'  && this.form2.eva_program[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form2.eva_mechanics == ''){
                    this.form2_check_att4_error = 'Required' 
                }else{
                    this.form2_check_att4_error = (this.form2.eva_mechanics[0].size > 25000000) ? 'File size exceeds limit' : (this.form2.eva_mechanics[0].type != 'application/msword'  && this.form2.eva_mechanics[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form2.eva_lib == ''){
                    this.form2_check_att5_error = 'Required' 
                }else{
                    this.form2_check_att5_error = (this.form2.eva_lib[0].size > 25000000) ? 'File size exceeds limit' : (this.form2.eva_lib[0].type != 'application/msword'  && this.form2.eva_lib[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form2.eva_endo_letter == ''){
                    this.form2_check_att6_error = 'Required' 
                }else{
                    this.form2_check_att6_error = (this.form2.eva_endo_letter[0].size > 25000000) ? 'File size exceeds limit' : (this.form2.eva_endo_letter[0].type != 'application/msword'  && this.form2.eva_endo_letter[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }
                
                if(this.form2_check_att1_error == '' && this.form2_check_att2_error == '' && this.form2_check_att3_error == '' && this.form2_check_att4_error == '' && this.form2_check_att5_error == '' && this.form2_check_att6_error == ''){
                    Swal.fire({
                    title: 'STEP 2A Process: Submit to OED for approval?',
                    text: "You won't be able to make changes after proceeding.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#4f46e5',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Proceed',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                    }).then((result) => {  
                            if (result.isConfirmed==true) {

                                const formData = new FormData();
                                formData.append('eva_evaluation_results', this.form2.eva_evaluation_results[0]);
                                formData.append('eva_activity_design', this.form2.eva_activity_design[0]);
                                formData.append('eva_program', this.form2.eva_program[0]);
                                formData.append('eva_mechanics', this.form2.eva_mechanics[0]);
                                formData.append('eva_lib', this.form2.eva_lib[0]);
                                formData.append('eva_endo_letter', this.form2.eva_endo_letter[0]);
                                formData.append('app_stps_id', this._stps);
                                formData.append('app_form_token', this._token);
                                formData.append('app_usr_id', this._uid);
                                formData.append('eva_remarks', this.form2.eva_remarks);

                                axios.post(APP_URL + '/process_step2A', formData)
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
                                title: 'STEP 2A Process Submitted!',
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
                                }
                                }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    console.log('I was closed by the timer')
                                }
                                })
                        }    
                    })

                }
            },
            processStep2B: function(){

                if(this.form2.eva_draft == ''){
                    this.form2_check_att1_error = 'Required' 
                }else{
                    this.form2_check_att1_error = (this.form2.eva_draft[0].size > 25000000) ? 'File size exceeds limit' : (this.form2.eva_draft[0].type != 'application/msword'  && this.form2.eva_draft[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form2.eva_evaluation_results == ''){
                    this.form2_check_att2_error = 'Required' 
                }else{
                    this.form2_check_att2_error = (this.form2.eva_evaluation_results[0].size > 25000000) ? 'File size exceeds limit' : (this.form2.eva_evaluation_results[0].type != 'application/msword'  && this.form2.eva_evaluation_results[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form2.eva_activity_design == ''){
                    this.form2_check_att3_error = 'Required' 
                }else{
                    this.form2_check_att3_error = (this.form2.eva_activity_design[0].size > 25000000) ? 'File size exceeds limit' : (this.form2.eva_activity_design[0].type != 'application/msword'  && this.form2.eva_activity_design[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form2.eva_program == ''){
                    this.form2_check_att4_error = 'Required' 
                }else{
                    this.form2_check_att4_error = (this.form2.eva_program[0].size > 25000000) ? 'File size exceeds limit' : (this.form2.eva_program[0].type != 'application/msword'  && this.form2.eva_program[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form2.eva_mechanics == ''){
                    this.form2_check_att5_error = 'Required' 
                }else{
                    this.form2_check_att5_error = (this.form2.eva_mechanics[0].size > 25000000) ? 'File size exceeds limit' : (this.form2.eva_mechanics[0].type != 'application/msword'  && this.form2.eva_mechanics[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form2.eva_lib == ''){
                    this.form2_check_att6_error = 'Required' 
                }else{
                    this.form2_check_att6_error = (this.form2.eva_lib[0].size > 25000000) ? 'File size exceeds limit' : (this.form2.eva_lib[0].type != 'application/msword'  && this.form2.eva_lib[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }

                if(this.form2.eva_endo_letter == ''){
                    this.form2_check_att7_error = 'Required' 
                }else{
                    this.form2_check_att7_error = (this.form2.eva_endo_letter[0].size > 25000000) ? 'File size exceeds limit' : (this.form2.eva_endo_letter[0].type != 'application/msword'  && this.form2.eva_endo_letter[0].type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' )  ? 'File type invalid' : ''
                }
                
                if(this.form2_check_att1_error == '' &&  this.form2_check_att1_error == '' && this.form2_check_att2_error == '' && this.form2_check_att3_error == '' && this.form2_check_att4_error == '' && this.form2_check_att5_error == '' && this.form2_check_att6_error == '' && this.form2_check_att7_error == ''){
                    Swal.fire({
                    title: 'STEP 2B Process: Submit to OED for approval?',
                    text: "You won't be able to make changes after proceeding.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#4f46e5',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Proceed',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                    }).then((result) => {  
                            if (result.isConfirmed==true) {

                                const formData = new FormData();
                                formData.append('eva_draft', this.form2.eva_draft[0]);
                                formData.append('eva_evaluation_results', this.form2.eva_evaluation_results[0]);
                                formData.append('eva_activity_design', this.form2.eva_activity_design[0]);
                                formData.append('eva_program', this.form2.eva_program[0]);
                                formData.append('eva_mechanics', this.form2.eva_mechanics[0]);
                                formData.append('eva_lib', this.form2.eva_lib[0]);
                                formData.append('eva_endo_letter', this.form2.eva_endo_letter[0]);
                                formData.append('app_stps_id', this._stps);
                                formData.append('app_form_token', this._token);
                                formData.append('app_usr_id', this._uid);
                                formData.append('eva_remarks', this.form2.eva_remarks);

                                axios.post(APP_URL + '/process_step2B', formData)
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
                                title: 'STEP 2B Process Submitted!',
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
                                }
                                }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    console.log('I was closed by the timer')
                                }
                                })
                        }    
                    })

                }
            },
            validateFileAttachment1Step2: function(event){
            this.form2.eva_evaluation_results = event.target.files || event.dataTransfer.files;
            },
            validateFileAttachment1Step2B: function(event){
            this.form2.eva_draft = event.target.files || event.dataTransfer.files;
            },
            validateFileAttachment2Step2: function(event){
            this.form2.eva_activity_design = event.target.files || event.dataTransfer.files;
            },
            validateFileAttachment3Step2: function(event){
            this.form2.eva_program = event.target.files || event.dataTransfer.files;
            },
            validateFileAttachment4Step2: function(event){
            this.form2.eva_mechanics = event.target.files || event.dataTransfer.files;
            },
            validateFileAttachment5Step2: function(event){
            this.form2.eva_lib = event.target.files || event.dataTransfer.files;
            },
            validateFileAttachment6Step2: function(event){
            this.form2.eva_endo_letter = event.target.files || event.dataTransfer.files;
            },
            // process 1
            processStep1: function(){
                Swal.fire({
                    title: 'STEP 1 Process: Endorse to RIDD-IDS?',
                    text: "You won't be able to make changes after proceeding.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#4f46e5',
                    cancelButtonColor: '#9CA3AF',
                    confirmButtonText: 'Proceed',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    focusCancel: true,
                    showLoaderOnConfirm: true,
                    }).then((result) => {  
                            if (result.isConfirmed==true) {
                                
                                var formData = new FormData();
                                formData.append('app_remarks', this.form.app_remarks)
                                formData.append('app_stps_id', this._stps)
                                formData.append('app_form_token', this._token)
                                formData.append('app_usr_id', this._uid)

                                axios.post(APP_URL + '/process_step1',formData)
                                .then(response => {
                                    location.reload()
                                    console.log(response.data)
                                })
                                .catch((error) => {
                                    // error.response.status Check status code
                                }).finally(() => {
                                    //Perform action in always
                                });
                            
                                let timerInterval
                                Swal.fire({
                                title: 'STEP 1 Process Submitted!',
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
            formatDate: function(value){
            if (value) {
                return moment(String(value)).format('MMM. DD, YYYY')
                }
            },
            formatActivity: function(value){
        
            if(value != null){
                const arr = value.split(', ')
                const acts = []
                
                arr.forEach((activity, act_index) =>{
                    this.activities.forEach((value, index) => {
                    if(parseInt(activity - 1) == index){
                        acts.push(value)
                    }
                    })
                })
                return acts.join(', ');
            
            }else{
                return '-'
            }
            },
            formatVenue: function(value){
        
            if(value != null){
                const arr = value.split(', ')
                const vens = []
                
                arr.forEach((venue, act_index) =>{
                    this.venues.forEach((value, index) => {
                    if(venue == index){
                        vens.push(value)
                    }
                    })
                })

                return vens.join(', ');
            
            }else{
                return '-'
            }
            },
            downloadAllAttachments: function(attachment, token, uid){
                window.open(APP_URL + '/download_all/'+ attachment + '/' + token + '/' + uid ,'_blank');
            },
            daysAgo: function(date){
                var date2 = new Date();
                var last =  moment(String(date)).format('MM/DD/YYYY');
                var date1 = new Date(last);

                // To calculate the time difference of two dates
                var Difference_In_Time = date2.getTime() - date1.getTime();
                
                // To calculate the no. of days between two dates
                var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
                
                //To display the final no. of days (result)
                if(parseInt(Difference_In_Days) > 1){
                    return '(' + parseInt(Difference_In_Days) + ' days ago)';
                }else if(parseInt(Difference_In_Days) == 1){
                    return '(a day ago)';
                }
            },
            hoverTracker: function(){

                const $targetEl = document.getElementById('popover-tracking');
                const $triggerEl = document.getElementById(hoverTracker);
                const options = {
                placement: 'right',
                triggerType: 'hover',
                offset: 10,
                };
                const popover = new Popover($targetEl, $triggerEl,options);
                popover.show();
            }
        },
        mounted() {

            this._href = window.location.href;
            this._stps = (new URL(this._href)).pathname.split('/')[3];
            this._token = (new URL(this._href)).pathname.split('/')[4];
            this._uid = (new URL(this._href)).pathname.split('/')[5];

            this.contact = JSON.parse(JSON.stringify(this.contactData))
            this.activity = JSON.parse(JSON.stringify(this.activityData))
            this.objective = JSON.parse(JSON.stringify(this.objectiveData))
            this.venue = JSON.parse(JSON.stringify(this.venueData))
            this.participant = this.participantData
            this.attachment = JSON.parse(JSON.stringify(this.attachmentData))

            this.eva_a_att = JSON.parse(JSON.stringify(this.evaaData))
            this.eva_b_att = JSON.parse(JSON.stringify(this.evabData))
            this.fin_a_att = JSON.parse(JSON.stringify(this.finaData))
            this.post_rep_att = JSON.parse(JSON.stringify(this.postactrepData))

            this.regionsData.forEach((value, index) => { this.regions.push(value.region_name) })
            this.provincesData.forEach((value, index) => { this.provinces.push(value.province_name) })
            this.citiesData.forEach((value, index) => { this.cities.push(value.city_name) })
            this.activitiesData.forEach((value, index) => { this.activities.push(value.act_name) })
            this.venuesData.forEach((value, index) => { this.venues.push(value.ven_name) })
            this.venuesData.forEach((value, index) => { this.venues.push(value.ven_name) })

            this.tracking = JSON.parse(JSON.stringify(this.trackingData))
            this.userRole = this.roleData
            this.appStatus = this.statusData
            this.appCategory = this.categoryData
            this.appBudget = this.budgetData
            
            this.form4b.options = []

            this.membersData.forEach((value, index) => { this.form4b.options.push(
                { display :  value.pp_last_name + ', ' + value.pp_first_name + ' (' + value.mpr_gen_specialization + ')', 
                id : value.pp_usr_id,
                email : value.pp_email,
                expertise: value.mpr_gen_specialization, 
                name:  value.pp_last_name + ', ' + value.pp_first_name, 
                title:  value.title_name 
                })
            })

            this.recoExperts = JSON.parse(JSON.stringify(this.expertsData))

          
        }
  }
</script>
