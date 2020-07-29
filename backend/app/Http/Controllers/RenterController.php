<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Renter;

class RenterController extends Controller
{
    //
    // CRUD
    //
    public function createRenter(Request $request)
    {
        $renter = new Renter;

        if(!($this->validateRequest($request)))
            return response()->json('Bad format', 400);
        
        $this->fillRenter($renter,$request);
        $renter->save();
        return response()->json($renter, 201);
    }

    public function showRenter($id)
    {
        $renter = Renter::findOrFail($id);
        if($renter == null)
            return response()->json('Renter not found.',404);
        
        return response()->json($renter, 200);
    }

    public function listRenters()
    {
        $renter = Renter::all();
        return response()->json($renter, 200);
    }

    public function updateRenter(Request $request, $id)
    {
        $renter = Renter::findOrFail($id);
        if(!($this->validateRequest($request)))
            return response()->json('Bad format', 400);
        
        $this->fillRenter($renter,$request);
        $renter->save();
        return response()->json($renter, 201);
    }

    public function deleteRenter($id)
    {
        $renter = Renter::findOrFail($id);
        if($renter == null)
            return response()->json('Renter not found',404);

        Renter::destroy($id);
        return response()->json(['Renter ' . $id . ' deleted.'], 200);
    }

    //
    // Relationship Methods
    //
    public function showBedroom($id)
    {
        $renter = Renter::findOrFail($id);
        if($renter == null)
            return response()->json('Renter not found',404);

        return response()->json($renter->bedroom);
    }

    public function rentBedroom($id, Request $request)
    {
        $renter = Renter::findOrFail($id);
        if($renter == null)
            return response()->json('Renter not found',404);

        if($request->bedroom_id == null)
            return response()->json('Bad format', 400);

        $renter->bedroom_id = $request->bedroom_id;
        if($renter->bedroom->get() == null)
            return response()->json('Bedroom not found', 404);
        
        $renter->save();
        return response()->json(['Renter ' . $id . ' rented bedroom ' . $request->bedroom_id . '.'], 200);
    }

    public function quitRentingBedroom($id)
    {
        $renter = Renter::findOrFail($id);
        if($renter == null)
            return response()->json('Renter not found',404);

        $renter->bedroom_id = null;
        $renter->save();

        return response()->json(['Renter ' . $id . ' are not in a bedroom anymore.'], 200);
    }

    public function showFavourites($id)
    {
        $renter = Renter::findOrFail($id);
        if($renter == null)
            return response()->json('Renter not found',404);

        return response()->json($renter->favourites, 200);
    }

    //
    // Methods
    //

    private function validateRequest(Request $request)
    {
        $renter = new Renter;
        $this->fillRenter($renter, $request);

        if($renter->name == null || $renter->email == null || $renter->password == null || $renter->city == null 
            || $renter->state == null || $renter->phoneNumber == null )
            return false;

        return true;
    }

    private function fillRenter(Renter $renter, Request $request)
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
