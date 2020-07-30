<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Http\Requests\RenterRequest;
use Laravel\Passport\HasApiToken;


class Renter extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;

    public function createRenter(RenterRequest $request)
    {
        $this->fillRenter($this,$request);
        $this->password = bcrypt($request->password);
        $this->save();
    }


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

     private function fillRenter(Renter $renter, RenterRequest $request)
    {
        $renter->name = $request->name == null ? $renter->name : $request->name;
        $renter->email = $request->email == null ? $renter->email : $request->email;
        $renter->password = $request->password == null ? $renter->password : $request->password;
        $renter->city = $request->city == null ? $renter->city : $request->city;
        $renter->state = $request->state == null ? $renter->state : $request->state;
        $renter->interestedNeighborhood = $request->interestedNeighborhood == null ? $renter->interestedNeighborhood : $request->interestedNeighborhood;
        $renter->phoneNumber = $request->phoneNumber == null ? $renter->phoneNumber : $request->phoneNumber;
        $renter->bedroom_id = $request->bedroom_id == null ? $renter->bedroom_id : $request->bedroom_id;
    }
}

