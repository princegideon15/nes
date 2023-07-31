<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        DB::table('tbltitles')->truncate();
        DB::table('tbltitles')->insert([
            [
                'title_id' => '1',
                'title_name' => 'Mr.',
            ],
            [
                'title_id' => '2',
                'title_name' => 'Mrs.',
            ],
            [
                'title_id' => '3',
                'title_name' => 'Ms.',
            ],
            [
                'title_id' => '4',
                'title_name' => 'Dr.',
            ],
            [
                'title_id' => '5',
                'title_name' => 'NS',
            ],
            [
                'title_id' => '6',
                'title_name' => 'Prof.',
            ],
            [
                'title_id' => '7',
                'title_name' => 'Rev.',
            ],
            [
                'title_id' => '8',
                'title_name' => 'Engr.',
            ],
            [
                'title_id' => '10',
                'title_name' => 'Capt.',
            ],
            [
                'title_id' => '11',
                'title_name' => 'Major',
            ],
            [
                'title_id' => '12',
                'title_name' => 'Lt.-Col.',
            ],
            [
                'title_id' => '13',
                'title_name' => 'Col.',
            ],
            [
                'title_id' => '14',
                'title_name' => 'Lady',
            ],
            [
                'title_id' => '15',
                'title_name' => 'Lt.-Cmdr.',
            ],
            [
                'title_id' => '16',
                'title_name' => 'The Hon.',
            ],
            [
                'title_id' => '17',
                'title_name' => 'Cmdr.',
            ],
            [
                'title_id' => '18',
                'title_name' => 'Flt. Lt.',
            ],
            [
                'title_id' => '19',
                'title_name' => 'Brgdr.',
            ],
            [
                'title_id' => '20',
                'title_name' => 'Judge',
            ],
            [
                'title_id' => '22',
                'title_name' => 'The Hon. Mrs',
            ],
            [
                'title_id' => '23',
                'title_name' => 'Wng. Cmdr.',
            ],
            [
                'title_id' => '24',
                'title_name' => 'Group Capt.',
            ],
            [
                'title_id' => '25',
                'title_name' => 'Rt. Hon. Lord',
            ],
            [
                'title_id' => '26',
                'title_name' => 'Revd. Father',
            ],
            [
                'title_id' => '27',
                'title_name' => 'Revd Canon',
            ],
            [
                'title_id' => '28',
                'title_name' => 'Maj.-Gen.',
            ],
            [
                'title_id' => '29',
                'title_name' => 'Air Cdre.',
            ],
            [
                'title_id' => '30',
                'title_name' => 'Viscount',
            ],
            [
                'title_id' => '31',
                'title_name' => 'Dame',
            ],
            [
                'title_id' => '32',
                'title_name' => 'Rear Admrl.',
            ],
            [
                'title_id' => '33',
                'title_name' => 'Asc Prof',
            ],
            [
                'title_id' => '34',
                'title_name' => 'Fr.',
            ],
            [
                'title_id' => '35',
                'title_name' => 'Sen',
            ],
            [
                'title_id' => '36',
                'title_name' => 'Sec',
            ],
            [
                'title_id' => '37',
                'title_name' => 'Asst Prof',
            ],
            [
                'title_id' => '38',
                'title_name' => 'Sr',
            ],
            [
                'title_id' => '43',
                'title_name' => 'Sir',
            ],
            [
                'title_id' => '44',
                'title_name' => 'Capt.',
            ],
            [
                'title_id' => '47',
                'title_name' => 'Col.',
            ],
            [
                'title_id' => '50',
                'title_name' => 'The Hon.',
            ],
            [
                'title_id' => '51',
                'title_name' => 'Cmdr.',
            ],
            [
                'title_id' => '52',
                'title_name' => 'Flt. Lt.',
            ],
            [
                'title_id' => '53',
                'title_name' => 'Brgdr.',
            ],
            [
                'title_id' => '55',
                'title_name' => 'Lord',
            ],
            [
                'title_id' => '56',
                'title_name' => 'The Hon. Mrs',
            ],
            [
                'title_id' => '57',
                'title_name' => 'Wng. Cmdr.',
            ],
            [
                'title_id' => '87',
                'title_name' => 'Arch.',
            ],

        ]); 
    }
}
