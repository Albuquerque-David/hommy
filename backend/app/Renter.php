<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    //
    public function commentaries()
    {
        return $this->hasMany('App\Commentary');
    }
}

