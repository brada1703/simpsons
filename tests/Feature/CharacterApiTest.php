<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Character;
use Illuminate\Support\Str;

class CharacterApiTest extends TestCase
{
    /** @test */
    public function characters_api_returns_characters(): void
    {
		$characters = $this->getJson(route('api.characters.index'))->assertStatus(200);
        $this->assertNotEmpty($characters);
    }

    /** @test */
    public function characters_api_returns_individual_character_by_id(): void
    {
        $character_id = Character::first()->id;
		$character = $this->getJson(route('api.characters.index', ['id', $character_id]))->assertStatus(200);
        $this->assertNotEmpty($character);
        $this->assertEquals($character_id, $character[0]['id']);
    }


    /** @test */
    public function characters_api_returns_error_if_character_not_found(): void
    {
        $random_id = Str::uuid()->toString();
		$response = $this->getJson(route('api.characters.show', ['id', $random_id]))->assertStatus(404);
    }
}
