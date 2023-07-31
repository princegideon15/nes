<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class PostActReport extends Model
{
        public $timestamps = true; 
        protected $table = 'tblpost_activity_reports';
        protected $fillable = ['post_stps_id', 'post_usr_id','post_form_token','post_travel_docs','post_csf','post_gb_res','post_remarks'];
           
        public function getTableColumns($table) {
            return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);
        }
        
}
