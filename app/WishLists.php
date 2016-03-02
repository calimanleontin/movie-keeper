<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishLists extends Model
{
    protected $guarded = [];

    protected $table = 'wishlists';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
