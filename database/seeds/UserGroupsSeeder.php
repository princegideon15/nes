<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbluser_groups')->truncate();
        DB::table('tbluser_groups')->insert([
            [
                'usr_grp_id' => '0',
                'usr_grp_role' => 'Client',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'usr_grp_id' => '1',
                'usr_grp_role' => 'Superadmin',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'usr_grp_id' => '2',
                'usr_grp_role' => 'Admin',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'usr_grp_id' => '3',
                'usr_grp_role' => 'Records Section',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'usr_grp_id' => '4',
                'usr_grp_role' => 'Director',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'usr_grp_id' => '5',
                'usr_grp_role' => 'Division Chief',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'usr_grp_id' => '6',
                'usr_grp_role' => 'Division Chair',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'usr_grp_id' => '7',
                'usr_grp_role' => 'NES Linkages & Outreach Program Committee',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'usr_grp_id' => '8',
                'usr_grp_role' => 'Finance Committee',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'usr_grp_id' => '9',
                'usr_grp_role' => 'NRCP GB',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'usr_grp_id' => '10',
                'usr_grp_role' => 'IDS',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'usr_grp_id' => '11',
                'usr_grp_role' => 'BUDGET',
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);  
    }
}
