<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieComments extends Model
{
    protected $guarded = [];

    protected $table = 'movieComments';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
