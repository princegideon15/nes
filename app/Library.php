<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Library extends Model
{
    static function getTitles(){
        return DB::connection('skms')->table('tbltitles')->get()->toArray();
    }
}
