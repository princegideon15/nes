<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class Application extends Model
{
    static function getApplications($role = null){
        //todo
        // $query = DB::table('tblcontacts')
        return DB::table('tblcontacts')
            ->select('app_status','con_ins', 'con_form_token', 'act_req_id', 'act_start', 'act_end', 'tblcontacts.id as stps_id', 'con_usr_id', 'con_focal_p', 'con_contact_num'
            ,DB::raw('(SELECT description FROM tbltracking WHERE form_token = con_form_token ORDER BY id DESC LIMIT 1) as description')
            ,DB::raw('(SELECT created_at FROM tbltracking WHERE form_token = con_form_token ORDER BY id DESC LIMIT 1) as tracked_time')
            ,DB::raw('(SELECT status FROM tbltracking WHERE form_token = con_form_token ORDER BY id DESC LIMIT 1) as status')
            ,DB::raw('(SELECT count(*) FROM tblparticipants WHERE prt_form_token = con_form_token AND prt_usr_id = con_usr_id) as participants'))
            ->join('tblact_requests', 'act_form_token', '=', 'con_form_token', 'left')
            ->join('tblapplication_status', 'app_form_token', '=', 'con_form_token', 'left')
            ->orderBy('stps_id', 'desc')->get();
            // director
            // if($role == 4){
            //     $query->join('tblapplication_status', 'app_form_token', '=', 'con_form_token', 'left')
            //             ->where('app_status', 0);
            // }
            // $query
          

            // return $query
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
            ->get()->toArray();
    }

    static function getProvinces(){
        return DB::connection('skms')->table('tblprovinces')->get()->toArray();
    }

    static function getCities(){
        return DB::connection('skms')->table('tblcities')->get()->toArray();
    }
}
