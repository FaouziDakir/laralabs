<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    protected $fillable = [
        'auteur', 'email', 'subject', 'message', 'post_id'
    ];

    public function avatar()
    {
        $image = 'visiteur.jpg';
        if(User::where('email', $this->email)->get()->count()){
            $image = User::where('email', $this->email)->first()->avatar;
            
        } 

        return $image;
    }
}
