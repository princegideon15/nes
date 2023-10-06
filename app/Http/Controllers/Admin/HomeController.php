<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Contact;
use App\User;
use App\Attachment;
use App\Application;
use App\Status;
use Auth;

use App\Http\Controllers\LibraryController;

class HomeController extends Controller
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
        $app_count = Contact::get()->count();
        $reg_count = User::where('user_grp_id', 0)->get()->count();
        $sub_count = Status::where('app_status', 0)->get()->count();
        $com_count = Status::where('app_status', 10)->get()->count();
        $pro_count = count(Application::getApplications(Auth::user()->user_grp_id));
        $admin_info = User::adminProfile(Auth::user()->user_id);
        $role = Auth::user()->user_grp_id;
        return view('admin.home', compact(
            'admin_info',
            'app_count',
            'reg_count',
            'sub_count',
            'pro_count',
            'com_count',
            'role'
        ));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function getApplications()
    {
        // library
        $activities =(new LibraryController)->getActType();
        // data
        $applications = Application::getApplications(Auth::user()->user_grp_id);
        // $applications = Application::getApplications();
        $admin_info = User::adminProfile(Auth::user()->user_id);
        $role = Auth::user()->user_grp_id;
        
        return view('admin.applications', compact('applications',
                                                    'admin_info',
                                                    'activities',
                                                    'role'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function getUsers()
    {
        $role = Auth::user()->user_grp_id;
        if($role == 1){
  
            // library
            $roles = (new LibraryController)->getRoles();


            // data
            $admin_info = User::adminProfile(Auth::user()->user_id);
            $users = User::getUsers();
            $role = Auth::user()->user_grp_id;
            
            return view('admin.users', compact('admin_info',
                                                'users',
                                                'roles',
                                                'role'));
        }else{
            abort(404);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function getClients()
    {
        $role = Auth::user()->user_grp_id;
        if($role == 1){
  
        // library
        $activities =(new LibraryController)->getActType();
        // data
        $applications = Application::getApplications();
        $admin_info = User::adminProfile(Auth::user()->user_id);
        $clients = User::getClients();
        $role = Auth::user()->user_grp_id;
        
        return view('admin.clients', compact('applications',
                                                    'admin_info',
                                                    'clients',
                                                    'activities',
                                                    'role'));
        }else{
            abort(404);
        }
    }

   
}


