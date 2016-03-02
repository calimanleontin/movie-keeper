<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    protected $guarded = [];

    protected $table = 'genres';

    public function movies()
    {
        return $this->belongsToMany('App\Movies');
    }
}
