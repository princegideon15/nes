<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Experts extends Model
{
    
    public $timestamps = true;
    protected $table = 'tblexperts';
    protected $fillable = [
                            'exp_stps_id',
                            'exp_form_token',
                            'eva_form_token',
                            'exp_title',
                            'exp_name',
                            'exp_expertise',
                            'exp_email',
                            'exp_usr_id',
                            'exp_status',
                            'created_at',
                            'updated_at',
                          ];
   
    public function getTableColumns($table) {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);

    }
}