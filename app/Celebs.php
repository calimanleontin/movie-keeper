<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Celebs extends Model
{
    protected $guarded = [];

    protected $table = 'celebs';

    public function movies()
    {
        return $this->belongsToMany('App\Movies')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany('App\CelebComments', 'celeb_id');
    }

    public function role()
    {
        return $this->belongsTo('App\Roles', 'role_id');
    }
}
