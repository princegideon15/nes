<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Objective extends Model
{
    public $timestamps = true;
    protected $table = 'tblobjectives';
    protected $fillable = ['obj_stps_id','obj_1','obj_2','obj_3','obj_4','obj_5','obj_gender','obj_sdg','obj_submit','obj_usr_id','obj_form_token'];
   
    public function getTableColumns($table) {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);

    }
    
    static function getData($u_id, $stps_id){
        // return DB::table('tblobjectives')->where(['obj_usr_id' => $u_id, 'obj_stps_id' => $stps_id])->get()->toArray();
        return DB::table('tblobjectives')->where(['obj_usr_id' => $u_id, 'obj_stps_id' => $stps_id])->orderBy('id', 'desc')->limit('1')->get()->toArray();
    }
}
