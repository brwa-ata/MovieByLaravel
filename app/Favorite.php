<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['film_id' , 'episode_of_season_id' , 'user_id'];
}
