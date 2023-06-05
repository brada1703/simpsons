<?php

namespace App\Http\Controllers\Api;

use App\Models\Character;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class CharacterController extends Controller
{
    public function index(): Collection
    {
        return Character::all();
    }

    public function show(string $id): Character
    {
        return Character::findOrFail($id);
    }
}
