<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;
use App\User;
use App\Comment;

class Post extends Model
{
    protected $fillable = [
        'titre', 'message', 'image', 'auteur_id'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function auteur()
    {
        return User::find($this->auteur_id);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
