<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Logs extends Model
{
    public $timestamps = true; 
    protected $table = 'tbllogs';
    protected $fillable = ['log_user_id', 
                            'log_email', 
                            'log_description', 
                            'log_url', 
                            'log_controller', 
                            'log_model', 
                            'log_query', 
                            'log_ip_address', 
                            'log_user_agent', 
                            'log_browser'];
       
    public function getTableColumns($table) {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);
    }
}
