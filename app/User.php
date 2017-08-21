<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'user_role','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
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
        return $this->hasMany('App\List');
    }

    public  function rate()
    {
        return $this->hasMany('App\Rating');
    }



    public function isAdmin()
    {
        if ($this->role->name  == 'admin')
        {
            return true;
        }

        return false;
    }
}
