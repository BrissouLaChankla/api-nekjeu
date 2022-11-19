<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Models\Song;
use App\Models\Album;
use App\Models\Artist;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $albums = Album::all();
    return view('welcome')->with([
        "albums" => $albums
    ]);
});



Route::post('/add-song', [SongController::class, 'addSong'])->name('add-song');
Route::post('/edit-song', [SongController::class, 'editSong'])->name('edit-song');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
