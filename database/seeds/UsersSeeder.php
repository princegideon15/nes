<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'email' => 'gerard.balde@nrcp.dost.gov.ph',
                'password' => '$2y$10$PeXMLNWU7d5dJOWubC7ut.dxF5Qxk9B2Q0Lg04JUWEED5oApeBunC',
                'password_copy' => 'nrcp123123',
                'user_id' => 999999,
                'user_grp_id' => 1
            ],
            [
                'email' => 'records@test.com',
                'password' => '$2y$10$PeXMLNWU7d5dJOWubC7ut.dxF5Qxk9B2Q0Lg04JUWEED5oApeBunC',
                'password_copy' => 'nrcp123123',
                'user_id' => 3,
                'user_grp_id' => 3
            ],
            [
                'email' => 'director@test.com',
                'password' => '$2y$10$PeXMLNWU7d5dJOWubC7ut.dxF5Qxk9B2Q0Lg04JUWEED5oApeBunC',
                'password_copy' => 'nrcp123123',
                'user_id' => 4,
                'user_grp_id' => 4
            ],
            [
                'email' => 'divchief@test.com',
                'password' => '$2y$10$PeXMLNWU7d5dJOWubC7ut.dxF5Qxk9B2Q0Lg04JUWEED5oApeBunC',
                'password_copy' => 'nrcp123123',
                'user_id' => 5,
                'user_grp_id' => 5
            ],
            [
                'email' => 'divchair@test.com',
                'password' => '$2y$10$PeXMLNWU7d5dJOWubC7ut.dxF5Qxk9B2Q0Lg04JUWEED5oApeBunC',
                'password_copy' => 'nrcp123123',
                'user_id' => 6,
                'user_grp_id' => 6
            ],
            [
                'email' => 'stpscom@test.com',
                'password' => '$2y$10$PeXMLNWU7d5dJOWubC7ut.dxF5Qxk9B2Q0Lg04JUWEED5oApeBunC',
                'password_copy' => 'nrcp123123',
                'user_id' => 7,
                'user_grp_id' => 7
            ],
            [
                'email' => 'fincom@test.com',
                'password' => '$2y$10$PeXMLNWU7d5dJOWubC7ut.dxF5Qxk9B2Q0Lg04JUWEED5oApeBunC',
                'password_copy' => 'nrcp123123',
                'user_id' => 8,
                'user_grp_id' => 8
            ],
            [
                'email' => 'nrcpgb@test.com',
                'password' => '$2y$10$PeXMLNWU7d5dJOWubC7ut.dxF5Qxk9B2Q0Lg04JUWEED5oApeBunC',
                'password_copy' => 'nrcp123123',
                'user_id' => 9,
                'user_grp_id' => 9
            ],
            [
                'email' => 'riddids@test.com',
                'password' => '$2y$10$PeXMLNWU7d5dJOWubC7ut.dxF5Qxk9B2Q0Lg04JUWEED5oApeBunC',
                'password_copy' => 'nrcp123123',
                'user_id' => 10,
                'user_grp_id' => 10
            ],
        ]);  
    }
}
