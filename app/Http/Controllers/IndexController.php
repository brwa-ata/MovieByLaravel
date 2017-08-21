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
       $languages = $episodes->language;
       $seasons = $episodes->seasonEpisode;
       $tvshows = $seasons->tvShow;

        return view('startpage.episode_info' , compact('tvshows' , 'episodes' , 'languages'));

    }

    /**
     *
     */

    /* FILM"S FUNCTIONS */

    public function upcoming()
    {
        $now = Carbon::today();

        $films = Film::where('released_date' , '>' , $now)->get();

        return view('startpage.upcoming' , compact('films'));

    }

    public function nowplaying()
    {
        $now = Carbon::today();
        $week =Carbon::now()->addWeek();

        $films = Film::whereBetween('released_date' , [$now, $week])->get();

        return view('startpage.nowplaying' , compact('films'));
    }

    public function popular()
    {
        $films = Film::where('popularity' , '>' , 20)->get();

        return view('startpage.popular' , compact('films'));
    }



    /*    EPISODE's  FUNCTIONS */

    public function ontv()
    {
        $today = Carbon::today();

        $episodes = EpisodeOfSeason::where('released_date', $today)->get();

        return view('startpage.ontv' , compact('episodes'));
    }

    public function airingToday()
    {
        $now = Carbon::today();

        $episodes = EpisodeOfSeason::where('released_date' , '>' , $now)->get();

        return view('startpage.airingtoday' , compact('episodes'));
    }

    public function popularTvshow()
    {
        $tvshows = TvShow::where('popularity' , '>' , 10)->get();

        return view('startpage.popular_tvshow' , compact('tvshows'));
    }

}



