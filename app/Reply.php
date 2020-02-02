<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function username()
    {
        return $this->user->username;
    }

    public function mentionedUsernames()
    {
        preg_match_all('/@([^\s]+(?=(?:\.$)|\b))/', $this->body, $matches);

        return $matches[1];
    }
}
