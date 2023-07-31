<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Neep extends Model
{
    static function SubmitRequest($data){      
        return DB::connection('neep')->table('tblneep_requests')
        ->insert($data);
    }
    static function checkTrackingByYear($year){      
        return DB::connection('neep')->table('tblneep_requests')
        ->select('*')
        ->where('date_created', 'like', '%' . $year . '%')
        ->get()
        ->toArray();
    }
}
