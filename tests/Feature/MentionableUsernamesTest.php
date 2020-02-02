<?php

namespace Tests\Feature;

use App\Conversation;
use App\Reply;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MentionableUsernamesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_includes_the_username_of_the_conversation_owner()
    {
        $conversation = factory(Conversation::class)->create();

        $this->assertContains($conversation->user->username, $conversation->mentionableUsernames());
    }

    /** @test */
    function it_includes_the_username_of_all_reply_creators()
    {
        $conversation = factory(Conversation::class)->create();

        $reply = factory(Reply::class)->make();
        
        $conversation->addReply($reply);

        $this->assertContains($reply->user->username, $conversation->mentionableUsernames());
    }

    /** @test */
    function it_includes_the_username_of_all_mentioned_users_within_replies()
    {
        $conversation = factory(Conversation::class)->create();

        $reply = factory(Reply::class)->make(['body' => 'Check with @exampleuser']);
        
        $conversation->addReply($reply);

        $this->assertContains('@exampleuser', $conversation->mentionableUsernames());
    }

    /** @test */
    function it_strips_any_duplicates()
    {
        $conversation = factory(Conversation::class)->create();

        $reply = factory(Reply::class)->make(['body' => 'Check with @' . $conversation->user->username]);
        
        $conversation->addReply($reply);


        $this->assertCount(2, $conversation->mentionableUsernames());
        $this->assertEquals([$conversation->user->username, $reply->user->username], $conversation->mentionableUsernames());

    }
}
