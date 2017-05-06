<?php

namespace Cmgmyr\Messenger\Test\Unit\Models;

use Cmgmyr\Messenger\Models\Thread;
use Cmgmyr\Messenger\Test\TestCase;

class ThreadTest extends TestCase
{
    /** @test */
    public function it_can_fill_subject()
    {
        $thread = new Thread([
            'subject' => 'Test subject',
        ]);

        $this->assertEquals('Test subject', $thread->subject);
    }
}
