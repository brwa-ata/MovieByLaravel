<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EpisodeOfSeason extends Model
{
    protected $directory = '/images/';

    protected $fillable = [
      '	episode_name',
      '	episode_number',
      '	season_of_tv_show_id',
      '	released_date',
      '	episode_revenue',
      '	episode_budget',
      '	episode_overview',
      '	duration',
      '	popularity',
      '	image'
    ];

    public function seasonEpisode()
    {
        return $this->belongsTo('App\SeasonOfTvShow' , 'season_of_tv_show_id');
    }

    public  function language()
    {
        return $this->hasMany('App\Language' , 'episode_of_season_id');
    }

    public function episodeTrailer()
    {
        return $this->hasMany('App\EpisodeTrailer');
    }

    public function episodeImage()
    {
        return $this->hasMany('App\EpisodeImage');
    }

    public function getImageAttribute($image_value)
    {
        return $this->directory . $image_value;
    }


    public  function watchlist()
    {
        return $this->hasMany('App\WatchList');
    }

    public  function favorite()
    {
        return $this->hasMany('App\Favorite');
    }

    public  function user_list()
    {
        return $this->hasMany('App\UserList');
    }

    public  function rate()
    {
        return $this->hasMany('App\Rating');
    }
}
