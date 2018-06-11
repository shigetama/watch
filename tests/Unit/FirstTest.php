<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FirstTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCalendar()
    {
      $this->assertDatabaseHas('users', [
        'email' => 'test1@test.test'
      ]);
    }
}
