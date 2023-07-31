<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Activity extends Model
{
    public $timestamps = true; 
    protected $table = 'tblact_requests';
    protected $fillable = ['act_stps_id','act_req_id','act_spec_act','act_start','act_end','act_req_oth','act_submit','act_usr_id','act_form_token'];
       
    public function getTableColumns($table) {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);

    }

    static function getData($u_id, $stps_id){
        return DB::table('tblact_requests')->where(['act_usr_id' => $u_id, 'act_stps_id' => $stps_id])->orderBy('id', 'desc')->limit('1')->get()->toArray();
    }
}
