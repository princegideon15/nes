<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationProfile extends Model
{
    public $timestamps = true;
    protected $table = 'tblregistration_profiles';
    protected $fillable = ['reg_user_id','reg_category','sub_category','sub2_category'];
    
    public function getTableColumns($table) {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);
    }
}
