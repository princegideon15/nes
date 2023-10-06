<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Application;

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
        // $flag = 1;
        // $active = 'bg-gray-900';
        $user_info = User::personalProfile(Auth::user()->user_id);
        $app_count = count(Application::getData(Auth::user()->user_id));
        $pro_count = Application::getOnGoingApplication(Auth::user()->user_id);
        $com_count = Application::getCompletedApplication(Auth::user()->user_id);
        return view('home', compact('user_info', 'app_count', 'pro_count', 'com_count'));
    }
}
