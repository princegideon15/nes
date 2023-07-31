<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class EmailNotification extends Model
{
    public $timestamps = true;
    protected $table = 'tblemail_notifications';
    protected $fillable = ['row_id','enc_description','enc_subject','enc_cc','enc_bcc','enc_content','enc_user_group'];
   
    public function getTableColumns($table) {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);

    }
    
    // static function getData($u_id, $stps_id){
    //     // return DB::table('tblobjectives')->where(['obj_usr_id' => $u_id, 'obj_stps_id' => $stps_id])->get()->toArray();
    //     return DB::table('tblobjectives')->where(['obj_usr_id' => $u_id, 'obj_stps_id' => $stps_id])->orderBy('id', 'desc')->limit('1')->get()->toArray();
    // }
}
