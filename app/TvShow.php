<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TvShow extends Model
{

    protected $directory = '/images/';

    protected $fillable = [
      'title',
      'overview',
      'image',
      '	popularity'
    ];

    public  function productionCompany()
    {
        return $this->hasMany('App\ProductionCompany');
    }

    public  function productionCountry()
    {
        return $this->hasMany('App\ProductionCountry');
    }

    public  function language()
    {
        return $this->hasMany('App\Language');
    }

    public  function definedGenre()
    {
        return $this->belongsToMany('App\DefinedGenre' ,'genres' ,'tv_show_id' ,'defined_genre_id');
    }

    public  function seasons()
    {
        return $this->hasMany('App\SeasonOfTvShow');
    }

    public function getImageAttribute($image_value)
    {
        return $this->directory . $image_value;
    }
}
