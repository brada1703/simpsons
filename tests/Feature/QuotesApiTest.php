<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Quote;
use App\Models\Character;
use Illuminate\Support\Str;

class QuotesApiTest extends TestCase
{
    /** @test */
    public function quotes_api_returns_quotes(): void
    {
		$quotes = $this->getJson(route('api.quotes', [
            'page' => 1,
            'character' => '',
            'search' => ''
		]))->assertStatus(200);

        $this->assertNotEmpty($quotes['data']);
        $this->assertCount((new Quote)->getPerPage(), $quotes['data']);
    }

    /** @test */
    public function quotes_can_be_retrieved_by_character_id(): void
    {
        $character_id = Character::pluck('id')->first();
		$quotes = $this->getJson(route('api.quotes', [
            'page' => 1,
            'character' => $character_id,
            'search' => ''
		]))->assertStatus(200);

        $this->assertNotEmpty($quotes['data']);
        $this->assertEquals($character_id, $quotes['data'][0]['character_id']);
    }

    /** @test */
    public function quotes_api_returns_error_if_character_id_not_in_characters_table(): void
    {
        $random_id = Str::uuid()->toString();
		$this->getJson(route('api.quotes', [
            'page' => 1,
            'character' => $random_id,
            'search' => '',
		]))
        ->assertStatus(422)
        ->assertJson(['message' => 'The selected character is invalid.']);
    }

    /** @test */
    public function quotes_can_be_filtered_by_search(): void
    {
        $quote = Quote::first();
		$quotes = $this->getJson(route('api.quotes', [
            'page' => 1,
            'character' => '',
            'search' => $quote->quote,
		]))->assertStatus(200);

        $this->assertNotEmpty($quotes['data']);
        $this->assertEquals($quote['id'], $quotes['data'][0]['id']);
    }
}
