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
        $conversationOwner = $this->user->username;

        $replyUsernames = $this->replies->map(function ($reply) {
            return $reply->user->username;
        })->all();

        // Go: https://regexr.com/
        // @[^\s]+ means @ begin, and following all characters without space
        // @\w+ means @ begin, and following with words.if there is period, then will not be included.
        // (?=\.$) find period, but don't match it.
        // |\s means otherwise any other kind of space characters will be allowed.
        // ?: not trying to capture of this 
        $replyMentionedUsernames = $this->replies->flatmap(function ($reply){
            preg_match_all('/@([^\s]+(?=(?:\.$)|\s|$))/', $reply->body, $matches);

            return $matches[1];
        })->all();

        return collect(array_merge([$conversationOwner], $replyUsernames, $replyMentionedUsernames))->unique()->all();
    }
}
