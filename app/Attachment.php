<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Attachment extends Model
{
    public $timestamps = true; 
    protected $table = 'tblattachments';
    protected $fillable = ['att_stps_id','att_req_letter', 'att_lib', 'att_justification','att_submit','att_usr_id','att_form_token'];
       
    public function getTableColumns($table) {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);

    }

    static function getData($u_id, $stps_id){
        return DB::table('tblattachments')->where(['att_usr_id' => $u_id, 'att_stps_id' => $stps_id])->get()->toArray();
    }
}
