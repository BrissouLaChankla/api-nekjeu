<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{




    public function addSong(Request $request) {

        $file = $request->file('audio_src');
            $nameaudio = Str::slug($request->title, '_').'-'.uniqid().'.'.$file->getClientOriginalExtension();
            $nameAlbum = Album::find($request->album_id)->name;

            Storage::disk('local')->putFileAs(
                'public/albums/'.$nameAlbum,
                $file,
                $nameaudio
            );






        $song = Song::create([
            "title"=> $request->title,
            "lyrics"=> $request->lyrics,
            "album_id"=> $request->album_id,
            "audio_src"=> $nameaudio,
        ]);

        return back();
    }

    public function editSong(Request $request) {
        $song = Song::find($request->song_id);
        $song->update($request->all());
        return back();
    }




    public function getSongs($nb) {
        $songs = Song::with("album")->inRandomOrder()->take($nb)->get();
        return response()->json($songs);
    }   




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
