<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class FinalizationB extends Model
{
    public $timestamps = true;
    protected $table = 'tblfinalization_b_attachments';
    protected $fillable = [
                            'fin_stps_id',
                            'fin_usr_id',
                            'fin_form_token',
                            'fin_draft',
                            'fin_activity_design',
                            'fin_program',
                            'fin_mechanics',
                            'fin_promo_materials',
                            'fin_invi_letter',
                            'fin_collaterals',
                            'fin_remarks'
                          ];
   
    public function getTableColumns($table) {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);

    }

    static function getData($u_id){      
        return DB::table('tblfinalization_b_attachments')->where('app_usr_id', $u_id)->orderBy('id', 'desc')->limit('1')->get()->toArray();
    }
}
