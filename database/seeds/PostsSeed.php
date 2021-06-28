<?php

use Illuminate\Database\Seeder;

class PostsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Post', 4)->create();
        factory('App\Tag', 3)->create()->each(function ($item){
            \DB::table('post_tag')->insert([
                'post_id' => App\Post::all()->last()->id,
                'tag_id' => $item->id
            ]);
        });
    }
}
