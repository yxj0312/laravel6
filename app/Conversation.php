<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function addReply(Reply $reply)
    {
        $this->replies()->save($reply);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mentionableUsernames()
    {
        $replyUsernames = $this->replies->map(function ($reply) {
            return $reply->user->username;
        })->all();

        return array_merge([
            $this->user->username,            
        ], $replyUsernames);
    }
}
