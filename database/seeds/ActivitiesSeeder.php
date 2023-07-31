<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblactivities')->truncate();
        DB::table('tblactivities')->insert([
            [
                'act_id' => '1',
                'act_name' => 'WRITESHOP',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'act_id' => '2',
                'act_name' => 'TEACHER TRAINING',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'act_id' => '3',
                'act_name' => 'COMMUNITY EMPOWERMENT',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'act_id' => '4',
                'act_name' => 'SCIENCE FOR KIDS',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'act_id' => '5',
                'act_name' => 'OTHERS',
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);  
    }
}
