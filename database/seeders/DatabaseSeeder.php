<?php

namespace Database\Seeders;

use App\Models\Quote;
use App\Models\Character;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = include(database_path() . '/seeders/SeederData.php');
        $characters = $data['characters'];
        $quotes = $data['quotes'];

        foreach ($characters as $character) {
            Character::create([...$character]);
        }
        foreach ($quotes as $quote) {
            Quote::create([...$quote, 'id' => Str::uuid()->toString()]);
        }
    }
}
