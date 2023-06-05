<?php

namespace App\Services;

use App\Models\Quote;

class QuoteService {
    public function paginate($request)
    {
        return Quote::when($request->character, function ($query) use ($request) {
                $query->where('character_id', $request->character);
            })
            ->when($request->search, function ($query) use ($request) {
                $query->where('quote', 'LIKE', '%' . $request->search . '%');
            })
            ->with('character')
            ->inRandomOrder()
            ->paginate();
    }
}