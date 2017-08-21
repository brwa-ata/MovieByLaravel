<?php

namespace App\Http\Controllers;

use App\EpisodeOfSeason;
use App\Http\Requests\InsertEpisodeRequest;
use App\SeasonOfTvShow;
use App\TvShow;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminEpisodeController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tvshows = TvShow::all();


        return view('admin.tvshow.season.episode.create' , compact('tvshows'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertEpisodeRequest $request)
    {

        $file = $request->file('image');
        $name = time() . $file->getClientOriginalName();
        $file->move('images' , $name);
        $insert_episode['image'] = $name;

        $episode_name = $request->episode_name;
        $episode_number = $request->episode_number;
        $season_of_tv_show_id = $request->season_of_tv_show_id;
        $released_date = $request->released_date;
        $episode_revenue = $request->episode_revenue;
        $episode_budget = $request->episode_budget;
        $duration = $request->duration;
        $episode_overview = $request->episode_overview;

        $insert_language = $request->language_name;

        DB::insert("INSERT INTO episode_of_seasons (episode_name, episode_number ,season_of_tv_show_id ,released_date ,episode_revenue , episode_budget ,duration ,episode_overview ,image)
                        VALUES ('$episode_name' , '$episode_number' , $season_of_tv_show_id , '$released_date' , $episode_revenue , $episode_budget , $duration , '$episode_overview' , '$name')");


       DB::insert("INSERT INTO languages (language_name , episode_of_season_id) VALUES ('$insert_language' , $season_of_tv_show_id)");

        $seasons = SeasonOfTvShow::findOrFail($season_of_tv_show_id);
        $tvshows = $seasons->tvShow;
        $episodes = $seasons->episodes;


        return view('admin.tvshow.season.episode.show' , compact('seasons' , 'tvshows' , 'episodes'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seasons = SeasonOfTvShow::findOrFail($id);
        $tvshows = $seasons->tvShow;
        $episodes = $seasons->episodes;


        return view('admin.tvshow.season.episode.show' , compact('seasons' , 'tvshows' , 'episodes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
