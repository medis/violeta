<?php

namespace Tests\Feature;

use App\Music;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeatureMusicTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function song_can_be_featured()
    {
        $this->signIn();

        $song = create('App\Music');

        $payload = $song->toArray();
        $payload['featured'] = 1;

        $this->putJson($song->url->update, $payload)
            ->assertStatus(200);

        $this->assertDatabaseHas('musics', ['featured' => 1, 'id' => $song->id]);
    }

    /** @test */
    public function only_one_song_can_be_published_at_a_time()
    {
        $this->signIn();

        $song = make('App\Music', ['featured' => 1]);
        $this->postJson($song->url->store, $song->toArray())
            ->assertStatus(201);

        $song = make('App\Music', ['featured' => 1]);
        $this->postJson($song->url->store, $song->toArray())
            ->assertStatus(201);

        $this->assertEquals(1, Music::where('featured', 1)->count());
    }

    /** @test */
    public function only_one_song_can_be_published_at_a_time_direct()
    {
        $this->signIn();

        create('App\Music', ['featured' => 1], 2);

        $this->assertEquals(1, Music::where('featured', 1)->count());
    }
}
