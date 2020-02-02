<?php

namespace Tests\Feature;

use App\Conversation;
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
}
