<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbladmin_profiles')->truncate();
        DB::table('tbladmin_profiles')->insert([
            [
                'user_name' => 'Gerard Balde',
                'user_privilege' => '',
                'user_status' => 1,
                'user_id' => '999999',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_name' => 'Records Section',
                'user_privilege' => '',
                'user_status' => 1,
                'user_id' => '3',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_name' => 'Director',
                'user_privilege' => '',
                'user_status' => 4,
                'user_id' => '4',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_name' => 'Division Chief',
                'user_privilege' => '',
                'user_status' => 1,
                'user_id' => '5',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_name' => 'Division Chair',
                'user_privilege' => '',
                'user_status' => 1,
                'user_id' => '6',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_name' => 'STPS Committee',
                'user_privilege' => '',
                'user_status' => 1,
                'user_id' => '7',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_name' => 'Finance Committee',
                'user_privilege' => '',
                'user_status' => 1,
                'user_id' => '8',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_name' => 'NRCP GB',
                'user_privilege' => '',
                'user_status' => 1,
                'user_id' => '9',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_name' => 'RIDD IDS',
                'user_privilege' => '',
                'user_status' => 1,
                'user_id' => '10',
                'created_at' => date("Y-m-d H:i:s")
            ],
        ]);
    }
}
