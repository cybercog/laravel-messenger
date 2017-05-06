<?php

namespace Cmgmyr\Messenger\Test\Unit\Models;

use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Test\TestCase;

class ParticipantTest extends TestCase
{
    /** @test */
    public function it_can_fill_thread_id()
    {
        $participant = new Participant([
            'thread_id' => 4,
        ]);

        $this->assertEquals(4, $participant->thread_id);
    }

    /** @test */
    public function it_can_fill_user_id()
    {
        $participant = new Participant([
            'user_id' => 4,
        ]);

        $this->assertEquals(4, $participant->user_id);
    }

    /** @test */
    public function it_can_fill_last_read()
    {
        $participant = new Participant([
            'last_read' => '2017-05-05 00:00:00',
        ]);

        $this->assertEquals('2017-05-05 00:00:00', $participant->last_read);
    }

    /** @test */
    public function it_can_cast_last_read_to_datetime()
    {
        $participant = new Participant([
            'last_read' => '2017-05-05 00:00:00',
        ]);

        $this->assertInstanceOf(Carbon::class, $participant->last_read);
    }
}
