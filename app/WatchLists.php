<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchLists extends Model
{
    protected $guarded = [];

    protected $table = 'watchlists';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
