<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Counterpart extends Model
{
    public $timestamps = true; 
    protected $table = 'tbllib_counterparts';
    protected $fillable = ['cp_stps_id', 'cp_usr_id', 'cp_form_token', 'cp_prt_id', 'cp_amount'];
       
    public function getTableColumns($table) {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);

    }

    static function getData($u_id, $stps_id){
        return DB::table('tbllib_counterparts')->where(['cp_usr_id' => $u_id, 'cp_stps_id' => $stps_id])->get()->toArray();
    }
}

