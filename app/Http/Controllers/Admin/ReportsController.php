<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\LibraryController;
use App\User;
use App\Application;
use Auth;

class ReportsController extends Controller
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

      public function index(){
        $admin_info = User::adminProfile(Auth::user()->user_id);
        $role = Auth::user()->user_grp_id;
        $activities =(new LibraryController)->getActType();


        $clients = User::getClients();
        $submitted = Application::getSubmittedApplications();
        // $completed = Applications::getCompletedApplications();
        // $institutions = Applications::getInstitutionsApplication();
        // $feedbacks = Feedbacks::getClientFeedbacks();
        $completed = '';
        $institutions = '';
        $feedbacks = '';

        return view('admin.reports', compact('admin_info', 
        'role', 
        'clients',
        'submitted',
        'completed',
        'institutions',
        'feedbacks',
        'activities'));
      }
}
