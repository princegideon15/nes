<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experts;

class ExpertsController extends Controller
{
    static function expertRequstAction($stps, $uid, $token, $action){

        $status = Experts::where(['exp_stps_id' => $stps, 'exp_form_token' => $token, 'exp_usr_id' => $uid])->first()->exp_status;

        if($status == 0){
            $data = [
                'exp_status' => $action
            ];
    
            Experts::where([
                'exp_stps_id' => $stps,
                'exp_form_token' => $token,
                'exp_usr_id' => $uid,
            ])->update(array_filter($data));
    
            $title = ($action == 1) ? 'Request Accepted' : 'Request Declined';
            $message = ($action == 1) ? 'Thank you for accepting our request.' : 'We understand your busy schedule. We are looking forward to work with you in the future.';
    
        }else{
    
            $title = 'Link Expired';
            $message = 'Link is no longer working. Please close the current tab or browser.';
    
        }

        return view('request', compact('title', 'message'));
    }
}
