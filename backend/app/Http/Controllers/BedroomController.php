<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bedroom;

class BedroomController extends Controller
{
    //
    public function createBedroom(Request $request)
    {
        $bedroom = new Bedroom;

        if(!($this->validateRequest($request)))
            return response()->json('Bad format', 400);
        
        $this->fillRenter($bedroom,$request);
        $bedroom->save();
        return response()->json($bedroom, 201);
    }

    public function showBedroom($id)
    {
        $bedroom = Bedroom::findOrFail($id);
        if($bedroom == null)
            return response()->json('Bedroom not found.',404);
        
        return response()->json($bedroom, 200);
    }

    public function listBedrooms()
    {
        $bedroom = Bedroom::all();
        return response()->json($bedroom, 200);
    }

    public function updateBedroom(Request $request, $id)
    {
        $bedroom = Bedroom::findOrFail($id);
        if(!($this->validateRequest($request)))
            return response()->json('Bad format', 400);
        
        $this->fillRenter($bedroom,$request);
        $bedroom->save();
        return response()->json($bedroom, 201);
    }

    public function deleteBedroom($id)
    {
        $bedroom = Bedroom::findOrFail($id);
        if($bedroom == null)
            return response()->json('Bedroom not found',404);

        Bedroom::destroy($id);
        return response()->json(['Bedroom ' . $id . ' deleted.'], 200);
    }

    //
    // Methods
    //

    private function validateRequest(Request $request)
    {
        $bedroom = new Bedroom;
        $this->fillRenter($bedroom, $request);

        if($bedroom->republic_id == null )
            return false;

        return true;
    }

    private function fillRenter(Bedroom $bedroom, Request $request)
    {
        $bedroom->republic_id = $request->republic_id == null ? $bedroom->republic_id : $request->republic_id;
    }
}
