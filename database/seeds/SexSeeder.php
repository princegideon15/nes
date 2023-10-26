<?php

use Illuminate\Database\Seeder;

class SexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblsex')->truncate();
        DB::table('tblsex')->insert([
            [
                'id' => '1',
                'sex' => 'Male',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => '2',
                'sex' => 'Female',
                'created_at' => date("Y-m-d H:i:s")
            ],
        ]);
    }
}
