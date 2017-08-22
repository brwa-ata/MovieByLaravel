<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmImage extends Model
{
    protected $directory = '/images/';

    protected $fillable = ['film_backdrop' , 'film_poster'];

    public function getFilmBackdropAttribute($image_value)
    {
        return $this->directory . $image_value;
    }

    public function getFilmPosterAttribute($image_value)
    {
        return $this->directory . $image_value;
    }
}
