<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubManagementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblsub_managements')->truncate();
        DB::table('tblsub_managements')->insert([
            [
                'sub_mgt_id' => '1',
                'mgt_id' => '1',
                'sub_mgt_name' => 'HR',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_mgt_id' => '2',
                'mgt_id' => '1',
                'sub_mgt_name' => 'SMS',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_mgt_id' => '3',
                'mgt_id' => '1',
                'sub_mgt_name' => 'Records',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_mgt_id' => '4',
                'mgt_id' => '1',
                'sub_mgt_name' => 'Cashier',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_mgt_id' => '5',
                'mgt_id' => '1',
                'sub_mgt_name' => 'Budget',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_mgt_id' => '6',
                'mgt_id' => '1',
                'sub_mgt_name' => 'Accounting',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_mgt_id' => '7',
                'mgt_id' => '2',
                'sub_mgt_name' => 'TCDS',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_mgt_id' => '8',
                'mgt_id' => '2',
                'sub_mgt_name' => 'REMS',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_mgt_id' => '9',
                'mgt_id' => '4',
                'sub_mgt_name' => 'Planning',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_mgt_id' => '10',
                'mgt_id' => '5',
                'sub_mgt_name' => 'MIS',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_mgt_id' => '11',
                'mgt_id' => '5',
                'sub_mgt_name' => 'Library',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_mgt_id' => '12',
                'mgt_id' => '5',
                'sub_mgt_name' => 'IDS',
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]); 
    }
}
