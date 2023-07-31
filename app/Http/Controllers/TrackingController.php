<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Auth;

use App\Contact;
use App\Activity;
use App\Objective;
use App\Venue;
use App\Participant;
use App\Attachment;
use App\Application;
use App\Tracking;
use App\User;

use App\Http\Controllers\LibraryController;

class TrackingController extends Controller
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
     * Display the specified resource.
     *
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show($id, $token)
    {
        return Tracking::getLimitedTracking($id, $token);
    }

    public function trackApplication(Request $request){
        $tracking = Tracking::getTrackingByToken13($request->track_app);
        $track_num = $request->track_app;
        $user_info = User::personalProfile(Auth::user()->user_id);
        return view('tracker_dashboard', compact('tracking', 'track_num', 'user_info'));
    }

}
