<?php

use Illuminate\Database\Seeder;

class NewslettersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Newsletter', 12)->create();
    }
}
