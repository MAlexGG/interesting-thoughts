<?php

namespace Tests\Feature;

use App\Models\Thought;
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
            ->assertViewIs('.thoughts.home');
    }

    public function test_thought_can_be_created()
    {
        $this->withoutExceptionHandling();

        $this->post(route('store'), [
            'thought' => 'new thought',
            'author' => 'new author',
            'image' => 'new image'
        ]);

        $response = Thought::first();
        $this->assertCount(1, Thought::all());
        $this->assertEquals($response->thought, 'new thought');
        $this->assertEquals($response->author, 'new author');
        $this->assertEquals($response->image, 'new image');
    }

    public function test_thought_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->post(route('store'), [
            'thought' => 'thought',
            'author' => 'author',
            'image' => 'image'
        ]);

        $thought = Thought::first();

        $this->put(route('update', $thought->id), [
            'thought' => 'new thought',
            'author' => 'new author',
            'image' => 'new image'
        ]);

        $response = Thought::first();
        $this->assertEquals($response->thought, 'new thought');
        $this->assertEquals($response->author, 'new author');
        $this->assertEquals($response->image, 'new image');
    }

    public function test_thought_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $this->post(route('store'), [
            'thought' => 'thought',
            'author' => 'author',
            'image' => 'image'
        ]);

        $thought = Thought::first();

        $this->delete(route('delete', $thought->id));
        $this->assertCount(0, Thought::all());
    }
}
