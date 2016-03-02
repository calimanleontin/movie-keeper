<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $guarded = [];

    protected $table = 'comments';

    public function movies()
    {
        return $this->belongsToMany('App\Movies')->withTimestamps();
    }
}
