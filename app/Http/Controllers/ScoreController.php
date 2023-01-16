<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $scores = Score::all();
       return response()->json($scores);
    }

    public function getBestScores($nbOfMusics) {
        $scores = Score::orderBy('score')->take($nbOfMusics)->select(['id', 'username', 'score','gametype_id', 'nb_of_musics', 'created_at'])->with('gametype')->get();
        return response()->json($scores);
    }

    public function getTopBotPlayer() {
        $topBot = Score::where('gametype_id', '=', '2')->orderBy('score')->first();
        return response()->json($topBot);
    }
    public function getTopVsPlayer() {
        $topVs = Score::where('gametype_id', '=', '1')->orderBy('score')->first();
        return response()->json($topVs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // La validation de données
        // $this->validate($request, [
        //     'name' => 'required',
        //     'avatar' => 'required',
        //     'score' => 'required',
        //     'gametype_id' => 'required'
        // ]);

        // On crée un nouvel utilisateur
        if($request->username === "Moi") {
            $request->merge(["username" => "Anonyme"]);
        }

        $score = Score::create([
            'username' => $request->username,
            'avatar' => $request->avatar,
            'nb_of_musics' => $request->nb_of_musics,
            'score' => $request->score,
            'gametype_id' => $request->typeGameId
        ]);
        
        return response()->json($score);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }
}
