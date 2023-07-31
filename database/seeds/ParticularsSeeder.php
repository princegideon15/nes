<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticularsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblparticulars')->truncate();
        DB::table('tblparticulars')->insert([
            [
                'prt_name' => 'Representation Expenses Food and Venue',
            ],
            [
                'prt_name' => 'Supplies and Materials',
            ],
            [
                'prt_name' => 'Travelling Expenses',
            ],
            [
                'prt_name' => 'Rent Expenses',
            ],
            [
                'prt_name' => 'Professional Services Honoraria',
            ],
            [
                'prt_name' => 'Fuel, Gasoline, and Lubricants',
            ],
            [
                'prt_name' => 'Other MOOE',
            ],
        ]);  
    }
}
