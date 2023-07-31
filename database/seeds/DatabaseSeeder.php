<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(DivisionChairsSeeder::class);
        $this->call(ManagementsSeeder::class);
        $this->call(StakeholdersSeeder::class);
        $this->call(UserTypesSeeder::class);
        $this->call(SubStakeholdersSeeder::class);
        $this->call(SubManagementsSeeder::class);
        $this->call(ActivitiesSeeder::class);
        $this->call(SubActivitiesSeeder::class);
        $this->call(VenuesSeeder::class);
        $this->call(UserGroupsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(AdminProfilesSeeder::class);
        $this->call(TitlesSeeder::class);
        $this->call(EmailNotificationsSeeder::class);
        $this->call(ParticularsSeeder::class);
    }
}
