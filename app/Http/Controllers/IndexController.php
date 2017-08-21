<?php

namespace App\Http\Controllers;

use App\EpisodeOfSeason;
use App\Film;
use App\SeasonOfTvShow;
use App\TvShow;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $films = Film::all();
        $tvshows = TVShow::all();

        return view('startpage.index' , compact('films' , 'tvshows'));
    }

    public function show($id)
    {
        $user = Auth::user();

        $films = Film::findOrFail($id);
        $companies = $films->productionCompany;
        $countries= $films->productionCountry;
        $genres  = $films->definedGenre;
        $languages = $films->language;


        return view('startpage.show' , compact('user','films','companies' , 'countries' , 'genres' , 'languages' ));
    }

    public function tvshow($id)
    {
        $tvshows = TVShow::findOrFail($id);
        return view('startpage.show_tvshow' , compact('tvshows'));
    }

    public function season($id)
    {
        $tvshows = TVShow::findOrFail($id);

        $seasons = $tvshows->seasons;

         return view('startpage.show_season' , compact( 'seasons'));
    }

    public function episode($season_id)
    {

        $seasons = SeasonOfTvShow::findOrFail($season_id);
        $tvshows = $seasons->tvShow;
        $episodes = $seasons->episodes;

        return view('startpage.show_episodes' , compact( 'episodes'));
    }

    public  function episodeInfo($episode_id)
    {
       $episodes = EpisodeOfSeason::findOrFail($episode_id);
       $seasons = $episodes->seasonEpisode;
        $tvshows = $seasons->tvShow;

        return view('startpage.episode_info' , compact('tvshows' , 'episodes'));

    }

    /**
     *
     */
    public function upcoming()
    {
        $now = Carbon::today();

        $films = Film::where('released_date' , '>' , $now)->get();

        return view('startpage.upcoming' , compact('films'));

    }

    public function nowplaying()
    {
        $now = Carbon::today();
        $films = Film::all()->where('released_date' , $now);

        return $films;
    }
}



