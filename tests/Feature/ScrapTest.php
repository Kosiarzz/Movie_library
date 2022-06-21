<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ScrapTest extends TestCase
{
    /**
     * Testing the movie search on the scraping page.
     *
     * @return void
     */
    public function test_search_movie_scrap()
    {
        $user = User::firstOrCreate([
            'name' => 'test',
            'email' => 'test@test.test',
            'password' => 'test'
        ]);

        $this->actingAs($user); //auth

        $movieName = "Avengers";

        $response = $this->get('/filmy/wyszukiwanie?name='. $movieName);

        $response->assertStatus(200)->assertSeeText($movieName);
    }
}
