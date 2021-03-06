<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bedroom extends Model
{
    public function republic()
    {
        return $this->belongsTo('App\Republic');
    }
    
    public function renter()
    {
        return $this->hasOne('App\Renter');
    }
}
