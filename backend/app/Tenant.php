<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    //
    public function republics()
    {
        return $this->hasMany('App\Republic');
    }
}

