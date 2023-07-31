<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VenuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblvenues')->truncate();
        DB::table('tblvenues')->insert([
            [
                'ven_id' => '1',
                'ven_name' => 'Air-conditioned and can accommodate 50-100 participants',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'ven_id' => '2',
                'ven_name' => 'Not air-conditioned but properly ventilated and can accommodate 50-100 participants',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'ven_id' => '3',
                'ven_name' => 'With 100mbps internet connection',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'ven_id' => '4',
                'ven_name' => 'Has no internet connection',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'ven_id' => '5',
                'ven_name' => 'With GOOD sound System with microphones wireless or not',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'ven_id' => '6',
                'ven_name' => 'White Screen, Projectors, all others that are necessary for presentations',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'ven_id' => '7',
                'ven_name' => 'Others',
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]); 
    }
}
