<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubStakeholdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblsub_stakeholders')->truncate();
        DB::table('tblsub_stakeholders')->insert([
            [
                'sub_stake_id' => '1',
                'stake_id' => '2',
                'sub_stake_name' => 'Governors',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_stake_id' => '2',
                'stake_id' => '2',
                'sub_stake_name' => 'Mayors',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_stake_id' => '3',
                'stake_id' => '2',
                'sub_stake_name' => 'Councilors',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_stake_id' => '4',
                'stake_id' => '3',
                'sub_stake_name' => 'Barangay Officials',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_stake_id' => '5',
                'stake_id' => '3',
                'sub_stake_name' => 'Heads of Households Civic',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_stake_id' => '6',
                'stake_id' => '3',
                'sub_stake_name' => 'Civil Societies',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_stake_id' => '7',
                'stake_id' => '4',
                'sub_stake_name' => 'Faculty',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_stake_id' => '8',
                'stake_id' => '4',
                'sub_stake_name' => 'Student Organizations',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_stake_id' => '9',
                'stake_id' => '5',
                'sub_stake_name' => 'People who are economically disadvantage',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_stake_id' => '10',
                'stake_id' => '5',
                'sub_stake_name' => 'People with disabilites',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_stake_id' => '11',
                'stake_id' => '5',
                'sub_stake_name' => 'Seniors',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_stake_id' => '12',
                'stake_id' => '5',
                'sub_stake_name' => 'Orphans',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_stake_id' => '13',
                'stake_id' => '5',
                'sub_stake_name' => 'Persons in troubles with the laws',
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);  
    }
}
