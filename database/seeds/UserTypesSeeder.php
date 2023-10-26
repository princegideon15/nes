<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbluser_types')->truncate();
        DB::table('tbluser_types')->insert([
            [
                'ut_type' => 'Division Chair',
                'created_at' => date("Y-m-d H:i:s")
            ],[
                'ut_type' => 'Stockholders',
                'created_at' => date("Y-m-d H:i:s")
            ],[
                'ut_type' => 'NRCP Management',
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
