<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StakeholdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblstakeholders')->truncate();
        DB::table('tblstakeholders')->insert([
            [
                'stk_id' => '1',
                'stk_name' => 'DOST Regional Offices',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'stk_id' => '2',
                'stk_name' => 'Local Government Units',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'stk_id' => '3',
                'stk_name' => 'Communities',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'stk_id' => '4',
                'stk_name' => 'Schools/Colleges/Universities',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'stk_id' => '5',
                'stk_name' => 'Other Sectores/Groups/Organizations',
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);  
    }
}
