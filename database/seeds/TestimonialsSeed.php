<?php

use Illuminate\Database\Seeder;

class TestimonialsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Testimonial', 4)->create();

    }
}
