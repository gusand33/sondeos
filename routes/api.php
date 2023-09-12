<?php

use App\Http\Controllers\Api\V1\BooksController as V1BooksController;
use App\Http\Controllers\Books\BooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Bridge\AccessToken;

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
Route::post('/oauth/token', [AccessToken::class, 'issueToken'])->middleware(['api']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->middleware('auth.api')->group(function () {
    Route::apiResource('books', V1BooksController::class);
    // Otras rutas de la API
});


//Route::apiResource('books', V1BooksController::class)->middleware('auth.api');

