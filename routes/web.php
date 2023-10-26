<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// login
Route::get('/', function () { return view('auth.login');});
Route::get('/split', function () { return view('auth.split');});
// verify login
Route::any('/dologin', 'Auth\LoginController@dologin');
// create account
Route::get('/register', 'Auth\RegisterController@index');
// logout
Route::any('/logout', 'Auth\LoginController@logout');
// forgot password
Route::get('/forgot', function () {return view('auth.forgot');});
// verify forgot password email
Route::post('/verify', 'Auth\ResetPasswordController@verify');
// resend reset password link
Route::any('/resend/{token}', 'Auth\ResetPasswordController@resend');
// reset password
Route::any('/reset/{token}', 'Auth\ResetPasswordController@index'); 
// confirm reset password
Route::any('/confirm', 'Auth\ResetPasswordController@confirm'); 

// categories
Route::get('/get_register_sub_library', 'LibraryController@getRegisterSubLibrary');
Route::get('/get_sub_stake', 'LibraryController@getSubStake');
Route::get('/get_sub_manage', 'LibraryController@getSubManage');

// libraries
Route::get('/get_titles', 'LibraryController@getTitles');
Route::get('/get_regions', 'LibraryController@getRegions');
Route::get('/get_provinces', 'LibraryController@getProvinces');
Route::get('/get_cities', 'LibraryController@getCities');
Route::get('/get_nrcp_member', 'LibraryController@getNrcpMember');
Route::get('/get_registered_users', 'Auth\RegisterController@getRegisteredUsers');
Route::get('/get_act_type', 'LibraryController@getActType');
Route::get('/get_sub_act', 'LibraryController@getSubAct');
Route::get('/get_ven_spec', 'LibraryController@getVenSpec');

// stps request form
Route::get('/form', 'StpsController@index');

// save registration
Route::post('/submit_registration', 'Auth\RegisterController@store');

// admin
Route::get('/admin', function () {
    return view('admin.login');
});
Route::any('/admin/dologin', 'Admin\Auth\LoginController@dologin');
Route::any('/admin/logout', 'Admin\Auth\LoginController@logout');
Route::get('/get_sub_category/{reg}/{sub}', 'LibraryController@getSubCategory');


// accept or decline request
Route::get('/expert_request/{stps}/{eid}/{token}/{action}', 'ExpertsController@expertRequstAction');

// track application
Route::post('/tracker', 'LibraryController@trackApplication');

Auth::routes();

// admin
Route::get('/admin/dashboard', 'Admin\HomeController@index');
Route::get('/admin/applications', 'Admin\HomeController@getApplications');
// admin logs
Route::get('/admin/logs', 'Admin\LogsController@show');
// admin users
Route::get('/admin/users', 'Admin\HomeController@getUsers');
Route::get('/admin/clients', 'Admin\HomeController@getClients');
Route::get('/admin/check_admin_email', 'Admin\UserController@checkEmail');
Route::get('/activate/{uid}', 'Admin\UserController@activateUser');
Route::get('/admin/user/settings/{uid}', 'Admin\UserController@userSettings');
Route::get('/admin/user/remove/{uid}', 'Admin\UserController@removeUser');
Route::get('/admin/user/set_status/{uid}/{status}', 'Admin\UserController@setUserStatus');
Route::post('/admin/update_user/', 'Admin\UserController@updateUser');
Route::post('/admin/create_user', 'Admin\UserController@createUser');
// admin feedback
Route::post('/admin/feedback/submit', 'Admin\FeedbacksController@store');
Route::get('/admin/feedbacks', 'Admin\FeedbacksController@show');
// admin email
Route::get('/admin/email_notifications', 'Admin\EmailNotificationController@index');
Route::get('/admin/email_notification/manage/{id}', 'Admin\EmailNotificationController@manageNotification');
Route::any('/admin/email_notification/update', 'Admin\EmailNotificationController@updateNotification');
// admin app data
Route::any('/admin/app_data/{stps}/{token}/{uid}', 'Admin\ApplicationsController@show');
// admin

// save forms
// Route::resource(ApplicationsController::class)->group(function(){
//     Route::post('/save_step1', 'saveStep1');
//     Route::post('/save_step2', 'saveStep2');
//     Route::post('/save_step3', 'saveStep3');
//     Route::post('/save_step4', 'saveStep4');
//     Route::post('/save_step5', 'saveStep5');
//     Route::post('/save_step6', 'saveStep6');
// });

Route::post('/save_step1', 'ApplicationsController@saveStep1');
Route::post('/save_step2', 'ApplicationsController@saveStep2');
Route::post('/save_step3', 'ApplicationsController@saveStep3');
Route::post('/save_step4', 'ApplicationsController@saveStep4');
Route::post('/save_step5', 'ApplicationsController@saveStep5');
Route::post('/save_step6', 'ApplicationsController@saveStep6');

// delete entry
Route::post('/delete_participant/{stps_id}/{prt_id}/{usr_id}', 'ApplicationsController@deleteParticipant');
Route::post('/delete_all_participants/{stps_id}/{usr_id}', 'ApplicationsController@deleteAllParticipants');

// get forms data
Route::get('/get_step1_data', 'ApplicationsController@getStep1Data');
Route::get('/get_step2_data', 'ApplicationsController@getStep2Data');
Route::get('/get_step3_data', 'ApplicationsController@getStep3Data');
Route::get('/get_step4_data', 'ApplicationsController@getStep4Data');
Route::get('/get_step5_data', 'ApplicationsController@getStep5Data');
Route::get('/get_step6_data', 'ApplicationsController@getStep6Data');
Route::get('/get_step6_nrcp', 'ApplicationsController@getNrcpBudget');
Route::get('/get_step6_counter', 'ApplicationsController@getCounterBudget');
Route::get('/get_step6_other', 'ApplicationsController@getOtherBudget');


// client feedback
Route::post('/feedback/submit', 'Admin\FeedbacksController@storeClientFeedback');


// submit forms
Route::post('/submit_step1', 'ApplicationsController@submitStep1');
Route::post('/submit_step2', 'ApplicationsController@submitStep2');
Route::post('/submit_step3', 'ApplicationsController@submitStep3');
Route::post('/submit_step4', 'ApplicationsController@submitStep4');
Route::post('/submit_step5', 'ApplicationsController@submitStep5');
Route::post('/submit_step6', 'ApplicationsController@submitStep6');

// get applications by user id
Route::get('/get_applications', 'ApplicationsController@getApplicationsData');
// get currrent address by user id
Route::get('/get_current_address', 'PersonalProfileController@getCurrentAddress');
// count particpants
Route::get('/count_participants/{value}', 'ApplicationsController@countParticipants');

// processing
Route::post('/process_step1', 'Admin\ApplicationsController@processStep1');
Route::post('/process_step2A', 'Admin\ApplicationsController@processStep2A');
Route::post('/process_step2B', 'Admin\ApplicationsController@processStep2B');
Route::post('/process_step3', 'Admin\ApplicationsController@processStep3');
Route::post('/process_step4B', 'Admin\ApplicationsController@processStep4B'); 
Route::post('/process_step4C', 'Admin\ApplicationsController@processStep4C');
Route::post('/process_step4C_add_experts', 'Admin\ApplicationsController@processStep4C_add_experts');
Route::post('/process_step5', 'Admin\ApplicationsController@processStep5');
Route::post('/process_step6', 'Admin\ApplicationsController@processStep6');
Route::post('/process_step7', 'Admin\ApplicationsController@processStep7');
Route::post('/process_step8', 'Admin\ApplicationsController@processStep8');
Route::post('/process_step9A', 'Admin\ApplicationsController@processStep9A');
Route::post('/process_step10', 'Admin\ApplicationsController@processStep10');
Route::post('/process_step11', 'Admin\ApplicationsController@processStep11');




// download zip files
Route::get('/download_all/{att}/{token}/{uid}', 'Admin\ApplicationsController@downloadZip');
// dashboard
Route::get('/home', 'HomeController@index')->name('home');
// appliation form page
// Route::get('/applications', 'ApplicationsController@index')->name('applications');
Route::get('/applications', 'ApplicationsController@index');
// view submitted data
Route::get('/app_data/{token}', 'ApplicationsController@show');
// tracking status
Route::get('/get_tracking/{id}/{token}', 'TrackingController@show');
// tracker in dashboard
Route::post('/tracker_dashboard', 'TrackingController@trackApplicationFromDashboard');
Route::post('/tracker_page', 'TrackingController@trackApplication');
// personal profile 
Route::get('/profile', 'PersonalProfileController@show');
// update account 
Route::post('/update_account', 'PersonalProfileController@updateAccount');
// update personal profile 
Route::post('/update_personal', 'PersonalProfileController@updatePersonal');
// admin profile 
Route::get('/admin/profile', 'Admin\UserController@show');
// update admin profile 
Route::post('/admin/update_account', 'Admin\UserController@updateAccount');

//graph
Route::get('/dashboard/pie', 'Admin\GraphController@applicationsBySex');



// tests
Route::get('/admin/vdb', 'Admin\UserController@tester');
Route::get('/tester', 'ApplicationsController@tester');
// Route::get('/send-mail2','ApplicationsController@send_email_test');
Route::get('/send-mail', function () {

    $email_data = [ 'name' => 'Gerard Balde',
        'subject' => 'test@mail.com', 
        'content' => 'test pass'];

    return new \App\Mail\ApplicationNotification($email_data);
});
Route::get('/send-mail-expert', function () {

    $email_data = [ 'name' => 'Gerard Balde',
        'email' => 'test@mail.com', 
        'stps' => '3', 
        'eid' => '1', 
        'token' => 'NZ5ouNkul7nEYGNAT5FtkIRjhE7L4X'];

    return new \App\Mail\ExpertsNotification($email_data);
});