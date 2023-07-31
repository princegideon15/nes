<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblsub_activities')->truncate();
        DB::table('tblsub_activities')->insert([
            [
                'sub_act_id' => '1',
                'act_id' => '1',
                'sub_act_name' => 'Research Proposal',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_act_id' => '2',
                'act_id' => '1',
                'sub_act_name' => 'Journal Manuscript',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_act_id' => '3',
                'act_id' => '1',
                'sub_act_name' => 'Science News Writing',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_act_id' => '4',
                'act_id' => '2',
                'sub_act_name' => 'Sciences',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_act_id' => '5',
                'act_id' => '2',
                'sub_act_name' => 'Humanities',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_act_id' => '6',
                'act_id' => '2',
                'sub_act_name' => 'Social Science',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_act_id' => '7',
                'act_id' => '3',
                'sub_act_name' => 'DRRM',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_act_id' => '8',
                'act_id' => '3',
                'sub_act_name' => 'HIV',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_act_id' => '9',
                'act_id' => '3',
                'sub_act_name' => 'Water and Foode Safety',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_act_id' => '10',
                'act_id' => '3',
                'sub_act_name' => 'Urban Farming',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_act_id' => '11',
                'act_id' => '3',
                'sub_act_name' => 'Disease Infection Prevention',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_act_id' => '12',
                'act_id' => '3',
                'sub_act_name' => 'Other Public Awareness',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_act_id' => '14',
                'act_id' => '3',
                'sub_act_name' => 'Knowledge Enhancemenet Development Programs',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_act_id' => '15',
                'act_id' => '4',
                'sub_act_name' => 'Storytelling',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_act_id' => '16',
                'act_id' => '4',
                'sub_act_name' => 'Video Showing',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'sub_act_id' => '17',
                'act_id' => '4',
                'sub_act_name' => 'Science Teaching',
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);  
    }
}
