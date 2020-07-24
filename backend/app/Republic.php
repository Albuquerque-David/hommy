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
}
