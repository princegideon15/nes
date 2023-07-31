<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class OtherCounterpart extends Model
{
    public $timestamps = true; 
    protected $table = 'tbllib_others';
    protected $fillable = ['liboth_stps_id', 'liboth_usr_id', 'liboth_form_token', 'liboth_prt_id', 'liboth_amount'];
       
    public function getTableColumns($table) {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);

    }

    static function getData($u_id, $stps_id){
        return DB::table('tbllib_others')->where(['liboth_usr_id' => $u_id, 'liboth_stps_id' => $stps_id])->get()->toArray();
    }
}

