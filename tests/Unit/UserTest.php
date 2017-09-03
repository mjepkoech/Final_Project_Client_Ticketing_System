<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseMigrations;
    protected $ticket;

    public function setUp(){
        parent::setUp();
        $this->ticket=factory('App\Ticket')->create();
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    /** @test */
    public function a_ticket_has_a_creator()
    {
        $this->assertInstanceOf('App\User', $this->ticket->creator);
    }
}
