<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{

    protected $directory = '/images/';

    protected $fillable = [
        'title',
        'overview',
        'released_date',
        'revenue',
        'budget',
        'duration',
        'popularity',
        'image'
    ];

    public  function productionCountry()
    {
        return $this->hasMany('App\ProductionCountry');
    }

    public  function productionCompany()
    {
        return $this->hasMany('App\ProductionCompany');
    }

    public  function language()
    {
        return $this->hasMany('App\Language');
    }

    public  function definedGenre()
    {
        return $this->belongsToMany('App\DefinedGenre' ,'genres' ,'film_id' ,'defined_genre_id');
    }

    public function genres()
    {
        return $this->hasMany('App\Genre');
    }

    public function filmTrailer()
    {
        return $this->hasMany('App\FilmTrailer');
    }

    public function filmImage()
    {
        return $this->hasMany('App\FilmImage');
    }

    public function rating()
    {
        return $this->hasMany('App\Rating');
    }

    public function getImageAttribute($image_value)
    {
        return $this->directory . $image_value;
    }

}
