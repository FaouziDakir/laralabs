<?php

use Illuminate\Database\Seeder;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'Fouz',
            'avatar' => 'faker.jpg',
            'role' => 'admin',
            'email' => 'fouz@gmail.com',
            'email_verified_at' => now(),
            'biographie' => 'blabla',
            'password' => bcrypt('test'), // password
            'remember_token' => Str::random(10),
        ]);
        factory('App\User', 4)->create();

    }
}
