<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Venue extends Model
{
    public $timestamps = true;
    protected $table = 'tblvenue_specs';
    protected $fillable = ['ven_stps_id','ven_spec','ven_spec_oth','ven_submit','ven_usr_id','ven_form_token','ven_address'];

    public function getTableColumns($table) {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);

    }
    
    static function getData($u_id, $stps_id){
        // return DB::table('tblvenue_specs')->where(['ven_usr_id' => $u_id, 'ven_stps_id' => $stps_id])->get()->toArray();
        return DB::table('tblvenue_specs')->where(['ven_usr_id' => $u_id, 'ven_stps_id' => $stps_id])->orderBy('id', 'desc')->limit('1')->get()->toArray();
    }
}
