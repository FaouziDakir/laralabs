<?php

use Illuminate\Database\Seeder;

class TeamMembersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\TeamMember')->create([
            'main' => 1
        ]);
        factory('App\TeamMember', 3)->create();

    }
}
