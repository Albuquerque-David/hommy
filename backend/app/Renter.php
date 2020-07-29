<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Renter extends Authenticatable
{
    use Notifiable;

     public function commentaries()
    {
        return $this->hasMany('App\Commentary');
    }

    public function favourites()
    {
        return $this->belongsToMany('App\Republic', 'favourites','renter_id', 'republic_id');
    }
    
    public function bedroom()
    {
        return $this->belongsTo('App\Bedroom');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'city', 'interestedNeighborhood', 'state', 'phoneNumber'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

