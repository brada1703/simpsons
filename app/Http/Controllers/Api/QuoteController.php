<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\QuoteRequest;
use App\Http\Controllers\Controller;
use App\Services\QuoteService;

class QuoteController extends Controller
{
    protected $quoteService;

	function __construct(QuoteService $quoteService) {
		$this->quoteService = $quoteService;
	}

    public function index(QuoteRequest $request)
    {
        return $this->quoteService->paginate($request);
    }
}
