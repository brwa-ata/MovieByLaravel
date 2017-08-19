<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['film_id'  , 'tv_show_id' , 'defined_genre_id'];
}
