<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Status extends Model
{
    public $timestamps = true; 
    protected $table = 'tblapplication_status';
    protected $fillable = ['app_stps_id','app_status', 'app_usr_id','app_form_token'];
       
    public function getTableColumns($table) {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);
    }
}
