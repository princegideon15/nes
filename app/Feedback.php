<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Feedback extends Model
{
    
    public $timestamps = true;
    protected $table = 'tblfeedbacks';
    protected $fillable = [
                            'fdbk_rate',
                            'fdbk_remarks',
                            'fdbk_user_id',
                            'fdbk_usr_type'
                          ];
   
    public function getTableColumns($table) {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);
    }

    static function getAdminFeedbacks(){
        
        return DB::table('tblfeedbacks')
            ->select('user_name', 'usr_grp_role', 'fdbk_rate', 'fdbk_remarks', DB::raw('tblfeedbacks.created_at as created_at'))
            ->join('tbladmin_profiles', 'tbladmin_profiles.user_id', '=', 'fdbk_user_id')
            ->join('users', 'users.user_id', '=', 'tblfeedbacks.fdbk_user_id')
            ->join('tbluser_groups', 'tbluser_groups.usr_grp_id', '=', 'users.user_grp_id')
            ->orderBy('fdbk_rate', 'desc')
            ->get();
    }

    static function getClientFeedbacks(){
        
        return DB::table('tblfeedbacks')
            ->select('pp_first_name', 'pp_last_name', 'fdbk_rate', 'fdbk_remarks', DB::raw('tblfeedbacks.created_at as created_at'))
            ->join('tblpersonal_profiles', 'pp_user_id', '=', 'fdbk_user_id')
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
    } 
    
    static function getClientFeedbacksById($id){
        
        return DB::table('tblfeedbacks')
            ->select('pp_first_name', 'pp_last_name', 'fdbk_rate', 'fdbk_remarks', DB::raw('tblfeedbacks.created_at as created_at'))
            ->join('tblpersonal_profiles', 'pp_user_id', '=', 'fdbk_user_id')
            ->where('fdbk_user_id', $id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
    }

    static function getAdminFeedbacksById($id){
        
        return DB::table('tblfeedbacks')
            ->select('user_name', 'fdbk_rate', 'fdbk_remarks', DB::raw('tblfeedbacks.created_at as created_at'))
            ->join('tbladmin_profiles', 'user_id', '=', 'fdbk_user_id')
            ->where('fdbk_user_id', $id)
            ->orderBy('fdbk_rate', 'desc')
            ->get()
            ->toArray();
    }
}
