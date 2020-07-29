<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Republic extends Model
{
    //
    public function tenant()
    {
        return $this->belongsTo('App\Tenant');
    }

    public function favouriteUsers()
    {
        return $this->belongsToMany('App\User');
    }

    public function bedrooms()
    {
        return $this->hasMany('App\Bedroom');
    }

    public function comments()
    {
        return $this->hasMany('App\Commentary');
    }
}
