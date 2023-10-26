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

}
