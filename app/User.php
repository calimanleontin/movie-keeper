<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function wishlist()
    {
        return $this->hasOne('App\WishList');
    }

    public function watchlist()
    {
        return $this->hasOne('App\WatchList');
    }

    public function celebComments()
    {
        return $this->hasMany('App\CelebComments');
    }

    public function movieComments()
    {
        return $this->hasMany('App\MovieComments');
    }

    public function is_admin()
    {
        return $this->role == 'admin';
    }
}
