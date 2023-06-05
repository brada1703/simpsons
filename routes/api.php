<?php

use App\Http\Controllers\Api\CharacterController;
use App\Http\Controllers\Api\QuoteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('quotes', [QuoteController::class, 'index'])->name('api.quotes');
Route::get('characters', [CharacterController::class, 'index'])->name('api.characters.index');
Route::get('characters/{id}', [CharacterController::class, 'show'])->name('api.characters.show');
