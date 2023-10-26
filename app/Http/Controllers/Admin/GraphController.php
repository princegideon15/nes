<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\PersonalProfile;



class GraphController extends Controller
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

   public function applicationsBySex(){

       return PersonalProfile::getSex();
    
   }

   public function applicationsByMonth(){

       return PersonalProfile::getApplicationsMonthly();
    
   }

   public function applicationsByCategory(){

       return PersonalProfile::applicationsByCategory();
    
   }
}
