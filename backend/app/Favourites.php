<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourites extends Model
{
    //
    public function republic()
    {
        return $this->belongsTo('App\Republic');
    }
    
    public function renter()
    {
        return $this->belongsTo('App\Renter');
    }
}
