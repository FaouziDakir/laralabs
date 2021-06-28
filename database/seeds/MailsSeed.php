<?php

use Illuminate\Database\Seeder;

class MailsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Mail', 4)->create();
    }
}
