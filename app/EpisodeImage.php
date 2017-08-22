<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EpisodeImage extends Model
{
    protected $fillable = ['episode_backdrop' , 'episode_poster' , 'episode_of_season_id'];

    protected $directory = '/images/';

    public function getEpisodeBackdropAttribute($image_value)
    {
        return $this->directory . $image_value;
    }

    public function getEpisodePosterAttribute($image_value)
    {
        return $this->directory . $image_value;
    }

}
