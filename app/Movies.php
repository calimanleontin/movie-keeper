<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $guarded = [];

    protected $table = 'movies';

    public function celebs()
    {
        return $this->belongsToMany('App\Celebs')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Categories')->withTimestamps();
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genres')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany('App\MovieComments', 'movie_id');
    }
}
