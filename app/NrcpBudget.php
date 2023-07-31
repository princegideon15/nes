<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class NrcpBudget extends Model
{
    public $timestamps = true; 
    protected $table = 'tbllib_nrcp';
    protected $fillable = ['lib_stps_id', 'lib_usr_id', 'lib_form_token', 'lib_prt_id', 'lib_amount'];
       
    public function getTableColumns($table) {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);

    }

    static function getData($u_id, $stps_id){
        return DB::table('tbllib_nrcp')->where(['lib_usr_id' => $u_id, 'lib_stps_id' => $stps_id])->get()->toArray();
    }
}
