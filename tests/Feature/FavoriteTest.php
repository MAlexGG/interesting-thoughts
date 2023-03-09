<?php

namespace Tests\Feature;

use App\Models\Favorite;
use App\Models\Thought;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FavoriteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_thought_can_be_favorite()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);
        $thought = Thought::factory()->create();

        $this->post(route('favorites', $thought), [
            'thought_id' => $thought->id,
            'user_id' => $user->id
        ]);

        $response = Favorite::first();
        $this->assertCount(1, Thought::all());
        $this->assertEquals($response->thought_id, 1);
        $this->assertEquals($response->user_id, 1);
    }

    public function test_a_thought_can_be_not_favorite()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);
        $thought = Thought::factory()->create();

        $this->post(route('favorites', $thought), [
            'thought_id' => $thought->id,
            'user_id' => $user->id
        ]);

        $this->delete(route('notFavorites', $thought));

        $this->assertCount(0, Favorite::all());
    }
}
