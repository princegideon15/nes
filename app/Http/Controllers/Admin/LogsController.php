<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logs;
use App\User;
use Auth;

class LogsController extends Controller
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

      public function show(){
        $admin_info = User::adminProfile(Auth::user()->user_id);
        $role = Auth::user()->user_grp_id;
        $logs = Logs::orderBy('created_at', 'desc')->get();

        return view('admin.logs', compact('admin_info', 'role', 'logs'));
      }
}
