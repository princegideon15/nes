<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Participant extends Model
{
    public $timestamps = true; 
    protected $table = 'tblparticipants';
    protected $fillable = ['prt_stps_id','prt_id', 'prt_name','prt_age','prt_sex','prt_pos','prt_int','prt_submit','prt_usr_id','prt_form_token'];
       
    public function getTableColumns($table) {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);

    }

    static function getData($u_id, $stps_id){
        // return DB::table('tblparticipants')->where(['prt_usr_id' => $u_id, 'prt_stps_id' => $stps_id])->get()->toArray();
        return DB::table('tblparticipants')->where(['prt_usr_id' => $u_id, 'prt_stps_id' => $stps_id])->get()->toArray();
    }
}
