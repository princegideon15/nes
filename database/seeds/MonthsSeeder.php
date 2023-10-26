<?php

use Illuminate\Database\Seeder;

class MonthsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblmonths')->truncate();
        DB::table('tblmonths')->insert([
            [
                'id' => '1',
                'month' => 'Jan',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '2',
                'month' => 'Feb',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '3',
                'month' => 'Mar',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '4',
                'month' => 'Apr',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '5',
                'month' => 'May',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '6',
                'month' => 'Jun',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '7',
                'month' => 'Jul',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '8',
                'month' => 'Aug',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '9',
                'month' => 'Sep',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '10',
                'month' => 'Oct',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '11',
                'month' => 'Nov',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '12',
                'month' => 'Dec',
                'created_at' => date("Y-m-d H:i:s")
            ],
        ]);
    }
}
