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

    public function favoriteUsers()
    {
        return $this->belongsToMany('App\User');
    }

    public function bedrooms()
    {
        return $this->hasMany('App\Bedroom');
    }
}
