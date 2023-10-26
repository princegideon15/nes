<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class PersonalProfile extends Model
{
    public $timestamps = true;
    protected $table = 'tblpersonal_profiles';
    protected $fillable = ['pp_member','pp_title','pp_last_name','pp_middle_name','pp_first_name','pp_suffix_name','pp_extension','pp_age','pp_sex','pp_region','pp_prov','pp_city','pp_brgy','pp_ins','pp_pos','pp_user_id'];
   
    public function getTableColumns($table) {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);

    }

    static function getUserProfile($u_id){
        return DB::table('users')
        ->select('email', 'pp_first_name', 'pp_last_name', 'title_name')
        ->where('users.user_id', $u_id)
        ->join('tblpersonal_profiles', 'tblpersonal_profiles.pp_user_id', '=', 'users.user_id')
        ->join('tbltitles', 'tbltitles.title_id', '=', 'tblpersonal_profiles.pp_title')
        ->get()->toArray();
    }

    static function getUserProfileByEmail($email){
        return DB::table('users')
        ->select('title_name', 'pp_first_name', 'pp_last_name')
        ->where('users.email', $email)
        ->join('tblpersonal_profiles', 'tblpersonal_profiles.pp_user_id', '=', 'users.user_id')
        ->join('tbltitles', 'tbltitles.title_id', '=', 'tblpersonal_profiles.pp_title')
        ->get()->toArray();
    }

    static function getSex(){

        return DB::table('tblsex')
        ->select('tblsex.id', 'sex', DB::raw('(SELECT COUNT(*) FROM tblpersonal_profiles WHERE pp_sex = tblsex.id) as total'))
        ->groupBy('tblsex.id', 'sex')
        ->get();
        
    }

    static function getApplicationsMonthly(){

        return DB::select( DB::raw('SELECT month, COUNT(con_ins) AS total FROM 
        (SELECT 1 mm UNION ALL SELECT 2 UNION ALL SELECT 3 
        UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6
        UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 
        UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12 ) 
        derived LEFT JOIN tblcontacts ON derived.mm = month(tblcontacts.created_at) 
        LEFT JOIN tblmonths ON tblmonths.id = derived.mm GROUP BY derived.mm, month'));
        
    }

    static function applicationsByCategory(){

        return DB::select( DB::raw('SELECT ut_type, COUNT(tblcontacts.con_usr_id) AS total FROM 
        (SELECT 1 ut UNION ALL SELECT 2 UNION ALL SELECT 3) 
        derived LEFT JOIN tblregistration_profiles on derived.ut = tblregistration_profiles.reg_category   
        left join tblcontacts on tblcontacts.con_usr_id = tblregistration_profiles.reg_user_id 
        left join tbluser_types on tbluser_types.id = derived.ut group by derived.ut, tbluser_types.ut_type'));
        
    }

}
