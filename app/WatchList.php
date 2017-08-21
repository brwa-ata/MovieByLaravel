<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchList extends Model
{
    protected $fillable = ['film_id', 'user_id', 'episode_of_season_id'];
}
