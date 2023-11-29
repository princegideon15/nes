<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class Application extends Model
{
    static function getApplications($role = null){
     
        $query = DB::table('tblcontacts')->select('app_status','con_ins', 'con_form_token', 'act_req_id', 'act_start', 'act_end', 'tblcontacts.id as stps_id', 'con_usr_id', 'con_focal_p', 'con_contact_num'
            ,DB::raw('(SELECT description FROM tbltracking WHERE form_token = con_form_token ORDER BY id DESC LIMIT 1) as description')
            ,DB::raw('(SELECT created_at FROM tbltracking WHERE form_token = con_form_token ORDER BY id DESC LIMIT 1) as tracked_time')
            ,DB::raw('(SELECT status FROM tbltracking WHERE form_token = con_form_token ORDER BY id DESC LIMIT 1) as status')
            ,DB::raw('(SELECT count(*) FROM tblparticipants WHERE prt_form_token = con_form_token AND prt_usr_id = con_usr_id) as participants'))
            ->join('tblact_requests', 'act_form_token', '=', 'con_form_token', 'left')
            ->join('tblapplication_status', 'app_form_token', '=', 'con_form_token', 'left');
            
            if($role == 4){ // director
                $query->where('app_status', '0');
                $query->orWhere('app_status', '7');
                $query->orWhere('app_status', '2');
                $query->orWhere('app_status', '8');
                $query->orWhere('app_status', '10');
            }elseif($role == 10){ // ridd
                $query->where('app_status', '1');
                $query->orWhere('app_status', '3B');
                $query->orWhere('app_status', '4B');
                $query->orWhere('app_status', '7');
                $query->orWhere('app_status', '9');
                $query->orWhere('app_status', '10');
            }elseif($role == 7){ // stps
                $query->where('app_status', '4');
            }elseif($role == 8){ // fincom
                $query->where('app_status', '5');
            }elseif($role == 9){ // gb
                $query->where('app_status', '6');
            }elseif($role == 11){ // budget
                $query->where('app_status', '3');
            }
              
            $data = $query->orderBy('stps_id', 'desc')->get();
            return $data;
          
    }

    static function getData($u_id){

        return DB::table('tblcontacts')
            ->select('con_ins', 'con_form_token', 'act_req_id', 'act_start', 'act_end', 'tblcontacts.id as stps_id', 'con_usr_id'
            ,DB::raw('(SELECT description FROM tbltracking WHERE form_token = con_form_token ORDER BY id DESC LIMIT 1) as description')
            ,DB::raw('(SELECT created_at FROM tbltracking WHERE form_token = con_form_token ORDER BY id DESC LIMIT 1) as tracked_time')
            ,DB::raw('(SELECT status FROM tbltracking WHERE form_token = con_form_token ORDER BY id DESC LIMIT 1) as status'))
            ->join('tblact_requests', 'act_form_token', '=', 'con_form_token', 'left')
            ->where('con_usr_id', $u_id)
            ->orderBy('stps_id', 'desc')
            ->get();
    }

    static function getOnGoingApplication($u_id){

        return DB::table('tblapplication_status')
            ->where('app_usr_id', $u_id)
            ->where('app_status', '< ', '10')
            ->get()->count();
    }

    static function getCompletedApplication($u_id){

        return DB::table('tblapplication_status')
            ->where('app_usr_id', $u_id)
            ->where('app_status', 10)
            ->get()->count();
    }

    static function getProvinces(){
        return DB::connection('skms')->table('tblprovinces')->get()->toArray();
    }

    static function getCities(){
        return DB::connection('skms')->table('tblcities')->get()->toArray();
    }

    static function getSubmittedApplications(){

            $query = DB::table('tblcontacts')->select('tblapplication_status.created_at as date_submitted', 'app_status','con_ins', 'con_form_token', 'act_req_id', 'act_start', 'act_end', 'tblcontacts.id as stps_id', 'con_usr_id', 'con_focal_p', 'con_contact_num'
            ,DB::raw('(SELECT description FROM tbltracking WHERE form_token = con_form_token ORDER BY id DESC LIMIT 1) as description')
            ,DB::raw('(SELECT created_at FROM tbltracking WHERE form_token = con_form_token ORDER BY id DESC LIMIT 1) as tracked_time')
            ,DB::raw('(SELECT status FROM tbltracking WHERE form_token = con_form_token ORDER BY id DESC LIMIT 1) as status')
            ,DB::raw('(SELECT count(*) FROM tblparticipants WHERE prt_form_token = con_form_token AND prt_usr_id = con_usr_id) as participants'))
            ->join('tblact_requests', 'act_form_token', '=', 'con_form_token', 'left')
            ->join('tblapplication_status', 'app_form_token', '=', 'con_form_token', 'left')
            ->where('app_status', 0)->get();

            return $query;
    }

    static function getCompletedApplications(){

            $query = DB::table('tblcontacts')->select('tblapplication_status.created_at as date_submitted', 'app_status','con_ins', 'con_form_token', 'act_req_id', 'act_start', 'act_end', 'tblcontacts.id as stps_id', 'con_usr_id', 'con_focal_p', 'con_contact_num'
            ,DB::raw('(SELECT description FROM tbltracking WHERE form_token = con_form_token ORDER BY id DESC LIMIT 1) as description')
            ,DB::raw('(SELECT created_at FROM tbltracking WHERE form_token = con_form_token ORDER BY id DESC LIMIT 1) as tracked_time')
            ,DB::raw('(SELECT status FROM tbltracking WHERE form_token = con_form_token ORDER BY id DESC LIMIT 1) as status')
            ,DB::raw('(SELECT count(*) FROM tblparticipants WHERE prt_form_token = con_form_token AND prt_usr_id = con_usr_id) as participants'))
            ->join('tblact_requests', 'act_form_token', '=', 'con_form_token', 'left')
            ->join('tblapplication_status', 'app_form_token', '=', 'con_form_token', 'left')
            ->where('app_status', 10)->get();

            return $query;
    }
}
