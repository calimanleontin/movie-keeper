<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CelebComments extends Model
{
    protected $guarded = [];

    protected $table = 'celebComments';

    public function celeb()
    {
        return $this->belongsTo('App\Celebs', 'celeb_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
