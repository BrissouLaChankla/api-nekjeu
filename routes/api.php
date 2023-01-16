<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ScoreController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(SongController::class)->prefix('get')->group(function () {
    Route::get('{nb}/songs', 'getSongs');
});

Route::apiResource("scores", ScoreController::class);

Route::controller(ScoreController::class)->prefix('get')->group(function () {
    Route::get('/scores/{nb}', 'getBestScores');
    Route::get('/top-bot-player', 'getTopBotPlayer');
    Route::get('/top-vs-player', 'getTopVsPlayer');
});