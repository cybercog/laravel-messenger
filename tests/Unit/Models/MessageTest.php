<?php

namespace Cmgmyr\Messenger\Test\Unit\Models;

use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Cmgmyr\Messenger\Test\TestCase;
use Cmgmyr\Messenger\Test\User;

class MessageTest extends TestCase
{
    /** @test */
    public function it_can_fill_thread_id()
    {
        $message = new Message([
            'thread_id' => 4,
        ]);

        $this->assertEquals(4, $message->thread_id);
    }

    /** @test */
    public function it_can_fill_user_id()
    {
        $message = new Message([
            'user_id' => 4,
        ]);

        $this->assertEquals(4, $message->user_id);
    }

    /** @test */
    public function it_can_fill_body()
    {
        $message = new Message([
            'body' => 'Test body',
        ]);

        $this->assertEquals('Test body', $message->body);
    }

    /** @test */
    public function it_can_belong_to_thread()
    {
        $thread = $this->faktory->create('thread');

        $message = new Message([
            'thread_id' => $thread->id,
        ]);

        $this->assertInstanceOf(Thread::class, $message->thread);
        $this->assertEquals($thread->id, $message->thread->id);
    }

    /** @test */
    public function it_can_belong_to_user()
    {
        $participant = $this->faktory->build('participant');

        $message = new Message([
            'user_id' => $participant->user_id,
        ]);

        $this->assertInstanceOf(User::class, $message->user);
        $this->assertEquals($participant->user_id, $message->user->id);
    }

    /** @test */
    public function it_can_has_many_participants()
    {
        $participant1 = $this->faktory->build('participant');
        $participant2 = $this->faktory->build('participant', ['user_id' => 2]);

        $message = $this->faktory->build('message');
        $thread = $this->faktory->create('thread');
        $thread->messages()->save($message);
        $thread->participants()->saveMany([$participant1, $participant2]);

        $message = $this->faktory->create('message');

        $this->assertCount(2, $message->participants);
        $this->assertInstanceOf(Participant::class, $message->participants->first());
        $this->assertEquals($participant1->id, $message->participants->first()->id);
        $this->assertEquals($participant2->id, $message->participants->last()->id);
    }
}
