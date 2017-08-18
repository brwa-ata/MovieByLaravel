<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeasonOfTvShow extends Model
{
    protected  $directory = '/images/';

    protected $fillable = [
        'season',
        'tv_show_id',
        'overview',
        'year',
        'image'
    ];

    public function tvShow()
    {
        return $this->belongsTo('App\TvShow');
    }

    public function episodes()
    {
        return $this->hasMany('App\EpisodeOfSeason');
    }

    public function getImageAttribute($image_value)
    {
        return $this->directory . $image_value;
    }
}
