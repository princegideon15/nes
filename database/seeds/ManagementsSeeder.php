<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblmanagements')->truncate();
        DB::table('tblmanagements')->insert([
            [
                'mgt_id' => '1',
                'mgt_name' => 'FAD',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'mgt_id' => '2',
                'mgt_name' => 'RDMD',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'mgt_id' => '3',
                'mgt_name' => 'OP',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'mgt_id' => '4',
                'mgt_name' => 'OED',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'mgt_id' => '5',
                'mgt_name' => 'RIDD',
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);  
    }
}
