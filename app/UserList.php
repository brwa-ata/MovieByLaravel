<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    protected $fillable = ['listname' , 'user_id' , 'film_id', 'episode_of_season_id' , 'list_image'];

    protected $directory = '/images/';

    public function getListImageAttribute($image_value)
    {
        return$this->directory . $image_value;
    }

    public function listFilm()
    {
        return $this->belongsTo('App\Film');
    }

}
