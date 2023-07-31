<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    public $timestamps = true;
    protected $table = 'tblcontacts';
    protected $fillable = ['con_ins','con_reg','con_prov','con_city','con_brgy','con_address','con_head_ins','con_focal_p','con_contact_num','con_contact_add','con_usr_id','con_submit','con_form_token'];
   
    public function getTableColumns($table) {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);

    }

    static function getData($u_id){      
        return DB::table('tblcontacts')->where('con_usr_id', $u_id)->orderBy('id', 'desc')->limit('1')->get()->toArray();
    }
}
