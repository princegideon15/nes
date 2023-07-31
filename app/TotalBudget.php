<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class TotalBudget extends Model
{
    public $timestamps = true; 
    protected $table = 'tbltotal_budgets';
    protected $fillable = ['bud_stps_id', 'bud_usr_id', 'bud_form_token', 'bud_total_nrcp', 'bud_total_counter', 'bud_total_other'];
       
    public function getTableColumns($table) {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);

    }

    static function getData($u_id, $stps_id){
        return DB::table('tbltotal_budgets')->where(['bud_usr_id' => $u_id, 'bud_stps_id' => $stps_id])->get()->toArray();
    }
}
