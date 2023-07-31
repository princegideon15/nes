<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class EvaluationB extends Model
{
    
    public $timestamps = true;
    protected $table = 'tblevaluation_b_attachments';
    protected $fillable = [
                            'eva_stps_id',
                            'eva_usr_id',
                            'eva_form_token',
                            'eva_draft',
                            'eva_evaluation_results',
                            'eva_activity_design',
                            'eva_program',
                            'eva_mechanics',
                            'eva_lib',
                            'eva_endo_letter',
                            'eva_remarks'
                          ];
   
    public function getTableColumns($table) {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);

    }

    static function getData($u_id){      
        return DB::table('tblevaluation_b_attachments')->where('app_usr_id', $u_id)->orderBy('id', 'desc')->limit('1')->get()->toArray();
    }
}
