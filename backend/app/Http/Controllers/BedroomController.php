<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BedroomRequest;


use App\Bedroom;

class BedroomController extends Controller
{
    //
    public function createBedroom(BedroomRequest $request)
    {
        $bedroom = new Bedroom;
        
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

    public function updateBedroom(BedroomRequest $request, $id)
    {
        $bedroom = Bedroom::findOrFail($id);
        
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

    private function fillRenter(Bedroom $bedroom, BedroomRequest $request)
    {
        $bedroom->republic_id = $request->republic_id == null ? $bedroom->republic_id : $request->republic_id;
    }
}
