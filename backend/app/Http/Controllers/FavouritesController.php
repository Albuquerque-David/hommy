<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favourites;
use App\Http\Requests\FavouriteRequest;


class FavouritesController extends Controller
{
    //
    // CRUD
    //
    public function createFavourite(FavouriteRequest $request)
    {
        $favourite = new Favourites;        
        
        $this->fillFavourite($favourite,$request);

        if(!isset($favourite->renter) || $favourite->renter == null)
            return response()->json('Renter not found', 404);
        if(!isset($favourite->republic) || $favourite->republic == null)
            return response()->json('Republic not found', 404);

        $favourite->save();
        return response()->json($favourite, 201);
    }

    public function showFavourite($id)
    {
        $favourite = Favourites::findOrFail($id);
        if($favourite == null)
            return response()->json('favourite not found.',404);
        
        return response()->json($favourite, 200);
    }

    public function listFavourites()
    {
        $favourite = Favourites::all();
        return response()->json($favourite, 200);
    }

    public function updateFavourite(FavouriteRequest $request, $id)
    {
        $favourite = Favourites::findOrFail($id);
        
        $this->fillfavourite($favourite,$request);

        if(!isset($favourite->renter) || $favourite->renter == null)
            return response()->json('Renter not found', 404);
        if(!isset($favourite->republic) || $favourite->republic == null)
            return response()->json('Republic not found', 404);

        $favourite->save();
        return response()->json($favourite, 201);
    }

    public function deleteFavourite($id)
    {
        $favourite = Favourites::findOrFail($id);
        if($favourite == null)
            return response()->json('Favourite not found',404);

        Favourite::destroy($id);
        return response()->json(['Favourite ' . $id . ' deleted.'], 200);
    }

    //
    // Methods
    //

    private function fillFavourite(Favourites $favourite, FavouriteRequest $request)
    {
        $favourite->renter_id = $request->renter_id == null ? $favourite->renter_id : $request->renter_id;
        $favourite->republic_id = $request->republic_id == null ? $favourite->republic_id : $request->republic_id;
    }
}
