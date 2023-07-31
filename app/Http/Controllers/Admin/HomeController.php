<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Contact;
use App\User;
use App\Attachment;
use App\Application;
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
        $sub_count = Attachment::where('att_submit', 1)->get()->count();
        $admin_info = User::adminProfile(Auth::user()->user_id);
        $role = Auth::user()->user_grp_id;
        return view('admin.home', compact(
            'admin_info',
            'app_count',
            'reg_count',
            'sub_count',
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
        // $applications = Application::getApplications(Auth::user()->user_grp_id);
        $applications = Application::getApplications();
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function getClients()
    {
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
    }

   
}


