<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name', 'teamrole', 'teamimage', 'main'
    ];

    public function main($main = true)
    {
        $this->update(compact('main'));
    }

    public function notMain()
    {
        $this->main(false);
    }
}
