<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionChairsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbldivchairs')->truncate();
        DB::table('tbldivchairs')->insert([
            [
                'divchr_id' => '1',
                'divchr_name' => 'I',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'divchr_id' => '2',
                'divchr_name' => 'II',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'divchr_id' => '3',
                'divchr_name' => 'III',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'divchr_id' => '4',
                'divchr_name' => 'IV',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'divchr_id' => '5',
                'divchr_name' => 'V',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'divchr_id' => '6',
                'divchr_name' => 'VI',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'divchr_id' => '7',
                'divchr_name' => 'VII',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'divchr_id' => '8',
                'divchr_name' => 'VIII',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'divchr_id' => '9',
                'divchr_name' => 'IX',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'divchr_id' => '10',
                'divchr_name' => 'X',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'divchr_id' => '11',
                'divchr_name' => 'XI',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'divchr_id' => '12',
                'divchr_name' => 'XII',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'divchr_id' => '13',
                'divchr_name' => 'XIII',
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);  
    }
}
