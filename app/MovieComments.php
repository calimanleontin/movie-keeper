<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieComments extends Model
{
    protected $guarded = [];

    protected $table = 'movieComments';

    public function movie()
    {
        return $this->belongsTo('App\Movies', 'movie_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
