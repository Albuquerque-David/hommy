<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;

class Republic extends Model
{
    use SoftDeletes;

    public function createRepublic()
    {
        if(!isset($this) || $this->tenant == null)
            return response()->json('Tenant not found', 404);
        $this->save();
    }

    public function listRepublics()
    {
        return $this->all();
    }

    public function showRepublic($id)
    {
        $republic = Republic::findOrFail($id);
        if($republic == null)
            return response()->json('Republic not found.',404);

        return $republic;
    }

    public function updateRepublic()
    {
        if(!isset($this) || $this->tenant == null)
            return response()->json('Tenant not found', 404);
        $this->save();
    }

    public function deleteRepublic($id)
    {
        $republic = Republic::findOrFail($id);
        if($republic == null)
            return response()->json('Republic not found',404);
        Republic::destroy($id);
        return response()->json(['Republic ' . $id . ' deleted.'], 200);
    }

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
