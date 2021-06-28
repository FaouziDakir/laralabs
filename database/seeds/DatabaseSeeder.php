<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ServicesSeed::class);
        $this->call(MailsSeed::class);
        $this->call(NewslettersSeed::class);
        $this->call(PostsSeed::class);
        $this->call(ProjectsSeed::class);
        $this->call(TeamMembersSeed::class);
        $this->call(TestimonialsSeed::class);
        $this->call(UsersSeed::class);
        $this->call(CommentsSeed::class);



    }
}
