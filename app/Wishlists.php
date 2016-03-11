<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlists extends Model
{
    protected $guarded = [];

    protected $table = 'wishlists';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function movies()
    {
        return $this->belongsToMany('App\Movies');
    }
}
