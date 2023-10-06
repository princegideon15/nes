<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'email', 'password', 'password_copy', 'user_grp_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    static function getNrcpMemberAuth($email){
        // return DB::connection('skms')->table('tblusers')
        // ->select('usr_id')
        // ->join('tblpersonal_profiles','usr_id','=','pp_user_id', 'inner')
        // ->where('pp_email', $email)->first()->usr_id;
        
        return DB::connection('skms')->table('tblusers')
        ->select('*')
        ->join('tblpersonal_profiles','usr_id','=','pp_usr_id', 'inner')
        ->where('pp_email', $email)
        ->get()->toArray();
    }

    static function getNrcpMemberEmp($id){
        return DB::connection('skms')->table('tblemployments')
        ->select('*')
        ->where('emp_usr_id', $id)
        ->orderBy('emp_id', 'desc')
        ->limit('1')
        ->get()->toArray();
        // SELECT * FROM `tblemployments` WHERE `emp_usr_id` = 2 order BY emp_id DESC limit 1
    }

    static function checkRole($email){
        return DB::table('users')
        ->select('user_grp_id')
        ->where('email', $email)
        ->first()
        ->user_grp_id;
    }

    static function checkStatus($email){
        
        return DB::table('tbladmin_profiles')
        ->select('user_status')
        ->join('users','users.user_id','=','tbladmin_profiles.user_id')
        ->where('email', $email)
        ->first()
        ->user_status;
        
    }

    static function adminProfile($id){
        return DB::table('tbladmin_profiles')
        ->select('user_name', 'email', 'usr_grp_role',  'usr_grp_id', 'user_status', 'users.user_id as user_id')
        ->join('users','users.user_id','=','tbladmin_profiles.user_id')
        ->join('tbluser_groups','tbluser_groups.usr_grp_id','=','users.user_grp_id')
        ->where('users.user_id', $id)
        ->get();
    }

    

    static function personalProfile($id){
        return DB::table('tblpersonal_profiles')
        ->select('pp_first_name','pp_last_name', 'email')
        ->join('users','users.user_id','=','tblpersonal_profiles.pp_user_id')
        ->where('users.user_id', $id)
        ->get();
    }

    static function getUsers(){
        return DB::table('tbladmin_profiles')
        ->select('users.created_at as created_at', 'email', 'user_name', 'usr_grp_role', 'user_status', 'users.user_id as id')
        ->join('users','users.user_id','=','tbladmin_profiles.user_id')
        ->join('tbluser_groups','tbluser_groups.usr_grp_id','=','users.user_grp_id')
        ->get();
    }

    static function getClients(){
        return DB::table('users')
        ->select(DB::raw('CONCAT(pp_last_name, ", ",pp_first_name) as name'), 
        'email', 
         DB::raw('(SELECT count(*) FROM tblcontacts where con_usr_id LIKE user_id) as apps'),
        'tblregistration_profiles.created_at as date_registered', 'reg_category', 'sub_category', 'sub2_category')
        ->join('tblpersonal_profiles','pp_user_id','=','user_id')
        ->join('tblregistration_profiles','reg_user_id','=','user_id')
        ->get();
    }
}
