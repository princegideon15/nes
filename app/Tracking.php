<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Tracking extends Model
{
    public $timestamps = true; 
    protected $table = 'tbltracking';
    protected $fillable = ['description','form_token', 'status','usr_id', 'remarks', 'tracking'];
       
    public function getTableColumns($table) {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);
    }
    
    static function getTracking($u_id, $token){
        return DB::table('tbltracking')
        // ->select('tbltracking.*', 'pp_first_name', 'pp_last_name', 'remarks')
        ->select('tbltracking.*', 'remarks')
        // ->where(['usr_id' => $u_id, 'form_token' => $token])
        ->where(['form_token' => $token])
        // ->join('tblpersonal_profiles', 'tblpersonal_profiles.pp_user_id', '=', 'tbltracking.usr_id')
        ->orderBy('updated_at', 'desc')
        ->get()->toArray();
    }

    
    
    static function getTrackingByToken13($token){
        return DB::table('tbltracking')
        ->select('*')
        ->where('form_token', 'like', $token . '%')
        ->orderBy('updated_at', 'desc')
        ->get()->toArray();
    }
    
    static function getLimitedTracking($u_id, $token){
        return DB::table('tbltracking')
        // ->select('tbltracking.*', 'pp_first_name', 'pp_last_name')
        ->select('tbltracking.*')
        // ->where(['usr_id' => $u_id, 'form_token' => $token])
        ->where(['form_token' => $token])
        // ->join('tblpersonal_profiles', 'tblpersonal_profiles.pp_user_id', '=', 'tbltracking.usr_id')
        ->orderBy('updated_at', 'desc')
        ->limit('3')
        ->get()->toArray();
    }
}
