<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Feedback;
use App\User;

class FeedbacksController extends Controller
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

   public function store(Request $req){

        $feedback = array('fdbk_user_id' => Auth::user()->user_id, 
                    'fdbk_rate' => $req->fdbk_rate, 
                    'fdbk_remarks' => $req->fdbk_remarks,
                    'fdbk_usr_type' => 0);

        Feedback::create($feedback);

        return redirect()->back();
   }

   public function show(){

        $admin_info = User::adminProfile(Auth::user()->user_id);
        $role = Auth::user()->user_grp_id;
        $admin_feedbacks = Feedback::getAdminFeedbacks();
        $client_feedbacks = Feedback::getClientFeedbacks();

        // total ratings
        $total_f = Feedback::all()->count();

        if($total_f > 0){
          // count per rating
          $t_5 = Feedback::where('fdbk_rate', 5)->count();
          $t_4 = Feedback::where('fdbk_rate', 4)->count();
          $t_3 = Feedback::where('fdbk_rate', 3)->count();
          $t_2 = Feedback::where('fdbk_rate', 2)->count();
          $t_1 = Feedback::where('fdbk_rate', 1)->count();

          // average rating
          $ar = (1 * $t_1) + (2 * $t_2) + (3 * $t_3) + (4 * $t_4) + (5 * $t_5);
          $or = round($ar / $total_f);

          // percentage per rating
          $p5 = round(($t_5 / $total_f) * 100);
          $p4 = round(($t_4 / $total_f) * 100);
          $p3 = round(($t_3 / $total_f) * 100);
          $p2 = round(($t_2 / $total_f) * 100);
          $p1 = round(($t_1 / $total_f) * 100);
        }else{
          $or = 0;
          $p1 = 0;
          $p2 = 0;
          $p3 = 0;
          $p4 = 0;
          $p5 = 0;
        }
        

        return view('admin.feedbacks', compact('admin_info', 'role', 'admin_feedbacks', 'client_feedbacks', 'or', 'p5', 'p4', 'p3', 'p2', 'p1'));
   }

   public function storeClientFeedback(Request $req){

        $feedback = array('fdbk_user_id' => Auth::user()->user_id, 
                    'fdbk_rate' => $req->fdbk_rate, 
                    'fdbk_remarks' => $req->fdbk_remarks,
                    'fdbk_usr_type' => '1');
   
        Feedback::create($feedback);

     return redirect()->back();
   }

}
