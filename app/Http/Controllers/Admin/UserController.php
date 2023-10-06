<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\NewAccountNotification;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\LibraryController;

use App\User;
use App\AdminProfile;
use App\Feedback;
use App\Logs;
use Auth;
use Hash;

class UserController extends Controller
{
    /**
      * Create a new controller instance.
      *
      * @return void
      */
      public function __construct()
      {
          $this->middleware('auth');
      }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
     public function checkEmail(Request $request)
     {
        $email = $request->email;
        return User::where('email', $email)->where('user_grp_id', '>', '0')->get()->toArray();
     }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
     public function createUser(Request $request)
     {
        // save user
        $user = array();
         
        $uid = random_int(100000, 999999);

        $user['email'] = $request->input('email');
        $user['password'] = Hash::make($request->input('password'));
        $user['password_copy'] = $request->input('password');
        $user['user_id'] = $uid;
        $user['user_grp_id'] = $request->input('role');
    
        User::create($user);

        // save admin profile

        $admin = array();

        $admin['user_name'] = $request->input('name');
        $admin['user_id'] = $uid;
    
        AdminProfile::create($admin);

        $email_data['name'] = $request->input('name');
        $email_data['user_id'] = $uid;
        $email_data['temp_pass'] = $request->input('password');

        Mail::to($request->input('email'))->send(new NewAccountNotification($email_data));
     }

     public function updateUser(Request $request)
     {

      $data = ['email'=>$request->email,'user_grp_id'=>$request->role];

      if(isset($request->password)){
         
        $data['password'] = Hash::make($request->input('password'));
        $data['password_copy'] = $request->input('password');

      }
      // update user
      User::where('user_id', $request->user_id)->update(array_filter($data));

      // update admin profile
      AdminProfile::where('user_id', $request->user_id)->update(['user_name'=>$request->name]);
     }

     public function activateUser($uid){

        $os = Browser::platformFamily() . ' ' . Browser::platFormVersion();
        $browser = Browser::browserName();
        $date = date("F j, Y, g:i a");
        $ip = request()->ip();

        AdminProfile::where('user_id', $uid)->update(['user_status'=>'1']);
        $user_email = User::where('user_id', $uid)->first(['email'])->email;
        
        $logs = array('log_user_id' => $uid, 
        'log_email' => $user_email, 
        'log_ip_address' => $ip,
        'log_user_agent' => $os,
        'log_browser' => $browser,
        'log_description' => 'Reset Password successful', 
        'log_controller' => str_replace('App\Http\Controllers\\','', __CLASS__) .'::'. __FUNCTION__);

        Logs::create($logs);

        return redirect('/admin')->withSuccess('Account Activated! You can now log in.');
     }

     public function userSettings($uid){
      
      $role = Auth::user()->user_grp_id;
      if($role == 1){

        // library
        $roles = (new LibraryController)->getRoles();
     
        // data
        $role = Auth::user()->user_grp_id;
        $admin_info = User::adminProfile($uid);
        $user_logs = Logs::where('log_user_id', $uid)->orderBy('created_at', 'desc')->get();
        $feedbacks = Feedback::where('fdbk_user_id', $uid)->orderBy('created_at', 'desc')->get();
        
        return view('admin.user_settings', compact('role',
                                                   'admin_info',
                                                   'roles',
                                                   'user_logs',
                                                   'feedbacks'
                                                  ));
      }else{
          abort(404);
      }
     }

     public function removeUser($uid){
   
      AdminProfile::where('user_id', $uid)->delete();
      User::where('user_id', $uid)->delete();

     }

     public function setUserStatus($uid, $status){

      $new_status = ($status == 1) ? '0' : '1';

      AdminProfile::where('user_id', $uid)->update(['user_status'=>$new_status]);

     }

     public function updateAccount(Request $request)
     {

     
      $data = array();
      
      if(isset($request->password)){
         
        $data['password'] = Hash::make($request->input('password'));
        $data['password_copy'] = $request->input('password');

      }
      // update user
      User::where('user_id', Auth::user()->user_id)->update(array_filter($data));

      // update admin profile
      AdminProfile::where('user_id', Auth::user()->user_id)->update(['user_name'=>$request->name]);
     }

     public function show(){
      
      // library
      $roles = (new LibraryController)->getRoles();

      $admin_info = User::adminProfile(Auth::user()->user_id);
      $user_data = User::where('user_id',Auth::user()->user_id)->get()->toArray();
      $admin_name = AdminProfile::where('user_id', Auth::user()->user_id)->first(['user_name'])->user_name;
      $role = Auth::user()->user_grp_id;
      $feedbacks = Feedback::getAdminFeedbacksById(Auth::user()->user_id);
 
      return view('admin.profile', compact('admin_info', 'user_data', 'admin_name', 'role', 'roles', 'feedbacks'));
     }
     
     public function tester(){
      
      return view('admin.datatable');
     }

}
