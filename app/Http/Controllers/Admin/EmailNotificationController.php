<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\NewAccountNotification;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\LibraryController;

use App\User;
use App\AdminProfile;
use App\EmailNotification;
use Auth;

class EmailNotificationController extends Controller
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
   public function index()
   {
       $admin_info = User::adminProfile(Auth::user()->user_id);
       $role = Auth::user()->user_grp_id;
       $notifications = EmailNotification::all();
       return view('admin.email_notifications', compact(
           'notifications',
           'admin_info',
           'role'));

   }

   public function manageNotification($id){

        $roles = (new LibraryController)->getRoles();

        $admin_info = User::adminProfile(Auth::user()->user_id);
        $role = Auth::user()->user_grp_id;
        $notification = EmailNotification::where('id', $id)->get();
        return view('admin.manage_email_notification', compact(
            'notification',
            'admin_info',
            'role',
            'roles'));
   }

   public function updateNotification(Request $request){

    
		$post = array();


		$user_groups = $request->input('enc_user_group');
        
        if(isset($user_groups)){
            $post['enc_user_group'] = implode(",", $user_groups);
        }


		$post['enc_content'] = $request->input('enc_content', true);
		$post['enc_subject'] = $request->input('enc_subject', true);
		$post['enc_description'] = $request->input('enc_description', true);
		$post['enc_cc'] = $request->input('enc_cc', true);
		$post['enc_bcc'] = $request->input('enc_bcc', true);

		$id= $request->input('enc_process_id', true);

        EmailNotification::where('enc_process_id', $id)->update($post);

   }
      
}
