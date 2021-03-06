<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Film;
use App\SeasonOfTvShow;

Route::auth();

//Route::get('/home', 'HomeController@index');


/*  INDEX ROUTES  */
Route::get('/', 'IndexController@index');
Route::get('/films/{id}', ['as' => 'films.show', 'uses' => 'IndexController@show']);
Route::get('/tvshow/{id}', ['as' => 'tvshow.show', 'uses' => 'IndexController@tvshow']);
Route::get('/tvshow/{id}/season', ['as' => 'season_of_tvshow.show', 'uses' => 'IndexController@season']);
Route::get('/season/{id}/episode', ['as' => 'episode_of_season.show', 'uses' => 'IndexController@episode']);
Route::get('/episode/{id}', ['as' => 'episode.show', 'uses' => 'IndexController@episodeInfo']);

/* ROUTES FOR USER ABILITY  */
Route::get('favorite_and_watchlist' , function (){});
Route::get('/films/rating' , ['as' => 'rating'] , function (){});


/*  ROUTE FOR FILM */
Route::get('/upcoming' , ['as' => 'upcoming' , 'uses' => 'IndexController@upcoming']);
Route::get('/nowplaying' , ['as' => 'nowplaying' , 'uses' => 'IndexController@nowplaying']);
Route::get('/popular' , ['as' => 'popular' , 'uses' => 'IndexController@popular']);

/*  ROUTE FOR TV SHOW */
Route::get('/ontv' , ['as' => 'ontv' , 'uses' => 'IndexController@ontv']);
Route::get('/airingtoday' , ['as' => 'airingtoday' , 'uses' => 'IndexController@airingToday']);
Route::get('/populartvshow' , ['as' => 'popular.tvshow' , 'uses' => 'IndexController@popularTvshow']);



/* ADMIN ROUTES  */

Route::group(['midleware' => 'admin']  , function (){

    Route::get('/admin', 'AdminController@index');
    Route::resource('admin/film' , 'AdminFilmController');
    Route::resource('admin/tv_show' , 'AdminTvShowController');
    Route::resource('admin/tvshow/season' , 'AdminSeasonController');
    Route::resource('admin/tvshow/season/episode' , 'AdminEpisodeController');

    /* THIS IS A ( FILM  )  PHOTO AND POST ROUTE  */
    /*  I NAMED THEM WRONG */
    Route::resource('episode/photo' , 'EpisodePhotoController');
    Route::resource('episode/poster' , 'EpisodePosterController');


    /*  THESE ARE THE EPISODE PHOTO AND POSTER ROUTE */
    Route::resource('episode/media/backdrop' , 'EpisodeBackdropController');
    Route::resource('episode/media/poster' , 'EpisodeMediaController');


    /*  USER ROUTES  */
    Route::resource('user/favorite' , 'UserFavoriteController');
    Route::resource('user/watchlist' , 'UserWatchlistController');
    Route::resource('user/lists' , 'UserListController');

});
