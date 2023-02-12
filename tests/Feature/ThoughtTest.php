<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThoughtTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_thoughts_can_be_listed()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/');
        $response->assertStatus(200)
            ->assertViewIs('home');
    }

    /* public function test_thought_can_be_created()
    {
        $this->withoutExceptionHandling();
        
        $thought = Thought::
    } */
}
