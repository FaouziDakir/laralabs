<?php

use Illuminate\Database\Seeder;

class ServicesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Service', 12)->create();
    }
}
