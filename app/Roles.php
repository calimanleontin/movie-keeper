<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $guarded = [];

    protected $table = 'roles';

    public function celebs()
    {
        return $this->hasMany('App\Celebs', 'celeb_id');
    }
}
