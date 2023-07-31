<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Particulars extends Model
{
    public $timestamps = true;
    protected $table = 'tblparticulars';
    protected $fillable = ['prt_name'];
   
    public function getTableColumns($table) {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($table);
    }
}
