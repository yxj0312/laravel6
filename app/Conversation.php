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
        // After refactoring
        return collect($this->user->username)
            ->merge($this->replies->map->username())
            ->merge($this->replies->flatMap->mentionedUsernames())
            ->flatten()
            ->unique()
            ->all();
        
        // $conversationUsernames = $this->user->username;

        // // $replyUsernames = $this->replies->map(function ($reply) {
        // //     return $reply->user->username;
        // // })->all();

        // $replyUsernames = $this->replies->map->username();

        // // Go: https://regexr.com/
        // // @[^\s]+ means @ begin, and following all characters without space
        // // @\w+ means @ begin, and following with words.if there is period, then will not be included.
        // // (?=\.$) find period, but don't match it.
        // // |\b means otherwise any other kind of word boundary characters will be allowed.
        // // ?: not trying to capture of this 

        // // $replyMentionedUsernames = $this->replies->flatMap(function ($reply){
        // //     return $reply->mentionedUsernames();
        // //     // preg_match_all('/@([^\s]+(?=(?:\.$)|\b))/', $reply->body, $matches);

        // //     // return $matches[1];
        // // })->all();

        // // refactor using higher order collections
        // $replyMentionedUsernames = $this->replies->flatMap->mentionedUsernames();

        // // return collect(
        // //     array_merge([$conversationOwner], $replyUsernames, $replyMentionedUsernames)
        // // )->unique()->all();

        // // Refactor
        // return collect(
        //     [$conversationUsernames, $replyUsernames, $replyMentionedUsernames]
        // )->flatten()->unique()->all();
    }
}
